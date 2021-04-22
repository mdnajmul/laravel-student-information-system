<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Faculty Name</th>
                <th style="font-weight: bold;">Department Name</th>
                <th style="font-weight: bold;">Department Code</th>
                <th style="font-weight: bold;">Department Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($departments)){?>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department['faculty_name'] }}</td>
                <td>{{ $department['department_name'] }}</td>
                <td>{{ $department['department_code'] }}</td>
                <td>
                    @if($department['department_status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('departments.destroy', '$department->department_id') }}" method="post">
                        <div class='btn-group'>
                            <!----------------------------  Department View Button ---------------------------------->
                            <a data-target="#view-department" data-toggle="modal" data-department_id="{{$department['department_id']}}" data-department_name="{{$department['department_name']}}" data-department_code="{{$department['department_code']}}" data-department_description="{{$department['department_description']}}" data-department_status="{{$department['department_status']}}" data-faculty_name="{{$department['faculty_name']}}" data-created_department="{{$department['created_at']}}" data-updated_department="{{$department['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <!------------------------------------------------------------------------------------->

                            <!----------------------------  Department Edit Button ---------------------------------->
                            <a data-department_id="{{$department['department_id']}}" data-department_name="{{$department['department_name']}}" data-department_code="{{$department['department_code']}}" data-department_description="{{$department['department_description']}}" data-department_status="{{$department['department_status']}}" data-faculty_id="{{$department['faculty_id']}}" data-toggle="modal" data-target="#edit-department" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <!------------------------------------------------------------------------------------->

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <!----------------------------  Faculty Delete Button ---------------------------------->
                            <a data-department_id="{{$department['department_id']}}" data-toggle="modal" data-target="#delete-department" class="btn btn-danger">
                                <i class="far fa-trash-alt"> Delete</i>
                            </a>
                            <!------------------------------------------------------------------------------------->
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


<?php if(!empty($departments)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('departments.update','department_id')}}" method ="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="department_id" id="department_id">
            <!-- Department Name Field -->
            <div class="form-group col-md-12">
                {!! Form::label('department_name', 'Department Name') !!}
                {!! Form::text('department_name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Department Name','id' => 'department_name']) !!}
            </div>

            <!-- Department Code Field -->
            <div class="form-group col-md-12">
                {!! Form::label('department_code', 'Department Code') !!}
                {!! Form::text('department_code', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Department Code','id' => 'department_code']) !!}
            </div>

            <!-- Faculty Name Field -->
            <div class="form-group col-md-12">
          	  <label>Select Faculty</label>
          	  <select name="faculty_id" id="faculty_id" class="form-control">
          	  	<option value="0" selected="true" disabled="true">Choose Faculty</option>
          	  	@foreach($faculties as $key => $faculty)
          	  	<option value="{{$faculty['faculty_id']}}" <?php if($department['faculty_id']==$faculty['faculty_id']){ echo "selected"; }?>>{{$faculty['faculty_name']}}</option>
          	  	@endforeach
          	  </select>
            </div>

            <!-- Department Description Field -->
            <div class="form-group col-md-12">
              {!! Form::label('department_description', 'Department Description') !!}
              {!! Form::textarea('department_description', null, ['class' => 'form-control','placeholder' => 'Write Details About Department','id' => 'department_description','cols' => 2, 'rows' => 2]) !!}
            </div>

            <!-- Department Status Field -->
            <div class="form-group col-sm-6">
                <div class="form-check">
                    {!! Form::hidden('department_status', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('department_status', '1', null, ['class' => 'form-check-input','id' => 'department_status']) !!}
                    {!! Form::label('department_status', 'Department Status', ['class' => 'form-check-label']) !!}
                </div>
            </div>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Department</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
