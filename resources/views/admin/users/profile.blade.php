@extends('layouts.app')

@section('content')
    @if(count($errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Your Profile
        </div>
        
        <div class="panel-body">
        <form action='{{ route('user.profile.update')}}' method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Username</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">Upload New Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">Facebook Profile</label>
                    <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">Youtube Profile</label>
                    <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tag">About You : </label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{$user->profile->about}}</textarea>
                </div>
               <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Profile</button>
                </div>
               </div>
            </form>
        </div>
    </div>    
@endsection