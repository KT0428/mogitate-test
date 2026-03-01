<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>mogitate</h1>
    </header>
    <main>
        <div class="form-page">
            <h2>商品登録</h2>
            <form action="/products/register" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-label-row">
                        <label>商品名</label>
                        <span class="badge-required">必須</span>
                    </div>
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
                    @error('name')<p class="error-message">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <div class="form-label-row">
                        <label>値段</label>
                        <span class="badge-required">必須</span>
                    </div>
                    <input type="number" name="price" placeholder="値段を入力" value="{{ old('price') }}">
                    @error('price')<p class="error-message">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <div class="form-label-row">
                        <label>商品画像</label>
                        <span class="badge-required">必須</span>
                    </div>
                    <input type="file" name="image" accept=".png,.jpeg,.jpg">
                    @error('image')<p class="error-message">{{ $message }}</p>@enderror
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
                                {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
                            {{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                    @error('seasons')<p class="error-message">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <div class="form-label-row">
                        <label>商品説明</label>
                        <span class="badge-required">必須</span>
                    </div>
                    <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    @error('description')<p class="error-message">{{ $message }}</p>@enderror
                </div>

                <div class="form-actions">
                    <a href="/products" class="btn btn-secondary">戻る</a>
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>