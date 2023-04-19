@extends('layouts.app')

@section('content')

<div class="container-fluid">   
<div class="row justify-content-center">

<div class="col-md-8">
  <h3>What's on your mind?</h3>
  <a href="{{ route('post.index') }}" class="btn  btn-primary mb-3">Back</a>
  <form action="{{ route('post.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
     
      @if($errors->has('title'))
      <div class=" text-danger">{{ $errors->first('title') }}</div>
      @endif
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">About</label>
      <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    @if($errors->has('about'))
    <div class=" text-danger">{{ $errors->first('about') }}</div>
    @endif
    <button type="submit" class="btn  btn-success m-3" >Add Post</button> 
    
</form>
</div>

</div>
</div>
@endsection