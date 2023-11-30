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
 * @property int $artist_id
 * @property-read \App\Models\Artist $artist
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cd whereArtistId($value)
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
      'artist_id',
      'imagen',
   ];

   /** @var string[] Reglas de validacion */
   public static $rules = [
      'title' => 'required',
      'description' => 'required|min:10',
      'duration' => 'required|numeric',
      'cost' => 'required|numeric',
      'release_date' => 'required|date',
   ];

   public function artist(){

      return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
   }

   public function genres(){

      return $this->belongsToMany(Genre::class, 'cds_has_genres', 'cd_id', 'genre_id', 'cd_id', 'genre_id');
   }
}