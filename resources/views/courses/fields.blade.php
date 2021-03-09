<!-- 
<div class="modal fade left" id="course-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify madal-ms modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-registered" aria-hidden="true"> Courses</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <div class="form-group">
            {!! Form::label('course_name', 'Course Name:') !!}
            {!! Form::text('course_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('course_code', 'Course Code:') !!}
            {!! Form::text('course_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
        </div>
         

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 5]) !!}
        </div>

        <div class="form-group">
            <div class="form-check">
                {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Save Course', ['class' => 'btn btn-success']) !!}
      </div>
    </div>
  </div>
</div>
-->


<!-- Add Modal -->
<div class="modal fade right" id="add-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW COURSE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('courses.store')}}" method ="post">
          @csrf
          <div class="form-group">
            {!! Form::label('course_name', 'Course Name') !!}
            {!! Form::text('course_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Course Name','required' => 'required']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('course_code', 'Course Code') !!}
              {!! Form::text('course_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Course Code','required' => 'required']) !!}
          </div>
           

          <div class="form-group">
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 5,'placeholder' => 'Write Course Description','required' => 'required']) !!}
          </div>

          <div class="form-group">
            <div class="form-check">
                {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('courses.show','course_id')}}" method ="get">
          @csrf
          <input type="hidden" name="course_id" id="course_id">
          <div class="form-group col-md-12">
              {!! Form::label('course_name', 'Course Name') !!}
              {!! Form::text('course_name', null, ['class' => 'form-control','id' => 'course_name','name' => 'course_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('course_code', 'Course Code') !!}
              {!! Form::text('course_code', null, ['class' => 'form-control','id' => 'course_code','name' => 'course_code','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'description','name' => 'description','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('status', 'Status') !!}
              {!! Form::text('status', null, ['class' => 'form-control','id' => 'status','name' => 'status','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Course Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Course Updated') !!}
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
<div class="modal fade top" id="delete-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('courses.destroy','course_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="course_id" id="course_id">
          <p class="text-center" width="50px">Are you sure you want to delete this level?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
      