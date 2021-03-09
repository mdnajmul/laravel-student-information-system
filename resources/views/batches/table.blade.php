<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="batches-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Batch</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($batches)){?>
          @foreach($batches as $batch)
            <tr>
                <td>{{ $batch['batch'] }}</td>
                <td width="120">
                    <form action="{{ route('batches.destroy', '$batch->batch_id') }}" method="post">
                        <div class='btn-group'>
                            <!------------------  Here is the batch view button --------------------->
                            <a data-target="#view-batch" data-toggle="modal" data-batch_id="{{$batch['batch_id']}}" data-bath_year="{{$batch['batch']}}" data-created_at="{{$batch['created_at']}}" data-updated_at="{{$batch['updated_at']}}" class='btn btn-warning'>
                                <i class="far fa-eye"> View</i>
                            </a>
                            <!----------------------------------------------------------------------->
                            <a data-batch_id="{{$batch['batch_id']}}" data-batch="{{$batch['batch']}}" data-toggle="modal" data-target="#edit-batch" class="btn btn-info">
                                <i class="far fa-edit"> Edit</i>
                            </a>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <a data-batch_id="{{$batch['batch_id']}}" data-toggle="modal" data-target="#delete-batch" class="btn btn-danger">
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

