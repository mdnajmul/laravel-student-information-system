<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Repositories\ClassroomRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Classroom;
use Flash;
use Response;
use Redirect;

class ClassroomController extends AppBaseController
{
    /** @var  ClassroomRepository */
    private $classroomRepository;

    public function __construct(ClassroomRepository $classroomRepo)
    {
        $this->classroomRepository = $classroomRepo;
    }

    /**
     * Display a listing of the Classroom.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['classrooms'] = Classroom::orderBy('classroom_id','DESC')->get()->toArray();

        return view('classrooms.index',$data);
    }

    /**
     * Show the form for creating a new Classroom.
     *
     * @return Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created Classroom in storage.
     *
     * @param CreateClassroomRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $classroom = array(
            'classroom_name' => $request->classroom_name,
            'classroom_code' => $request->classroom_code,
            'classroom_description' => $request->classroom_description,
            'classroom_status' => $request->classroom_status,
        );

        Classroom::create($classroom);

        Flash::success('Classroom saved successfully.');

        return redirect(route('classrooms.index'));
    }

    /**
     * Display the specified Classroom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $classroom = $this->classroomRepository->find($id);

        // if (empty($classroom)) {
        //     Flash::error('Classroom not found');

        //     return redirect(route('classrooms.index'));
        // }

        // return view('classrooms.show')->with('classroom', $classroom);
    }

    /**
     * Show the form for editing the specified Classroom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $classroom = $this->classroomRepository->find($id);

        // if (empty($classroom)) {
        //     Flash::error('Classroom not found');

        //     return redirect(route('classrooms.index'));
        // }

        // return view('classrooms.edit')->with('classroom', $classroom);
    }

    /**
     * Update the specified Classroom in storage.
     *
     * @param int $id
     * @param UpdateClassroomRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->classroom_name=='' && $request->classroom_code=='' && $request->classroom_description=='')
        {
             $classroom = array();
        }else if($request->classroom_name!='' && $request->classroom_code!='' && $request->classroom_description!='')
        {
            $classroom = array(
                    'classroom_name' => $request->classroom_name,
                    'classroom_code' => $request->classroom_code,
                    'classroom_description' => $request->classroom_description,
                    'classroom_status' => $request->classroom_status,
             );
        }
        else
        {
             if($request->classroom_name==''){
                $classroom = array(
                    'classroom_name' => '',
                    'classroom_code' => $request->classroom_code,
                    'classroom_description' => $request->classroom_description,
                    'classroom_status' => $request->classroom_status,
             );
            }


            if($request->classroom_code==''){
                $classroom = array(
                    'classroom_name' => $request->classroom_name,
                    'classroom_code' => '',
                    'classroom_description' => $request->classroom_description,
                    'classroom_status' => $request->classroom_status,
             );
            }



            if($request->classroom_description==''){
                $classroom = array(
                    'classroom_name' => $request->classroom_name,
                    'classroom_code' => $request->classroom_code,
                    'classroom_description' => '',
                    'classroom_status' => $request->classroom_status,
             );
            }
        }


        if (empty($classroom)) {

            Flash::error('Please fill up at least one input field!');

            return redirect(route('classrooms.index'));

        }else{
            Classroom::findOrfail($request->classroom_id)->update($classroom);

            Flash::success('Classroom updated successfully.');

            return redirect(route('classrooms.index'));
        }

    }

    /**
     * Remove the specified Classroom from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {

        $delete_classroom= Classroom::findOrfail($request->classroom_id);
        $delete_classroom->delete();

        Flash::success('Classroom deleted successfully.');

        return redirect(route('classrooms.index'));
    }
}
