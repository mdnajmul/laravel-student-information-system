<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Repositories\BatchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Batch;
use Flash;
use Response;
use Redirect;

class BatchController extends AppBaseController
{
    /** @var  BatchRepository */
    private $batchRepository;

    public function __construct(BatchRepository $batchRepo)
    {
        $this->batchRepository = $batchRepo;
    }

    /**
     * Display a listing of the Batch.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['batches'] = Batch::orderBy('batch_id','DESC')->get()->toArray();

        return view('batches.index',$data);
    }

    /**
     * Show the form for creating a new Batch.
     *
     * @return Response
     */
    public function create()
    {
        return view('batches.create');
    }

    /**
     * Store a newly created Batch in storage.
     *
     * @param CreateBatchRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $bathes = array(
            'batch' => $request->batch,
        );

        Batch::create($bathes);
        Flash::success('Batch saved successfully.');
        return redirect(route('batches.index'));
    }


    /**
     * Display the specified Batch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $batch = $this->batchRepository->find($id);

        // if (empty($batch)) {
        //     Flash::error('Batch not found');

        //     return redirect(route('batches.index'));
        // }

        // return view('batches.show')->with('batch', $batch);
    }

    /**
     * Show the form for editing the specified Batch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $batch = $this->batchRepository->find($id);

        // if (empty($batch)) {
        //     Flash::error('Batch not found');

        //     return redirect(route('batches.index'));
        // }

        // return view('batches.edit')->with('batch', $batch);
    }



    /**
     * Update the specified Batch in storage.
     *
     * @param int $id
     * @param UpdateBatchRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $bathes = array(
            'batch' => $request->batch,
        );

        Batch::findOrfail($request->batch_id)->update($bathes);
        Flash::success('Batch updated successfully.');
        return redirect()->route('batches.index')->with('success','Batch Updated Successfully!');
    }


    /**
     * Remove the specified Batch from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        
        $delete_batch = Batch::findOrfail($request->batch_id);
        $delete_batch->delete();

        Flash::success('Batch deleted successfully.');

        return redirect(route('batches.index'));
    }

}
