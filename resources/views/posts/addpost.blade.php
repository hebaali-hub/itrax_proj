
@extends('layouts.app');
@section('title')
   form create
@endsection
@section('sidebar')
@parent
sides
@endsection
@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div class="container">
    <form method="post" action="{{route('posts.store')}}">
        @csrf
  <div class="mb-3">
    <label for="title" class="form-label">title</label>
    <input type="text @error('title') is-invalid @enderror" class="form-control" id="title" name="title" value={{$errors?old('title'):''}}>


@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">body</label>
    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" row="3">{{$errors?old('body'):''}}</textarea>


@error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <button type="submit" class="btn btn-primary">Add post</button>
</form>
</div>

@endsection

