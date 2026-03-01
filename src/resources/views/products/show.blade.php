<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>もぎたて</h1>
    </header>
    <main>
        <div class="product-detail">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="product-detail-info">
                <h2>{{ $product->name }}</h2>
                <p>¥{{ $product->price }}</p>
                <p>{{ $product->seasons->pluck('name')->join('・') }}</p>
                <p>{{ $product->description }}</p>
                <a href="/products/{{ $product->id }}/update" class="btn btn-primary">編集</a>
                <form action="/products/{{ $product->id }}/delete" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                <a href="/products" class="btn btn-secondary">戻る</a>
            </div>
        </div>
    </main>
</body>
</html>