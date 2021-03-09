
<!-- Add Modal -->
<div class="modal fade right" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.store')}}" method ="post">
          @csrf
          <div class="row">
              <div class="col-sm-6">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Name','required' => 'required']) !!}
              </div>
           
              <div class="col-sm-6">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Email','required' => 'required']) !!}
              </div>
          </div>

          <div class="row">
              <div class="col-sm-6">
                  {!! Form::label('role', 'Role') !!}
                  {!! Form::number('role', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Role','required' => 'required']) !!}
              </div>

              <div class="col-sm-6">
                {!! Form::label('password', 'Password') !!}
                {!! Form::text('password', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Password','required' => 'required']) !!}
              </div>
          </div>

          <div class="row">
              <div class="col-sm-6">
                {!! Form::label('email_verified_at', 'Email Verified At') !!}
                {!! Form::text('email_verified_at', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter email verified here...']) !!}
              </div>
              @push('page_scripts')
                <script type="text/javascript">
                    $('#email_verified_at').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
              @endpush

              <div class="col-sm-6">
                {!! Form::label('remember_token', 'Remember Token') !!}
                {!! Form::text('remember_token', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter token here...']) !!}
              </div>
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
            <button type="submit" class="btn btn-success">Save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.show','id')}}" method ="get">
          @csrf
          <input type="hidden" name="id" id="id">
          <div class="form-group col-md-12">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control','id' => 'name','name' => 'name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('email', 'Email') !!}
              {!! Form::text('email', null, ['class' => 'form-control','id' => 'email','name' => 'email','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('role', 'Role') !!}
              {!! Form::text('role', null, ['class' => 'form-control','id' => 'role','name' => 'role','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('password', 'Password') !!}
              {!! Form::text('password', null, ['class' => 'form-control','id' => 'password','name' => 'password','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('status', 'Status') !!}
              {!! Form::text('status', null, ['class' => 'form-control','id' => 'status','name' => 'status','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('email_verified_at', 'Email Verified At') !!}
              {!! Form::text('email_verified_at', null, ['class' => 'form-control','id' => 'email_verified_at','name' => 'email_verified_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('remember_token', 'Token') !!}
              {!! Form::text('remember_token', null, ['class' => 'form-control','id' => 'remember_token','name' => 'remember_token','readonly' => 'readonly']) !!}
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
<div class="modal fade top" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('users.destroy','id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" id="id">
          <p class="text-center" width="50px">Are you sure you want to delete this user?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
