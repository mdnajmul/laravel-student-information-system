<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $attendance->student_id }}</p>
</div>

<!-- Class Id Field -->
<div class="col-sm-12">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{{ $attendance->class_id }}</p>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $attendance->subject_id }}</p>
</div>

<!-- Teacher Id Field -->
<div class="col-sm-12">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{{ $attendance->teacher_id }}</p>
</div>

<!-- Attendance Status Field -->
<div class="col-sm-12">
    {!! Form::label('attendance_status', 'Attendance Status:') !!}
    <p>{{ $attendance->attendance_status }}</p>
</div>

