<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="academics-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Academic Year</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($academics)){?>
          @foreach($academics as $academic)
            <tr>
                <td><?php if($academic['academic_year']==''){ echo 'N/A'; } else { echo $academic['academic_year']; } ?></td>
                <td width="120">
                    <form action="{{ route('academics.destroy', '$academic->academic_id') }}" method="post">
                        <div class='btn-group'>
                            <a data-target="#view-academic" data-toggle="modal" data-academic_id="{{$academic['academic_id']}}" data-academic_year="{{$academic['academic_year']}}" data-created_academic="{{$academic['created_at']}}" data-updated_academic="{{$academic['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <a data-academic_id="{{$academic['academic_id']}}" data-academic_year="{{$academic['academic_year']}}" data-toggle="modal" data-target="#edit-academic" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-academic_id="{{$academic['academic_id']}}" data-toggle="modal" data-target="#delete-academic" class="btn btn-danger">
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


<?php if(!empty($academics)){?>
  <!-- Edit Modal -->
<div class="modal fade left" id="edit-academic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('academics.update','academic_id')}}" method ="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="academic_id" id="academic_id">
          <div class="form-group">
              {!! Form::label('academic_year', 'Academic Year') !!}
              {!! Form::text('academic_year', null, ['class' => 'form-control','maxlength' => 255,'id' => 'academic_year']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update Academic</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
