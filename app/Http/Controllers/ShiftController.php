<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Repositories\ShiftRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Shift;
use Flash;
use Response;
use Redirect;

class ShiftController extends AppBaseController
{
    /** @var  ShiftRepository */
    private $shiftRepository;

    public function __construct(ShiftRepository $shiftRepo)
    {
        $this->shiftRepository = $shiftRepo;
    }

    /**
     * Display a listing of the Shift.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['shifts']=Shift::get()->toArray();

        return view('shifts.index',$data);
    }

    /**
     * Show the form for creating a new Shift.
     *
     * @return Response
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created Shift in storage.
     *
     * @param CreateShiftRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $shifts = array(
            'shift' => $request->shift,
            'shift_id' => $request->shift_id,
        );

        Shift::create($shifts);

        Flash::success('Shift saved successfully.');

        return redirect(route('shifts.index'));
    }

    /**
     * Display the specified Shift.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $shift = $this->shiftRepository->find($id);

        // if (empty($shift)) {
        //     Flash::error('Shift not found');

        //     return redirect(route('shifts.index'));
        // }

        // return view('shifts.show')->with('shift', $shift);
    }

    /**
     * Show the form for editing the specified Shift.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $shift = $this->shiftRepository->find($id);

        // if (empty($shift)) {
        //     Flash::error('Shift not found');

        //     return redirect(route('shifts.index'));
        // }

        // return view('shifts.edit')->with('shift', $shift);
    }

    /**
     * Update the specified Shift in storage.
     *
     * @param int $id
     * @param UpdateShiftRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $shifts = array(
            'shift' => $request->shift,
            'shift_id' => $request->shift_id,
        );
        
        Shift::findOrfail($request->shift_id)->update($shifts);

        if (empty($shifts)) {
            Flash::error('Shift not found');

            return redirect(route('shifts.index'));
        }

        Flash::success('Shift updated successfully.');

        return redirect(route('shifts.index'));
    }

    /**
     * Remove the specified Shift from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_shift= Shift::findOrfail($request->shift_id);
        
        $delete_shift->delete();

        Flash::success('Shift deleted successfully.');

        return redirect(route('shifts.index'));
    }
}
