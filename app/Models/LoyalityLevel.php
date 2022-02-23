<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LoyalityLevel
 * @package App\Models
 * @property int id
 * @property string name
 * @property double factor
 */
class LoyalityLevel extends Model
{
    use HasFactory;
}
