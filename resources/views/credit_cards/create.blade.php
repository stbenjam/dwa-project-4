@extends('layouts.master')

@section('content')

<div class="container">

<h1>New Credit Card</h1>

    <form method="POST" action="/credit_cards">
        {{ csrf_field() }}

        <div class="form-group row required">
            <label for="name" class="col-sm-2 col-form-label">Credit card name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Credit card name" value=" {{ old('name', $name ?? '') }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="calculate">Submit</button>
            </div>
        </div>

    </form>
</div>

@endsection
