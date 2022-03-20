@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="mb-2">
                        <h4 class="d-inline">Products</h4>
                        @can('add products')
                            <a class="d-inline" style="float:right" href="{{route("products.new")}}"><i class="fa-solid fa-circle-plus"></i></a>
                        @endcan
                    </div>

                    <form action="{{route("products.search")}}" method="POST" class="form-inline">
                        @csrf
                        <div class="form-group mx-auto mb-2">
                          <input type="text" class="form-control" name="name" placeholder="Search by name">
                          @error("name")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-dark mb-1">Search</button>
                    </form>
                </div>

                <div class="card-body">
                        @if (count($products)!=0)
                            <ul>
                                @foreach ($products as $product)
                                    <li>{{$product->name}}
                                        <a style="float:right" class="text-success" href="{{route("products.show",Crypt::encrypt($product->id))}}"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                        @role("admin|writer")
                                            <a style="float:right;margin-right:4px" href="{{route("products.edit",Crypt::encrypt($product->id))}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endrole
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-danger" role="alert">
                                This product not found
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection