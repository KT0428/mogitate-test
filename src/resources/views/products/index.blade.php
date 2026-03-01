<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>もぎたて</title>
</head>
<body>
    <h1>商品一覧</h1>
    <form action="/products/search" method="GET">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索">
        <select name="sort">
            <option value="">価格で並び替え</option>
            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>低い順に表示</option>
            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>高い順に表示</option>
        </select>
        <button type="submit">検索</button>
    </form>

    <a href="/products/register">+商品を追加</a>

    @foreach($products as $product)
    <a href="/products/detail/{{ $product->id }}">
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            <p>{{ $product->name }}</p>
            <p>¥{{ $product->price }}</p>
        </div>
    </a>
    @endforeach

    {{ $products->links() }}
</body>
</html>