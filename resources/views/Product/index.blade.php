@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">Products</h4>
                    @can('add products')
                        <a class="d-inline" style="float:right" href="{{route("products.new")}}"><i class="fa-solid fa-circle-plus"></i></a>
                    @endcan
                </div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection