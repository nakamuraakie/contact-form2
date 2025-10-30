<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="/register" class="login-link">register</a>
    </header>

    <main>
        <h2 class="page-title">Login</h2>

        <div class="form-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                <p class="contact-form__error-message">
                @error('email')
                    {{ $message }}
                @enderror
                </p>

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                <p class="contact-form__error-message">
                @error('password')
                    {{ $message }}
                @enderror
                </p>

                <button type="submit">ログイン</button>
            </form>
        </div>
    </main>
</body>
</html>
