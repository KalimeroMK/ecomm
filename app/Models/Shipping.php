<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shipping
 *
 * @property int $id
 * @property int $order_id
 * @property string $ship_name
 * @property string $ship_phone
 * @property string $ship_email
 * @property string $ship_address
 * @property string $ship_city
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Order $order
 * @package App\Models
 * @method static Builder|Shipping newModelQuery()
 * @method static Builder|Shipping newQuery()
 * @method static Builder|Shipping query()
 * @method static Builder|Shipping whereCreatedAt($value)
 * @method static Builder|Shipping whereId($value)
 * @method static Builder|Shipping whereOrderId($value)
 * @method static Builder|Shipping whereShipAddress($value)
 * @method static Builder|Shipping whereShipCity($value)
 * @method static Builder|Shipping whereShipEmail($value)
 * @method static Builder|Shipping whereShipName($value)
 * @method static Builder|Shipping whereShipPhone($value)
 * @method static Builder|Shipping whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Shipping extends Model
{
    protected $table = 'shipping';

    protected $casts = [
        'order_id' => 'int'
    ];

    protected $fillable = [
        'order_id',
        'ship_name',
        'ship_phone',
        'ship_email',
        'ship_address',
        'ship_city'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
