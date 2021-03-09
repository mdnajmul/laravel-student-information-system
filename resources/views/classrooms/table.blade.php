<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="classrooms-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Classroom Name</th>
                <th style="font-weight: bold;">Classroom Code</th>
                <th style="font-weight: bold;">Classroom Description</th>
                <th style="font-weight: bold;">Classroom Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($classrooms)){?>
          @foreach($classrooms as $classroom)
            <tr>
                <td><?php if($classroom['classroom_name']==''){ echo 'N/A'; } else { echo $classroom['classroom_name']; } ?></td>
                <td><?php if($classroom['classroom_code']==''){ echo 'N/A'; } else { echo $classroom['classroom_code']; } ?></td>
                <td><?php if($classroom['classroom_description']==''){ echo 'N/A'; } else { echo $classroom['classroom_description']; } ?></td>
                <td>
                    @if($classroom['classroom_status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('classrooms.destroy', '$classroom->classroom_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-classroom" data-toggle="modal" data-classroom_id="{{$classroom['classroom_id']}}" data-classroom_name="{{$classroom['classroom_name']}}" data-classroom_code="{{$classroom['classroom_code']}}" data-classroom_description="{{$classroom['classroom_description']}}" data-classroom_status="{{$classroom['classroom_status']}}" data-created_classroom="{{$classroom['created_at']}}" data-updated_classroom="{{$classroom['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-classroom_id="{{$classroom['classroom_id']}}" data-classroom_name="{{$classroom['classroom_name']}}" data-classroom_code="{{$classroom['classroom_code']}}" data-classroom_description="{{$classroom['classroom_description']}}" data-classroom_status="{{$classroom['classroom_status']}}" data-toggle="modal" data-target="#edit-classroom" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-classroom_id="{{$classroom['classroom_id']}}" data-toggle="modal" data-target="#delete-classroom" class="btn btn-danger">
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


<?php if(!empty($classrooms)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-classroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classrooms.update','classroom_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="classroom_id" id="classroom_id">
          <div class="form-group">
              {!! Form::label('classroom_name', 'Classroom Name') !!}
              {!! Form::text('classroom_name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Classroom Name','id' => 'classroom_name']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('classroom_code', 'Classroom Code') !!}
              {!! Form::text('classroom_code', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Classroom Code','id' => 'classroom_code']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('classroom_description', 'Classroom Description') !!}
              {!! Form::textarea('classroom_description', null, ['class' => 'form-control','placeholder' => 'Write Classroom Description','id' => 'classroom_description','cols' => 2, 'rows' => 2]) !!}
          </div>
          <div class="form-group">
              <div class="form-check">
                {!! Form::hidden('classroom_status', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('classroom_status', '1', null, ['class' => 'form-check-input','id' => 'classroom_status']) !!}
                {!! Form::label('classroom_status', 'Status', ['class' => 'form-check-label']) !!}
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Classroom</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
