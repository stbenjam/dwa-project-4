@extends('layouts.master')

@section('content')

<div class="container">
<h1>Categories</h1>

<table class="table table-striped table-bordered">
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="categories/edit/{{ $category->id}}" class="btn btn-success btn-large">Edit</a>
                <a href="categories/edit/{{ $category->id}}" class="btn btn-danger btn-large">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</div>

@endsection
