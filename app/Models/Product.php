<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $brand_id
 * @property string $product_name
 * @property string $product_code
 * @property string $product_quantity
 * @property string $product_details
 * @property string $product_color
 * @property string $product_size
 * @property string $selling_price
 * @property string|null $discount_price
 * @property string|null $video_link
 * @property int|null $main_slider
 * @property int|null $hot_deal
 * @property int|null $best_rated
 * @property int|null $mid_slider
 * @property int|null $hot_new
 * @property int|null $trend
 * @property string|null $image_one
 * @property string|null $image_two
 * @property string|null $image_three
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Brand|null $brand
 * @property Category $category
 * @property Collection|OrdersDetail[] $orders_details
 * @property Collection|Wishlist[] $wishlists
 * @package App\Models
 * @property int|null $subcategory_id
 * @property-read int|null $orders_details_count
 * @property-read int|null $wishlists_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBestRated($value)
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDiscountPrice($value)
 * @method static Builder|Product whereHotDeal($value)
 * @method static Builder|Product whereHotNew($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImageOne($value)
 * @method static Builder|Product whereImageThree($value)
 * @method static Builder|Product whereImageTwo($value)
 * @method static Builder|Product whereMainSlider($value)
 * @method static Builder|Product whereMidSlider($value)
 * @method static Builder|Product whereProductCode($value)
 * @method static Builder|Product whereProductColor($value)
 * @method static Builder|Product whereProductDetails($value)
 * @method static Builder|Product whereProductName($value)
 * @method static Builder|Product whereProductQuantity($value)
 * @method static Builder|Product whereProductSize($value)
 * @method static Builder|Product whereSellingPrice($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereSubcategoryId($value)
 * @method static Builder|Product whereTrend($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereVideoLink($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $casts = [
        'category_id' => 'int',
        'brand_id' => 'int',
        'main_slider' => 'int',
        'hot_deal' => 'int',
        'best_rated' => 'int',
        'mid_slider' => 'int',
        'hot_new' => 'int',
        'trend' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders_details()
    {
        return $this->hasMany(OrdersDetail::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
