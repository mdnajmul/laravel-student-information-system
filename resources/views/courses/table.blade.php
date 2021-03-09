<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="courses-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Course Name</th>
                <th style="font-weight: bold;">Course Code</th>
                <th style="font-weight: bold;">Description</th>
                <th style="font-weight: bold;">Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($courses)){?>
          @foreach($courses as $course)
            <tr>
                <td><?php if($course['course_name']==''){ echo 'N/A'; } else { echo $course['course_name']; } ?></td>
                <td><?php if($course['course_code']==''){ echo 'N/A'; } else { echo $course['course_code']; } ?></td>
                <td><?php if($course['description']==''){ echo 'N/A'; } else { echo $course['description']; } ?></td>
                <td>
                    @if($course['status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('courses.destroy', '$course->id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-course" data-toggle="modal" data-course_id="{{$course['id']}}" data-course_name="{{$course['course_name']}}" data-course_code="{{$course['course_code']}}" data-description="{{$course['description']}}" data-status="{{$course['status']}}" data-created_course="{{$course['created_at']}}" data-updated_course="{{$course['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-course_id="{{$course['id']}}" data-course_name="{{$course['course_name']}}" data-course_code="{{$course['course_code']}}" data-description="{{$course['description']}}" data-status="{{$course['status']}}" data-toggle="modal" data-target="#edit-course" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-course_id="{{$course['id']}}" data-toggle="modal" data-target="#delete-course" class="btn btn-danger">
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


<?php if(!empty($courses)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('courses.update','course_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="course_id" id="course_id">
          <div class="form-group">
              {!! Form::label('course_name', 'Course Name') !!}
              {!! Form::text('course_name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Course Name','id' => 'course_name']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('course_code', 'Course Code') !!}
              {!! Form::text('course_code', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Course Code','id' => 'course_code']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Write Course Description','id' => 'description','cols' => 2, 'rows' => 2]) !!}
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
            <button type="submit" class="btn btn-info">Update Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
