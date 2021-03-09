
<!-- Add Modal -->
<div class="modal fade right" id="add-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classes.store')}}" method ="post">
          @csrf
          <div class="form-group">
		      {!! Form::label('class_name', 'Class Name') !!}
		      {!! Form::text('class_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Class Name','required' => 'required']) !!}
		  </div>

          <div class="form-group">
              {!! Form::label('class_code', 'Class Code') !!}
    		  {!! Form::text('class_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Class Code','required' => 'required']) !!}
          </div>

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Class</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classes.show','class_id')}}" method ="get">
          @csrf
          <input type="hidden" name="class_id" id="class_id">
          <div class="form-group col-md-12">
              {!! Form::label('class_name', 'Class Name') !!}
              {!! Form::text('class_name', null, ['class' => 'form-control','id' => 'class_name','name' => 'class_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('class_code', 'Class Code') !!}
              {!! Form::text('class_code', null, ['class' => 'form-control','id' => 'class_code','name' => 'class_code','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Class Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Class Updated') !!}
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


<!-- Delete Level -->
<div class="modal fade top" id="delete-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('classes.destroy','class_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="class_id" id="class_id">
          <p class="text-center" width="50px">Are you sure you want to delete this class?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Class</button>
          </div>
        </form>
      </div>
    </div>
  </div>