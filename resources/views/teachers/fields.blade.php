<style>
    .teacher-image{
        width: 140px;
        height: 160px;
        padding-left: 1px;
        padding-right: 1px;

        background: #eee;
        margin: 0 auto;
        border-radius: 50%;
        vertical-align: middle;
    }
    .image{
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50px;
    }
    .image > input[type="file"]{
        display: none;
    }
    .btn-choose{
        padding: 3px;
        text-align: center;
        background: gray;
        border: none;
        color: black;
        border-radius: 50%;
    }
    .fieldset{
        margin-top: 5px;
    }
    .fieldset legend{
        display: block;
        width: 100%;
        padding: 0;
        font-size: 15px;
        border: 0;
        line-height: inherit;
        color: #797979;
        border-bottom: 1px solid #e5e5e5;
    }
</style>

<!-- the code start here -->
<div class="row">
    <div class="col-xl-12">

        <!-------------------------------------- ADD MODAL START HERE ----------------------------->
        <div class="modal fade right" id="add-teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
           <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="far fa-file-alt"></i> NEW TEACHER FORM</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal body start here-->
            <div class="modal-body">
                <form action="{{route('teachers.store')}}" method ="post" enctype="multipart/form-data">
                 @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><b><i class="fa fa-book"></i> Details</b></h3>
                        <b class="pull-right"></b>
                        <br>
                    </div>
                    <div class="panel-body" style="padding-bottom: 4px;">

                        <input type="hidden" value="{{Auth::id()}}" name="user_id" id="user_id" required>
                        <input type="hidden" name="registered_date" id="registered_date" value="{{date('Y-m-d')}}">

                        <div class="row">
                                    <!-------------------- First Name -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">F<i class="fas fa-signature"></i>N</span>
                                                </div>
                                                <input type="text" name="first_name" id="first_name" class="form-control text-capitalize" 
                                                placeholder="Enter First Name Here">
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------------- Last Name -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">L<i class="fas fa-signature"></i>N</span>
                                                </div>
                                                <input type="text" name="last_name" id="last_name" class="form-control text-capitalize" 
                                                placeholder="Enter Last Name Here">
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------------- Gender -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <fieldset>
                                                <legend for="gender">Gender</legend>
                                                <table style="width: 100%; margin-top: 14px;">
                                                    <tr style="border-bottom: 1px solid #ccc;">
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="Male" >
                                                                Male
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="Female" >
                                                                Female
                                                            </label> 
                                                        </td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                        </div>
                                    </div>

                                <!-------------------- DOB -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar teacherdob"></i> DOB</span>
                                            </div>
                                            <input type="date" name="dob" id="dob" class="form-control text-capitalize" aria-label="dob" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                                <!-------------------- Passport -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
                                            </div>
                                            <input type="text" name="passport" id="passport" class="form-control text-capitalize" 
                                            placeholder="Enter Passport Number Here">
                                        </div>
                                    </div>
                                </div>

                                <!-------------------- Satus -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <fieldset>
                                            <legend>Status</legend>
                                            <table style="width: 100%; margin-top: -14px;"> 
                                                <tr style="border-bottom: 1px solid #ccc;">
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="status" id="status" value="0" required checked>
                                                            Single
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input type="radio" name="status" id="status" value="1" required>
                                                            Married
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                        <div class="row">
                                            <!-------------------- Nationality -------------------->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" name="nationality" id="nationality" class="form-control text-capitalize" 
                                                        placeholder="Nationality">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-------------------- Phone -------------------->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                                                        </div>
                                                        <input type="text" name="phone" id="phone" class="form-control text-capitalize" 
                                                        placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-------------------- Email -------------------->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input type="text" name="email" id="email" class="form-control" 
                                                        placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-------------------- Address -------------------->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <textarea placeholder="Enter Address Here" name="address" id="address" 
                                                        cols="40" rows="1" class="form-control text-capitalize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------------- Image -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group form-group-login">
                                            <table style="margin-left: 481px;">
                                                <thead>
                                                    <tr class="info">

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="image">
                                                            {!! Html::image('teacher_images/profile.jpg', null, ['class'=>'teacher-image', 'id'=>'showImage']) !!}
                                                            <input type="file" name="image" id="image" accept="image/x-png,image/png,image/jpg,image/jpeg">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center; background: #ddd;">
                                                            <input type="button" name="browse_file" id="browse_file" class="form-control text-capitalize btn-choose" 
                                                            class="btn btn-outline-danger" value="Choose">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                             </div>
                         </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Register Teacher</button>
                </div>
            </form>
           </div>
        </div>
     </div>
  </div>
</div>
                                
<!------------------------ END ADD MODAL  -------------------------->


