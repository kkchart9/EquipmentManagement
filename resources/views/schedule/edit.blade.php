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
            <li class="nav-item item"><a href="" class="nav-link">スケジュール</a></li>
            <li class="nav-item item"><a href="" class="nav-link">カレンダー</a></li>
        </ul>

        

        <div class="logout w-100">
            <button onclick="location.href='./index.html'" class="rounded-3">ログアウト</button>
        </div>
    </div>

    <div class="schedule-main">
        <h3>スケジュール登録画面</h3>
    
        <div class="main-section">
            <h4>日時</h4>
            <div class="date">
                <div class="year">0000年</div>
                <div class="manth">00月</div>
                <div class="day">00日</div>
            </div>
            <div class="time">
                <div class="statr">開始時刻</div>
                <div class="end">終了時刻</div>
            </div>

            <h4>予定・仕事内容</h4>
            <input type="text" class="schedule_name">

            <h4>場所</h4>
            <input type="text" class="location">

            <div class="belongings-title">
                <h4>持ち物選択</h4>
                <input type="text" class="equipment_search" placeholder="機材を検索">
                <div class="sort">並び替え</div>
            </div>

            <div class="belongings-content">
                <div class="checkbox"><img src="" alt=""></div>
                <div class="equipment_name">EOS R1（機材名）</div>
                <div class="edit">編集</div>
                <div class="equipment_genre">カメラ</div>
                <div class="manufacturer">Canon</div>
            </div>

            <div class="button">
                <button type="submit">この内容を保存する</button>
                <button type="submit">このスケジュールを削除</button>
            </div>
            
        
            

            
        </div>
    </div>
</div>


@endsection