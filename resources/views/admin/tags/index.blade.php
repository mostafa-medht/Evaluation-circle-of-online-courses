@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Tags
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                    <thead>
                        <th>
                            Tag Name
                        </th>
                        <th>
                            Editing
                        </th>
                        <th>
                            Deleting
                        </th>
                    </thead>
                    <tbody>
                        @if($tags->count()>0)
                            @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {{$tag->tag}}
                                </td>
                                <td>
                                    <a href="{{route('tag.edit' ,['id' => $tag->id])}}" class="btn btn-xs btn-info">Edit</a>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </td> 
                                <td>
                                    <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-xs btn-danger">Delete</a>
                                    <span class="glyphicon glyphicon-"></span>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center" colspan="5">No tags yet.</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
@endsection