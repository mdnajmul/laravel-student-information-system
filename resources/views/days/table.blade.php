<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="days-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Name</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($days)){?>
          @foreach($days as $day)
            <tr>
                <td><?php if($day['name']==''){ echo 'N/A'; } else { echo $day['name']; } ?></td>
                <td width="120">
                    <form action="{{ route('days.destroy', '$day->day_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-day" data-toggle="modal" data-day_id="{{$day['day_id']}}" data-day_name="{{$day['name']}}" data-created_day="{{$day['created_at']}}" data-updated_day="{{$day['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-day_id="{{$day['day_id']}}" data-day_name="{{$day['name']}}" data-toggle="modal" data-target="#edit-day" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-day_id="{{$day['day_id']}}" data-toggle="modal" data-target="#delete-day" class="btn btn-danger">
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


<?php if(!empty($days)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('days.update','day_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="day_id" id="day_id">
          <div class="form-group">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Day Name','id' => 'name']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Day</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
