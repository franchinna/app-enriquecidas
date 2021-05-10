<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cd
 *
 * @property int $cd_id
 * @property string $title
 * @property string $description
 * @property int $duration
 * @property int|null $cost
 * @property string|null $release_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cd newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cd newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cd query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereCdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cd extends Model
{
   // use HasFactory;

   protected $table = "cds";
   protected $primaryKey = "cd_id";

   protected $fillable = [
      'title',
      'description',
      'duration',
      'cost',
      'release_date',
   ];
}
