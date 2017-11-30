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
            <td>{{ $card->name }}</td>
            <td>
                <a href="credit_cards/edit/{{ $card->id}}" class="btn btn-info btn-large">Edit</a>
                <a href="credit_cards/edit/{{ $card->id}}" class="btn btn-danger btn-large">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</div>

@endsection
