<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Country
 *
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country query()
 * @mixin Eloquent
 * @property-read Collection|City[] $cities
 * @property int $id
 * @property string $name
 * @property Continent $continent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Country whereContinentName($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @property int $continent_id
 * @property-read int|null $cities_count
 * @method static \Database\Factories\CountryFactory factory(...$parameters)
 * @method static Builder|Country whereContinentId($value)
 */
class Country extends Model
{

    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'continent_name',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

}
