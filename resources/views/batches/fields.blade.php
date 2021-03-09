<!-- 
<div class="modal fade left" id="batch-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify madal-ms modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-badge" aria-hidden="true"> Batches</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
		
    		<div class="form-group col-md-12">
    		    {!! Form::label('batch', 'Batch Year:') !!}
    		    {!! Form::text('batch', null, ['class' => 'form-control','maxlength' => 255]) !!}
    		</div>

      </div>  

  		  <div class="modal-footer">
          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          	{!! Form::submit('Create Batch', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
  </div>
</div> -->




<!-- Add Modal -->
<div class="modal fade right" id="add-batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD BATCH YEAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('batches.store')}}" method ="post">
          @csrf
          <div class="form-group col-md-12">
              {!! Form::label('batch', 'Batch Year:') !!}
              {!! Form::text('batch', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Batch Year']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Batch</button>
          </div>
        </form>
      </div>
    </div>
  </div>



<!-- View Modal -->
<div class="modal fade bottom" id="view-batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('batches.show','batch_id')}}" method ="get">
          @csrf
          <input type="hidden" name="batch_id" id="batch_id">
          <div class="form-group col-md-12">
              {!! Form::label('batch', 'Batch Year:') !!}
              {!! Form::text('batch', null, ['class' => 'form-control','maxlength' => 255,'id' => 'batch','name' => 'batch','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Batch Created:') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Batch Updated:') !!}
              {!! Form::text('updated_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'updated_at','name' => 'updated_at', 'readonly' => 'readonly']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Edit Modal -->
<div class="modal fade left" id="edit-batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('batches.update','batch_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="batch_id" id="batch_id">
          <div class="form-group col-md-12">
              {!! Form::label('batch', 'Batch Year:') !!}
              {!! Form::text('batch', null, ['class' => 'form-control','maxlength' => 255,'id' => 'batch']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Batch</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Delete Modal -->
<div class="modal fade top" id="delete-batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('batches.destroy','batch_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="batch_id" id="batch_id">
          <p class="text-center" width="50px">Are you sure you want to delete this batch?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Batch</button>
          </div>
        </form>
      </div>
    </div>
  </div>


