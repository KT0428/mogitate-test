<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
</head>
<body>
    <h1>商品詳細</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
    <p>{{ $product->name }}</p>
    <p>¥{{ $product->price }}</p>
    <p>{{ $product->seasons->pluck('name')->join('・') }}</p>
    <p>{{ $product->description }}</p>
    <a href="/products/{{ $product->id }}/update">編集</a>
    <form action="/products/{{ $product->id }}/delete" method="POST">
        @csrf
        <button type="submit">削除</button>
    </form>
    <a href="/products">戻る</a>
</body>
</html>