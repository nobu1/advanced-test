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
                        <label><</label>
                        <p>{{ $restaurant->shop }}</p>
                    </div>
                    <div class="restaurant--url">
                        <img src="{{ asset('img/'.$restaurant->img_url) }}">
                    </div>
                    <div class="restaurant--area-genre">
                        <label>#{{ $restaurant->area }}#{{ $restaurant->genre }}</label>
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
