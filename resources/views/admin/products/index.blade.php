@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <table class="table mt-3">
                <tr>
                    <th>ID</th>
                    <th>Image1</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Model</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Tag_id</th>
                    <th>
                        <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
                    </th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img src="{{ asset('image/'.$product->image1) }}" alt="Image" width="80" height="80"/>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->model }}</td>
                        @if ($product->discount == null) 
                         <td>No Discount</td>
                        @else
                        <td>{{ $product->discount }}</td>   
                        @endif
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->subcategory->name }}</td>
                        <td>{{ $product->tag_id }}</td>
                        <td>
                            <form action="" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@stop

