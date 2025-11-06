<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  <link rel="stylesheet" href="{{ asset('css/thanks.css')}}">
</head>

<body>
  <div class="app">
    <div class="content">
      <div class="thanks-page">
        <div class="thanks-page__inner">
          <p class="thanks-page__message">お問い合わせありがとうございました</p>
          <form class="thanks-page__form" action="/contact" method="get">
            <button class="thanks-page__btn btn">HOME</button>
          </form>
        </div>
      </div>
      <div class="thanks-page-bg__inner">
        <span class="thanks-page-bg__text">Thank you</span>
      </div>
    </div>
  </div>
</body>
</html>
