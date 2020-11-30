<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * App\Models\Role
 *
 * @property int id
 * @property string name
 * @property int status
 * @property array permissions
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @mixin \Eloquent
 */
class Role extends Model
{

    use HasFactory;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 20;

    protected $fillable = [
        'name',
        'status',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

}
