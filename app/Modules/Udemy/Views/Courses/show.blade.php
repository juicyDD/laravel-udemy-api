@extends('Udemy::layouts.app') 
@section('content')

<body style="background-image: linear-gradient(to bottom, black, #f8fafc 70%);">
    <div>
    <div class=" row d-flex d-inline-block " style="display:flex" >
            @if($data)
            @foreach($data as $course)
            <div  class="col-3 pb-3" >
            <a target="_blank" href="/courses-detail/{{$course["id"]}}" style="text-decoration:none;color:black">
                <div class="container-lg rounded-3 p-3" style="background-color:#ECECEC">
                    <strong>{{$course["title"]}}</strong>
                    <br>
                    <div class="pb-2">
                        <img src="{{$course["image_240x135"]}}" alt="">
                    </div>
                    
                    <div class="text-sm" style="color:#808080">{{$course['visible_instructors'][0]['title']}}</div>
                    <div>{{$course['headline']}}</div>
                </div>  
                </a> 
            </div> 
            @endforeach
            @endif
            

            
            
            <div class="row ">
                <div class="col-12">
                    <div style="text-align:center">
                        @if($previous && !$keyword)
                        <a style="color:black;text-decoration:none" href="/courses/{{$index-1}}">⬅ Previous </a>
                        @elseif($previous && $keyword)
                        <a style="color:black;text-decoration:none" href="/courses/search/?keyword={{$keyword}}&index={{$index-1}}">⬅ Previous </a>
                        @endif 
                        @if($previous && $next) 
                        <strong>|</strong>
                        @endif
                        @if($next && !$keyword)
                        <a style="color:black;text-decoration:none;" href="/courses/{{$index+1}}"> Next ➡</a>
                        @elseif($next && $keyword)
                        <a style="color:black;text-decoration:none" href="/courses/search/?keyword={{$keyword}}&index={{$index+1}}"> Next ➡</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>


@endsection