<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品更新</title>
</head>
<body>
    <h1>商品更新</h1>
    <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>
        <div>
            <label>値段</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
        </div>
        <div>
            <label>画像</label>
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            <input type="file" name="image">
        </div>
        <div>
            <label>季節</label>
            @foreach($seasons as $season)
            <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>{{ $season->name }}
            @endforeach
        </div>
        <div>
            <label>商品説明</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        <button type="submit">変更を保存</button>
        <a href="/products">戻る</a>
    </form>
</body>
</html>