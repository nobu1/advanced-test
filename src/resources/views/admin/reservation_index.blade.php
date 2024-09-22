<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}" />
</head>

<body>

    <header class="header">
        <div class="header__left">
            <h2 class="header__h2">
                予約店舗一覧
            </h2>
        </div>
    </header>

    <main>
        <div class="favorite__content">
            @if (session('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
            @foreach ($reservations as $reservation)
                <div class="reservation__group">
                    <div class="reservation--name">
                        <label>Shop</label>
                        <p>{{ $reservation->restaurant->shop ?: '' }}</p>
                    </div>
                    <div class="reservation--date">
                        <label>予約日</label>
                        <p>{{ $reservation->date ?: '' }}</p>
                    </div>
                    <div class="reservation--time">
                        <label>Time</label>
                        <p>{{ $reservation->time ?: '' }}</p>
                    </div>
                    <div class="reservation--number">
                        <label>Number</label>
                        <p>{{ $reservation->number ?: '' }}人</p>
                    </div>
                </div>

                <div class="restaurant__group">
                    <div class="restaurant__group-show">
                        <div class="restaurant--shop">
                            <label>店舗名</label>
                            <a href="">
                                <p>{{ $reservation->restaurant->shop ?: '' }}</p>
                            </a>
                        </div>
                        <div class="restaurant--area">
                            <label>地域</label>
                            @if ($reservation->restaurant->area == 'osaka')
                                <p>大阪府</p>
                            @elseif ($reservation->restaurant->area == 'tokyo')
                                <p>東京都</p>
                            @elseif ($reservation->restaurant->area == 'fukuoka')
                                <p>福岡県</p>
                            @else
                                <p> </p>
                            @endif
                        </div>
                        <div class="restaurant--genre">
                            <label>ジャンル</label>
                            @if ($reservation->restaurant->genre == 'italian')
                                <p>イタリアン</p>
                            @elseif ($reservation->restaurant->genre == 'ramen')
                                <p>ラーメン</p>
                            @elseif ($reservation->restaurant->genre == 'izakaya')
                                <p>居酒屋</p>
                            @elseif ($reservation->restaurant->genre == 'sushi')
                                <p>寿司</p>
                            @elseif ($reservation->restaurant->genre == 'yakiniku')
                                <p>焼肉</p>
                            @else
                                <p> </p>
                            @endif
                        </div>
                        <div class="restaurant--summary">
                            <label>店舗概要</label>
                            <p>{{ $reservation->restaurant->summary ?: '' }}</p>
                        </div>
                        <div class="restaurant--url">
                            <img src="{{ asset('img/' . $reservation->restaurant->img_url ?: '') }}" />
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </main>
</body>

</html>
