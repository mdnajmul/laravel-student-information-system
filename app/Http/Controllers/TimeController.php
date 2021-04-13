<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimeRequest;
use App\Http\Requests\UpdateTimeRequest;
use App\Repositories\TimeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Time;
use Flash;
use Response;

class TimeController extends AppBaseController
{
    /** @var  TimeRepository */
    private $timeRepository;

    public function __construct(TimeRepository $timeRepo)
    {
        $this->timeRepository = $timeRepo;
    }

    /**
     * Display a listing of the Time.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['times']=Time::get()->toArray();

        return view('times.index',$data);
    }

    /**
     * Show the form for creating a new Time.
     *
     * @return Response
     */
    public function create()
    {
        return view('times.create');
    }

    /**
     * Store a newly created Time in storage.
     *
     * @param CreateTimeRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $times = array(
            'time' => $request->time,
            'time_id' => $request->time_id,
        );

        Time::create($times);

        Flash::success('Time saved successfully.');

        return redirect(route('times.index'));
    }

    /**
     * Display the specified Time.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $time = $this->timeRepository->find($id);

        // if (empty($time)) {
        //     Flash::error('Time not found');

        //     return redirect(route('times.index'));
        // }

        // return view('times.show')->with('time', $time);
    }

    /**
     * Show the form for editing the specified Time.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $time = $this->timeRepository->find($id);

        // if (empty($time)) {
        //     Flash::error('Time not found');

        //     return redirect(route('times.index'));
        // }

        // return view('times.edit')->with('time', $time);
    }

    /**
     * Update the specified Time in storage.
     *
     * @param int $id
     * @param UpdateTimeRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $times = array(
            'time' => $request->time,
            'time_id' => $request->time_id,
        );
        
        Time::findOrfail($request->time_id)->update($times);

        if (empty($times)) {
            Flash::error('Time not found');

            return redirect(route('times.index'));
        }

        Flash::success('Time updated successfully.');

        return redirect(route('times.index'));
    }

    /**
     * Remove the specified Time from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_time= Time::findOrfail($request->time_id);
        
        $delete_time->delete();

        Flash::success('Time deleted successfully.');

        return redirect(route('times.index'));
    }
}
