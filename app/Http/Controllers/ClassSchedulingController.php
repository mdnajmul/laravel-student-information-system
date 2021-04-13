<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassSchedulingRequest;
use App\Http\Requests\UpdateClassSchedulingRequest;
use App\Repositories\ClassSchedulingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\ClassScheduling;
use App\Models\Batch;
use App\Models\Classes;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Day;
use App\Models\Level;
use App\Models\Semester;
use App\Models\Shift;
use App\Models\Time;
use Flash;
use Response;

class ClassSchedulingController extends AppBaseController
{
    /** @var  ClassSchedulingRepository */
    private $classSchedulingRepository;

    public function __construct(ClassSchedulingRepository $classSchedulingRepo)
    {
        $this->classSchedulingRepository = $classSchedulingRepo;
    }

    /**
     * Display a listing of the ClassScheduling.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['batches'] = Batch::all();
        $data['classes'] = Classes::all();
        $data['courses'] = Course::all();
        $data['days'] = Day::all();
        $data['levels'] = Level::all();
        $data['semesters'] = Semester::all();
        $data['shifts'] = Shift::all();
        $data['classrooms'] = Classroom::all();
        $data['times'] = Time::all();

        $data['classSchedulings'] = ClassScheduling::
        select(['class_schedulings.*', 'class_schedulings.created_at AS s_created_at', 'class_schedulings.updated_at AS s_updated_at', 'courses.*', 'batches.*', 'classes.*', 'days.*', 'levels.*', 'semesters.*', 'shifts.*', 'classrooms.*', 'times.*'])
        ->join('courses', 'courses.id', '=', 'class_schedulings.course_id')
        ->join('batches', 'batches.batch_id', '=', 'class_schedulings.batch_id')
        ->join('classes', 'classes.class_id', '=', 'class_schedulings.class_id')
        ->join('days', 'days.day_id', '=', 'class_schedulings.day_id')
        ->join('levels', 'levels.level_id', '=', 'class_schedulings.level_id')
        ->join('semesters', 'semesters.semester_id', '=', 'class_schedulings.semester_id')
        ->join('shifts', 'shifts.shift_id', '=', 'class_schedulings.shift_id')
        ->join('classrooms', 'classrooms.classroom_id', '=', 'class_schedulings.classroom_id')
        ->join('times', 'times.time_id', '=', 'class_schedulings.time_id')
        ->get()->toArray();
        

        return view('class_schedulings.index',$data);
    }


    //This is our dynamic level function
    public function DynamicLevel(Request $request)
    {
        $course_id = $request->get('course_id');

        $levels = Level::where('course_id', '=', $course_id)->get();

        return Response::json($levels);
    }

    /**
     * Show the form for creating a new ClassScheduling.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_schedulings.create');
    }

    /**
     * Store a newly created ClassScheduling in storage.
     *
     * @param CreateClassSchedulingRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $class_shedules = array(
            'course_id' => $request->course_id,
            'class_id' => $request->class_id,
            'level_id' => $request->level_id,
            'shift_id' => $request->shift_id,
            'classroom_id' => $request->classroom_id,
            'batch_id' => $request->batch_id,
            'day_id' => $request->day_id,
            'time_id' => $request->time_id,
            'semester_id' => $request->semester_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'schedule_status' => $request->status,
        );

        ClassScheduling::create($class_shedules);

        Flash::success('Class Schedule saved successfully.');

        return redirect(route('classSchedulings.index'));
    }

    /**
     * Display the specified ClassScheduling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $classScheduling = $this->classSchedulingRepository->find($id);

        // if (empty($classScheduling)) {
        //     Flash::error('Class Scheduling not found');

        //     return redirect(route('classSchedulings.index'));
        // }

        // return view('class_schedulings.show')->with('classScheduling', $classScheduling);
    }

    /**
     * Show the form for editing the specified ClassScheduling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            return response(ClassScheduling::find($request->schedule_id));
        }
    }


    public function update(Request $request){
        
        if($request->course_id1=='' && $request->class_id1=='' && $request->level_id1=='' && $request->shift_id1=='' && $request->classroom_id1=='' && $request->batch_id1=='' && $request->day_id1=='' && $request->time_id1=='' && $request->semester_id1=='' && $request->start_date1=='' && $request->end_date1==''){
            $classSchedules = array();
        }else if($request->course_id1!='' && $request->class_id1!='' && $request->level_id1!='' && $request->shift_id1!='' && $request->classroom_id1!='' && $request->batch_id1!='' && $request->day_id1!='' && $request->time_id1!='' && $request->semester_id1!='' && $request->start_date1!='' && $request->end_date1!=''){
            $classSchedules = array(
                //here we will write our input names
                'course_id' => $request->course_id1,
                'class_id' => $request->class_id1,
                'level_id' => $request->level_id1,
                'shift_id' => $request->shift_id1,
                'classroom_id' => $request->classroom_id1,
                'batch_id' => $request->batch_id1,
                'day_id' => $request->day_id1,
                'time_id' => $request->time_id1,
                'semester_id' => $request->semester_id1,
                'start_date' => $request->start_date1,
                'end_date' => $request->end_date1,
                'schedule_status' => $request->status,
            );
        }else{
            if($request->course_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => '',
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->class_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => '',
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->level_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => '',
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->shift_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => '',
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->classroom_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => '',
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->batch_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => '',
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->day_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => '',
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->time_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => '',
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->semester_id1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => '',
                    'start_date' => $request->start_date1,
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->start_date1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => '',
                    'end_date' => $request->end_date1,
                    'schedule_status' => $request->status,
                );  
            }

            if($request->end_date1==''){
                $classSchedules = array(
                    //here we will write our input names
                    'course_id' => $request->course_id1,
                    'class_id' => $request->class_id1,
                    'level_id' => $request->level_id1,
                    'shift_id' => $request->shift_id1,
                    'classroom_id' => $request->classroom_id1,
                    'batch_id' => $request->batch_id1,
                    'day_id' => $request->day_id1,
                    'time_id' => $request->time_id1,
                    'semester_id' => $request->semester_id1,
                    'start_date' => $request->start_date1,
                    'end_date' => '',
                    'schedule_status' => $request->status,
                );  
            }
        }

        if(empty($classSchedules)){
            Flash::error('Class Scheduling Update Failed!');
            return redirect(route('classSchedulings.index'));
        }else{
            ClassScheduling::findOrfail($request->schedule_id1)->update($classSchedules);

            Flash::success('Class Schedule Updated Successfully.');

            return redirect(route('classSchedulings.index'));
        }
    }


    /**
     * Update the specified ClassScheduling in storage.
     *
     * @param int $id
     * @param UpdateClassSchedulingRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateClassSchedulingRequest $request)
    // {
    //     $classScheduling = $this->classSchedulingRepository->find($id);

    //     if (empty($classScheduling)) {
    //         Flash::error('Class Scheduling not found');

    //         return redirect(route('classSchedulings.index'));
    //     }

    //     $classScheduling = $this->classSchedulingRepository->update($request->all(), $id);

    //     Flash::success('Class Scheduling updated successfully.');

    //     return redirect(route('classSchedulings.index'));
    // }

    /**
     * Remove the specified ClassScheduling from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_schedule= ClassScheduling::findOrfail($request->schedule_id);
        $delete_schedule->delete();

        Flash::success('Class Scheduling deleted successfully.');

        return redirect(route('classSchedulings.index'));
    }
}
