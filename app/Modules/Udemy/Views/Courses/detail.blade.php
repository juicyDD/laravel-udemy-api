<body style="background-image: linear-gradient(to bottom, black, #f8fafc 70%);">
@extends('Udemy::layouts.app') 
@section('content')

<div class="row" >
    <div class="col-1"></div>
    <div class="col-7 pt-2 pb-5 text-light">
        <h2><strong>{{$data["title"]}}</strong></h2>
        <a style=" color:#f8fafc" target="_blank"
         href="https://udemy.com/{{$data["visible_instructors"][0]["url"]}}"><strong><h6>{{$data["visible_instructors"][0]["title"]}}</h6></strong></a>
        <h5>{{$data["price"]}}</h5>

        <br>
        <div class="col-3">
            <a style="text-decoration:none" target="_blank"
            href="https://udemy.com/{{$data["url"]}}">
                <div class="container-lg rounded-pill pt-1 pb-1" style="background-color:black; display:inline-block">
                    <div class="text-light">
                        <strong>Visit course ></strong>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-2 pt-2 pb-5 pe-3 max-h-32">
        
        <img src="{{$data["image_480x270"]}}" style="width:300px" alt="">
    </div>
</div>
<br>
<hr><br>
<div class="row">
    <div class="col-5"></div>
    <div class="col-3">
        <div class="container align-items-center">
            <form action="/courses-curriculum/{{$data["id"]}}"><input type="submit" class="btn btn-outline-dark" value="Public curriculums"></input></form>
            
            <form action="#"><input type="submit" class="btn btn-outline-dark" value="See more reviews"></input></form>
                
        </div>
    </div>
</div>

@endsection
</body>