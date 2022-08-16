@extends('master')
@section('title')About Page @endsection
@section('content')
<form action="exchange-rate" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">From Currency</label>
        <!-- <input type="text" class="form-control" name="currency"> -->
        <select name="fromCurrency" class="form-select" id="">
            <option value="usd">USD</option>
            <option value="php">PHP</option>
            <option value="sgd">SGD</option>

        </select>
    </div>
    <div>
        <label for="">To Currency</label>
        <!-- <input type="text" class="form-control" name="currency"> -->
        <select name="toCurrency" class="form-select" id="">
            <option value="usd">USD</option>
            <option value="php">PHP</option>
            <option value="sgd">SGD</option>

        </select>
    </div>

    <div>
        <label for="">Amount</label>
        <input type="text" class="form-control" name="amount">
    </div>
    
    <button class="btn btn-primary">Change</button>
</form>

@endsection