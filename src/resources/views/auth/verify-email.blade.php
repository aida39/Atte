<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <h1 class="header__logo">
                    Atte
                </h1>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <h1 class="verify-email__title">ユーザー登録を完了してください</h1>
            <p class="verify-email__message">登録したメールアドレス宛てにメールを送信しました。<br>
                メールに記載されているリンクをクリックして、登録手続きを完了してください。</p>
            <div class="verify-email__link">
                <p class="verify-email__link-message">メールアドレスを誤って登録した方はこちらから</p>
                <form class="form" action="/logout" method="post">
                    @csrf
                    <button class="verify-email__link-button">戻る</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="footer">
        <small class="copyright">Atte, inc.</small>
    </footer>
</body>

</html>