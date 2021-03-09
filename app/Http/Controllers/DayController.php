<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDayRequest;
use App\Http\Requests\UpdateDayRequest;
use App\Repositories\DayRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Day;
use Flash;
use Response;
use Redirect;

class DayController extends AppBaseController
{
    /** @var  DayRepository */
    private $dayRepository;

    public function __construct(DayRepository $dayRepo)
    {
        $this->dayRepository = $dayRepo;
    }

    /**
     * Display a listing of the Day.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['days'] = Day::orderBy('day_id','DESC')->get()->toArray();

        return view('days.index',$data);
    }

    /**
     * Show the form for creating a new Day.
     *
     * @return Response
     */
    public function create()
    {
        return view('days.create');
    }

    /**
     * Store a newly created Day in storage.
     *
     * @param CreateDayRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $days = array(
            'name' => $request->name,
        );

        Day::create($days);

        Flash::success('Day saved successfully.');

        return redirect(route('days.index'));
    }

    /**
     * Display the specified Day.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $day = $this->dayRepository->find($id);

        // if (empty($day)) {
        //     Flash::error('Day not found');

        //     return redirect(route('days.index'));
        // }

        // return view('days.show')->with('day', $day);
    }

    /**
     * Show the form for editing the specified Day.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $day = $this->dayRepository->find($id);

        // if (empty($day)) {
        //     Flash::error('Day not found');

        //     return redirect(route('days.index'));
        // }

        // return view('days.edit')->with('day', $day);
    }

    /**
     * Update the specified Day in storage.
     *
     * @param int $id
     * @param UpdateDayRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->name=='')
        {
             $days = array();
        }else
        {
            $days = array(
                    'name' => $request->name,
             );
        }


        if (empty($days)) {

            Flash::error('Please fill up day name input field!');

            return redirect(route('days.index'));

        }else{
            Day::findOrfail($request->day_id)->update($days);

            Flash::success('Day updated successfully.');

            return redirect(route('days.index'));
        }

    }

    /**
     * Remove the specified Day from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_day= Day::findOrfail($request->day_id);
        $delete_day->delete();

        Flash::success('Day deleted successfully.');

        return redirect(route('days.index'));
    }
}
