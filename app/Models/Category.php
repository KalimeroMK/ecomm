<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Post[] $posts
 * @property Collection|Product[] $products
 * @package App\Models
 * @property string $category_name
 * @property-read \Kalnoy\Nestedset\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Category $parent
 * @property-read int|null $posts_count
 * @property-read int|null $products_count
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static QueryBuilder|Category ancestorsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category ancestorsOf($id, array $columns = [])
 * @method static QueryBuilder|Category applyNestedSetScope(?string $table = null)
 * @method static QueryBuilder|Category countErrors()
 * @method static QueryBuilder|Category d()
 * @method static QueryBuilder|Category defaultOrder(string $dir = 'asc')
 * @method static QueryBuilder|Category descendantsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static CategoryFactory factory(...$parameters)
 * @method static QueryBuilder|Category fixSubtree($root)
 * @method static QueryBuilder|Category fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static QueryBuilder|Category getNodeData($id, $required = false)
 * @method static QueryBuilder|Category getPlainNodeData($id, $required = false)
 * @method static QueryBuilder|Category getTotalErrors()
 * @method static QueryBuilder|Category hasChildren()
 * @method static QueryBuilder|Category hasParent()
 * @method static QueryBuilder|Category isBroken()
 * @method static QueryBuilder|Category leaves(array $columns = [])
 * @method static QueryBuilder|Category makeGap(int $cut, int $height)
 * @method static QueryBuilder|Category moveNode($key, $position)
 * @method static QueryBuilder|Category newModelQuery()
 * @method static QueryBuilder|Category newQuery()
 * @method static QueryBuilder|Category orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static QueryBuilder|Category orWhereDescendantOf($id)
 * @method static QueryBuilder|Category orWhereNodeBetween($values)
 * @method static QueryBuilder|Category orWhereNotDescendantOf($id)
 * @method static QueryBuilder|Category query()
 * @method static QueryBuilder|Category rebuildSubtree($root, array $data, $delete = false)
 * @method static QueryBuilder|Category rebuildTree(array $data, $delete = false, $root = null)
 * @method static QueryBuilder|Category reversed()
 * @method static QueryBuilder|Category root(array $columns = [])
 * @method static QueryBuilder|Category whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static QueryBuilder|Category whereAncestorOrSelf($id)
 * @method static QueryBuilder|Category whereCategoryName($value)
 * @method static QueryBuilder|Category whereCreatedAt($value)
 * @method static QueryBuilder|Category whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static QueryBuilder|Category whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static QueryBuilder|Category whereId($value)
 * @method static QueryBuilder|Category whereIsAfter($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsBefore($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsLeaf()
 * @method static QueryBuilder|Category whereIsRoot()
 * @method static QueryBuilder|Category whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static QueryBuilder|Category whereNotDescendantOf($id)
 * @method static QueryBuilder|Category whereUpdatedAt($value)
 * @method static QueryBuilder|Category withDepth(string $as = 'depth')
 * @method static QueryBuilder|Category withoutRoot()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use NodeTrait;
    use HasFactory;

    protected $table = 'categories';

    protected $casts = [
        '_lft' => 'int',
        '_rgt' => 'int',
        'parent_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'slug',
        '_lft',
        '_rgt',
        'parent_id'
    ];

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return array
     */
    public static function getTree()
    {
        $categories = self::get()->toTree();
        $traverse = static function ($categories, $prefix = '') use (&$traverse, &$allCats) {
            foreach ($categories as $category) {
                $allCats[] = ["name" => $prefix.' '.$category->name, "id" => $category->id];
                $traverse($category->children, $prefix.'-');
            }
            return $allCats;
        };
        return $traverse($categories);
    }

    /**
     * @return string
     */
    public static function getList(): string
    {
        $categories = self::get()->toTree();
        $lists = '<li class="hs-has-sub-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">';
        foreach ($categories as $category) {
            $lists .= self::renderNodeHP($category);
        }
        $lists .= "</li>";
        return $lists;
    }

    /**
     * @param $node
     * @return string
     */
    public static function renderNodeHP($node): string
    {
        $list = '<li class="dropdown-item hs-has-sub-menu "><a id="nav-link-pages" class="nav-link g-py-7 g-px-0" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-pages" href="/category/'.$node->slug.'">'.$node->title.'</a>';
        if ($node->children()->count() > 0) {
            $list .= '<ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling animated fadeOut">';
            foreach ($node->children as $child) {
                $list .= self::renderNodeHP($child);
            }
            $list .= "</ul>";
        }
        $list .= "</li>";
        return $list;
    }
}
