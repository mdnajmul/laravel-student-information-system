<?php if(!empty($classSchedulings)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Class Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classSchedulings.update','schedule_id1')}}" method ="post">
            @csrf
            @method('PUT')
            <div class="row">
                 <input type="hidden" name="schedule_id1" id="schedule_id1">
                <!-- Class Id Field -->
                <div class="form-group col-sm-6">
                    <select name="class_id1" id="class_id1" class="form-control">
                        <option value="">Select Class</option>
                        @foreach($classes as $key => $class)
                        <option value="{{$class['class_id']}}">{{$class['class_name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    <select name="course_id1" id="course_id1" class="form-control">
                        <option value="">Select Course</option>
                        @foreach($courses as $key => $course)
                        <option value="{{$course['id']}}">{{$course['course_name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Level Id Field -->
                <div class="form-group col-sm-6">
                    <select name="level_id1" id="level_id1" class="form-control">
                        <option value="">Select Level</option>
                    </select>
                </div>

                <!-- Shift Id Field -->
                <div class="form-group col-sm-6">
                    <select name="shift_id1" id="shift_id1" class="form-control">
                        <option value="">Select Shift</option>
                        @foreach($shifts as $key => $shift)
                        <option value="{{$shift['shift_id']}}">{{$shift['shift']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Classroom Id Field -->
                <div class="form-group col-sm-6">
                    <select name="classroom_id1" id="classroom_id1" class="form-control">
                        <option value="">Select Classroom</option>
                        @foreach($classrooms as $key => $classroom)
                        <option value="{{$classroom['classroom_id']}}">{{$classroom['classroom_name']}}__{{$classroom['classroom_code']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Batch Id Field -->
                <div class="form-group col-sm-6">
                    <select name="batch_id1" id="batch_id1" class="form-control">
                        <option value="">Select Batch</option>
                        @foreach($batches as $key => $batch)
                        <option value="{{$batch['batch_id']}}">{{$batch['batch']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Day Id Field -->
                <div class="form-group col-sm-6">
                    <select name="day_id1" id="day_id1" class="form-control">
                        <option value="">Select Day</option>
                        @foreach($days as $key => $day)
                        <option value="{{$day['day_id']}}">{{$day['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Time Id Field -->
                <div class="form-group col-sm-6">
                    <select name="time_id1" id="time_id1" class="form-control">
                        <option value="">Select Time</option>
                        @foreach($times as $key => $time)
                        <option value="{{$time['time_id']}}">{{$time['time']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester Id Field -->
                <div class="form-group col-sm-6">
                    <select name="semester_id1" id="semester_id1" class="form-control">
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
                        {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input','id' => 'status1']) !!}
                        {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <!-- Start Date Field -->
                <div class="form-group col-sm-6">
                    <label>Start Date</label>
                    <input name="start_date1" type="date" value="" id="start_date1" class="form-control">
                </div>

                <!-- End Date Field -->
                <div class="form-group col-sm-6">
                    <label>End Date</label>
                    <input type="date" name="end_date1" value="" id="end_date1" class="form-control">
                </div>
             </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Class Schedule</button>
            </div>
        </form>
    </div>
  </div>
</div>
<?php } ?>
