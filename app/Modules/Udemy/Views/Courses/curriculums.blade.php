@extends('Udemy::layouts.app') 
@section('content')
<div class="ps-4 pt-2"><h1>Curriculums</h1></div>
<hr>



@foreach($data as $item)
  @if ($item["_class"]=='chapter')
  <p>
    <br>
    <a class="btn btn-outline-dark d-grid gap-2 col-12 mx-auto " style="text-align:left" data-bs-toggle="collapse" href="#chapter_{{$item["id"]}}" role="button" aria-expanded="false" aria-controls="collapseExample">
      <strong>{{$item["title"]}}</strong>
    </a>
  </p>
  <?php $currentChap = "chapter_".$item["id"] ?>
  @else
    <div class="collapse" id={{$currentChap}}>
      <div class="card card-body">
        {{$item["title"]}}
      </div>
    </div>
  @endif
@endforeach

@endsection