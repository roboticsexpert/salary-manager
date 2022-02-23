<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @package App\Models
 * @property int id
 * @property string name
 * @property double base_salary
 */
class Team extends Model
{
    use HasFactory;
    protected $guarded=[];

}
