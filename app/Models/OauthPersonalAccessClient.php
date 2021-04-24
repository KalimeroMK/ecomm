<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthPersonalAccessClient
 *
 * @property int $id
 * @property int $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static Builder|OauthPersonalAccessClient newModelQuery()
 * @method static Builder|OauthPersonalAccessClient newQuery()
 * @method static Builder|OauthPersonalAccessClient query()
 * @method static Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static Builder|OauthPersonalAccessClient whereId($value)
 * @method static Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends Model
{
    protected $table = 'oauth_personal_access_clients';

    protected $casts = [
        'client_id' => 'int'
    ];

    protected $fillable = [
        'client_id'
    ];
}
