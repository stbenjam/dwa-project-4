@extends('layouts.master')

@section('content')

<div class="container">
<h1>Optimized Reward Strategy</h1>

<p>Based on your credit card portfolio, the optimized spending strategy for each category is listed below.</p>

<table class="table table-striped table-bordered">
        <tr>
            <th>Category</th>
            <th>Credit Card</th>
            <th>Earn Rate</th>
        </tr>
    @foreach ($results as $result)
        <tr>
            <td class="col-md-4">{{ $result->category->name }}</td>
            <td class="col-md-4">{{ $result->credit_card->name }}</td>
            <td class="col-md-2">{{ $result->earn_rate }}</td>
        </tr>
    @endforeach
</table>

@endsection
