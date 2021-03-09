<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Repositories\LevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Course;
use Flash;
use Response;
use Redirect;

class LevelController extends AppBaseController
{
    /** @var  LevelRepository */
    private $levelRepository;

    public function __construct(LevelRepository $levelRepo)
    {
        $this->levelRepository = $levelRepo;
    }

    /**
     * Display a listing of the Level.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['courses']=Course::where('status','1')->get()->toArray();
        $data['levels']=Level::
        select(['levels.*','courses.course_name','courses.id as courseId'])
        ->orderBy('level_id','desc')
        ->join('courses','levels.course_id','=','courses.id')
        ->get()->toArray();

        return view('levels.index',$data);
    }

    /**
     * Show the form for creating a new Level.
     *
     * @return Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created Level in storage.
     *
     * @param CreateLevelRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $levels = array(
            'level' => $request->level,
            'course_id' => $request->course_id,
            'level_description' => $request->level_description,
        );

        Level::create($levels);

        Flash::success('Level saved successfully.');

        return redirect(route('levels.index'));
    }

    /**
     * Display the specified Level.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $level = $this->levelRepository->find($id);

        // if (empty($level)) {
        //     Flash::error('Level not found');

        //     return redirect(route('levels.index'));
        // }

        // return view('levels.show')->with('level', $level);
    }

    /**
     * Show the form for editing the specified Level.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $level = $this->levelRepository->find($id);

        // if (empty($level)) {
        //     Flash::error('Level not found');

        //     return redirect(route('levels.index'));
        // }

        // return view('levels.edit')->with('level', $level);
    }

    /**
     * Update the specified Level in storage.
     *
     * @param int $id
     * @param UpdateLevelRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $levels = array(
            'level' => $request->level,
            'course_id' => $request->course_id,
            'level_description' => $request->level_description,
        );
        Level::findOrfail($request->level_id)->update($levels);
        Flash::success('Level updated successfully.');

        return redirect(route('levels.index'));
    }

    /**
     * Remove the specified Level from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_level= Level::findOrfail($request->level_id);
        $delete_level->delete();

        Flash::success('Level deleted successfully.');

        return redirect(route('levels.index'));
    }
}
