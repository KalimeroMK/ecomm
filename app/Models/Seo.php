<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seo
 *
 * @property int $id
 * @property string|null $meta_title
 * @property string|null $meta_author
 * @property string|null $meta_tag
 * @property string|null $meta_description
 * @property string|null $google_analytics
 * @property string|null $bing_analytics
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static Builder|Seo newModelQuery()
 * @method static Builder|Seo newQuery()
 * @method static Builder|Seo query()
 * @method static Builder|Seo whereBingAnalytics($value)
 * @method static Builder|Seo whereCreatedAt($value)
 * @method static Builder|Seo whereGoogleAnalytics($value)
 * @method static Builder|Seo whereId($value)
 * @method static Builder|Seo whereMetaAuthor($value)
 * @method static Builder|Seo whereMetaDescription($value)
 * @method static Builder|Seo whereMetaTag($value)
 * @method static Builder|Seo whereMetaTitle($value)
 * @method static Builder|Seo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Seo extends Model
{
    protected $table = 'seo';

    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_tag',
        'meta_description',
        'google_analytics',
        'bing_analytics'
    ];
}
