@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>
                            Image
                        </th>
                        <th>
                            title
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Restore
                        </th>
                        <th>
                            Destroy 
                        </th>
                    </thead>
                    <tbody>
                        @if($posts->count()>0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px">
                                    </td>
                                    <td>
                                        {{$post->title}}
                                    </td>
                                    <td>
                                        Edit
                                    </td>
                                    <td>
                                        <a href="{{route('post.restore', ['id' => $post->id])}}" class="btn btn-xs btn-success">Restore</a>
                                        <span class="glyphicon glyphicon-"></span>
                                    </td>
                                    <td>
                                        <a href="{{route('post.kill' ,['id' => $post->id])}}" class="btn btn-xs btn-danger">Delete</a>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </td> 
                                    
                                </tr>
                        @endforeach
                    @else 
                        <tr>
                            <th class="text-center" colspan="5">No trashed posts</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
    </div>
@endsection