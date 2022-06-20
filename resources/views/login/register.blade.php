<!DOCTYPE html>
<!-- 文字コードの設定 -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- 文字コードの設定 -->
        <meta charset="utf-8">
        <!-- 表示領域 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{csrf_token()}}">

        <!-- タイトル（タブに表示される） -->
        <tittle></tittle>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- 独自のCSSを反映する -->
        <link rel="stylesheet" href="{{ asset('css/users.css')}}">

    </head>
    <body>
        <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h4>テックアイエスシステム</h4>
        <form action="/usersRegister" method="post"> 　
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="ユーザー名" maxlength="50" required autofocus>
                <input class="form-control" type="email" name="email" placeholder="メールアドレス" maxlength="254" required>
                <input class="form-control" type="password" name="password" placeholder="パスワード" minlength="4" maxlength="128" required>
                <input class="form-control" type="password" name="password" placeholder="パスワード確認" minlength="4" maxlength="128" required> 
                <input class="form-control" type="text" name="business" placeholder="ご職業" maxlength="50" required>
                <button type="submit" class="btn btn-secondary">登録</button>
            </div>
        </form>
        </div>
    </body>
</html>
