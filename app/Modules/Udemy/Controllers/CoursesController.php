<?php

namespace App\Modules\Udemy\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Udemy\Requests\CoursesRequest;
use App\Modules\Udemy\Models\Courses\ICoursesModel;
use App\Modules\Udemy\Models\Courses\CoursesModel;
use Exception;

class CoursesController extends Controller {

    /**
     * The model to precessing login implementation.
     *
     * @var ICoursesModel
     */
    private $coursesModel;

    /**
     * Create a new controller instance.
     *
     * @param  ICoursesModel  $coursesModel
     * @return void
     */
    public function __construct(
        ICoursesModel $coursesModel
    )
    {
        $this->coursesModel = $coursesModel;
    }

    public function index(CoursesRequest $request){
        try {
            $data = $this->coursesModel->getCourses($request->all());
            return view('Udemy::Courses.Index', ["data" => $data]);
        }
        catch(\Exception $e) {
        }
    }
    
    public function show($course)
    {
        $headers=null;
        $headers= array(
            'page' => $course,
            'page_size' =>12,
         );
         
        $data = CoursesModel::getCourses($headers);
        $previous = null;$next=null;
        try
        {
            $previous = $data["previous"];
            
        }
        catch(Exception $e){}
        try
        {
            $next = $data["next"];
        }
        catch(Exception $e){}
        if($data)
        {
            $data = $data["results"];
        }
        
        //dd($data);
        //var_dump($data);
        //dd("hi");
        //dd($data);
        return view('Udemy::courses.show',["data"=>$data,
        "previous"=>$previous,
        "next"=>$next,
        "index"=>$course,
        "keyword"=>'']);
        
    }

    public function search(Request $request)
    {
        $headers=null;
        $kw =$request->input('keyword');
        $idx = $request->input('index');
        //dd($idx);
        $headers= array(
            'page' => $idx,
            'page_size' =>12,
            'search' =>$kw,
            
            
         );
         $data = CoursesModel::getCourses($headers);
        $previous = null;$next=null;
        try
        {
            $previous = $data["previous"];
            
        }
        catch(Exception $e){}
        try
        {
            $next = $data["next"];
        }
        catch(Exception $e){}
        if($data)
        {
            $data = $data["results"];
        }
        
        //dd($data);
        //var_dump($data);
        //dd("hi");
        //dd($data);
        
        return view('Udemy::courses.show',["data"=>$data,
        "previous"=>$previous,
        "next"=>$next,
        "index"=>$idx,
        "keyword"=>$kw]);
        //dd($request->input('keyword'));
    }
    public function getDetail($course)
    {
        
        $response = CoursesModel::getCourseDetails($course);
        
        //dd($response);
        return view('Udemy::courses.detail',["data"=>$response,
            "keyword"=>'']);
    }
    public function getCourseCurriculum($course)
    {
        $response = CoursesModel::getCourseCurriculums($course,null);
        $currentIndex = 1;
        $result = null;
        //$result=$response["results"];
        while($response["next"])
        {
            $response = $response["results"];
            if($result)
             $result = array_merge($result,$response);
             else
             $result = $response;
            
            $currentIndex +=1;
            $headers= array(
                'page' => $currentIndex,
                
             );
             $response = CoursesModel::getCourseCurriculums($course,$headers);
             

        }
        $response = $response["results"];
        $result = array_merge($result,$response);
        return view('Udemy::courses.curriculums',["data"=>$result,
        "keyword"=>'',
        "id"=>$course]);
        //dd($result);
        
    }
}
