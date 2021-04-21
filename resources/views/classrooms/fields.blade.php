
<!-- Add Modal -->
<div class="modal fade right" id="add-classroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW CLASSROOM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classrooms.store')}}" method ="post">
          @csrf
          <div class="form-group">
            {!! Form::label('classroom_name', 'Classroom Name') !!}
            {!! Form::text('classroom_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Classroom Name','required' => 'required']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('classroom_code', 'Classroom Code') !!}
              {!! Form::text('classroom_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Classroom Code','required' => 'required']) !!}
          </div>
           

          <div class="form-group">
              {!! Form::label('classroom_description', 'Classroom Description') !!}
              {!! Form::textarea('classroom_description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 5,'placeholder' => 'Write Classroom Description','required' => 'required']) !!}
          </div>

          <div class="form-group">
            <div class="form-check">
                {!! Form::hidden('classroom_status', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('classroom_status', '1', null, ['class' => 'form-check-input']) !!}
                {!! Form::label('classroom_status', 'Status', ['class' => 'form-check-label']) !!}
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Classroom</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-classroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classrooms.show','classroom_id')}}" method ="get">
          @csrf
          <input type="hidden" name="classroom_id" id="classroom_id">
          <div class="form-group col-md-12">
              {!! Form::label('classroom_name', 'Classroom Name') !!}
              {!! Form::text('classroom_name', null, ['class' => 'form-control','id' => 'classroom_name','name' => 'classroom_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('classroom_code', 'Classroom Code') !!}
              {!! Form::text('classroom_code', null, ['class' => 'form-control','id' => 'classroom_code','name' => 'classroom_code','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('classroom_description', 'Classroom Description') !!}
              {!! Form::textarea('classroom_description', null, ['class' => 'form-control','id' => 'classroom_description','name' => 'classroom_description','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('classroom_status', 'Status') !!}
              {!! Form::text('classroom_status', null, ['class' => 'form-control','id' => 'classroom_status','name' => 'classroom_status','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Classroom Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Classroom Updated') !!}
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
<div class="modal fade top" id="delete-classroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('classrooms.destroy','classroom_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="classroom_id" id="classroom_id">
          <p class="text-center" width="50px">Are you sure you want to delete this classroom?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Classroom</button>
          </div>
        </form>
      </div>
    </div>
  </div>
