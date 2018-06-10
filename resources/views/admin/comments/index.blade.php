@extends('layouts.app')

@section('content')
    <div style="margin-bottom: " >
        <div id="backend-comments" style="margin-top: 30px; margin-bottom:20px;">
        <h3 style="margin-right:10px; margin-bottom: 30px;"> Comments <small style="text-decoration: underline"> {{ $comments->count() }} total</small></h3>

        <div class="card card-default">
            <div class="card-header">
                Published Comments
            </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil">edit</span></a>
                        </td>
                        <td>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash">delete</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection