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
                店舗予約変更
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
            <form class="form" id="form_reservation" action="{{ route('reservation.change', $reservation) }}" method="POST">
                @csrf
                @method('patch')
                <div class="reservation__group">
                    <div class="reservation--name">
                        <label>Shop</label>
                        <input class="form__input-shop" type="text" name="shop"
                            value="{{ old('shop', $reservation->restaurant->shop) }}" />
                    </div>
                    <div class="reservation--date">
                        <label>Date</label>
                        <input id="form__input-date" type="date" name="date"
                            value="{{ old('date', $reservation->date) }}" />
                    </div>
                    <div class="reservation--time">
                        <label>Time</label>
                        <input id="form__input-time" type="time" name="time"
                            value="{{ old('time', $reservation->time) }}" />
                    </div>
                    <div class="reservation--number">
                        <label>Number</label>
                        <input id="form__input-people" type="number" name="number"
                            value="{{ old('number', $reservation->number) }}" min="1" />
                    </div>
                    <button class="form__button-reserve" type="submit" name="reserveChange">変更</button>
                    <input name="reservationID" value="{{ $reservation->id }}" hidden readonly />
                    <button class="form__button-reserve" type="submit" name="reserveRevoke">取消</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
