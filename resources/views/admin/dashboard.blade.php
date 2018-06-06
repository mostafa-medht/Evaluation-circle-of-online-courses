@extends('layouts.app')

@section('content')
    <div class="card-deck">
        <div class="card text-white bg-info text-center mb-4">
        <div class="card-header">Published Post</div>  
        <div class="card-body">
            <h2 class="card-text">{{$post_count}}</h2>
          </div>
        </div>
        <div class="card text-white bg-danger text-center mb-4">
            <div class="card-header">Trashed Post</div>
            <div class="card-body">
            <h2 class="card-text">{{$trashed_count}}</h2>
          </div>
        </div>
        <div class="card text-white bg-success text-center mb-4">
            <div class="card-header">Users</div>
            <div class="card-body">
            <h2 class="card-text">{{$user_count}}</h2>
            </div>
        </div>
        <div class="card text-white bg-secondary text-center mb-4">
            <div class="card-header">Category</div>
            <div class="card-body">
                <h2 class="card-text">{{$category_count}}</h2>
            </div>
        </div>
      </div>
@endsection
