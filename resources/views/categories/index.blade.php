@extends('layouts.master')

@section('content')

<div class="container">
<h1>Categories</h1>

<div align="right">
    <p>
        <a href="categories/new" class="btn btn-success btn-large">New</a>
    </p>
</div>

<table class="table table-striped table-bordered">
    @foreach ($categories as $category)
        <tr>
            <td class="col-md-6">{{ $category->name }}</td>
            <td class="col-md-2">
                <div class="btn-group" role="group">
                <a href="categories/edit/{{ $category->id}}" class="btn btn-info btn-large">Edit</a>

                <form action="/categories/{{ $category->id }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger btn-large" value="Delete" onClick="return confirm('Are you sure?');">
                </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
</div>

@endsection
