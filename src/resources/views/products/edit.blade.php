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
        <h1>もぎたて</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>商品更新</h2>
            <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>商品名</label>
                    <div>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}">
                        @error('name')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>値段</label>
                    <div>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}">
                        @error('price')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>画像</label>
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        <input type="file" name="image">
                        @error('image')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>季節</label>
                    <div>
                        @foreach($seasons as $season)
                        <label>
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>{{ $season->name }}
                        </label>
                        @endforeach
                        @error('seasons')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>商品説明</label>
                    <div>
                        <textarea name="description">{{ old('description', $product->description) }}</textarea>
                        @error('description')<p class="error-message">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div style="display:flex; gap:16px;">
                    <button type="submit" class="btn btn-primary">変更を保存</button>
                    <a href="/products" class="btn btn-secondary">戻る</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>