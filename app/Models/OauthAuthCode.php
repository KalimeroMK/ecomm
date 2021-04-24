<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthAuthCode
 *
 * @property string $id
 * @property int $user_id
 * @property int $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property Carbon|null $expires_at
 * @package App\Models
 * @method static Builder|OauthAuthCode newModelQuery()
 * @method static Builder|OauthAuthCode newQuery()
 * @method static Builder|OauthAuthCode query()
 * @method static Builder|OauthAuthCode whereClientId($value)
 * @method static Builder|OauthAuthCode whereExpiresAt($value)
 * @method static Builder|OauthAuthCode whereId($value)
 * @method static Builder|OauthAuthCode whereRevoked($value)
 * @method static Builder|OauthAuthCode whereScopes($value)
 * @method static Builder|OauthAuthCode whereUserId($value)
 * @mixin \Eloquent
 */
class OauthAuthCode extends Model
{
    protected $table = 'oauth_auth_codes';
    public $incrementing = false;
    public $timestamps = false;

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
        'scopes',
        'revoked',
        'expires_at'
    ];
}
