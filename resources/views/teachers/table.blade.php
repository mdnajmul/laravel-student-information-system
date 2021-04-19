<style type="text/css">
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
            <tr>
                <th style="font-weight: bold;">Full Name</th>
                <th style="font-weight: bold;">Gender</th>
                <th style="font-weight: bold;">Email</th>
                <th style="font-weight: bold;">Phone</th>
                <th style="font-weight: bold;">Status</th>
                <th style="font-weight: bold;">Photo</th>
                <th colspan="3" style="font-weight: bold;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($teachers)){?>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher['first_name']. ' ' .$teacher['last_name'] }}</td>
                <td>{{ $teacher['gender'] }}</td>
                <td>{{ $teacher['email'] }}</td>
                <td>{{ $teacher['phone'] }}</td>
                <td>
                    @if($teacher['status'] == 0)
                    <span class="btn btn-success" style="color: white;cursor: text;">Single</span>
                    @else
                    <span class="btn btn-info" style="color: white;cursor: text;">Married</span>
                    @endif
                </td>
                <td>{{ $teacher['image'] }}</td>
                <td width="120">
                    <form action="{{ route('teachers.destroy', '$teacher->teacher_id') }}" method="post">
                    <div class='btn-group'>
                        <!----------------------------  Teacher View Button ---------------------------------->
                        <a data-target="#view-teacher" data-toggle="modal" data-teacher_id="{{$teacher['teacher_id']}}" class='btn btn-warning'>
                            <i class="far fa-eye"> View</i>
                        </a>
                        <!------------------------------------------------------------------------------------->

                        <!----------------------------  Teacher Edit Button ---------------------------------->
                        <a data-target="#edit-teacher" data-toggle="modal" data-teacher_id="{{$teacher['teacher_id']}}" class="btn btn-info">
                            <i class="far fa-edit"> Edit</i>
                        </a>
                        <!------------------------------------------------------------------------------------->
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <!----------------------------  Teacher Delete Button ---------------------------------->
                        <a data-teacher_id="{{$teacher['teacher_id']}}" data-toggle="modal" data-target="#delete-teacher" class="btn btn-danger">
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
                <td colspan="9" style="text-align: center;">No Data Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
