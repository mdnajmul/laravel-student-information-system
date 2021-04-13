<!-- Add Shift Modal -->
<div class="modal fade right" id="add-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD SHFT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('shifts.store')}}" method ="post">
          @csrf
          <!-- Shift Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('shift', 'Shift Name') !!}
              {!! Form::text('shift', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter shift name']) !!}
          </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success">Save Shift</button>
      </div>
        </form>
    </div>
  </div>
</div>




<!-- View Shift Modal -->
<div class="modal fade bottom" id="view-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('shifts.show','shift_id')}}" method ="get">
          @csrf
          <input type="hidden" name="shift_id" id="shift_id">

          <!-- Shift Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('shift', 'Shift Name') !!}
              {!! Form::text('shift', null, ['class' => 'form-control','id' => 'shift','name' => 'shift','readonly' => 'readonly']) !!}
          </div>

          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Shift Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>

          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Shift Updated') !!}
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



<!-- Delete Shift -->
<div class="modal fade top" id="delete-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('shifts.destroy','shift_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="shift_id" id="shift_id">
          <p class="text-center" width="50px">Are you sure you want to delete this shift?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Level</button>
          </div>
        </form>
      </div>
    </div>
  </div>