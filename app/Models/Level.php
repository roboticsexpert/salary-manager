<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Level
 * @package App\Models
 * @property int id
 * @property int level_group_id
 * @property LevelGroup levelGroup
 * @property string name
 * @property string description
 * @property double factor
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Level extends Model
{
    use HasFactory;

    public function levelGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LevelGroup::class);
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
