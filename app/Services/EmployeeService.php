<?php


namespace App\Services;


use App\Models\Employee;
use App\Models\Team;

class EmployeeService
{
    public function __construct()
    {
    }

    public function getAllEmployees($teamId = null)
    {
        $query = Employee::with('responsibility', 'level', 'team', 'loyalityLevel');

        if ($teamId)
            $query = $query->where('team_id', $teamId);
        return $query->get();
    }

    public function getAllTeams()
    {
        return Team::get();
    }
}
