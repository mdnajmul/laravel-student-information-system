<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Repositories\ClassesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Classes;
use Flash;
use Response;
use Redirect;

class ClassesController extends AppBaseController
{
    /** @var  ClassesRepository */
    private $classesRepository;

    public function __construct(ClassesRepository $classesRepo)
    {
        $this->classesRepository = $classesRepo;
    }

    /**
     * Display a listing of the Classes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['classes'] = Classes::orderBy('class_id','DESC')->get()->toArray();

        return view('classes.index',$data);
    }

    /**
     * Show the form for creating a new Classes.
     *
     * @return Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created Classes in storage.
     *
     * @param CreateClassesRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $classes = array(
            'class_name' => $request->class_name,
            'class_code' => $request->class_code,
        );

        Classes::create($classes);

        Flash::success('Classes saved successfully.');

        return redirect(route('classes.index'));
    }

    /**
     * Display the specified Classes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $classes = $this->classesRepository->find($id);

        // if (empty($classes)) {
        //     Flash::error('Classes not found');

        //     return redirect(route('classes.index'));
        // }

        // return view('classes.show')->with('classes', $classes);
    }

    /**
     * Show the form for editing the specified Classes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $classes = $this->classesRepository->find($id);

        // if (empty($classes)) {
        //     Flash::error('Classes not found');

        //     return redirect(route('classes.index'));
        // }

        // return view('classes.edit')->with('classes', $classes);
    }

    /**
     * Update the specified Classes in storage.
     *
     * @param int $id
     * @param UpdateClassesRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {

        if($request->class_name=='' && $request->class_code=='')
        {
             $classes = array();
        }else if($request->class_name!='' && $request->class_code!='')
        {
            $classes = array(
                    'class_name' => $request->class_name,
                    'class_code' => $request->class_code,
             );
        }
        else
        {
             if($request->class_name==''){
                $classes = array(
                    'class_name' => '',
                    'class_code' => $request->class_code,
             );
            }


            if($request->class_code==''){
                $classes = array(
                    'class_name' => $request->class_name,
                    'class_code' => '',
             );
            }

        }

        if (empty($classes)) {

            Flash::error('Please fill up at least one input field!');

            return redirect(route('classes.index'));

        }else{
            Classes::findOrfail($request->class_id)->update($classes);

            Flash::success('Class updated successfully.');

            return redirect(route('classes.index'));
        }
    }

    /**
     * Remove the specified Classes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_class= Classes::findOrfail($request->class_id);
        $delete_class->delete();

        Flash::success('Classes deleted successfully.');

        return redirect(route('classes.index'));
    }
}
