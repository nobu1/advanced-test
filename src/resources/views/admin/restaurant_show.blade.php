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
                飲食店情報
            </h2>
        </div>
    </header>

    <main>
        <div class="restaurant__content">
            <div class="restaurant__group">
                <div class="restaurant__group-show">
                    <div class="restaurant--shop">
                        <label>店舗名</label>
                        <p>{{ $restaurant->shop }}</p>
                    </div>
                    <div class="restaurant--area">
                        <label>地域</label>
                        @if ($restaurant->area == 'osaka')
                            <p>大阪府</p>
                        @elseif ($restaurant->area == 'tokyo')
                            <p>東京都</p>
                        @elseif ($restaurant->area == 'fukuoka')
                            <p>福岡県</p>
                        @else
                            <p> </p>
                        @endif
                    </div>
                    <div class="restaurant--genre">
                        <label>ジャンル</label>
                        @if ($restaurant->genre == 'italian')
                            <p>イタリアン</p>
                        @elseif ($restaurant->genre == 'ramen')
                            <p>ラーメン</p>
                        @elseif ($restaurant->genre == 'izakaya')
                            <p>居酒屋</p>
                        @elseif ($restaurant->genre == 'sushi')
                            <p>寿司</p>
                        @elseif ($restaurant->genre == 'yakiniku')
                            <p>焼肉</p>
                        @else
                            <p> </p>
                        @endif
                    </div>
                    <div class="restaurant--summary">
                        <label>店舗概要</label>
                        <p>{{ $restaurant->summary }}</p>
                    </div>
                    <div class="restaurant--url">
                        <label>店舗画像URL</label>
                        <img src="{{ asset('img/' . $restaurant->img_url) }}">
                    </div>
                    <a href="{{ route('restaurant.edit', $restaurant) }}"><button class="form__button-create"
                            type="submit" name="edit">編集</button></a>
                </div>
                <form action="{{ route('restaurant.destroy', $restaurant) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="form__button-create" type="submit" name="delete">削除</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
