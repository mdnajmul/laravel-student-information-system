<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Name</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($roles)){?>
          @foreach($roles as $role)
            <tr>
                <td><?php if($role['name']==''){ echo 'N/A'; } else { echo $role['name']; } ?></td>
                <td width="120">
                    <form action="{{ route('roles.destroy', '$role->role_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-role" data-toggle="modal" data-role_id="{{$role['role_id']}}" data-name="{{$role['name']}}" data-created_role="{{$role['created_at']}}" data-updated_role="{{$role['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-role_id="{{$role['role_id']}}" data-name="{{$role['name']}}" data-toggle="modal" data-target="#edit-role" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-role_id="{{$role['role_id']}}" data-toggle="modal" data-target="#delete-role" class="btn btn-danger">
                                <i class="far fa-trash-alt"> Delete</i>
                            </a>
                        </div>
                    </form>
                </td>
            </tr>
          @endforeach
        <?php } else {?>
            <tr>
                <td colspan="4" style="text-align: center;">No Data Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php if(!empty($roles)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('roles.update','role_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="role_id" id="role_id">
          <div class="form-group">
              {!! Form::label('name', 'Role Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'id' => 'name']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Role</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
