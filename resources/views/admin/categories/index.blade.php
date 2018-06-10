@extends('layouts.app')

@section('content')
    <div class="card panel-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>
                            Category Name
                        </th>
                        <th>
                            Editing
                        </th>
                        <th>
                            Deleting
                        </th>
                    </thead>
                    <tbody>
                        @if($categories->count()>0)
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit' ,['id' => $category->id])}}" class="btn btn-sm btn-info">Edit</a>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </td> 
                                <td>
                                    <a href="{{route('category.delete', ['id' => $category->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                    <span class="glyphicon glyphicon-"></span>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center" colspan="5">No categories yet.</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
@endsection