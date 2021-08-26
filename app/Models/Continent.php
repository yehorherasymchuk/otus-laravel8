<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Continent
 * @package App\Models
 * @property int id
 * @property string name
 */
class Continent extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
    ];
}
