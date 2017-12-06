@extends('layouts.master')

@section('content')

<div class="container">
<h1>Credit Cards</h1>

<div align="right">
    <p>
        <a href="credit_cards/new" class="btn btn-success btn-large">New</a>
    </p>
</div>

<table class="table table-striped table-bordered">
    @foreach ($cards as $card)
        <tr>
            <td class="col-md-6">{{ $card->name }}</td>
            <td class="col-md-1">
                <a href="credit_cards/{{ $card->id}}/categories" class="btn btn-success btn-large">Categories</a>
            </td>

            <td class="col-md-2">
                <form action="/credit_cards/{{ $card->id }}" method="POST" id="card_delete_{{ $card->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <div class="btn-group" role="group">
                        <a href="credit_cards/edit/{{ $card->id}}" class="btn btn-info btn-large">Edit</a>
                        <a href="#" class="btn btn-danger btn-large" onClick="if(confirm('Are you sure?')) document.getElementById('card_delete_{{ $card->id }}').submit(); else return false;">Delete</a>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</div>

@endsection
