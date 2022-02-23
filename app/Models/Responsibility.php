<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsibility
 * @package App\Models
 * @property int id
 * @property string name
 * @property double factor
 */
class Responsibility extends Model
{
    use HasFactory;

    protected $guarded = [];
}
