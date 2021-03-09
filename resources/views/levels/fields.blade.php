<!-- Modal -->
<!-- <div class="modal fade left" id="level-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify madal-ms modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-layer-group" aria-hidden="true"> Levels</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
		
		<div class="form-group">
		    {!! Form::label('level', 'Level:') !!}
		    {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
		</div>

		
		<div class="form-group">
		    {!! Form::label('course_id', 'Course Id:') !!}
		    {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
		</div>

		
		<div class="form-group">
		    {!! Form::label('level_description', 'Level Description:') !!}
		    {!! Form::textarea('level_description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 3]) !!}
		</div>
	  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Save Level', ['class' => 'btn btn-success']) !!}
      </div>
    </div>
  </div>
</div> -->


<!-- Add Modal -->
<div class="modal fade right" id="add-level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD LEVEL INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('levels.store')}}" method ="post">
          @csrf
          <div class="form-group col-md-12">
              {!! Form::label('level', 'Level Name') !!}
              {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Level Name','required' => 'required']) !!}
          </div>
          <div class="form-group col-md-12">
          	  <label>Select Course Name</label>
          	  <select name="course_id" class="form-control" required="required">
          	  	<option value="">Select Course</option>
          	  	@foreach($courses as $key => $course)
          	  	<option value="{{$course['id']}}">{{$course['course_name']}}</option>
          	  	@endforeach
          	  </select>
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('level_description', 'Level Description') !!}
              {!! Form::textarea('level_description', null, ['class' => 'form-control','placeholder' => 'Enter Level Name','required' => 'required','cols' => 2, 'rows' => 2]) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Level</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('levels.show','level_id')}}" method ="get">
          @csrf
          <input type="hidden" name="level_id" id="level_id">
          <div class="form-group col-md-12">
              {!! Form::label('level', 'Level Name') !!}
              {!! Form::text('level', null, ['class' => 'form-control','id' => 'level','name' => 'level','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
          	  {!! Form::label('course_name', 'Course Name') !!}
              {!! Form::text('course_id', null, ['class' => 'form-control','id' => 'course_name','name' => 'course_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('level_description', 'Level Description') !!}
              {!! Form::textarea('level_description', null, ['class' => 'form-control','id' => 'level_description','name' => 'level_description','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Level Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Level Updated') !!}
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
<div class="modal fade top" id="delete-level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('levels.destroy','level_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="level_id" id="level_id">
          <p class="text-center" width="50px">Are you sure you want to delete this level?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Level</button>
          </div>
        </form>
      </div>
    </div>
  </div>
