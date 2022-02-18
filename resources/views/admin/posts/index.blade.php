@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts's List</div>
               
                <div class="card-body">
                    <div class="div">
                        <a href="{{route("posts.create")}}"><button type="button" class="btn btn-success my-3">Add Post</button></a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">State</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>
                                        @if($post->published)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->category)
                                            {{$post->category->name}}
                                        @else
                                        Nessuna
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Show</button></a>
                                        <a href="{{route("posts.edit",$post->id)}}"><button type="button" class="btn btn-warning my-3">Modify</button></a>
                                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
