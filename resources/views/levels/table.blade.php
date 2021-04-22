<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="levels-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Level</th>
                <th style="font-weight: bold;">Course Name</th>
                <th style="font-weight: bold;">Level Description</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($levels)){?>
          @foreach($levels as $level)
            <tr>
                <td>{{ $level['level'] }}</td>
                <td>{{ $level['course_name'] }}</td>
                <td>{{ $level['level_description'] }}</td>
                <td width="120">
                    <form action="{{ route('levels.destroy', '$level->level_id') }}" method="post">
                        <div class='btn-group'>
                            <!------------------  Here is the batch view button --------------------->
                            <a data-target="#view-level" data-toggle="modal" data-level_id="{{$level['level_id']}}" data-level="{{$level['level']}}" data-level_description="{{$level['level_description']}}" data-course_name="{{$level['course_name']}}" data-created_level="{{$level['created_at']}}" data-updated_level="{{$level['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <!----------------------------------------------------------------------->
                            <a data-level_id="{{$level['level_id']}}" data-level="{{$level['level']}}" data-level_description="{{$level['level_description']}}" data-course_id="{{$level['courseId']}}" data-course_name="{{$level['course_name']}}" data-toggle="modal" data-target="#edit-level" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-level_id="{{$level['level_id']}}" data-toggle="modal" data-target="#delete-level" class="btn btn-danger">
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

<?php if(!empty($levels)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('levels.update','level_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="level_id" id="level_id">
          <div class="form-group col-md-12">
              {!! Form::label('level', 'Level Name') !!}
              {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Level Name','id' => 'level']) !!}
          </div>
          <div class="form-group col-md-12">
              <label>Select Course Name</label>
              <select name="course_id" id="course_id" class="form-control">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                <option value="{{$course['id']}}" <?php if($level['courseId']==$course['id']){ echo "selected"; }?> >{{$course['course_name']}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('level_description', 'Level Description') !!}
              {!! Form::textarea('level_description', null, ['class' => 'form-control','placeholder' => 'Write Level Description','id' => 'level_description','cols' => 2, 'rows' => 2]) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Level</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
