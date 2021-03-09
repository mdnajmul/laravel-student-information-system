<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcademicRequest;
use App\Http\Requests\UpdateAcademicRequest;
use App\Repositories\AcademicRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Academic;
use Flash;
use Response;
use Redirect;

class AcademicController extends AppBaseController
{
    /** @var  AcademicRepository */
    private $academicRepository;

    public function __construct(AcademicRepository $academicRepo)
    {
        $this->academicRepository = $academicRepo;
    }

    /**
     * Display a listing of the Academic.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['academics'] = Academic::orderBy('academic_id','DESC')->get()->toArray();

        return view('academics.index',$data);
    }

    /**
     * Show the form for creating a new Academic.
     *
     * @return Response
     */
    public function create()
    {
        return view('academics.create');
    }

    /**
     * Store a newly created Academic in storage.
     *
     * @param CreateAcademicRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $academic = array(
            'academic_year' => $request->academic_year,
        );

        Academic::create($academic);

        Flash::success('Academic saved successfully.');

        return redirect(route('academics.index'));
    }

    /**
     * Display the specified Academic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $academic = $this->academicRepository->find($id);

        // if (empty($academic)) {
        //     Flash::error('Academic not found');

        //     return redirect(route('academics.index'));
        // }

        // return view('academics.show')->with('academic', $academic);
    }

    /**
     * Show the form for editing the specified Academic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $academic = $this->academicRepository->find($id);

        // if (empty($academic)) {
        //     Flash::error('Academic not found');

        //     return redirect(route('academics.index'));
        // }

        // return view('academics.edit')->with('academic', $academic);
    }

    /**
     * Update the specified Academic in storage.
     *
     * @param int $id
     * @param UpdateAcademicRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->academic_year=='')
        {
             $academic = array();
        }else
        {
            $academic = array(
                    'academic_year' => $request->academic_year,
             );
        }


        if (empty($academic)) {

            Flash::error('Please fill up academic year input field!');

            return redirect(route('academics.index'));

        }else{
            Academic::findOrfail($request->academic_id)->update($academic);

            Flash::success('Academic updated successfully.');

            return redirect(route('academics.index'));
        }

    }

    /**
     * Remove the specified Academic from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_academic= Academic::findOrfail($request->academic_id);
        $delete_academic->delete();

        Flash::success('Academic deleted successfully.');

        return redirect(route('academics.index'));
    }
}
