@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    @if (session('Success'))
        <div class="alert alert-success">
            {{ session("Success") }}
        </div>
    @endif

    @if (session('Updated'))
        <div class="alert alert-info">
            {{ session("Updated") }}
        </div>
    @endif

    @if (session('Deleted'))
        <div class="alert alert-danger">
            {{ session("Deleted") }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <table class="table mt-3">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>
                            <a href="{{ route('sub_categories.create') }}" class="btn btn-success">Create</a>
                        </th>
                    </tr>
                    @foreach ($subCategories as $subCategory)
                        <tr>
                            <td>{{ $subCategory->id }}</td>
                            <td>{{ $subCategory->name }}</td>
                            <td>{{ $subCategory->category->name }}</td>
                            <td>
                                <form action="{{ route('sub_categories.destroy', $subCategory->id) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <a href="{{ route('sub_categories.edit', $subCategory->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $subCategories->links() }}
            </div>
        </div>
    </div>
@stop

