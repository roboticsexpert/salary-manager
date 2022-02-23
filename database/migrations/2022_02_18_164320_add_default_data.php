<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        \Illuminate\Support\Facades\DB::table('level_groups')->insert([
            ['id' => 1, 'name' => 'Junior', 'description' => ''],
            ['id' => 2, 'name' => 'Mid', 'description' => ''],
            ['id' => 3, 'name' => 'Senior', 'description' => ''],
        ]);

        \Illuminate\Support\Facades\DB::table('levels')->insert([
            ['id' => 1, 'name' => 'Junior 1', 'level_group_id' => 1, 'factor' => 1, 'description' => ''],
            ['id' => 2, 'name' => 'Junior 2', 'level_group_id' => 1, 'factor' => 1.2, 'description' => ''],
            ['id' => 3, 'name' => 'Junior 3', 'level_group_id' => 1, 'factor' => 1.44, 'description' => ''],

            ['id' => 4, 'name' => 'Mid 1', 'level_group_id' => 2, 'factor' => 1.8, 'description' => ''],
            ['id' => 5, 'name' => 'Mid 2', 'level_group_id' => 2, 'factor' => 2.15, 'description' => ''],
            ['id' => 6, 'name' => 'Mid 3', 'level_group_id' => 2, 'factor' => 2.6, 'description' => ''],

            ['id' => 7, 'name' => 'Mid 1', 'level_group_id' => 3, 'factor' => 3.3, 'description' => ''],
            ['id' => 8, 'name' => 'Mid 2', 'level_group_id' => 3, 'factor' => 3.76, 'description' => ''],
            ['id' => 9, 'name' => 'Mid 3', 'level_group_id' => 3, 'factor' => 4.29, 'description' => ''],
        ]);

        \Illuminate\Support\Facades\DB::table('responsibilities')->insert([
            ['id' => 1, 'name' => 'On call', 'factor' => 1.15, 'description' => 'He should be access-able in all times of most of the times'],
            ['id' => 2, 'name' => 'Leader', 'factor' => 1.20, 'description' => 'Lead around 3-5 person'],
            ['id' => 3, 'name' => 'Head', 'factor' => 1.3, 'description' => 'Head of sum function that could manage around 7 person'],
        ]);

        \Illuminate\Support\Facades\DB::table('teams')->insert([
            ['id' => 1, 'name' => 'Infrastructure', 'base_salary' => 5600,],
            ['id' => 2, 'name' => 'Backend', 'base_salary' => 5600,],
            ['id' => 3, 'name' => 'Frontend', 'base_salary' => 5600,],
            ['id' => 4, 'name' => 'Bot', 'base_salary' => 5600,],
        ]);

        \Illuminate\Support\Facades\DB::table('loyality_levels')->insert([
            ['id' => 1, 'name' => '0 year', 'factor' => 1.0],
            ['id' => 2, 'name' => '1 year', 'factor' => 1.1],
            ['id' => 3, 'name' => '2-3 year', 'factor' => 1.15],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
