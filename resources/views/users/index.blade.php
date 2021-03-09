@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-users" aria-hidden="true"> Users</i></h1>
                </div>
                <div class="col-sm-6">
                    <a data-toggle="modal" data-target="#add-user" class="btn btn-success float-right">
                       <i class="fa fa-plus-circle"> Add New User</i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('users.table')

                {!! Form::open(['route' => 'users.store']) !!}

                     @include('users.fields')

                {!! Form::close() !!}

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

