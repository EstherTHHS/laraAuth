
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h1 fw-bolder">
                  NewsFeed
                </div>
              
                <div class="card-body">
                  <blockquote class="blockquote mb-0">

                    <p>{{ $datas->title }}<span>{{ $datas->created_at }}</span>

                    <footer class="blockquote-footer">{{ $datas->about }}</footer>
                    <a href="{{ route('post.index') }}" class="btn btn-success mb-3">Back</a>
                    <hr>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
