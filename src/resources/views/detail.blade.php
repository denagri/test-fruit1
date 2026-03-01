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
        <form class="detail_box" action="{{route('products.update',$product->id) }}" method= "post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="detail_category">商品一覧＞{{ $product->name }} </div>
                <div class="category_detail">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="250" height="170">
                    <div class="category_detail-box">
                        <div class="category_detail-ttl">商品名</div>
                        <input type="text" name="name" value="{{ old('name',$product->name) }}" class="detail_contact-name" />
                        <div class="form_error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="category_detail-ttl">値段</div>
                        <input type="number" name="price" value="{{ old('price',$product->price) }}" class="detail_contact-price" />
                        <div class="form_error">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="category_detail-ttl">季節</div>
                        @foreach($seasons as $season)
                        <label><input type="checkbox" name="season_ids[]" value="{{season->id}}"
                        {{ $product->seasons->contains($season->id)?'checked':''}}>{{ $season->name }}
                        </label>
                        @endforeach
                        <div class="form_error">
                            @error('season')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="category_detail-ttl">商品説明</div>
                <textarea name="description" class="textbox" cols="30" rows="10">{{ old('description',$product->description) }}</textarea>
                <div class="detail_button">
                    <button type="button" onclick="location.href='/products'" class="detail_back-btn">戻る</button>
                    <button class="detail_change-btn" type="submit">変更を保存</button>
                    <button class="detail_delete-btn">▥</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>