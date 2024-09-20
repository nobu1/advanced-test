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
                飲食店追加
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
            <form class="form" action="{{ route('restaurant.store') }}" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-create">
                        <div class="form__input--shop">
                            <label>店舗名</label>
                            <input class="form__input-shop" type="text" name="shop" placeholder="店舗名を入力してください"
                                value="{{ old('shop') }}" />
                        </div>
                        <div class="form__error">
                            @error('shop')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--area">
                            <label>地域</label>
                            <select class="form__select-area" name="area">
                                <option value="">選択してください</option>
                                <option value="osaka">大阪府</option>
                                <option value="tokyo">東京都</option>
                                <option value="fukuoka">福岡県</option>
                            </select>
                        </div>
                        <div class="form__error">
                            @error('area')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--genre">
                            <label>ジャンル</label>
                            <select class="form__select-genre" name="genre">
                                <option value="">選択してください</option>
                                <option value="italian">イタリアン</option>
                                <option value="ramen">ラーメン</option>
                                <option value="izakaya">居酒屋</option>
                                <option value="sushi">寿司</option>
                                <option value="yakiniku">焼肉</option>
                            </select>
                        </div>
                        <div class="form__error">
                            @error('genre')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--summary">
                            <label>店舗概要</label>
                            <textarea class="form__input-summary" name="summary" rows="5" cols="30" placeholder="店舗概要を入力してください">
                                {{ old('summary') }}
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
                                value="{{ old('img_url') }}" />
                        </div>
                        <div class="form__error">
                            @error('img_url')
                                {{ $message }}
                            @enderror
                        </div>
                        <button class="form__button-create" type="submit" name="create">追加</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
