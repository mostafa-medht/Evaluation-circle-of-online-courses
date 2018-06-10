@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Published Posts
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
                            Trash 
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
                                    <a href="{{route('post.edit' ,['id' => $post->id])}}" class="btn btn-sm btn-info">Edit</a>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </td> 
                                <td>
                                    <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-sm btn-danger">Trash</a>
                                    <span class="glyphicon glyphicon-"></span>
                                </td>
                            </tr>
                            @endforeach
                        @else 
                            <tr>
                                <th class="text-center" colspan="5">No published posts</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
@endsection