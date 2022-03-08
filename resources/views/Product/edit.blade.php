@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("products.index")}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">New product</h4>
                </div>

                <div class="card-body">
                    <form action="{{route("products.update",Crypt::encrypt($product->id))}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product name :</label>
                            <input type="text" value="{{$product->name}}" name="name" class="form-control" placeholder="product name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price :</label>
                            <input type="text" value="{{$product->price}}" name="price" class="form-control" placeholder="price">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description :</label>
                            <textarea class="form-control" name="description" placeholder="description">{{$product->description}}</textarea>
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">update product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection