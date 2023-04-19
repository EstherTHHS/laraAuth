
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="row justify-content-center">
     
        <div class="col-md-8">
            <a href="{{ route('post.create') }}" class="btn btn-success mb-3">Create New Post</a>
            <div class="card">
                <div class="card-header h1 fw-bolder">
                  NewsFeed
                  {{-- <p>{{ Auth::user()->id }}</p> --}}
                </div>
               
            
                @forelse ($posts as $post)
                <div class="card-body">
                  <blockquote class="blockquote mb-0">

                    <p>{{ $post->title }}<span>{{ $post->created_at }}</span>
                   
                    <footer class="blockquote-footer">{{ $post->about }}</footer>
                   @if ($post->user_id===Auth::user()->id)
                  
                    <a href={{ route('post.edit',$post->id) }} class="btn  btn-primary m-3 ">Edit</a>
                   
                  
                    <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-danger">DELETE</button>
                    </form>
                   
                  
                   
                   @endif
                 
                    <a href="{{ route('post.show',$post->id) }}" class="btn btn-dark m-3">View</a>
                   
                   
                   
                    <hr>
                </div>
                @empty
                  <p class="fw-bolder text-center text-danger">No post yet!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
