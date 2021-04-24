<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wishlist
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Product $product
 * @property User $user
 * @package App\Models
 * @method static Builder|Wishlist newModelQuery()
 * @method static Builder|Wishlist newQuery()
 * @method static Builder|Wishlist query()
 * @method static Builder|Wishlist whereCreatedAt($value)
 * @method static Builder|Wishlist whereId($value)
 * @method static Builder|Wishlist whereProductId($value)
 * @method static Builder|Wishlist whereUpdatedAt($value)
 * @method static Builder|Wishlist whereUserId($value)
 * @mixin \Eloquent
 */
class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $casts = [
        'user_id' => 'int',
        'product_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
