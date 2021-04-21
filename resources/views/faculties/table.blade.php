<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="faculties-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Faculty Name</th>
                <th style="font-weight: bold;">Faculty Code</th>
                <th style="font-weight: bold;">Faculty Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($faculties)){?>
            @foreach($faculties as $faculty)
            <tr>
                <td>{{ $faculty['faculty_name'] }}</td>
                <td>{{ $faculty['faculty_code'] }}</td>
                <td>
                    @if($faculty['faculty_status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('faculties.destroy', '$faculty->faculty_id') }}" method="post">
                        <div class='btn-group'>
                            <!----------------------------  Faculty View Button ---------------------------------->
                            <a data-target="#view-faculty" data-toggle="modal" data-faculty_id="{{$faculty['faculty_id']}}" data-faculty_name="{{$faculty['faculty_name']}}" data-faculty_code="{{$faculty['faculty_code']}}" data-faculty_description="{{$faculty['faculty_description']}}" data-faculty_status="{{$faculty['faculty_status']}}" data-created_faculty="{{$faculty['created_at']}}" data-updated_faculty="{{$faculty['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <!------------------------------------------------------------------------------------->

                            <!----------------------------  Faculty Edit Button ---------------------------------->
                            <a data-faculty_id="{{$faculty['faculty_id']}}" data-faculty_name="{{$faculty['faculty_name']}}" data-faculty_code="{{$faculty['faculty_code']}}" data-faculty_description="{{$faculty['faculty_description']}}" data-faculty_status="{{$faculty['faculty_status']}}" data-toggle="modal" data-target="#edit-faculty" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <!------------------------------------------------------------------------------------->

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <!----------------------------  Faculty Delete Button ---------------------------------->
                            <a data-faculty_id="{{$faculty['faculty_id']}}" data-toggle="modal" data-target="#delete-faculty" class="btn btn-danger">
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



<?php if(!empty($faculties)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('faculties.update','faculty_id')}}" method ="post">
          @csrf
          @method('PUT')
          <div class="row">                          
              
                <input type="hidden" name="faculty_id" id="faculty_id">

                <!-- Faculty Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_name', 'Faculty Name:') !!}
                    {!! Form::text('faculty_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Faculty Name','id' => 'faculty_name']) !!}
                </div>

                <!-- Faculty Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_code', 'Faculty Code:') !!}
                    {!! Form::text('faculty_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Faculty Code','id' => 'faculty_code']) !!}
                </div>

                <!-- Faculty Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('faculty_description', 'Faculty Description:') !!}
                    {!! Form::textarea('faculty_description', null, ['class' => 'form-control','placeholder' => 'Write Faculty Description','rows' => 3,'id' => 'faculty_description']) !!}
                </div>

                <!-- Faculty Status Field -->
                <div class="form-group col-sm-6">
                    <div class="form-check">
                        {!! Form::hidden('faculty_status', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('faculty_status', '1', null, ['class' => 'form-check-input','id' => 'faculty_status']) !!}
                        {!! Form::label('faculty_status', 'Faculty Status', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Faculty</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
