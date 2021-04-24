<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property int $id
 * @property string|null $vat
 * @property string|null $shipping_charge
 * @property string|null $shop_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @property string|null $shopname
 * @property string|null $adderss
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereAdderss($value)
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereEmail($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereLogo($value)
 * @method static Builder|Setting wherePhone($value)
 * @method static Builder|Setting whereShippingCharge($value)
 * @method static Builder|Setting whereShopname($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereVat($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'vat',
        'shipping_charge',
        'shop_name',
        'email',
        'phone',
        'address',
        'logo'
    ];
}
