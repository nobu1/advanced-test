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
    </header>

    <main>
        <div class="restaurant__content">
            <div class="restaurant__group">
                <div class="restaurant__group-show">
                    <div class="restaurant--shop">
                        <label>
                            << /label>
                                <p>{{ $restaurant->shop }}</p>
                    </div>
                    <div class="restaurant--url">
                        <img src="{{ asset('img/' . $restaurant->img_url) }}">
                    </div>
                    <div class="restaurant--area-genre">
                        @if ($restaurant->area == 'osaka')
                            #大阪府
                        @elseif ($restaurant->area == 'tokyo')
                            #東京都
                        @elseif ($restaurant->area == 'fukuoka')
                            #福岡県
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
                        @endif
                    </div>
                    <div class="restaurant--summary">
                        <p>{{ $restaurant->summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
