<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(EmployeeService $employeeService, Request $request)
    {
        $mainFactor = 5600;
        $levelGroups = [
            1 => [
                'name' => 'تازه وارد',
                'powers' => [
                    'بدون سابقه‌ی کاری',
                    'دانش تئوری برنامه نویسی',
                    'دانش عملی کم یا صفر',
                ],
                'factor' => 1,
                'level-factor' => 1.2
            ],
            2 => [
                'name' => 'شناس',
                'powers' => [
                    '۱ الی ۳ سال تجربه‌ی کار',
                    'نگاه بسته به مسائل فنی',
                    'نیازمند به توضیحات ریز فنی',
                    'توجه کامل برروی کد',
                    'نادیده گرفتن تصویرکلی محصول',
                    'انجام تسک‌ها با پیچیدگی کمتر و بدون تاثیر زیاد بر محصول',
                    'با انگیره و با انرژی',
                ],
                'factor' => 2,
                'level-factor' => 1.2
            ],
            3 => [
                'name' => 'سازنده',
                'powers' => [
                    'بیش از ۳ سال تجربه‌ی کار',
                    'نیاز کم یا حتی صفر به راهنمایی',
                    'تا حدکمی منبع مشاوره',
                    'اکثرا کدهای اصلی رو می‌نویسن',
                    'تمرکزشون رو تیکه‌ای از پازل محصول هستش',
                    'فعالانه با تیم در تعامل هستن',
                    'پیش‌قدم در مسائل',
                ],
                'factor' => 3.6,
                'level-factor' => 1.2
            ],
            4 => [
                'name' => 'خفن',
                'powers' => [
                    'بیش از ۷ سال تجربه‌ی کار',
                    'حلال مسائل',
                    'قابلیت تصحیح خودش رو داره',
                    'دانش به شهود تبدیل شده',
                    'دایره‌ی وسیعی از تجربیات',
                    'مربی جوون تر‌ها :)',
                    'هماهنگ کننده گردش‌های کاری تیم',
                    'ارزش‌های بیزینس رو کامل درک می‌کنه',
                    'دید بلندمدت نسبت به محصولات داره',
                    'خیلی قوی در soft skills',

                ],
                'factor' => 6.6,
                'level-factor' => 1.14
            ],
        ];


        $levels = [
            1 => [
                'name' => 'تازه وارد',
                'group' => 1,
                'group-level' => 1
            ],
            2 => [
                'name' => 'نو شناس',
                'group' => 2,
                'group-level' => 1
            ],
            3 => [
                'name' => 'شناس',
                'group' => 2,
                'group-level' => 2
            ],
            4 => [
                'name' => 'خیلی شناس',
                'group' => 2,
                'group-level' => 3
            ],
            5 => [
                'name' => 'نو سازنده',
                'group' => 3,
                'group-level' => 1
            ],
            6 => [
                'name' => 'سازنده',
                'group' => 3,
                'group-level' => 2
            ],
            7 => [
                'name' => 'خیلی سازنده',
                'group' => 3,
                'group-level' => 3
            ],
            8 => [
                'name' => 'نو خفن',
                'group' => 4,
                'group-level' => 1
            ],
            9 => [
                'name' => 'خفن',
                'group' => 4,
                'group-level' => 2
            ],
            10 => [
                'name' => 'خیلی خفن',
                'group' => 4,
                'group-level' => 3
            ]
        ];

        foreach ($levels as $levelKey => $level) {
            $levelGroup = $levelGroups[$level['group']];
            $factor = $levelGroup['factor'];
            $levelFactor = $levelGroup['level-factor'];

            $levels[$levelKey]['factor'] = $factor * (pow($levelFactor, $level['group-level'] - 1));
        }

        $loyalties = [
            0 => 1,
            1 => 1.10,
            2 => 1.15,
            3 => 1.15,
            4 => 1.20,
            5 => 1.20,
            6 => 1.20,
            7 => 1.20,
            8 => 1.20,
            9 => 1.20,
            10 => 1.20,
        ];

        $responsibilities = [
            'leader' => [
                'name' => 'لیدر',
                'factor' => 1.15
            ],
            'on-call' => [
                'name' => 'آن‌کال',
                'factor' => 1.2
            ]

        ];



        $teams = $employeeService->getAllTeams();
        $employees = $employeeService->getAllEmployees($request->input('team_id'));

        return view('newIndex', compact('teams', 'employees', 'levels', 'loyalties', 'levelGroups', 'responsibilities'));
    }
}
