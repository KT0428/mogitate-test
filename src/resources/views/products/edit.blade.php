<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品更新</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>mogitate</h1>
    </header>
    <main>
        <div class="form-page">
            <div class="breadcrumb">
                <a href="/products">商品一覧</a>
                <span>></span>
                <span>{{ $product->name }}</span>
            </div>
            <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="edit-top-layout">
                    <!-- 左：画像 -->
                    <div class="edit-image-col">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="image-preview">
                        <input type="file" name="image" accept=".png,.jpeg,.jpg">
                        @error('image')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                    <!-- 右：商品名・値段・季節 -->
                    <div class="edit-info-col">
                        <div class="form-group">
                            <div class="form-label-row">
                                <label>商品名</label>
                                <span class="badge-required">必須</span>
                            </div>
                            <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
                            @error('name')<p class="error-message">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-row">
                                <label>値段</label>
                                <span class="badge-required">必須</span>
                            </div>
                            <input type="number" name="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}">
                            @error('price')<p class="error-message">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-row">
                                <label>季節</label>
                                <span class="badge-required">必須</span>
                                <span class="badge-optional">複数選択可</span>
                            </div>
                            <div class="season-group">
                                @foreach($seasons as $season)
                                <label>
                                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                        {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
                                    {{ $season->name }}
                                </label>
                                @endforeach
                            </div>
                            @error('seasons')<p class="error-message">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- 下：商品説明 -->
                <div class="form-group">
                    <div class="form-label-row">
                        <label>商品説明</label>
                        <span class="badge-required">必須</span>
                    </div>
                    <textarea name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    @error('description')<p class="error-message">{{ $message }}</p>@enderror
                </div>

                <div class="form-actions">
                    <a href="/products" class="btn btn-secondary">戻る</a>
                    <button type="submit" class="btn btn-primary">変更を保存</button>
                    <form action="/products/{{ $product->id }}/delete" method="POST" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        <button type="submit" class="btn-icon-danger" title="削除">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 3v1H4v2h1v13a2 2 0 002 2h10a2 2 0 002-2V6h1V4h-5V3H9zm0 5h2v9H9V8zm4 0h2v9h-2V8z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </main>
</body>
</html>