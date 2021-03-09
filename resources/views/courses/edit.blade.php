@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Course</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($course, ['route' => ['courses.update', $course->course_id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('course_name', 'Course Name:') !!}
                        {!! Form::text('course_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>

                    <!-- Course Code Field -->
                    <div class="form-group col-md-6">
                        {!! Form::label('course_code', 'Course Code:') !!}
                        {!! Form::text('course_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                     

                    <!-- Description Field -->
                    <div class="form-group col-md-6">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 3]) !!}
                    </div>

                    <!-- Status Field -->
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                            {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
                            {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update Course', ['class' => 'btn btn-info']) !!}
                <a href="{{ route('courses.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
