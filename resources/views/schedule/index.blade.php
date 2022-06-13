@extends('layouts.app')

@section('title')
<title>スケジュール</title>
@endsection

@section('content')
<div class="container-fluid d-flex flex-row w-100 h-100">
    <div class="side col-2 border border-dark border-1 position-relatevi h-100 side-schedule">
        <div class="logo border-bottom border-dark border-1 text-center pt-2 pb-4">テックアイエスシステム</div>

        <ul class="nav flex-column schedule-side">
            <li class="nav-item"><a href="" class="nav-link"><div class="my-icon"><img src="" alt=""></div></a></li>
            <li class="nav-item item"><a href="" class="nav-link">プロフィール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">機材一覧</a></li>
            <li class="nav-item item"><a href="" class="nav-link">スケジュール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">カレンダー</a></li>
        </ul>

        

        <div class="logout w-100">
            <button onclick="location.href='./index.html'" class="rounded-3">ログアウト</button>
        </div>
    </div>

    <div class="schedule-main">
        <h3>スケジュール一覧</h3>
        <div class="main-section">
            @foreach ($data as $index => $item)
            <?php $datediff = floor( strtotime( $item->schedule_date ) - strtotime(date("Y-m-d") )) / 86400 ;?>
                @if ($index == 0)
                    <h4>次の予定</h4>
                    <div class="schedule-element">
                        <div class="schedule">{{ $item->schedule_date }}(月){{ $item->starting_time }}~{{ $item->end_time }},{{ $item->schedule_name }}</div>
                        <div class="period">当日まであと{{ $datediff }}日</div>
                        <a href="schedule/edit?id={{ $item->id }}"><div class="schedule-detail">予定の詳細</div></a>
                    </div>
                @else
                    <h4>{{ $index + 1 }}件目の予定</h4>
                    <div class="schedule-element">
                        <div class="schedule">{{ $item->schedule_date }}(月){{ $item->starting_time }}~{{ $item->end_time }},{{ $item->schedule_name }}</div>
                        <div class="period">当日まであと{{ $datediff }}日</div>
                        <a href="schedule/edit?id={{ $item->id }}"><div class="schedule-detail">予定の詳細</div></a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection