<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Continent
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $code
 * @property array|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Country[] $countries
 * @property-read int|null $countries_count
 * @method static \Database\Factories\ContinentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereName($value)
 * @mixin \Eloquent
 */
class Continent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'data',
    ];
    protected $casts = [
        'data' => 'array',
    ];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }

}
