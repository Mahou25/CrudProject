<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form method="POST" action="{{route('product.store')}}">
        @csrf
        @method('post')

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
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <label for="qty">Product Quantity</label>
            <input type="number" name="qty" placeholder="qty">
        </div>
        <div>
            <label for="price">Product Price</label>
            <input type="text" name="price" placeholder="price">
        </div>
        <div>
            <label for="description">Product Description</label>
            <input type="text" name="description" placeholder="description">
        </div>

        <div>
            <input type="submit" value ="Save a New Product">
        </div>
    </form>
</body>
</html>