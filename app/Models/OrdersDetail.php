<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OrdersDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string|null $product_name
 * @property string|null $color
 * @property string|null $size
 * @property string|null $quantity
 * @property string|null $singleprice
 * @property string|null $totalprice
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Order $order
 * @property Product $product
 * @package App\Models
 * @method static Builder|OrdersDetail newModelQuery()
 * @method static Builder|OrdersDetail newQuery()
 * @method static Builder|OrdersDetail query()
 * @method static Builder|OrdersDetail whereColor($value)
 * @method static Builder|OrdersDetail whereCreatedAt($value)
 * @method static Builder|OrdersDetail whereId($value)
 * @method static Builder|OrdersDetail whereOrderId($value)
 * @method static Builder|OrdersDetail whereProductId($value)
 * @method static Builder|OrdersDetail whereProductName($value)
 * @method static Builder|OrdersDetail whereQuantity($value)
 * @method static Builder|OrdersDetail whereSingleprice($value)
 * @method static Builder|OrdersDetail whereSize($value)
 * @method static Builder|OrdersDetail whereTotalprice($value)
 * @method static Builder|OrdersDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrdersDetail extends Model
{
    use HasFactory;

    protected $table = 'orders_details';

    protected $casts = [
        'order_id' => 'int',
        'product_id' => 'int'
    ];

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'quantity',
        'singleprice',
        'totalprice'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
