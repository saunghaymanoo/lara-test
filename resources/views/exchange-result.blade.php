@extends('master')
@section('title')About Page @endsection
@section('content')
<h1>your result is {{$result}}</h1>
<a href="{{ route('exchange') }}">Next</a>
<ul class="list-group">
    @foreach($records as $r)
    <li class="list-group-item">{{$r->input}}={{$r->output}}</li>
    @endforeach
</ul>
@endsection