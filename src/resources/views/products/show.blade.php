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
        <h1>mogitate</h1>
    </header>
    <main>
        <div class="product-detail-page">
            <div class="breadcrumb">
                <a href="/products">商品一覧</a>
                <span>></span>
                <span>{{ $product->name }}</span>
            </div>
            <div class="product-detail-layout">
                <div class="product-detail-image">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-detail-info">
                    <h2>{{ $product->name }}</h2>
                    <div class="product-detail-row">
                        <div class="product-detail-label">値段</div>
                        <div class="product-detail-value">¥{{ $product->price }}</div>
                    </div>
                    <div class="product-detail-row">
                        <div class="product-detail-label">季節</div>
                        <div class="product-detail-value">{{ $product->seasons->pluck('name')->join('・') }}</div>
                    </div>
                    <div class="product-detail-row">
                        <div class="product-detail-label">商品説明</div>
                        <div class="product-detail-value">{{ $product->description }}</div>
                    </div>
                    <div class="product-detail-actions">
                        <a href="/products/{{ $product->id }}/update" class="btn btn-primary">編集</a>
                        <a href="/products" class="btn btn-secondary">戻る</a>
                        <form action="/products/{{ $product->id }}/delete" method="POST" style="display:inline;" onsubmit="return confirm('削除しますか？')">
                            @csrf
                        <button type="submit" class="btn-icon-danger" title="削除">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 3v1H4v2h1v13a2 2 0 002 2h10a2 2 0 002-2V6h1V4h-5V3H9zm0 5h2v9H9V8zm4 0h2v9h-2V8z"/>
                            </svg>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>