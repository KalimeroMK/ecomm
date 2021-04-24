<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostCategory
 *
 * @property int $id
 * @property string $category_name_en
 * @property string $category_name_in
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static Builder|PostCategory newModelQuery()
 * @method static Builder|PostCategory newQuery()
 * @method static Builder|PostCategory query()
 * @method static Builder|PostCategory whereCategoryNameEn($value)
 * @method static Builder|PostCategory whereCategoryNameIn($value)
 * @method static Builder|PostCategory whereCreatedAt($value)
 * @method static Builder|PostCategory whereId($value)
 * @method static Builder|PostCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostCategory extends Model
{
    protected $table = 'post_category';

    protected $fillable = [
        'category_name_en',
        'category_name_in'
    ];
}
