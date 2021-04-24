<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Post
 *
 * @property int $id
 * @property int $category_id
 * @property string $post_title_en
 * @property string $post_title_in
 * @property string $post_image
 * @property string $details_en
 * @property string $details_in
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Category $category
 * @package App\Models
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDetailsEn($value)
 * @method static Builder|Post whereDetailsIn($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePostImage($value)
 * @method static Builder|Post wherePostTitleEn($value)
 * @method static Builder|Post wherePostTitleIn($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $casts = [
        'category_id' => 'int'
    ];

    protected $fillable = [
        'category_id',
        'post_title_en',
        'post_title_in',
        'post_image',
        'details_en',
        'details_in'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
