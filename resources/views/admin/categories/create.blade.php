@extends('layouts.app')

@section('content')
{{-- <a href="{{route("posts.show",$post->id)}}"><button type="button" class="btn btn-primary">Sfoglia</button></a> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Categories's list</h2>
                </div>
               
                <div class="card-body">
                    <form action="{{route("categories.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert category's " value="{{old('name')}}">
                        </div>
                        @error('name')
                        <div class="alert-alert-danger">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
