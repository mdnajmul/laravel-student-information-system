<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Name</th>
                <th style="font-weight: bold;">Role</th>
                <th style="font-weight: bold;">Email</th>
                <th style="font-weight: bold;">Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($users)){?>
          @foreach($users as $user)
            <tr>
                <td><?php if($user['name']==''){ echo 'N/A'; } else { echo $user['name']; } ?></td>
                <td><?php if($user['role']==''){ echo 'N/A'; } else { echo $user['role']; } ?></td>
                <td><?php if($user['email']==''){ echo 'N/A'; } else { echo $user['email']; } ?></td>
                <td>
                    @if($user['status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('users.destroy', '$user->id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-user" data-toggle="modal" data-user_id="{{$user['id']}}" data-name="{{$user['name']}}" data-role="{{$user['role']}}" data-email="{{$user['email']}}" data-email_verified_at="{{$user['email_verified_at']}}" data-password="{{$user['password']}}" data-status="{{$user['status']}}" data-remember_token="{{$user['remember_token']}}" data-created_user="{{$user['created_at']}}" data-updated_user="{{$user['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-user_id="{{$user['id']}}" data-name="{{$user['name']}}" data-role="{{$user['role']}}" data-email="{{$user['email']}}" data-status="{{$user['status']}}" data-email_verified_at="{{$user['email_verified_at']}}" data-remember_token="{{$user['remember_token']}}" data-toggle="modal" data-target="#edit-user" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-user_id="{{$user['id']}}" data-toggle="modal" data-target="#delete-user" class="btn btn-danger">
                                <i class="far fa-trash-alt"> Delete</i>
                            </a>
                        </div>
                    </form>
                </td>
            </tr>
          @endforeach
        <?php } else {?>
            <tr>
                <td colspan="7" style="text-align: center;">No Data Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php if(!empty($users)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.update','id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="id">
          <div class="form-group">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Name','id' => 'name']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('role', 'Role') !!}
              {!! Form::number('role', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Role','id' => 'role']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('email', 'Email') !!}
              {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Email','id' => 'email']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('email_verified_at', 'Email Verified At') !!}
              {!! Form::text('email_verified_at', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter email verified here...','id' => 'email_verified_at']) !!}
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
          <div class="form-group">
              {!! Form::label('remember_token', 'Remember Token') !!}
              {!! Form::text('remember_token', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter token here...','id' => 'remember_token']) !!}
          </div>
          <div class="form-group">
              <div class="form-check">
                {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input','id' => 'status']) !!}
                {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
