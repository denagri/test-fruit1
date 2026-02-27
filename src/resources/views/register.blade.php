<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1>mogitate</h1>
        </div>
    </header>
    <main>
        <div class="register_box">
            <h2>商品登録</h2>
            <div class="category_ttl-box">
                <div class="category_ttl">商品名</div>
                <div class="category_required">必須</div>
            </div>
            <input type="text" name="name" placeholder="商品名を入力" class="textbox" value=""/>
            @error('name')
            {{$message}}
            @enderror
            <div class="category_ttl-box">
                <div class="category_ttl">値段</div>
                <div class="category_required">必須</div>
            </div>
            <input type="text" name="price" placeholder="値段を入力" class="textbox" value=""/>
            @error('price')
            {{$message}}
            @enderror
            <div class="category_ttl-box">
                <div class="category_ttl">商品画像</div>
                <div class="category_required">必須</div>
            </div>
            <input type="file" name="attachment">
            @error('image')
            {{$message}}
            @enderror
            <div class="category_ttl-box">
                <div class="category_ttl">季節</div>
                <div class="category_required">必須</div>
                <div class="category_season">複数選択可</div>
            </div>
            <input type="checkbox" id="spring" name="seasons" value="">
                <label for="spring">春</label>
            <input type="checkbox" id="summer" name="seasons" value="">
                <label for="summer">夏</label>
            <input type="checkbox" id="autumn" name="seasons" value="">
                <label for="autumn">秋<label>
            <input type="checkbox" id="winter" name="seasons" value="">
                <label for="winter">冬</label>
            @error('season')
            {{$message}}
            @enderror
                <div class="category_ttl-box">
                <div class="category_ttl">商品説明</div>
                <div class="category_required">必須</div>
            </div>
            <textarea name="description" placeholder="商品の説明を入力" class="textbox" cols="30" rows="10"></textarea>
            @error('description')
            {{$message}}
            @enderror
            <div class="category_btn">
                <button class="category_back-btn">戻る</button>
                <button class="category_register-btn">登録</button>
            </div>
        </div>
    </main>
</body>
</html>