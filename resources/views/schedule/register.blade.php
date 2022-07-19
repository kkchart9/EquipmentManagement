@extends('layouts.app')

@section('title')
<title>スケジュール登録画面</title>
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
        <h3>スケジュール登録画面</h3>
    
        <form class="main-section" action="{{ route('schedule.register') }}" method="POST">
            @csrf
            <h4>日時</h4>
            <div class="date">
                <select name="year">
                    <?php for($i=0; $i<5; $i++):?>
                        <option value="<?php echo date('Y') + $i; ?>"><?php echo date('Y') + $i; ?>年</option>
                    <?php endfor; ?>
                </select>
                <select name="month">
                    <?php for($i=1; $i<=12; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?>月</option>
                    <?php endfor; ?>
                </select>
                <select name="day">
                    <?php for($i=1; $i<=31; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>日</option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="time">
                <label for="start">開始時刻</label>
                <select name="start_hour" id="start">
                    <?php for($i=0; $i<=23; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>時</option>
                    <?php endfor; ?>
                </select>
                <select name="start_minute" id="start" class="minute">
                    <?php for($i=0; $i<=59; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>分</option>
                    <?php endfor; ?>
                </select>

                <label for="end">終了時刻</label>
                <select name="end_hour" id="end">
                    <?php for($i=0; $i<=23; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>時</option>
                    <?php endfor; ?>
                </select>
                <select name="end_minute" id="end" class="minute">
                    <?php for($i=0; $i<=59; $i++):?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', sprintf('%02d', $i)); ?>分</option>
                    <?php endfor; ?>
                </select>
            </div>

            <h4>予定・仕事内容</h4>
            <input type="text" class="schedule_name" name="schedule_name">
            

            <h4>場所</h4>
            <input type="text" class="location" name="location">

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
                <div class="checkbox" id="checkbox" onclick="checkboxChange('{{ $item->id }}','{{ $item->check_value }}')">
                    @if($item->check_value) 
                        <img src="{{ asset('img/checkbox-icon.png') }}" alt="" class="checkbox_icon">
                    @endif
                </div>
                <div class="equipment-name">{{ $item->equipment_name }}</div>
                <div class="edit">編集</div>
                <div class="equipment_genre">{{ $item->equipment_genre }}</div>
                <div class="manufacturer">{{ $item->manufacturer }}</div>
            </div>
            @endforeach
            

            <button type="submit" class="register" name="register_button">登録</button>

        </form>
        <form action="/schedule/register" name="sortEquipmentsForm" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="search_equipments" value="" id="search_equipments">
            <input type="hidden" name="equipment_sort" value="" id="equipment_sort">
        </form>

        <form action="/schedule/checkbox" name="equipmentCheckForm" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="form_check_id" value="" id="form_check_id">
            <input type="hidden" name="form_check_value" value="" id="form_check_value">
        </form>
    </div>
</div>

<script src="{{ asset('/js/schedule.js') }}"></script>

@endsection