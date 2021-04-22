<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Repositories\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use Flash;
use Response;

class DepartmentController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['faculties']=Faculty::where('faculty_status','1')->get()->toArray();
        $data['departments']=Department::
        select(['departments.*','faculties.faculty_name','faculties.faculty_id'])
        ->orderBy('department_id','desc')
        ->join('faculties','departments.faculty_id','=','faculties.faculty_id')
        ->get()->toArray();

        return view('departments.index',$data);
    }

    /**
     * Show the form for creating a new Department.
     *
     * @return Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param CreateDepartmentRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $department = $this->departmentRepository->find($id);

    //     if (empty($department)) {
    //         Flash::error('Department not found');

    //         return redirect(route('departments.index'));
    //     }

    //     return view('departments.show')->with('department', $department);
    // }

    /**
     * Show the form for editing the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $department = $this->departmentRepository->find($id);

    //     if (empty($department)) {
    //         Flash::error('Department not found');

    //         return redirect(route('departments.index'));
    //     }

    //     return view('departments.edit')->with('department', $department);
    // }

    /**
     * Update the specified Department in storage.
     *
     * @param int $id
     * @param UpdateDepartmentRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->department_name=='' && $request->department_code=='' && $request->faculty_id==0 && $request->department_description=='')
        {
             $department = array();
        }else if($request->department_name!='' && $request->department_code!='' && $request->faculty_id!=0 && $request->department_description!='')
        {
            $department = array(
                    'department_name' => $request->department_name,
                    'department_code' => $request->department_code,
                    'faculty_id' => $request->faculty_id,
                    'department_description' => $request->department_description,
                    'department_status' => $request->department_status,
             );
        }
        else
        {
             if($request->department_name==''){
                $department = array(
                    'department_code' => $request->department_code,
                    'faculty_id' => $request->faculty_id,
                    'department_description' => $request->department_description,
                    'department_status' => $request->department_status,
             );
            }


            if($request->department_code==''){
                $department = array(
                    'department_name' => $request->department_name,
                    'faculty_id' => $request->faculty_id,
                    'department_description' => $request->department_description,
                    'department_status' => $request->department_status,
             );
            }



            if($request->faculty_id==0){
                $department = array(
                    'department_name' => $request->department_name,
                    'department_code' => $request->department_code,
                    'department_description' => $request->department_description,
                    'department_status' => $request->department_status,
             );
            }


            if($request->department_description==''){
                $department = array(
                    'department_name' => $request->department_name,
                    'department_code' => $request->department_code,
                    'faculty_id' => $request->faculty_id,
                    'department_status' => $request->department_status,
             );
            }
        }

        if (empty($department)) {

            Flash::error('Please fill up at least one input field!');

            return redirect(route('departments.index'));

        }else{
            Department::findOrfail($request->department_id)->update($department);

            Flash::success('Department updated successfully.');

            return redirect(route('departments.index'));
        }
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_department= Department::findOrfail($request->department_id);
        $delete_department->delete();

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
