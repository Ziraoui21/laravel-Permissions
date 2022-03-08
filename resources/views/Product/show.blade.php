@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("products.index")}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">show product</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Product name :</label>
                        <input type="text" disabled value="{{$product->name}}" name="name" class="form-control" placeholder="product name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price :</label>
                        <input type="text" disabled value="{{$product->price}}" name="price" class="form-control" placeholder="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description :</label>
                        <textarea class="form-control" disabled name="description" placeholder="description">{{$product->description}}</textarea>
                    </div>

                    @role("admin")
                        <a href="{{route("products.delete",Crypt::encrypt($product->id))}}" class="btn btn-dark">Delete</a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection