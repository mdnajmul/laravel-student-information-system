<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Repositories\FacultyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Flash;
use Response;

class FacultyController extends AppBaseController
{
    /** @var  FacultyRepository */
    private $facultyRepository;

    public function __construct(FacultyRepository $facultyRepo)
    {
        $this->facultyRepository = $facultyRepo;
    }

    /**
     * Display a listing of the Faculty.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['faculties'] = Faculty::orderBy('faculty_id','DESC')->get()->toArray();

        return view('faculties.index',$data);
    }

    /**
     * Show the form for creating a new Faculty.
     *
     * @return Response
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created Faculty in storage.
     *
     * @param CreateFacultyRequest $request
     *
     * @return Response
     */
    public function store(CreateFacultyRequest $request)
    {
        $faculty = new Faculty; //Faculty is the modal of the Faculty where we have all the fillable attributes.

        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_code = $request->faculty_code;
        if(!empty($request->faculty_description)){
            $faculty->faculty_description = $request->faculty_description;
        }
        $faculty->faculty_status = $request->faculty_status;

        $faculty->save();

        Flash::success('Faculty saved successfully.');

        return redirect(route('faculties.index'));
    }

    /**
     * Display the specified Faculty.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $faculty = $this->facultyRepository->find($id);

    //     if (empty($faculty)) {
    //         Flash::error('Faculty not found');

    //         return redirect(route('faculties.index'));
    //     }

    //     return view('faculties.show')->with('faculty', $faculty);
    // }

    /**
     * Show the form for editing the specified Faculty.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $faculty = $this->facultyRepository->find($id);

    //     if (empty($faculty)) {
    //         Flash::error('Faculty not found');

    //         return redirect(route('faculties.index'));
    //     }

    //     return view('faculties.edit')->with('faculty', $faculty);
    // }

    /**
     * Update the specified Faculty in storage.
     *
     * @param int $id
     * @param UpdateFacultyRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->faculty_name=='' && $request->faculty_code=='' && $request->faculty_description=='')
        {
             $faculty = array();
        }else if($request->faculty_name!='' && $request->faculty_code!='' && $request->faculty_description!='')
        {
            $faculty = array(
                    'faculty_name' => $request->faculty_name,
                    'faculty_code' => $request->faculty_code,
                    'faculty_description' => $request->faculty_description,
                    'faculty_status' => $request->faculty_status,
             );
        }
        else
        {
             if($request->faculty_name==''){
                $faculty = array(
                    'faculty_name' => '',
                    'faculty_code' => $request->faculty_code,
                    'faculty_description' => $request->faculty_description,
                    'faculty_status' => $request->faculty_status,
             );
            }


            if($request->faculty_code==''){
                $faculty = array(
                    'faculty_name' => $request->faculty_name,
                    'faculty_code' => '',
                    'faculty_description' => $request->faculty_description,
                    'faculty_status' => $request->faculty_status,
             );
            }



            if($request->faculty_description==''){
                $faculty = array(
                    'faculty_name' => $request->faculty_name,
                    'faculty_code' => $request->faculty_code,
                    'faculty_description' => '',
                    'faculty_status' => $request->faculty_status,
             );
            }
        }


        if (empty($faculty)) {

            Flash::error('Please fill up at least one input field!');

            return redirect(route('faculties.index'));

        }else{
            Faculty::findOrfail($request->faculty_id)->update($faculty);

            Flash::success('Faculty updated successfully.');

            return redirect(route('faculties.index'));
        }
    }

    /**
     * Remove the specified Faculty from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_faculty= Faculty::findOrfail($request->faculty_id);
        $delete_faculty->delete();

        Flash::success('Faculty deleted successfully.');

        return redirect(route('faculties.index'));
    }
}
