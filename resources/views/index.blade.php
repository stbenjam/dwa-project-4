@extends('layouts.master')

@push('head')
    <link rel="stylesheet" href="css/required.css">
@endpush

@section('content')

<div class="jumbotron">
Reward Maximizer helps you take advantage of all the credit cards you have to
maximize rewards.  Choose the cards you have below, and you'll get a summary of
which card to use for which category of purchases.
</div>

<form action="/calculate" METHOD="get">
    @foreach ($cards as $card)
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" name="credit_cards[]" type="checkbox" value="{{ $card->id }}">
        {{ $card->name }}
      </label>
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Calculate</button>
</form>

@endsection
