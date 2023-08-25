<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
    @method('put')
    @csrf

    <!-- Vos champs de formulaire ici -->

    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div>
        <label for="name">Product Name</label>
        <input type="text" name="name" placeholder="name" value="{{ old('name', $product->name) }}">
    </div>
    <div>
        <label for="qty">Product Quantity</label>
        <input type="number" name="qty" placeholder="qty" value="{{ old('qty', $product->qty) }}">
    </div>
    <div>
        <label for="price">Product Price</label>
        <input type="text" name="price" placeholder="price" value="{{ old('price', $product->price) }}">
    </div>
    <div>
        <label for="description">Product Description</label>
        <input type="text" name="description" placeholder="description" value="{{ old('description', $product->description) }}">
    </div>

    <div>
        <input type="submit" value="Update This Product">
    </div>
</form>

</body>
</html>