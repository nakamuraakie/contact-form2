<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="/login" class="login-link">login</a>
    </header>

    <main>
        <h2 class="page-title">Register</h2>

        <div class="form-container">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
                <p class="contact-form__error-message">
                @error('name')
                    {{ $message }}
                @enderror
                </p>

                <label for="email">メールアドレス</label>
                <input type="text" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
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


                <button type="submit">登録</button>
            </form>
        </div>
    </main>
</body>
</html>
