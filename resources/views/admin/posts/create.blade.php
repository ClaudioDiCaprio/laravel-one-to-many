@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts's List</div>
               
                <div class="card-body">
                    <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Insert post's title" value="{{old('title')}}">
                        </div>
                        @error('title')
                        <div class="alert-alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Insert content">{{old('content')}}</textarea>
                        </div>
                        @error('content')
                        <div class="alert-alert-danger">{{$message}}</div>
                        @enderror
                        <div>
                            <label for="category">Category</label>
                            <select name="category_id" class=" my-3 custom-select @error ('category_id') is-invalid @enderror" id="category">
                                <option value="">Select a Category</option>
                                @foreach ($categories as$category)
                                    <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published') ? 'checked' : ''}}>
                            <label class="form-check-lable" for="published">Publish</label>    
                            @error('published')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class=" @error('image') is-invalid @enderror " id="image" name="image">
                            <label class="" for="image">Add an image</label>
                            @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
