<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ ('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ ('css/register.css') }}">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="/login" class="login-link">login</a>
    </header>

    <main>
        <h2 class="page-title">Register</h2>

        <div class="form-container">
            <form action="auth/register" method="post">
                @csrf
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
                @error('name')
                {{ $message }}
                @enderror

                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                {{ $message }}
                @enderror

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                {{ $message }}
                @enderror

                <button type="submit">登録</button>
            </form>
        </div>
    </main>
</body>
</html>
