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
            <td class="col-md-2">
                <div class="btn-group" role="group">
                <a href="credit_cards/edit/{{ $card->id}}" class="btn btn-info btn-large">Edit</a>

                <form action="/credit_cards/{{ $card->id }}" method="POST">
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
