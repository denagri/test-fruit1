<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1>mogitate</h1>
        </div>
    </header>
    <main>
        <form class="detail_box" >
            <!-- おそらくテーブルから持ってくる -->
            <div class="detail_category">商品一覧＞キウイ</div>
            <div class="category_detail">
                <!-- おそらくダミーデータを引っ張る -->
                <a href="fruits-img/kiwi.png"></a>
                <div class="category_detail-box">
                    <div class="category_detail-ttl">商品名</div>
                    <input type="text" name="name" placeholder="商品名を入力" class="detail_contact-name" value=""/>
                    <div class="form_error">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="category_detail-ttl">値段</div>
                    <input type="text" name="price" placeholder="値段を入力" class="detail_contact-price" value=""/>
                    <div class="form_error">
                        @error('price')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="category_detail-ttl">季節</div>
                    <input type="checkbox" id="spring" name="seasons" value="">
                        <label for="spring">春</label>
                    <input type="checkbox" id="summer" name="seasons" value="">
                        <label for="summer">夏</label>
                    <input type="checkbox" id="autumn" name="seasons" value="">
                        <label for="autumn">秋<label>
                    <input type="checkbox" id="winter" name="seasons" value="">
                        <label for="winter">冬</label>
                    <div class="form_error">
                        @error('season')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <input type="file" name="attachment">
            <div class="category_detail-ttl">商品説明</div>
                <textarea name="description" placeholder="商品の説明を入力" class="textbox" cols="30" rows="10"></textarea>
            <div class="detail_button">
                <button class="detail_back-btn">戻る</button>
                <button class="detail_change-btn">変更を保存</button>
                <button class="detail_delete-btn">ゴミ箱</button>
            </div>
        </form>
    </main>
</body>
</html>