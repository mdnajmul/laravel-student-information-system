<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="times-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Time</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($times)){?>
            @foreach($times as $time)
            <tr>
                <td>{{ $time['time'] }}</td>
                <td width="120">
                    <form action="{{ route('times.destroy', '$time->time_id') }}" method="post">
                    <div class='btn-group'>
                        <!------------------  Here is the shift view button --------------------->
                        <a data-target="#view-time" data-toggle="modal" data-time_id="{{$time['time_id']}}" data-time="{{$time['time']}}"  data-created_time="{{$time['created_at']}}" data-updated_time="{{$time['updated_at']}}" class='btn btn-warning'>
                            <i class="far fa-eye"> View</i>
                        </a>
                        <!----------------------------------------------------------------------->
                        <a data-time_id="{{$time['time_id']}}" data-time="{{$time['time']}}" data-toggle="modal" data-target="#edit-time" class="btn btn-info">
                            <i class="far fa-edit"> Edit</i>
                        </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a data-time_id="{{$time['time_id']}}" data-toggle="modal" data-target="#delete-time" class="btn btn-danger">
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


<?php if(!empty($times)){?>
  <!-- Edit Time Modal -->
<div class="modal fade left" id="edit-time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('times.update','time_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="time_id" id="time_id">

          <!-- Time Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('time', 'Time') !!}
              {!! Form::text('time', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Time Schedule','id' => 'time']) !!}
          </div>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update Time</button>
     </div>
       </form>
      </div>
    </div>
  </div>
<?php } ?>
