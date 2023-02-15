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
                        <th>
                            <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
                        </th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
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

