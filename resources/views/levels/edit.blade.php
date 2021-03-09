@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><i class="fas fa-layer-group" aria-hidden="true"> Edit Level</i></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($level, ['route' => ['levels.update', $level->level_id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('level', 'Level:') !!}
                        {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>

                    <!-- Course Id Field -->
                    <div class="form-group col-md-6">
                        {!! Form::label('course_id', 'Course Id:') !!}
                        {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Level Description Field -->
                    <div class="form-group col-md-12">
                        {!! Form::label('level_description', 'Level Description:') !!}
                        {!! Form::textarea('level_description', null, ['class' => 'form-control', 'cols' => 2, 'rows' => 3]) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update Level', ['class' => 'btn btn-info']) !!}
                <a href="{{ route('levels.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
