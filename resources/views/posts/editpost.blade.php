
@extends('layouts.app');
@section('title')
   form create
@endsection
@section('sidebar')
@parent
sides
@endsection
@section('content')
{{-- @if(Session::has('msg'))
<div class="alert alert-danger">{{Session::get('msg')}}</div>
@endif --}}
<div class="container">
    <form action="{{route('posts.update',$posts->id)}}" method="post">
        @csrf
        @method('put')
  <div class="mb-3">
    <label for="exampleInput1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInput1" name="title" value={{$posts->title}}>
  </div>
  <div class="mb-3">
    <label for="exampleInput2" class="form-label">body</label>
    <textarea class="form-control" id="exampleInput2" name="body" row="3">{{$posts->body}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">edit post</button>
</form>
</div>

@endsection

