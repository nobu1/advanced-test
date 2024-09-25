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


            <form class="form" action="" method="POST">
                @csrf
                <div class="form__group">
                    @if(Auth::user()->role == 'admin')
                    <div class="form__restaurant-management">
                        <a href="{{ route('restaurant.index') }}">飲食店管理</a>
                    </div>
                    @endif
                    <div class="form__reservation-management">
                        <h2>予約状況</h2>
                    </div>

                    <div class="form__favorite-management">
                        <h2>お気に入り店舗</h2>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
