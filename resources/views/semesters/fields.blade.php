
<!-- Add Modal -->
<div class="modal fade right" id="add-semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW SEMESTER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('semesters.store')}}" method ="post">
          @csrf
          <div class="form-group">
            {!! Form::label('semester_name', 'Semester Name') !!}
            {!! Form::text('semester_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Semester Name','required' => 'required']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('semester_code', 'Semester Code') !!}
              {!! Form::text('semester_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Semester Code','required' => 'required']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('semester_duration', 'Semester Duration') !!}
              {!! Form::text('semester_duration', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Semester Duration','required' => 'required']) !!}
          </div>
           

          <div class="form-group">
              {!! Form::label('semester_description', 'Semester Description') !!}
              {!! Form::textarea('semester_description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 2,'placeholder' => 'Write Semester Description']) !!}
          </div>

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Semester</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('semesters.show','semester_id')}}" method ="get">
          @csrf
          <input type="hidden" name="semester_id" id="semester_id">
          <div class="form-group col-md-12">
              {!! Form::label('semester_name', 'Semester Name') !!}
              {!! Form::text('semester_name', null, ['class' => 'form-control','id' => 'semester_name','name' => 'semester_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('semester_code', 'Semester Code') !!}
              {!! Form::text('semester_code', null, ['class' => 'form-control','id' => 'semester_code','name' => 'semester_code','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('semester_duration', 'Semester Duration') !!}
              {!! Form::text('semester_duration', null, ['class' => 'form-control','id' => 'semester_duration','name' => 'semester_duration','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('semester_description', 'Semester Description') !!}
              {!! Form::textarea('semester_description', null, ['class' => 'form-control','id' => 'semester_description','name' => 'semester_description','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Semester Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Semester Updated') !!}
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
<div class="modal fade top" id="delete-semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('semesters.destroy','semester_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="semester_id" id="semester_id">
          <p class="text-center" width="50px">Are you sure you want to delete this semester?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Semester</button>
          </div>
        </form>
      </div>
    </div>
  </div>
