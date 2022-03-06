<?php
namespace App\Modules\Udemy\Models\Courses;

interface ICoursesModel
{
    public static function callAPI( $url, $data);
    public static function getCourses($params);
    public static function getCourseDetails($courseId);
    public static function getCourseCurriculums($courseId,$headers);

}
