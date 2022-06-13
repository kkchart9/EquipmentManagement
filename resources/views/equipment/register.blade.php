@extends('layouts.app')

@section('title')
<title>機材新規登録</title>
@endsection

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
        <button onclick="location.href='#'" class="rounded-3">ログアウト</button>
      </div>
    </div>

    <div class="mein-content col-sm">
      <form class="#" action="/equipment/register/confirm" method="GET">

        <h3 class="mb-5 text-center">機材新規登録</h3>

        <div class="form-group mb-4">
          <label for="equipment_name" class="form-label">機材の名称</label>
          <input type="text" class="form-control" id="equipment_name" name="equipment_name" placeholder="登録したい機材の名称を入力してください">
        </div>

        <div class="form-group mb-4">
          <label class="form-label" for="equipment_vale">高価度</label>
          <p>1から5段階で高価度を選択してください</p>
          <select class="form-select" id="equipment_vale" name="equipment_vale">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <div class="form-group mb-4">
          <label class="form-label" for="equipment_genre">ジャンル</label>
          <input class="form-control" type="text" name="equipment_genre" id="equipment_genre"
            placeholder="登録したい物のジャンルを入力してください">
        </div>

        <div class="form-group mb-4">
          <label class="form-label" for="manufacturer">メーカー名</label>
          <input class="form-control" type="text" name="manufacturer" id="manufacturer"
            placeholder="登録したい物のメーカー名を入力してください">
        </div>

        <div class="form-group mb-4">
          <label class="form-label" for="color_coding">色分け</label>
          <p>色分けを行いたい場合は色を選択してください</p>
          <input type="color" class="form-control form-control-lg form-control-color col-3" name="color_coding" id="color_coding"
            list=datalist value="#ffffff">
        </div>

        <div class="d-grid col-5 mx-auto">
          <button type="submit" class="rounded-3">確認画面に進む</button>
        </div>
      </form>
    </div>
  </div>

@endsection


