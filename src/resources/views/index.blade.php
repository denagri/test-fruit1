<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1>mogitate</h1>
        </div>
    </header>
    <main>
        <div class="index_box">
            <form class="index_box-category" action="/products/register" method="get">
                @csrf
                <h2>商品一覧</h2>
                <button class="index_category-btn" type="submit">
                +商品を追加
                </button>
            </form>
            <form class="index_category" action="/products/detail/product" method="get">
                <div class="index_search">
                    <input type="text" name="keyword" placeholder="商品名で検索" class="index_search-box" value=""/>
                    <button class="index_search-btn">検索</button>
                    <h3>価格順で表示</h3>
                    <form action="" method="get">
                        <select name="sort">
                            <option value="0" select disabled>価格で並び替え</option>
                            <option value="1">高い順に表示</option>
                            <option value="2">低い順に表示</option>
                        </select>
                    </form>
                </div>
                <div class="index_category-list">
                    <div class="index_category-fruit">
                    <!-- ダミーデータを引っ張る -->
                        <img src="fruits-img/banana.png" class="box1">
                        <img src="fruits-img/grapes.png" class="box2">
                        <img src="fruits-img/kiwi.png" class="box3">
                        <img src="fruits-img/melon.png" class="box4">
                        <img src="fruits-img/muscat.png" class="box5">
                        <img src="fruits-img/orange.png" class="box6">
                    </div>
                    <!-- ページネーション -->
                    {{}}
                </div>
            </form>
        </div>
    </main>
</body>
</html>