@extends('layouts.app')

@section('content')
    <div class="container text-right">
        <div class="center-block">
            <br>
            <h2 class="text-center">حقوق شرکت</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">وفاداری</div>
                        <div class="panel-body">
                            <p>
                                با توجه به اینکه وفاداری به مجموعه بسیار ارزشمند هستش‌، به ازای هرسال از وفاداری در
                                مجموعه
                                ضریبی برای اون فرد در حقوقش در نظر گرفته میشه
                            </p>
                        </div>

                        <table class="table table-bordered">
                            <tr>

                                <th>
                                    مدت زمان
                                </th>
                                <th>
                                    ضریب
                                </th>
                            </tr>
                            @foreach($loyalties as $loyalty=>$factor)
                                <tr>
                                    <td>
                                        {{$loyalty}}
                                        سال
                                    </td>

                                    <td>
                                        {{$factor}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">مسئولیت‌ها</div>
                        <div class="panel-body">
                            <p>
                                اصولا مسئولیت‌هایی که در شرکت به هرکسی داده میشه در پاسخگویی‌های فرد هم تاثیر گذار خواهد
                                بود
                                پس ما مسئولیت‌های هر آدم رو هم در نظر میگیریم
                            </p>
                        </div>

                        <table class="table table-bordered">
                            <tr>

                                <th>
                                    مسئولیت
                                </th>
                                <th>
                                    ضریب
                                </th>
                            </tr>
                            @foreach($responsibilities as $responsibilityId=>$responsibility)
                                <tr>
                                    <td>
                                        {{$responsibility['name']}}
                                    </td>

                                    <td>
                                        {{$responsibility['factor']}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">دانش و تجربه</div>
                        <div class="panel-body">
                            <p>
                                مهم‌ترین فاکتور تاثیر گذار در حقوق هرکسی در هر مجموعه‌ای میزان تجربه و دانشی هستش که اون
                                آدم
                                داره. بچه‌های شرکت هم با دسته‌های زیر از نظر مهارت دسته‌بندی میشن:
                            </p>
                        </div>
                        <table class="table table-condensed text-center">
                            <tr class="text-center">
                                <th>
                                    گروه
                                </th>

                                <th>
                                    قدرت‌ها
                                </th>
                                <th>
                                    زیرگروه
                                </th>
                                <th>
                                    ضریب
                                </th>
                            </tr>
                            @foreach($levelGroups as $levelGroupId => $levelGroup)
                                @php
                                    $groupLevels=[];
                                    foreach($levels as $level)
                                        if($level['group']==$levelGroupId)
                                            $groupLevels[]=$level;
                                @endphp
                                <tr>

                                    <td rowspan="{{count($groupLevels)}}">
                                        {{$levelGroup['name']}}
                                    </td>
                                    <td rowspan="{{count($groupLevels)}}" class="text-right">
                                        <ul class="text-right">
                                            @foreach($levelGroup['powers'] as $power)
                                                <li>
                                                    {{$power}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    @foreach($groupLevels as $level)

                                        @if(!$loop->first)
                                </tr>
                                <tr>
                                    @endif
                                    <td>
                                        {{$level['name']}}
                                    </td>
                                    <td>
                                        {{$level['factor']}}
                                    </td>

                                    @endforeach

                                </tr>
                            @endforeach

                        </table>

                    </div>
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">باقی مسائل</div>
                        <div class="panel-body">
                            <p>
                                دربعضی از شغل‌ها و مسئولیت‌ها نیازه فرد ۲۴ ساعته در دسترس باشه (آن‌کال) و بتونه مشکلات
                                رو حل
                                کنه،‌ برای چنین جایگاه‌هایی ضریب ۱۰ درصد در نظر گرفته شده
                            </p>
                            <p>
                                درصورتی که شرکت برای رقابت یا رضایت‌‌‌مندی فردی بخواد حقوق کسی رو بالاتر از نتیجه‌ی
                                فرمول
                                ببره،‌این کار رو با تایید مدیران ارشد حداکثر تا ۱۵ درصد و به مدت محدود می‌تونه انجام بده
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">حقوق افراد در سازمان</div>
                        <div class="panel-body">
                            <p>
                                حقوق افراد با توجه به شرایط گفته شده به شرح زیر هستش
                            </p>
                            <form method="get">
                                <select class="form-control" name="team_id" onchange="this.form.submit()">
                                    <option value="">
                                        All
                                    </option>
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}"
                                                @if(request()->input('team_id')==$team->id)selected="selected"@endif>
                                            {{$team->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <table class="table table-hover">
                            <tr>
                                <th>
                                    تیم
                                </th>
                                <th>
                                    نام
                                </th>

                                <th>
                                    سطح
                                </th>
                                <th>
                                    وفاداری
                                </th>
                                <th>
                                    درآمد
                                </th>
                                <td>
                                    مسئولیت‌ها
                                </td>
                            </tr>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        {{$employee->team->name}}
                                    </td>
                                    <td>
                                        {{$employee->name}}
                                    </td>
                                    <td>
                                        {{$employee->level->name}}

                                    </td>
                                    <td>
                                        {{$employee->loyalityLevel->name}}
                                        <br>
                                        ({{\Carbon\Carbon::now()->diffInMonths($employee->hired_at)}} Months)
                                    </td>
                                    <td>
                                        {{\App\Helpers\PriceHelper::formatMoney($employee->salary)}}
                                        <br>
                                        Should be: {{\App\Helpers\PriceHelper::formatMoney($employee->expected_salary)}}
                                    </td>
                                    <td>
                                        @if($employee->temp_raise_percent> 0)
                                            <span class="pull-left label label-info">
                                                {{$employee->temp_raise_percent*100}}%
                                                افزایش موقت
                                            </span>
                                        @endif

                                        @if($employee->responsibility)
                                            <span class="pull-left label label-primary">
                                                {{$employee->responsibility->name}}
                                            </span>
                                        @endif


                                        @if($employee->salary / $employee->expected_salary < .90)
                                            <span class="label label-danger pull-left">
                                                  کمتر گرفتن از فرمول
                                                {{100-(int)($employee->salary*100 / $employee->expected_salary) }}%
                                            </span>
                                        @endif
                                        @if($employee->expected_salary / $employee->salary < .90)
                                            <span class="label label-success pull-left">
                                                بیشتر گرفتن از فرمول
                                                {{100-(int)($employee->expected_salary*100 / $employee->salary) }}%
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
