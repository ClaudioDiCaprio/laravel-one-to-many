@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories's List</div>
               
                <div class="card-body">
                    <div class="div">
                        <a href="{{route("categories.create")}}"><button type="button" class="btn btn-success my-3">Add Category</button></a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route("categories.show",$category->id)}}"><button type="button" class="btn btn-primary">Show</button></a>
                                        <a href="{{route("categories.edit",$category->id)}}"><button type="button" class="btn btn-warning my-3 mx-2">Modify</button></a>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
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
