@extends('layouts.master')

@section('content')

<div class="container">
<h1>Categories</h1>

<div>
    <p>
        <a href="categories/new" class="btn btn-success btn-large">New</a>
    </p>
</div>

<table class="table table-striped table-bordered">
    @foreach ($categories as $category)
        <tr>
            <td class="col-md-8">{{ $category->name }}</td>
            <td class="col-md-2">
                <form action="/categories/{{ $category->id }}" method="POST" id="category_delete_{{ $category->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <div class="btn-group" role="group">
                        <a href="categories/{{ $category->id}}/edit" class="btn btn-info btn-large">Edit</a>
                        <a href="#" class="btn btn-danger btn-large" onClick="if(confirm('Are you sure?')) document.getElementById('category_delete_{{ $category->id }}').submit(); else return false;">Delete</a>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</div>

@endsection
