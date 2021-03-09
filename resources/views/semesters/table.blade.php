<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="semesters-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Semester Name</th>
                <th style="font-weight: bold;">Semester Code</th>
                <th style="font-weight: bold;">Semester Duration</th>
                <th style="font-weight: bold;">Semester Description</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($semesters)){?>
          @foreach($semesters as $semester)
            <tr>
                <td><?php if($semester['semester_name']==''){ echo 'N/A'; } else { echo $semester['semester_name']; } ?></td>
                <td><?php if($semester['semester_code']==''){ echo 'N/A'; } else { echo $semester['semester_code']; } ?></td>
                <td><?php if($semester['semester_duration']==''){ echo 'N/A'; } else { echo $semester['semester_duration']; } ?></td>
                <td><?php if($semester['semester_description']==''){ echo 'N/A'; } else { echo $semester['semester_description']; } ?></td>
                <td width="120">
                    <form action="{{ route('semesters.destroy', '$semester->semester_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-semester" data-toggle="modal" data-semester_id="{{$semester['semester_id']}}" data-semester_name="{{$semester['semester_name']}}" data-semester_code="{{$semester['semester_code']}}" data-semester_duration="{{$semester['semester_duration']}}" data-semester_description="{{$semester['semester_description']}}" data-created_semester="{{$semester['created_at']}}" data-updated_semester="{{$semester['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-semester_id="{{$semester['semester_id']}}" data-semester_name="{{$semester['semester_name']}}" data-semester_code="{{$semester['semester_code']}}" data-semester_duration="{{$semester['semester_duration']}}" data-semester_description="{{$semester['semester_description']}}" data-toggle="modal" data-target="#edit-semester" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-semester_id="{{$semester['semester_id']}}" data-toggle="modal" data-target="#delete-semester" class="btn btn-danger">
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


<?php if(!empty($semesters)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('semesters.update','semester_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="semester_id" id="semester_id">
          <div class="form-group">
              {!! Form::label('semester_name', 'Semester Name') !!}
              {!! Form::text('semester_name', null, ['class' => 'form-control','maxlength' => 255,'id' => 'semester_name']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('semester_code', 'Semester Code') !!}
              {!! Form::text('semester_code', null, ['class' => 'form-control','maxlength' => 255,'id' => 'semester_code']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('semester_duration', 'Semester Duration') !!}
              {!! Form::text('semester_duration', null, ['class' => 'form-control','maxlength' => 255,'id' => 'semester_duration']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('semester_description', 'Semester Description') !!}
              {!! Form::textarea('semester_description', null, ['class' => 'form-control','id' => 'semester_description','cols' => 2, 'rows' => 2]) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Semester</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>