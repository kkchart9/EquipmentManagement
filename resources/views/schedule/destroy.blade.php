@extends('layouts.app')

@section('title')
<title>スケジュール削除確認画面</title>
@endsection

@section('content')

<div class="destroy-section">
    <form action="{{ url('/schedule/destroy') }}" method="POST">
        @csrf
        <h2>スケジュール</h2>
        <h4>予定日</h4>
        <div class="data">{{ $data->schedule_date }}</div>
        <h4>予定・仕事内容</h4>
        <div class="data">{{ $data->schedule_name }}</div>
                

        <h4>場所</h4>
        <div class="data">{{ $data->location }}</div>

        <input type="hidden" name="id" value="{{ $data->id }}">

        <div class='button'>
            <button type="submit">削除</button>
        </div>
    </form>
</div>
@endsection