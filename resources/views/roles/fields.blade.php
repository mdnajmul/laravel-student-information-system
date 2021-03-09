

<!-- Add Modal -->
<div class="modal fade right" id="add-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ADD NEW ROLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('roles.store')}}" method ="post">
          @csrf
          <div class="form-group">
          {!! Form::label('name', 'Role Name') !!}
          {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Role Name','required' => 'required']) !!}
      </div>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Role</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- View Modal -->
<div class="modal fade bottom" id="view-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('roles.show','role_id')}}" method ="get">
          @csrf
          <div class="form-group col-md-12">
              {!! Form::label('role_id', 'Role ID') !!}
              {!! Form::text('role_id', null, ['class' => 'form-control','id' => 'role_id','name' => 'role_id','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('name', 'Role Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control','id' => 'name','name' => 'name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Role Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Role Updated') !!}
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
<div class="modal fade top" id="delete-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('roles.destroy','role_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="role_id" id="role_id">
          <p class="text-center" width="50px">Are you sure you want to delete this Role?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Role</button>
          </div>
        </form>
      </div>
    </div>
  </div>