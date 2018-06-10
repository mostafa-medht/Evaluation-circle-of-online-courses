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
    <div class="card card-default">
        <div class="card-header">
            Edit post: {{$post->title}}
        </div>
        
        <div class="card-body">
        <form action='{{ route('post.update',['id' => $post->id])}}' method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
               </div>
               <div class="form-gorup">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category) 
                            <option value="{{$category->id}}"  
                                @if($post->category_id == $category->id)
                                    selected     
                                @endif 
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
               </div>
               <br>
               <div class="form-group">
                   <label for="tags">Select a Tag : </label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                            > {{$tag->tag}}</label>
                        </div>
                    @endforeach
               </div>
               <div class="form-group">
                    <label for="content">Content</label>
               <textarea name="content" id="content" cols="15" rows="5" class="form-control">{{$post->content}}</textarea>
               </div>
               <div class="form-group">
                   <div class="text-center">
                       <button class="btn btn-success" type="submit">Update post</button>
                   </div>
               </div>
            </form>
        </div>
    </div>    
@stop