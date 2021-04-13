@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><i class="fas fa-clock" aria-hidden="true"> Edit Time</i></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($time, ['route' => ['times.update', $time->time_id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Time Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('time', 'Time') !!}
                        {!! Form::text('time', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update Time', ['class' => 'btn btn-info']) !!}
                <a href="{{ route('times.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
