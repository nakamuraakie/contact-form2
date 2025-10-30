<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate - Admin</title>
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <div class="app">
    <header class="header">
      <h1 class="header__heading">FashionablyLate</h1>
      <!-- ログアウトボタン -->
      <form action="/logout" method="post">
        @csrf
        <input class="header__link" type="submit" value="logout">
      </form>
    </header>

    <div class="content">
      <div class="admin">
        <h2 class="admin__heading content__heading">Admin</h2>
        <div class="admin__inner">

          <!-- 検索フォーム -->
          <form class="search-form" action="/search" method="get">
            @csrf
            <input class="search-form__keyword-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <div class="search-form__gender">
              <select class="search-form__gender-select" name="gender">
                <option disabled selected>性別</option>
                <option value="1" @if(request('gender')==1) selected @endif>男性</option>
                <option value="2" @if(request('gender')==2) selected @endif>女性</option>
                <option value="3" @if(request('gender')==3) selected @endif>その他</option>
              </select>
            </div>
            <div class="search-form__category">
              <select class="search-form__category-select" name="category_id">
                <option disabled selected>お問い合わせの種類</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" @if(request('category_id')==$category->id) selected @endif>
                    {{ $category->content }}
                  </option>
                @endforeach
              </select>
            </div>
            <input class="search-form__date" type="date" name="date" value="{{ request('date') }}">
            <div class="search-form__actions">
              <input class="search-form__search-btn btn" type="submit" value="検索">
              <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
            </div>
          </form>

          <!-- エクスポートボタン -->
          <div class="export-form">
            <form action="{{ '/export?' . http_build_query(request()->query()) }}" method="post">
              @csrf
              <input class="export__btn btn" type="submit" value="エクスポート">
            </form>
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
          </div>

          <!-- お問い合わせ一覧テーブル -->
          <table class="admin__table">
            <tr class="admin__row">
              <th class="admin__label">お名前</th>
              <th class="admin__label">性別</th>
              <th class="admin__label">メールアドレス</th>
              <th class="admin__label">お問い合わせの種類</th>
              <th class="admin__label"></th>
            </tr>
            @foreach($contacts as $contact)
              <tr class="admin__row">
                <td class="admin__data">{{ $contact->first_name }}{{ $contact->last_name }}</td>
                <td class="admin__data">
                  @if($contact->gender == 1) 男性
                  @elseif($contact->gender == 2) 女性
                  @else その他
                  @endif
                </td>
                <td class="admin__data">{{ $contact->email }}</td>
                <td class="admin__data">{{ $contact->category->content }}</td>
                <td class="admin__data">
                  <a class="admin__detail-btn" href="#{{ $contact->id }}">詳細</a>
                </td>
              </tr>

              <!-- モーダル -->
              <div class="modal" id="{{ $contact->id }}">
                <a href="#!" class="modal-overlay"></a>
                <div class="modal__inner">
                  <div class="modal__content">
                    <form class="modal__detail-form" action="/delete" method="post">
                      @csrf
                      <div class="modal-form__group">
                        <label class="modal-form__label">お名前</label>
                        <p>{{ $contact->first_name }}{{ $contact->last_name }}</p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">性別</label>
                        <p>
                          @if($contact->gender == 1) 男性
                          @elseif($contact->gender == 2) 女性
                          @else その他
                          @endif
                        </p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">メールアドレス</label>
                        <p>{{ $contact->email }}</p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">電話番号</label>
                        <p>{{ $contact->tell }}</p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">住所</label>
                        <p>{{ $contact->address }}</p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">お問い合わせの種類</label>
                        <p>{{ $contact->category->content }}</p>
                      </div>
                      <div class="modal-form__group">
                        <label class="modal-form__label">お問い合わせ内容</label>
                        <p>{{ $contact->detail }}</p>
                      </div>
                      <input type="hidden" name="id" value="{{ $contact->id }}">
                      <input class="modal-form__delete-btn btn" type="submit" value="削除">
                    </form>
                  </div>
                  <a href="#" class="modal__close-btn">×</a>
                </div>
              </div>
            @endforeach
          </table>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
