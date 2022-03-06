<?php
/**
 * LoginModel
 * Format of data will return to client
 *
 * 処理概要/process overview  : DataResponse
 * 作成日/create date         : 2021/12/04
 * 作成者/creater             : QuyPN - quypn@email.com
 *
 * 更新日/update date         :
 * 更新者/updater             :
 * 更新内容 /update content   :
 *
 * @package Common
 * @copyright Copyright (c) NEAL
 * @version 1.0.0
 */

namespace App\Modules\Udemy\Models\Courses;

use App\Modules\Udemy\Models\Courses\ICoursesModel;

class CoursesModel implements ICoursesModel
{
    public static function callAPI( $url, $params)
    {
      $CLIENT_ID= env('CLIENT_ID');
      $CLIENT_SECRET =env('CLIENT_SECRET');
      $ch = curl_init($url);
      
      
      if($params) //nhi is adding optional params 
       {
           $url=$url."?";
          foreach($params as $key=>$value)
          {
              $url = $url."".$key."=".$value."&";
              
          }
       }
       //dd($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $CLIENT_ID . ":" . $CLIENT_SECRET);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $res= curl_exec($ch);
      $res = json_decode($res,true);
       
       return $res;
    }

    public static function getCourses($params)
    {
       $url = "https://www.udemy.com/api-2.0/courses/";
       $response = CoursesModel::callAPI($url,$params);
       //dd($response);
       //dd($params);
        return $response;
    }
    public static function getCourseDetails($courseId)
    {
         $url="https://www.udemy.com/api-2.0/courses/".$courseId;
         
         $response=CoursesModel::callAPI($url,null);
        // dd($response);
         return $response;
    }
    public static function getCourseCurriculums($courseId,$headers)
    {
        $url="https://www.udemy.com/api-2.0/courses/".$courseId."/public-curriculum-items/";
        
        $response=CoursesModel::callAPI($url,$headers);
        //dd($response);
        return $response;
    }
    
}
