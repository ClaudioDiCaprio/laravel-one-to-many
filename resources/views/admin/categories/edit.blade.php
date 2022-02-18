@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Modify Category: {{$category->name}}</h2>
                </div>
               
                <div class="card-body">
                    <form action="{{route("categories.update",$category->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert Category's name" value="{{old('name',$category->name)}}">
                        </div>
                        @error('name')
                        <div class="alert-alert-danger">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Modify</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection