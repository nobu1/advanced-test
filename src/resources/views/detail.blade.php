<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
    <script src="{{ asset('js/restaurant-detail.js') }}" defer></script>
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
            @if (session('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
            <div class="restaurant__group">
                <div class="restaurant__group-show">
                    <div class="restaurant--shop">
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
        <div>
            <div class="header__right">
                <h2 class="header__h2">
                    予約
                </h2>
            </div>
            <form class="form" id="form_reservation" action="{{ route('index.reserve', $restaurant) }}" method="POST">
                @csrf
                <input id="form__restaurant" type="text" name="restaurant_id" value="{{ $restaurant->id }}" readonly hidden />
                <input id="form__input-date" type="date" name="date" value="" />
                <div class="form__error">
                    @error('date')
                        {{ $message }}
                    @enderror
                </div>
                <input id="form__input-time" type="time" name="time" value="" />
                <div class="form__error">
                    @error('time')
                        {{ $message }}
                    @enderror
                </div>
                <input id="form__input-people" type="number" name="number" value="" min="1" />
                <div class="form__error">
                    @error('number')
                        {{ $message }}
                    @enderror
                </div>
                <input id="form__user-id" type="text" name="user_id" value="{{ auth()->id() }}" readonly hidden />
                <div>
                    <label>Shop</label>
                    <div>{{ $restaurant->shop }}</div>
                    <label>Date</label>
                    <div id="reservation-date"></div>
                    <label>Time</label>
                    <div id="reservation-time"></div>
                    <label>Number</label>
                    <div id="reservation-number"></div>
                </div>
                <button class="form__button-reserve" type="submit" name="reserve">予約する</button>
            </form>
        </div>
    </main>
</body>

</html>
