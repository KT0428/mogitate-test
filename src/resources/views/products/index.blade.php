<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>mogitate</h1>
    </header>
    <main>
        <div class="page-header">
            <h2>商品一覧</h2>
            <a href="/products/register" class="btn btn-primary">+ 商品を追加</a>
        </div>
        <div class="content-wrapper">
            <aside class="sidebar">
                <form action="/products/search" method="GET">
                    <div class="sidebar-section">
                        <input type="text" name="search" placeholder="商品名で検索" value="{{ request('search') }}">
                        <button type="submit" class="btn-search">検索</button>
                    </div>
                    <div class="sidebar-section">
                        <span class="sidebar-label">価格順で表示</span>
                        <select name="sort" onchange="this.form.submit()">
                            <option value="">価格で並べ替え</option>
                            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>低い順に表示</option>
                            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>高い順に表示</option>
                        </select>
                        @if(request('sort'))
                            <div>
                                <span class="sort-tag">
                                    {{ request('sort') === 'asc' ? '低い順に表示' : '高い順に表示' }}
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="sort-tag-remove">×</a>
                                </span>
                            </div>
                        @endif
                    </div>
                </form>
            </aside>
            <div class="product-area">
                <div class="product-list">
                    @foreach($products as $product)
                    <a href="/products/detail/{{ $product->id }}" class="product-card">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="product-card-body">
                            <span class="product-name">{{ $product->name }}</span>
                            <span class="product-price">¥{{ $product->price }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="pagination-wrapper">
                    {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>