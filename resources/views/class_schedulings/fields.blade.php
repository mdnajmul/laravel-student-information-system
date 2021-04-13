<!-- Add Modal -->
<div class="modal fade right" id="add-class-shedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CLASS SCHEDULE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classSchedulings.store')}}" method ="post">
          @csrf

            <div class="row">

                <!-- Class Id Field -->
                <div class="form-group col-sm-6">
                    <select name="class_id" id="class_id" class="form-control" required="required">
                        <option value="">Select Class</option>
                        @foreach($classes as $key => $class)
                        <option value="{{$class['class_id']}}">{{$class['class_name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    <select name="course_id" id="course_id" class="form-control" required="required">
                        <option value="">Select Course</option>
                        @foreach($courses as $key => $course)
                        <option value="{{$course['id']}}">{{$course['course_name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Level Id Field -->
                <div class="form-group col-sm-6">
                    <select name="level_id" id="level_id" class="form-control" required="required">
                        <option value="">Select Level</option>
                    </select>
                </div>

                <!-- Shift Id Field -->
                <div class="form-group col-sm-6">
                    <select name="shift_id" id="shift_id" class="form-control" required="required">
                        <option value="">Select Shift</option>
                        @foreach($shifts as $key => $shift)
                        <option value="{{$shift['shift_id']}}">{{$shift['shift']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Classroom Id Field -->
                <div class="form-group col-sm-6">
                    <select name="classroom_id" id="classroom_id" class="form-control" required="required">
                        <option value="">Select Classroom</option>
                        @foreach($classrooms as $key => $classroom)
                        <option value="{{$classroom['classroom_id']}}">{{$classroom['classroom_name']}}__{{$classroom['classroom_code']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Batch Id Field -->
                <div class="form-group col-sm-6">
                    <select name="batch_id" id="batch_id" class="form-control" required="required">
                        <option value="">Select Batch</option>
                        @foreach($batches as $key => $batch)
                        <option value="{{$batch['batch_id']}}">{{$batch['batch']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Day Id Field -->
                <div class="form-group col-sm-6">
                    <select name="day_id" id="day_id" class="form-control" required="required">
                        <option value="">Select Day</option>
                        @foreach($days as $key => $day)
                        <option value="{{$day['day_id']}}">{{$day['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Time Id Field -->
                <div class="form-group col-sm-6">
                    <select name="time_id" id="time_id" class="form-control" required="required">
                        <option value="">Select Time</option>
                        @foreach($times as $key => $time)
                        <option value="{{$time['time_id']}}">{{$time['time']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester Id Field -->
                <div class="form-group col-sm-6">
                    <select name="semester_id" id="semester_id" class="form-control" required="required">
                        <option value="">Select Semester</option>
                        @foreach($semesters as $key => $semester)
                        <option value="{{$semester['semester_id']}}">{{$semester['semester_name']}}__{{$semester['semester_code']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Field -->
                <div class="form-group col-sm-6">
                    <div class="form-check">
                        {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <!-- Start Date Field -->
                <div class="form-group col-sm-6">
                    <label>Start Date</label>
                    <input name="start_date" type="date" id="start_date" class="form-control" required="required">
                </div>

                <!-- End Date Field -->
                <div class="form-group col-sm-6">
                    <label>End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Class Schedule</button>
        </div>
    </form>
    </div>
  </div>
</div>

 <!-- View Modal -->
 <div class="modal fade bottom" id="view-shedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classSchedulings.show','schedule_id')}}" method ="get">
          @csrf
          <input type="hidden" name="schedule_id" id="schedule_id">
          <div class="row">
            <!-- Class Id Field -->
            <div class="form-group col-sm-4">
              {!! Form::label('class_id', 'Class Name') !!}
              {!! Form::text('class_id', null, ['class' => 'form-control','id' => 'class_id','name' => 'class_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Course Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('course_id', 'Course Name') !!}
                {!! Form::text('course_id', null, ['class' => 'form-control','id' => 'course_id','name' => 'course_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Level Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('level_id', 'Level') !!}
                {!! Form::text('level_id', null, ['class' => 'form-control','id' => 'level_id','name' => 'level_id','readonly' => 'readonly']) !!}
            </div>
          </div>

          <div class="row">
            <!-- Shift Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('shift_id', 'Shift') !!}
                {!! Form::text('shift_id', null, ['class' => 'form-control','id' => 'shift_id','name' => 'shift_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Classroom Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('classroom_id', 'Classroom') !!}
                {!! Form::text('classroom_id', null, ['class' => 'form-control','id' => 'classroom_id','name' => 'classroom_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Batch Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('batch_id', 'Batch') !!}
                {!! Form::text('batch_id', null, ['class' => 'form-control','id' => 'batch_id','name' => 'batch_id','readonly' => 'readonly']) !!}
            </div>
          </div>

          <div class="row">
            <!-- Day Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('day_id', 'Day') !!}
                {!! Form::text('day_id', null, ['class' => 'form-control','id' => 'day_id','name' => 'day_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Time Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('time_id', 'Time') !!}
                {!! Form::text('time_id', null, ['class' => 'form-control','id' => 'time_id','name' => 'time_id','readonly' => 'readonly']) !!}
            </div>

            <!-- Semester Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('semester_id', 'Semester') !!}
                {!! Form::text('semester_id', null, ['class' => 'form-control','id' => 'semester_id','name' => 'semester_id','readonly' => 'readonly']) !!}
            </div>
          </div>

          <div class="row">
            <!-- Start Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('start_date', 'Starting Date') !!}
                {!! Form::text('start_date', null, ['class' => 'form-control','id' => 'start_date','name' => 'start_date','readonly' => 'readonly']) !!}
            </div>

            <!-- End Date Field -->
            <div class="form-group col-sm-4">
            {!! Form::label('end_date', 'Ending Date') !!}
                {!! Form::text('end_date', null, ['class' => 'form-control','id' => 'end_date','name' => 'end_date','readonly' => 'readonly']) !!}
            </div>

            <!-- Status Field -->
            <div class="form-group col-sm-4">
              {!! Form::label('status', 'Status') !!}
              {!! Form::text('status', null, ['class' => 'form-control','id' => 'status','name' => 'status','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-6">
              {!! Form::label('created_at', 'Schedule Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
            </div>

            <div class="form-group col-sm-6">
              {!! Form::label('updated_at', 'Schedule Updated') !!}
              {!! Form::text('updated_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'updated_at','name' => 'updated_at', 'readonly' => 'readonly']) !!}
            </div>
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
<div class="modal fade top" id="delete-schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('classSchedulings.destroy','schedule_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="schedule_id" id="schedule_id">
          <p class="text-center" width="50px">Are you sure you want to delete this class schedule?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Schedule</button>
          </div>
        </form>
      </div>
    </div>
  </div>


