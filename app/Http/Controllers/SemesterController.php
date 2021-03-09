<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Repositories\SemesterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Semester;
use Flash;
use Response;
use Redirect;

class SemesterController extends AppBaseController
{
    /** @var  SemesterRepository */
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepo)
    {
        $this->semesterRepository = $semesterRepo;
    }

    /**
     * Display a listing of the Semester.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['semesters'] = Semester::orderBy('semester_id','DESC')->get()->toArray();

        return view('semesters.index',$data);
    }

    /**
     * Show the form for creating a new Semester.
     *
     * @return Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created Semester in storage.
     *
     * @param CreateSemesterRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
         $semester = array(
            'semester_name' => $request->semester_name,
            'semester_code' => $request->semester_code,
            'semester_duration' => $request->semester_duration,
            'semester_description' => $request->semester_description,
        );

        Semester::create($semester);

        Flash::success('Semester saved successfully.');

        return redirect(route('semesters.index'));
    }

    /**
     * Display the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $semester = $this->semesterRepository->find($id);

        // if (empty($semester)) {
        //     Flash::error('Semester not found');

        //     return redirect(route('semesters.index'));
        // }

        // return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $semester = $this->semesterRepository->find($id);

        // if (empty($semester)) {
        //     Flash::error('Semester not found');

        //     return redirect(route('semesters.index'));
        // }

        // return view('semesters.edit')->with('semester', $semester);
    }

    /**
     * Update the specified Semester in storage.
     *
     * @param int $id
     * @param UpdateSemesterRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->semester_name=='' && $request->semester_code=='' && $request->semester_duration=='')
        {
             $semester = array();
        }else if($request->semester_name!='' && $request->semester_code!='' && $request->semester_duration!='' && $request->semester_description!='')
        {
            $semester = array(
                    'semester_name' => $request->semester_name,
                    'semester_code' => $request->semester_code,
                    'semester_duration' => $request->semester_duration,
                    'semester_description' => $request->semester_description,
             );
        }
        else
        {
             if($request->semester_name==''){
                $semester = array(
                    'semester_name' => '',
                    'semester_code' => $request->semester_code,
                    'semester_duration' => $request->semester_duration,
                    'semester_description' => $request->semester_description,
             );
            }


            if($request->semester_code==''){
                $semester = array(
                    'semester_name' => $request->semester_name,
                    'semester_code' => '',
                    'semester_duration' => $request->semester_duration,
                    'semester_description' => $request->semester_description,
             );
            }



            if($request->semester_duration==''){
                $semester = array(
                    'semester_name' => $request->semester_name,
                    'semester_code' => $request->semester_code,
                    'semester_duration' => '',
                    'semester_description' => $request->semester_description,
             );
            }


            if($request->semester_description==''){
                $semester = array(
                    'semester_name' => $request->semester_name,
                    'semester_code' => $request->semester_code,
                    'semester_duration' => $request->semester_duration,
                    'semester_description' => '',
             );
            }
        }


        if (empty($semester)) {

            Flash::error('Please fill up at least one input field between (Semester name,Semester code,Semester duration)!');

            return redirect(route('semesters.index'));

        }else{
            Semester::findOrfail($request->semester_id)->update($semester);

            Flash::success('Semester updated successfully.');

            return redirect(route('semesters.index'));
        }

        
    }

    /**
     * Remove the specified Semester from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_semester= Semester::findOrfail($request->semester_id);
        $delete_semester->delete();

        Flash::success('Semester deleted successfully.');

        return redirect(route('semesters.index'));
    }
}
