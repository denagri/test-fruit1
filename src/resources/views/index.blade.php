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
            <div class="index_category">
                <form class="index_search" action="/products/search" method="get">
                @csrf
                    <input type="text" name="keyword" placeholder="商品名で検索" class="index_search-box" value="{{request('keyword')}}"/>
                    <button class="index_search-btn">検索</button>
                    <h3>価格順で表示</h3>
                    <select name="sort" class="index_search-sort">
                        <option value="0" select disabled>価格で並び替え</option>
                        <option value="1">高い順に表示</option>
                        <option value="2">低い順に表示</option>
                    </select>
                </form>
                <div class="index_category-list">
                    <div class="index_category-fruit">
                    @foreach($products as $product)
                        <a href="/products/detail/{{ $product->id }}" class="detail-fruit">
                            <table>
                                <tr>
                                    <th colspan="2" class="fruit-image"><image src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" width="250" height="180"></th>
                                </tr>
                                <tr class="fruit-ttl">
                                    <td class="fruit-name">{{$product->name}}</td>
                                    <td class="fruit-price">￥{{number_format($product->price)}}</td>
                                </tr>
                            </table>
                        </a>
                    @endforeach
                    </div>
                    {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>