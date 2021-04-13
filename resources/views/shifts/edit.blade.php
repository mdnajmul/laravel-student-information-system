@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><i class="fab fa-stripe-s" aria-hidden="true"> Edit Shift</i></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($shift, ['route' => ['shifts.update', $shift->shift_id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Shift Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('shift', 'Shift Name') !!}
                        {!! Form::text('shift', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update Shift', ['class' => 'btn btn-info']) !!}
                <a href="{{ route('shifts.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
