@extends('master')
@section('title')Home Page @endsection
@section('content')
<h1>Home Page</h1>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, perspiciatis nisi obcaecati aperiam sunt provident, esse repudiandae assumenda fugiat velit ipsa sequi porro consequuntur fugit doloremque molestiae eum doloribus delectus!</p>
<form action="exchange-to-mmk" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">From Currency</label>
        <!-- <input type="text" class="form-control" name="currency"> -->
        <select name="currency" class="form-select" id="">
            <option value="usd">USD</option>
            <option value="php">PHP</option>
            <option value="sgd">SGD</option>

        </select>
    </div>

    <div>
        <label for="">Amount</label>
        <input type="text" class="form-control" name="amount">
    </div>
    <div>
        <input type="file" name="photo" id="" class="form-control">
    </div>
    <button class="btn btn-primary">Change</button>
</form>
@endsection