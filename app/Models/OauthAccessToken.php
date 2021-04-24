<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthAccessToken
 *
 * @property string $id
 * @property int|null $user_id
 * @property int $client_id
 * @property string|null $name
 * @property string|null $scopes
 * @property bool $revoked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $expires_at
 * @package App\Models
 * @method static Builder|OauthAccessToken newModelQuery()
 * @method static Builder|OauthAccessToken newQuery()
 * @method static Builder|OauthAccessToken query()
 * @method static Builder|OauthAccessToken whereClientId($value)
 * @method static Builder|OauthAccessToken whereCreatedAt($value)
 * @method static Builder|OauthAccessToken whereExpiresAt($value)
 * @method static Builder|OauthAccessToken whereId($value)
 * @method static Builder|OauthAccessToken whereName($value)
 * @method static Builder|OauthAccessToken whereRevoked($value)
 * @method static Builder|OauthAccessToken whereScopes($value)
 * @method static Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder|OauthAccessToken whereUserId($value)
 * @mixin \Eloquent
 */
class OauthAccessToken extends Model
{
    protected $table = 'oauth_access_tokens';
    public $incrementing = false;

    protected $casts = [
        'user_id' => 'int',
        'client_id' => 'int',
        'revoked' => 'bool'
    ];

    protected $dates = [
        'expires_at'
    ];

    protected $fillable = [
        'user_id',
        'client_id',
        'name',
        'scopes',
        'revoked',
        'expires_at'
    ];
}
