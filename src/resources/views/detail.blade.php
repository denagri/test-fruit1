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
        <div class="detail_box">
            <div class="detail_category"><span class="highlight">商品一覧</span>＞{{ $product->name }} </div>
                <form action="{{route('products.update',$product->id) }}" method= "post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="category_detail">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="250" height="200">
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
                            <div class="detail_contact-season">
                                <input type="checkbox" id="spring" name="seasons[]" value="1" {{ in_array(1, old('seasons', $product->seasons->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label for="spring">春</label>
                                <input type="checkbox" id="summer" name="seasons[]" value="2" {{ in_array(2, old('seasons', $product->seasons->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label for="summer">夏</label>
                                <input type="checkbox" id="autumn" name="seasons[]" value="3" {{ in_array(3, old('seasons', $product->seasons->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label for="autumn">秋</label>
                                <input type="checkbox" id="winter" name="seasons[]" value="4" {{ in_array(4, old('seasons', $product->seasons->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                <label for="winter">冬</label>
                            </div>
                            <div class="form_error">
                                @error('seasons')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="file" name="image" accept="image/*">
                    <div class="category_detail-ttl-explain">商品説明</div>
                    <textarea name="description" class="textbox" cols="30" rows="10">{{ old('description',$product->description) }}</textarea>
                    <div class="detail_button">
                        <div class="detail_button-box">
                            <button type="button" onclick="location.href='/products'" class="detail_back-btn">戻る</button>
                            <button class="detail_change-btn" type="submit">変更を保存</button>
                        </div>
                    </div>
                </form>
                <form class="detail_button-delete" action="{{ route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    <button class="detail_delete-btn">▥</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>