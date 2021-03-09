<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="classes-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Class Name</th>
                <th style="font-weight: bold;">Class Code</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($classes)){?>
          @foreach($classes as $class)
            <tr>
                <td><?php if($class['class_name']==''){ echo 'N/A'; } else { echo $class['class_name']; } ?></td>
                <td><?php if($class['class_code']==''){ echo 'N/A'; } else { echo $class['class_code']; } ?></td>
                <td width="120">
                    <form action="{{ route('classes.destroy', '$class->class_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-class" data-toggle="modal" data-class_id="{{$class['class_id']}}" data-class_name="{{$class['class_name']}}" data-class_code="{{$class['class_code']}}" data-created_class="{{$class['created_at']}}" data-updated_class="{{$class['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-class_id="{{$class['class_id']}}" data-class_name="{{$class['class_name']}}" data-class_code="{{$class['class_code']}}" data-toggle="modal" data-target="#edit-class" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-class_id="{{$class['class_id']}}" data-toggle="modal" data-target="#delete-class" class="btn btn-danger">
                                <i class="far fa-trash-alt"> Delete</i>
                            </a>
                        </div>
                    </form>
                </td>
            </tr>
          @endforeach
        <?php } else {?>
            <tr>
                <td colspan="5" style="text-align: center;">No Data Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php if(!empty($classes)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classes.update','class_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="class_id" id="class_id">
          <div class="form-group">
              {!! Form::label('class_name', 'Class Name') !!}
              {!! Form::text('class_name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Class Name','id' => 'class_name']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('class_code', 'Class Code') !!}
              {!! Form::text('class_code', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Class Code','id' => 'class_code']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Class</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
