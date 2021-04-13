<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="shifts-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Shift</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($shifts)){?>
            @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift['shift'] }}</td>
                <td width="120">
                    <form action="{{ route('shifts.destroy', '$shift->shift_id') }}" method="post">
                    <div class='btn-group'>
                        <!------------------  Here is the shift view button --------------------->
                        <a data-target="#view-shift" data-toggle="modal" data-shift_id="{{$shift['shift_id']}}" data-shift="{{$shift['shift']}}"  data-created_shift="{{$shift['created_at']}}" data-updated_shift="{{$shift['updated_at']}}" class='btn btn-warning'>
                            <i class="far fa-eye"> View</i>
                        </a>
                        <!----------------------------------------------------------------------->
                        <a data-shift_id="{{$shift['shift_id']}}" data-shift="{{$shift['shift']}}" data-toggle="modal" data-target="#edit-shift" class="btn btn-info">
                            <i class="far fa-edit"> Edit</i>
                        </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a data-shift_id="{{$shift['shift_id']}}" data-toggle="modal" data-target="#delete-shift" class="btn btn-danger">
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



<?php if(!empty($shifts)){?>
  <!-- Edit Shift Modal -->
<div class="modal fade left" id="edit-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('shifts.update','shift_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="shift_id" id="shift_id">

          <!-- Shift Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('shift', 'Shift Name') !!}
              {!! Form::text('shift', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Shift Name','id' => 'shift']) !!}
          </div>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update Shift</button>
     </div>
       </form>
      </div>
    </div>
  </div>
<?php } ?>
