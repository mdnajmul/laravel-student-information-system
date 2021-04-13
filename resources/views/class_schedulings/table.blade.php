<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="classSchedulings-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Class</th>
                <th style="font-weight: bold;">Shift</th>
                <th style="font-weight: bold;">Classroom</th>
                <th style="font-weight: bold;">Batch</th>
                <th style="font-weight: bold;">Day</th>
                <th style="font-weight: bold;">Time</th>
                <th style="font-weight: bold;">Semester</th>
                <th style="font-weight: bold;">Status</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($classSchedulings)){?>
            @foreach($classSchedulings as $classScheduling)
            <tr>
                <td>{{ $classScheduling['class_name'] }}</td>
                <td>{{ $classScheduling['shift'] }}</td>
                <td>{{ $classScheduling['classroom_name'] }}</td>
                <td>{{ $classScheduling['batch'] }}</td>
                <td>{{ $classScheduling['name'] }}</td>
                <td>{{ $classScheduling['time'] }}</td>
                <td>{{ $classScheduling['semester_name'] }}</td>
                <td>
                    @if($classScheduling['schedule_status'] == 1)
                    <span class="btn btn-success" style="color: white;cursor: text;">Active</span>
                    @else
                    <span class="btn btn-danger" style="color: white;cursor: text;">Deactive</span>
                    @endif
                </td>
                <td width="120">
                    <form action="{{ route('classSchedulings.destroy', '$classScheduling->schedule_id') }}" method="post">
                    <div class='btn-group'>
                        <!------------------  Here is the shift view button --------------------->
                        <a data-target="#view-shedule" data-toggle="modal" data-schedule_id="{{$classScheduling['schedule_id']}}" data-course_name="{{$classScheduling['course_name']}}" data-class_name="{{$classScheduling['class_name']}}" data-level="{{$classScheduling['level']}}" data-shift="{{$classScheduling['shift']}}" data-classroom_name="{{$classScheduling['classroom_name']}}" data-batch="{{$classScheduling['batch']}}" data-day_name="{{$classScheduling['name']}}" data-time="{{$classScheduling['time']}}" data-semester_name="{{$classScheduling['semester_name']}}" data-start_date="{{$classScheduling['start_date']}}" data-end_date="{{$classScheduling['end_date']}}" data-status="{{$classScheduling['schedule_status']}}" data-created_schedule="{{$classScheduling['s_created_at']}}" data-updated_schedule="{{$classScheduling['s_updated_at']}}" class='btn btn-warning'>
                            <i class="far fa-eye"> View</i>
                        </a>
                        <!----------------------------------------------------------------------->
                        <a data-schedule_id="{{$classScheduling['schedule_id']}}" id="Edit" data-toggle="modal" data-target="#edit-schedule" class="btn btn-info">
                            <i class="far fa-edit"> Edit</i>
                        </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a data-schedule_id="{{$classScheduling['schedule_id']}}" data-toggle="modal" data-target="#delete-schedule" class="btn btn-danger">
                            <i class="far fa-trash-alt"> Delete</i>
                        </a>
                    </div>
                    </form>
                </td>
            </tr>
            @endforeach
        <?php } else {?>
            <tr>
                <td colspan="11" style="text-align: center;">No Data Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
