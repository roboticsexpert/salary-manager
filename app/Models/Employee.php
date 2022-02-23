<?php

namespace App\Models;

use App\Helpers\PriceHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App\Models
 * @property int id
 * @property string name
 * @property int team_id
 * @property Team team
 * @property Level level
 * @property int level_id
 * @property Carbon hired_at
 * @property double temp_raise_percent
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property ?Responsibility responsibility
 * @property LoyalityLevel loyalityLevel
 * @property int loyality_level_id
 * @property double salary
 * @property-read double expected_salary
 *
 */
class Employee extends Model
{
    protected $dates = ['hired_at'];

    use HasFactory;

    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function responsibility(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Responsibility::class);
    }

    public function loyalityLevel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LoyalityLevel::class);
    }

    public function getSalaryBrowseAttribute(): string
    {
        if ($this->exists)
            return PriceHelper::formatMoney($this->attributes['salary']) . ' (Should be ' . PriceHelper::formatMoney($this->getExpectedSalaryAttribute()) . ')';
        return '';
    }

    public function getExpectedSalaryAttribute(): string
    {

        $baseSalary = $this->team->base_salary;

        $loyalityLevelFactor = $this->loyalityLevel->factor;
        $levelFactor = $this->level->factor;
        $responsibilityFactor = $this->responsibility ? $this->responsibility->factor : 1;



        $result= $baseSalary * $loyalityLevelFactor * $levelFactor * $responsibilityFactor;
        if($this->temp_raise_percent > 0)
             $result*= (1+$this->temp_raise_percent);
        return $result;
    }

}
