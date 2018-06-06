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
            Edit a Tag : {{$tag->tag}}
        </div>
        
        <div class="panel-body">
        <form action='{{ route('tag.update',['id' =>$tag->id])}}' method="POST" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
                </div>
               <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Tag</button>
                </div>
               </div>
            </form>
        </div>
    </div>    
@endsection