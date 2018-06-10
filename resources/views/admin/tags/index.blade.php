@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
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
                                    <a href="{{route('tag.edit' ,['id' => $tag->id])}}" class="btn btn-sm btn-info">Edit</a>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </td> 
                                <td>
                                    <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-sm btn-danger">Delete</a>
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