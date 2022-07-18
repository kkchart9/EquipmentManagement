@extends('layouts.app')

@section('title')
<title>ホーム画面</title>
@endsection

@section('content')

<div class="container-fluid d-flex flex-row w-100 h-100">

    <div class="side bg-white col-2 border border-dark border-1 position-relatevi h-100">
        <div class="logo border-bottom border-dark border-1 text-center pt-2 pb-4">テックアイエスシステム</div>

        <ul class="nav flex-column schedule-side">
            <li class="nav-item"><a href="" class="nav-link"><div class="my-icon"><img src="" alt=""></div></a></li>
            <li class="nav-item item"><a href="" class="nav-link">プロフィール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">機材一覧</a></li>
            <li class="nav-item item"><a href="/schedule" class="nav-link">スケジュール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">カレンダー</a></li>
        </ul>

        <div class="logout w-100">
            <button onclick="location.href='#'" class="rounded-3">ログアウト</button>
        </div>
    </div>

    <div class="mein-content col-sm">
        <h3 class="text-center">ホーム画面</h3>
        
        <!-- カレンダー表示用 -->
        {!! $calendar->render() !!}

        <p>予定</p>
        <div class="home-schedule-list">
            @foreach ($data as $index => $item)
            <?php $datediff = floor( strtotime( $item->schedule_date ) - strtotime(date("Y-m-d") )) / 86400 ;?>
                @if ($index == 0)
                <div class="schedule-element d-flex">
                    <div class="schedule text-center">{{ $item->schedule_date }},{{ $item->starting_time }}~{{ $item->end_time }},{{ $item->schedule_name }}</div>
                    <div class="period text-center period-first">当日まであと{{ $datediff }}日</div>
                    <div class="schedule-detail text-center"><a href="schedule/edit?id={{ $item->id }}">予定の詳細</a></div>
                </div>
                @elseif ($index == 1)
                <div class="schedule-element d-flex">
                    <div class="schedule text-center">{{ $item->schedule_date }},{{ $item->starting_time }}~{{ $item->end_time }},{{ $item->schedule_name }}</div>
                    <div class="period text-center period-second">当日まであと{{ $datediff }}日</div>
                    <div class="schedule-detail text-center"><a href="schedule/edit?id={{ $item->id }}">予定の詳細</a></div>
                </div>
                @elseif ($index == 2)
                <div class="schedule-element d-flex">
                    <div class="schedule text-center">{{ $item->schedule_date }},{{ $item->starting_time }}~{{ $item->end_time }},{{ $item->schedule_name }}</div>
                    <div class="period text-center period-third">当日まであと{{ $datediff }}日</div>
                    <div class="schedule-detail text-center"><a href="schedule/edit?id={{ $item->id }}">予定の詳細</a></div>
                </div>
                @endif
            @endforeach
        </div>        
    </div>
</div>

@endsection