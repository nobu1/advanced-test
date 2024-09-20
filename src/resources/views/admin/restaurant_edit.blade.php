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
        <div class="contact-form__content">
            @if (session('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
            <form class="form" action="{{ route('restaurant.update', $restaurant) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form__group">
                    <div class="form__group-create">
                        <div class="form__input--shop">
                            <label>店舗名</label>
                            <input class="form__input-shop" type="text" name="shop" placeholder="店舗名を入力してください"
                                value="{{ old('shop', $restaurant->shop) }}" />
                            <input class="form__input-shop" type="text" name="id" value="{{ old('id', $restaurant->id) }}" hidden />
                        </div>
                        <div class="form__error">
                            @error('shop')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--area">
                            <label>地域</label>
                            <input class="form__input-area" type="text" name="area" placeholder="都道府県を入力してください"
                                value="{{ old('area', $restaurant->area) }}" />
                        </div>
                        <div class="form__error">
                            @error('area')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--genre">
                            <label>ジャンル</label>
                            <input class="form__input-genre" type="text" name="genre" placeholder="例：寿司、焼肉"
                                value="{{ old('genre', $restaurant->genre) }}" />
                        </div>
                        <div class="form__error">
                            @error('genre')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--summary">
                            <label>店舗概要</label>
                            <textarea class="form__input-summary" name="summary" rows="5" cols="30" placeholder="店舗概要を入力してください">
                                {{ old('summary', $restaurant->summary) }}
                            </textarea>
                        </div>
                        <div class="form__error">
                            @error('summary')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--url">
                            <label>画像URL</label>
                            <input class="form__input-url" type="text" name="img_url" placeholder="店舗画像のURLを入力してください"
                                value="{{ old('img_url', $restaurant->img_url) }}" />
                        </div>
                        <div class="form__error">
                            @error('img_url')
                                {{ $message }}
                            @enderror
                        </div>
                        <button class="form__button-create" type="submit" name="update">更新</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
