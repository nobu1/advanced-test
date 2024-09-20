<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>

    <header class="header">
        <div class="header__left">
            <h2 class="header__h2">
                Rese
            </h2>
        </div>
        <div class="header__right">
            <select class="form__select-area" name="area">
                <option value="">All area</option>
                <option value="">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select class="form__select-genre" name="genre">
                <option value="">All genre</option>
                <option value="delivery">商品のお届けについて</option>
                <option value="replace">商品の交換について</option>
                <option value="trouble">商品トラブル</option>
                <option value="contact">ショップへのお問い合わせ</option>
                <option value="others">その他</option>
            </select>
            <input class="form__input-keyword" type="text" name="keyword" placeholder="Search ..."
                value="{{ old('keyword') }}" />
        </div>
    </header>

    <main>
        <div class="restaurant__content">
            @foreach ($restaurants as $restaurant)
                <div class="restaurant__group">
                    <div class="restaurant__group-show">
                        <div class="restaurant--url">
                            <img src="{{ asset('img/' . $restaurant->img_url) }}">
                        </div>
                        <div class="restaurant--shop">
                            <p>{{ $restaurant->shop ?: '' }}</p>
                        </div>
                        <div class="restaurant--area-genre">
                            <p>#{{ $restaurant->area ?: '' }}#{{ $restaurant->genre ?: '' }}</p>
                        </div>
                        <a href="{{ route('index.detail', $restaurant) }}"><button>詳しく見る</button></a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </main>
</body>

</html>
