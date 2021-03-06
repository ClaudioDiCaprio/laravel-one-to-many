@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modify {{$post->title}}</div>
               
                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" placeholder="Insert post's title" value="{{old('title', $post->title)}}">
                          @error('title')
                            <div class="alert-alert-danger">{{$message}}</div>
                          @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control @error ('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Insert content">{{old('content', $post->content)}}</textarea>
                            @error('content')
                                <div class="alert-alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="category">Category</label>
                            <select name="category_id" class="custom-select @error ('category_id') is-invalid @enderror" id="category">
                                <option value="">Select a Category</option>
                                @foreach ($categories as$category)
                                    <option value="{{$category->id}}" {{old("category_id",$post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </div>
                       
                        <div class="form-group form-check">

                            @php
                                $published = old('published') ? old('published') :$post->published;
                            @endphp
                            <input type="checkbox" class="form-check-input @error ('content') is-invalid @enderror" id="published" name="published" {{$published ? 'checked' : ''}}>
                            <label class="form-check-lable" for="published">Pubblica</label>  
                            @error('published')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror  
                        </div>
                        <div class="form-group">
                            @if ($post->image)
                                <img id="uploadPreview" width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">    
                            @endif
                            <label class="" for="image">Add an image</label>
                            <input type="file" class=" @error('image') is-invalid @enderror " id="image" name="image" onchange="PreviewImage();">
                            

                            <script type="text/javascript">

                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("image").files[0]);
                            
                                    oFReader.onload = function (oFREvent) {
                                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                                    };
                                };
                            
                            </script>
                            @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Modify</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection