
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5 col-7">
            <div class="card-header">
                Create a new Product
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Product name</label>
                        <input type="text" name="name" class="form-control">

                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control">

                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"></textarea>

                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control">

                        <label for="discount">Discount</label>
                        <input type="number" name="discount" class="form-control">
                        
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control">

                        <label for="tag_id">Tag Id</label>
                        <input type="number" name="tag_id" class="form-control">

                        <label for="category_id">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled selected></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <label for="subcategory_id">Subcategory</label>
                        <select name="subcategory_id" id="" class="form-control ">
                            <option value="" disabled selected></option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>

                        <label for="image1">Image1</label>
                        <input type="file" name="image1" class="form-control">

                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop



