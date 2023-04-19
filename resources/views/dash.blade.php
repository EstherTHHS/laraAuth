@extends('homeLayout')

@section('title',"homeDash")

@section('header')
    <h1>Home Dashboard</h1>
    <h2>start here </h2>
    </h4>++++++++</h4>
@endsection

@section('main')
<h2>{{ $userData["name"] }}</h2>
<h2>{{ $userData["age"] }}</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam debitis error quidem, sed suscipit quas necessitatibus expedita unde non doloremque.</p>
    <br>
    <br>
@for ($i=0;$i<5;$i++)
    @if ($i==2)
        {{ $i  }} is curret level two
    @endif
@endfor


@endsection


