<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\NewsletterFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Newsletter
 *
 * @property int $id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static NewsletterFactory factory(...$parameters)
 * @method static Builder|Newsletter newModelQuery()
 * @method static Builder|Newsletter newQuery()
 * @method static Builder|Newsletter query()
 * @mixin \Eloquent
 */
class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletters';

    protected $fillable = [
        'email'
    ];
}
