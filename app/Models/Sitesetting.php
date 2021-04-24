<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sitesetting
 *
 * @property int $id
 * @property string|null $phone_one
 * @property string|null $phone_two
 * @property string|null $email
 * @property string|null $company_name
 * @property string|null $company_address
 * @property string|null $facebook
 * @property string|null $youtube
 * @property string|null $instagram
 * @property string|null $twitter
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static Builder|Sitesetting newModelQuery()
 * @method static Builder|Sitesetting newQuery()
 * @method static Builder|Sitesetting query()
 * @method static Builder|Sitesetting whereCompanyAddress($value)
 * @method static Builder|Sitesetting whereCompanyName($value)
 * @method static Builder|Sitesetting whereCreatedAt($value)
 * @method static Builder|Sitesetting whereEmail($value)
 * @method static Builder|Sitesetting whereFacebook($value)
 * @method static Builder|Sitesetting whereId($value)
 * @method static Builder|Sitesetting whereInstagram($value)
 * @method static Builder|Sitesetting wherePhoneOne($value)
 * @method static Builder|Sitesetting wherePhoneTwo($value)
 * @method static Builder|Sitesetting whereTwitter($value)
 * @method static Builder|Sitesetting whereUpdatedAt($value)
 * @method static Builder|Sitesetting whereYoutube($value)
 * @mixin \Eloquent
 */
class Sitesetting extends Model
{
    protected $table = 'sitesetting';

    protected $fillable = [
        'phone_one',
        'phone_two',
        'email',
        'company_name',
        'company_address',
        'facebook',
        'youtube',
        'instagram',
        'twitter'
    ];
}
