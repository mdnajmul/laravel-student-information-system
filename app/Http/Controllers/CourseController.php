<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Course;
use Flash;
use Response;
use Redirect;

class CourseController extends AppBaseController
{
    /** @var  CourseRepository */
    private $courseRepository;

    public function __construct(CourseRepository $courseRepo)
    {
        $this->courseRepository = $courseRepo;
    }

    /**
     * Display a listing of the Course.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['courses'] = Course::orderBy('id','DESC')->get()->toArray();

        return view('courses.index',$data);
    }

    /**
     * Show the form for creating a new Course.
     *
     * @return Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created Course in storage.
     *
     * @param CreateCourseRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $courses = array(
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'description' => $request->description,
            'status' => $request->status,
        );

        Course::create($courses);

        Flash::success('Course saved successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $course = $this->courseRepository->find($id);

        // if (empty($course)) {
        //     Flash::error('Course not found');

        //     return redirect(route('courses.index'));
        // }

        // return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $course = $this->courseRepository->find($id);

        // if (empty($course)) {
        //     Flash::error('Course not found');

        //     return redirect(route('courses.index'));
        // }

        // return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified Course in storage.
     *
     * @param int $id
     * @param UpdateCourseRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {   
        if($request->course_name=='' && $request->course_code=='' && $request->description=='')
        {
             $courses = array();
        }else if($request->course_name!='' && $request->course_code!='' && $request->description!='')
        {
            $courses = array(
                    'course_name' => $request->course_name,
                    'course_code' => $request->course_code,
                    'description' => $request->description,
                    'status' => $request->status,
             );
        }
        else
        {
             if($request->course_name==''){
                $courses = array(
                    'course_name' => '',
                    'course_code' => $request->course_code,
                    'description' => $request->description,
                    'status' => $request->status,
             );
            }


            if($request->course_code==''){
                $courses = array(
                    'course_name' => $request->course_name,
                    'course_code' => '',
                    'description' => $request->description,
                    'status' => $request->status,
             );
            }



            if($request->description==''){
                $courses = array(
                    'course_name' => $request->course_name,
                    'course_code' => $request->course_code,
                    'description' => '',
                    'status' => $request->status,
             );
            }
        }

        if (empty($courses)) {

            Flash::error('Please fill up at least one input field!');

            return redirect(route('courses.index'));

        }else{
            Course::findOrfail($request->course_id)->update($courses);

            Flash::success('Course updated successfully.');

            return redirect(route('courses.index'));
        }

    }

    /**
     * Remove the specified Course from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_course= Course::findOrfail($request->course_id);
        $delete_course->delete();

        Flash::success('Course deleted successfully.');

        return redirect(route('courses.index'));
    }
}
