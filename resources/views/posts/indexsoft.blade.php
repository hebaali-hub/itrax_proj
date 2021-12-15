@extends('layouts.app');
@section('title')
   page1
@endsection
@section('sidebar')
@parent
sides
@endsection
@section('content')
  <table class="table">
  <thead>
    <tr>
         <th scope="col">ID</th>

      <th scope="col">TITLE</th>
      <th scope="col">BODY</th>
 <th scope="col">Restore</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
      @forelse($posts as $post)
         <tr>
    <th scope="row">{{$loop->index+1}}</th>
         <td>{{$post->title}}</td>
      <td>{{$post->body}}</td>
      <td><a class="btn btn-primary" href="{{route('restoredel',$post->id)}}" rle="button">Restore</a></td>
      <td><form action="{{route('forcedel',$post->id)}}" method="post">
          @csrf
          @method('delete')
           <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
               delete</a>
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" form="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">sure</button>
      </div>
    </div>
  </div>
</div>
      </form>
     </td>
    </tr>
      @empty
     <tr><td colspan="5" style="text-align:center"> no posts</td></tr>
      @endforelse
      <tr><td colspan="5" style="text-align:center"><a class="btn btn-success" href="{{route('posts.create')}}" role="button">add</a></td></tr>
@if(Session::has('msg'))
<div class="alert alert-danger">{{Session::get('msg')}}</div>
@endif
  </tbody>
</table>


@endsection
