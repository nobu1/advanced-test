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
            <h2>{{ Auth::user()->name }}さん</h2>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="form__group">
                @if (Auth::user()->role == 'admin')
                    <div class="form__restaurant-management">
                        <a href="{{ route('restaurant.index') }}">飲食店管理</a>
                    </div>
                @endif
                <div class="form__reservation-management">
                    <h2>予約状況</h2>
                    @foreach ($reservations as $reservation)
                        <div class="reservation__group">
                            <div class="reservation--name">
                                <label>Shop</label>
                                <p>{{ $reservation->restaurant->shop ?: '' }}</p>
                            </div>
                            <div class="reservation--date">
                                <label>Date</label>
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
                            <a href="{{ route('reservation.show', $reservation->id) }}"><button>予約変更</button></a>
                        </div>

                        <div class="restaurant__group">
                            <div class="restaurant__group-show">
                                <div class="restaurant--shop">
                                    <label>店舗名</label>
                                    <p>{{ $reservation->restaurant->shop ?: '' }}</p>
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

                <div class="form__favorite-management">
                    <h2>お気に入り店舗</h2>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
