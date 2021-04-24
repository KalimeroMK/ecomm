<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthRefreshToken
 *
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property Carbon|null $expires_at
 * @package App\Models
 * @method static Builder|OauthRefreshToken newModelQuery()
 * @method static Builder|OauthRefreshToken newQuery()
 * @method static Builder|OauthRefreshToken query()
 * @method static Builder|OauthRefreshToken whereAccessTokenId($value)
 * @method static Builder|OauthRefreshToken whereExpiresAt($value)
 * @method static Builder|OauthRefreshToken whereId($value)
 * @method static Builder|OauthRefreshToken whereRevoked($value)
 * @mixin \Eloquent
 */
class OauthRefreshToken extends Model
{
    protected $table = 'oauth_refresh_tokens';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'revoked' => 'bool'
    ];

    protected $dates = [
        'expires_at'
    ];

    protected $fillable = [
        'access_token_id',
        'revoked',
        'expires_at'
    ];
}
