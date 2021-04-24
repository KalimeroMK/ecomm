<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $payment_id
 * @property string|null $paying_amount
 * @property string|null $blnc_transection
 * @property string|null $stripe_order_id
 * @property string|null $subtotal
 * @property string|null $shipping
 * @property string|null $vat
 * @property string|null $total
 * @property string|null $status
 * @property string|null $month
 * @property string|null $date
 * @property string|null $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @property Collection|OrdersDetail[] $orders_details
 * @property Collection|Shipping[] $shippings
 * @package App\Models
 * @property-read int|null $orders_details_count
 * @property-read int|null $shippings_count
 * @method static OrderFactory factory(...$parameters)
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereBlncTransection($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDate($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereMonth($value)
 * @method static Builder|Order wherePayingAmount($value)
 * @method static Builder|Order wherePaymentId($value)
 * @method static Builder|Order whereShipping($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereStripeOrderId($value)
 * @method static Builder|Order whereSubtotal($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @method static Builder|Order whereVat($value)
 * @method static Builder|Order whereYear($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'payment_id',
        'paying_amount',
        'blnc_transection',
        'stripe_order_id',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'month',
        'date',
        'year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders_details()
    {
        return $this->hasMany(OrdersDetail::class);
    }

    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }
}
