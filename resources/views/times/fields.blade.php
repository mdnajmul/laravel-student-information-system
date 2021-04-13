<!-- Add Time Modal -->
<div class="modal fade right" id="add-time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD TIME INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('times.store')}}" method ="post">
          @csrf
            <!-- Time Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('time', 'Time') !!}
                {!! Form::text('time', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter time schedule']) !!}
            </div>

     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Time</button>
    </div>
        </form>
  </div>
 </div>
</div>


<!-- View Time Modal -->
<div class="modal fade bottom" id="view-time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('times.show','time_id')}}" method ="get">
          @csrf
          <input type="hidden" name="time_id" id="time_id">

          <!-- Time Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('time', 'Time') !!}
              {!! Form::text('time', null, ['class' => 'form-control','id' => 'time','name' => 'time','readonly' => 'readonly']) !!}
          </div>

          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>

          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Updated') !!}
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



<!-- Delete Time -->
<div class="modal fade top" id="delete-time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('times.destroy','time_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="time_id" id="time_id">
          <p class="text-center" width="50px">Are you sure you want to delete this time?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Level</button>
          </div>
        </form>
      </div>
    </div>
  </div>