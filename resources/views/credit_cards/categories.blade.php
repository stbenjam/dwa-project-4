@extends('layouts.master')

@section('content')

<div class="container">
<p />
<h1>Categories for {{ $credit_card->name }}</h1>

<table class="table table-striped table-bordered">
	<tr>
	    <th>Category</th>
	    <th>Earn Rate</th>
	    <th></th>
	</tr>
    @foreach ($categories as $category)
	<tr>
            <td class="col-md-6">{{ $category->category->name }}</td>
	    <td class="col-md-2">{{ $category->earn_rate }}</td>

            <td class="col-md-2">
                <form action="/credit_cards/{{ $credit_card->id }}/categories/{{ $category->category->id }}" method="POST" id="delete_{{ $category->category->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <div class="btn-group" role="group">
                        <a href="/credit_cards/{{ $credit_card->id }}/categories/{{ $category->category->id }}/edit" class="btn btn-info btn-large">Edit</a>
                        <a href="#" class="btn btn-danger btn-large" onClick="if(confirm('Are you sure?')) document.getElementById('delete_{{ $category->category->id }}').submit(); else return false;">Delete</a>
                    </div>
                </form>
            </td>

        </tr>
    @endforeach
</table>
</div>

@endsection
