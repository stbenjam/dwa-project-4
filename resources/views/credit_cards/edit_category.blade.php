@extends('layouts.master')

@section('content')

<div class="container">
<p></p>
<h1>Update Credit Card Category</h1>

    <form method="POST" action="/credit_cards/{{ $credit_card_id }}/categories/{{ $category_id }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row required">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id" disabled>
                    <option value="{{ $category_id }}">{{ $category->name }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row required">
            <label for="earn_rate" class="col-sm-2 col-form-label">Earn rate</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="earn_rate" name="earn_rate" placeholder="1.0" value=" {{ old('earn_rate', $earn_rate ?? '') }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>

    </form>
</div>

@endsection
