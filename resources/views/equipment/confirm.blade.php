@extends('layouts.app')

@section('content')


<div class="container-fluid d-flex flex-row w-100 h-100">
    <div class="side col-2 border border-dark border-1 position-relatevi h-100">
        <div class="logo border-bottom border-dark border-1 text-center pt-2 pb-4">テックアイエスシステム</div>

        <nav class="side-menu1 border-bottom border-dark border-1">
            <ul class="list-unstyled m-0 ps-3">
                <li class="m-4 mt-0 pt-4"><a href="">機材A一覧</a></li>
                <li class="m-4"><a href="">機材B一覧</a></li>
                <li class="m-4"><a href="">機材C一覧</a></li>
                <li class="m-4"><a href="">持ち物</a></li>
            </ul>
        </nav>

        <div class="side-menu2 w-100">
            <div class="mb-auto">
                <ul class="list-unstyled">
                    <li class="align-items-start"><a href="" class="my-box my-box-fast">機材を新規登録</a></li>
                    <li class="align-items-center"><a href="" class="my-box">編集・削除</a></li>
                    <li class="align-items-end"><a href="" class="my-box">ホームに戻る</a></li>
                </ul>
            </div>
        </div>

        <div class="logout w-100">
            <button onclick="location.href='./index.html'" class="rounded-3">ログアウト</button>
        </div>
    </div>

    <div class="mein-content col-sm">
        <form class="" action="/equipment/register/confirm/store" method="post" name="form">
            @csrf
            <h3 class="mb-5 text-center">登録確認画面</h3>

            <div class="mb-4">
                <label class="form-label">機材の名称</label>
                <span>{{$equipment_name}}</span>
                <input name="equipment_name" value="{{$equipment_name}}" type="hidden">
            </div>

            <div class="mb-4">
                <label class="form-label">高価度</label>
                <span>{{$equipment_vale}}</span>
                <input name="equipment_name" value="{{$equipment_vale}}" type="hidden">
            </div>

            <div class="mb-4">
                <label class="form-label">ジャンル</label>
                <span>{{$equipment_genre}}</span>
                <input name="equipment_name" value="{{$equipment_genre}}" type="hidden">
            </div>

            <div class="mb-4">
                <label class="form-label">メーカー名</label>
                <span>{{$manufacturer}}</span>
                <input name="equipment_name" value="{{$manufacturer}}" type="hidden">
            </div>

            <div class="mb-4">
                <label class="form-label">色分け</label>
                <input name="color_coding" type="color" value={{$color_coding}}>
                <p></p>
            </div>

            <div class="d-grid col-5 mx-auto">
            <!-- {{ csrf_field() }} -->
                <button name="regist" type="submit" class="rounded-3" data-bs-toggle="modal"
                    data-bs-target="confirmation-screen">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection