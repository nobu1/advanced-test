<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>

    <header class="header">
        <div class="header__left">
            <h2 class="header__h2">
                Rese
            </h2>
        </div>
        <form class="form" action="{{ route('index.search') }}" method="POST">
            @csrf
            <div class="header__right">
                <select class="form__select-area" name="area">
                    <option value="">All area</option>
                    <option value="osaka">大阪府</option>
                    <option value="tokyo">東京都</option>
                    <option value="fukuoka">福岡県</option>
                </select>
                <select class="form__select-genre" name="genre">
                    <option value="">All genre</option>
                    <option value="italian">イタリアン</option>
                    <option value="ramen">ラーメン</option>
                    <option value="izakaya">居酒屋</option>
                    <option value="sushi">寿司</option>
                    <option value="yakiniku">焼肉</option>
                </select>
                <input class="form__input-keyword" type="text" name="keyword" placeholder="Search ..."
                    value="{{ old('keyword') }}" />
                <button class="form__button-search" type="submit" name="search">検索</button>
        </form>

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
                            @if ($restaurant->area == 'osaka')
                                #大阪府
                            @elseif ($restaurant->area == 'tokyo')
                                #東京都
                            @elseif ($restaurant->area == 'fukuoka')
                                #福岡県
                            @else
                                #
                            @endif
                            @if ($restaurant->genre == 'italian')
                                #イタリアン
                            @elseif ($restaurant->genre == 'ramen')
                                #ラーメン
                            @elseif ($restaurant->genre == 'izakaya')
                                #居酒屋
                            @elseif ($restaurant->genre == 'sushi')
                                #寿司
                            @elseif ($restaurant->genre == 'yakiniku')
                                #焼肉
                            @else
                                #
                            @endif
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
