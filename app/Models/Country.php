<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Laravel\Scout\Searchable;

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
 * @property string $continent_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Country whereContinentName($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country whereUpdatedAt($value)
 */
class Country extends Model
{

    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'continent_name',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

}
