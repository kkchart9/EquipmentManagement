@extends('layouts.app')

@section('title')
<title>スケジュール編集画面</title>
@endsection

@section('content')


<div class="container-fluid d-flex flex-row w-100 h-100">
    <div class="side col-2 border border-dark border-1 position-relatevi h-100 side-schedule">
        <div class="logo border-bottom border-dark border-1 text-center pt-2 pb-4">テックアイエスシステム</div>

        <ul class="nav flex-column schedule-side">
            <li class="nav-item"><a href="" class="nav-link"><div class="my-icon"><img src="" alt=""></div></a></li>
            <li class="nav-item item"><a href="" class="nav-link">プロフィール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">機材一覧</a></li>
            <li class="nav-item item"><a href="/schedule" class="nav-link">スケジュール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">カレンダー</a></li>
        </ul>

        

        <div class="logout w-100">
            <button onclick="location.href='./index.html'" class="rounded-3">ログアウト</button>
        </div>
    </div>

    <div class="schedule-main">
        <h3>スケジュール編集画面</h3>
    
        <form class="main-section" action="{{ url('/schedule/edit') }}" method="POST">
            @csrf
            <h4>日時</h4>
            <?php 
            $date = explode("-", $data->schedule_date);
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];            
            ?>
            <div class="date">
                <select name="year">
                    <option value="<?php echo $year;?>"><?php echo $year;?>年</option>
                    <?php for($i=0; $i<5; $i++):?>
                        @if( date('Y') + $i != $year)
                            <option value="<?php echo date('Y') + $i; ?>"><?php echo date('Y') + $i; ?>年</option>
                        @endif
                    <?php endfor; ?>
                </select>
                <select name="month">
                    <option value="<?php echo $month;?>"><?php echo $month;?>月</option>
                    <?php for($i=1; $i<=12; $i++):?>
                        @if (sprintf('%02d', $i) != $month)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?>月</option>
                        @endif
                    <?php endfor; ?>
                </select>
                <select name="day">
                    <option value="<?php echo $day;?>"><?php echo $day;?>日</option>
                    <?php for($i=1; $i<=31; $i++):?>
                        @if(sprintf('%02d', $i) != $day)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>日</option>
                        @endif
                    <?php endfor; ?>
                </select>
            </div>
            <div class="time">
                <label for="start">開始時刻</label>
                <select name="start_hour" id="start">
                    <?php 
                    $start_time = explode(":", $data->starting_time);
                    $start_time_hour = $start_time[0];
                    $start_time_minute = $start_time[1];
                    ?>
                        <option value="<?php echo $start_time_hour; ?>"><?php echo $start_time_hour; ?>時</option>
                    <?php for($i=0; $i<=23; $i++):?>
                        @if(sprintf('%02d', $i) != $start_time_hour)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>時</option>
                        @endif
                    <?php endfor; ?>
                </select>
                <select name="start_minute" id="start" class="minute">
                        <option value="<?php echo $start_time_minute; ?>"><?php echo $start_time_minute; ?>分</option>
                    <?php for($i=0; $i<=59; $i++):?>
                        @if(sprintf('%02d', $i) != $start_time_minute)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>分</option>
                        @endif
                    <?php endfor; ?>
                </select>

                <label for="end">終了時刻</label>
                <select name="end_hour" id="end" value='end_time'>
                    <?php 
                    $end_time = explode(":", $data->end_time);
                    $end_time_hour = $end_time[0];
                    $end_time_minute = $end_time[1];
                    ?>
                        <option value="<?php echo $end_time_hour; ?>"><?php echo $end_time_hour; ?>時</option>
                    <?php for($i=0; $i<=23; $i++):?>
                        @if(sprintf('%02d', $i) != $end_time_hour)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>時</option>
                        @endif
                    <?php endfor; ?>
                </select>
                <select name="end_minute" id="end" class="minute">
                    <option value="<?php echo $end_time_minute; ?>"><?php echo $end_time_minute; ?>分</option>
                    <?php for($i=0; $i<=59; $i++):?>
                        @if(sprintf('%02d', $i) != $end_time_minute)
                            <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>分</option>
                        @endif
                    <?php endfor; ?>
                </select>
            </div>

            <h4>予定・仕事内容</h4>
            <input type="text" class="schedule_name" name="schedule_name" value="{{ $data->schedule_name }}">
            

            <h4>場所</h4>
                <input type="text" class="location" name="location" value="{{ $data->location }}">

            <h4>スケジュールの色を選択肢してください</h4>
            <input type="color" class="form-control form-control-lg form-control-color col-3" name="schedule_color"
                list=datalist value="#ffffff">

            <div class="belongings-title">
                <h4>持ち物選択</h4>
                <input type="text" class="equipment_search" id="equipment_search" placeholder="機材を検索" value="">
                <p type="submit" class="search" name="search_button" id="search_button" onclick="searchSubmit();">検索</p>
                <select name="sort" id="equipmentsSort" class="sort">
                    <option value="">並び替え</option>
                    <option value="idLate">新しい順</option>
                    <option value="idOld">古い順</option>
                </select>
            </div>

            @foreach($equipment as $item)
            <div class="belongings-content" id="belongings-content">
                <div class="checkbox" id="checkbox" onclick="checkboxChangeEdit('{{ $item->id }}')">
                    @foreach($equipment_check as $check)
                        @if($item->id == $check->equipment_id)
                            @if($check->checkbox)
                                <img src="{{ asset('img/checkbox-icon.png') }}" alt="" class="checkbox_icon">
                            @endif
                        @endif                        
                    @endforeach
                </div>
                <div class="equipment-name">{{ $item->equipment_name }}</div>
                <div class="edit">編集</div>
                <div class="equipment_genre">{{ $item->equipment_genre }}</div>
                <div class="manufacturer">{{ $item->manufacturer }}</div>
                <input type="hidden" value="{{ $item->id }}">
            </div>
            @endforeach

            <input type="hidden" name="id" value="{{ $data->id }}">

            <div class="button">
                <button type="submit">この内容を保存する</button>
                <a href="destroy?id={{ $data->id }}"><div class="delete-button">このスケジュールを削除</div></a>
            </div>

        </form>
    </form>
    <form action="/schedule/edit?id={{ $data->id }}" name="sortEquipmentsForm" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="search_equipments" value="" id="search_equipments">
        <input type="hidden" name="equipment_sort" value="" id="equipment_sort">
    </form>

    <form action="/schedule/checkbox/edit" name="equipmentCheckForm" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="form_schedule_id" value="{{ $data->id }}" id="form_schedule_id">
        <input type="hidden" name="form_check_id" value="" id="form_check_id">
        <input type="hidden" name="form_check_value" value="" id="form_check_value">
    </form>

        </div>
    </div>
</div>
<script src="{{ asset('/js/schedule.js') }}"></script>


@endsection