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
    <div class="col-lg-12">

        <!-------------------------------------- ADD MODAL START HERE ----------------------------->
        <div class="modal fade right" id="add-teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="far fa-file-alt"></i> NEW TEACHER FORM</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal body start here-->
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><b><i class="fa fa-user"></i>  Teacher No: </b></h3>
                        <b class="pull-right"></b>
                        <br>
                    </div>
                    <div class="panel-body" style="padding-bottom: 4px;">

                        <!-- <input type="hidden" name="teacher_id" id="teacher_id" required> -->
                        <input type="hidden" name="dateregistered" id="dateregistered" value="{{date('Y-m-d')}}">

                        <div class="row">
                                    <!-------------------- First Name -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="first_name" id="first_name" class="form-control text-capitalize" 
                                            placeholder="Enter First Name Here">
                                        </div>
                                    </div>

                                    <!-------------------- Last Name -------------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="last_name" id="last_name" class="form-control text-capitalize" 
                                            placeholder="Enter Last Name Here">
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
                                                                <input type="radio" name="gender" id="gender" value="0" >
                                                                Male
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="1" >
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
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar teacherdob"></i></span>
                                            </div>
                                            <input type="date" name="dob" id="dob" class="form-control text-capitalize" aria-label="dob" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                                <!-------------------- Passport -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="passport" id="passport" class="form-control text-capitalize" 
                                        placeholder="Enter Passport Number Here">
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

                                <!-------------------- Nationality -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nationality" id="nationality" class="form-control text-capitalize" 
                                        placeholder="Enter Nationality Here">
                                    </div>
                                </div>

                                <!-------------------- Phone -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control text-capitalize" 
                                        placeholder="Enter Phone Number Here">
                                    </div>
                                </div>

                                <!-------------------- Email -------------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control text-capitalize" 
                                        placeholder="Enter Email Address Here">
                                    </div>
                                </div>


                                <!-------------------- Address -------------------->
                                <div class="panel-heading" style="margin-top: -20px;">
                                    <b><i class="fa fa-map-marker"></i> Address</b>
                                </div>
                                <br>
                                <div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea placeholder="Enter Address Here" name="address" id="address" 
                                                cols="40" rows="2" class="form-control text-capitalize"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-------------------- Image -------------------->
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group form-group-login">
                                        <table style="margin: 0 auto;">
                                            <thead>
                                                <tr class="info">

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="image">
                                                        {!! Html::image('img/profile.jpg', null, ['class'=>'teacher-image', 'id'=>'showImage']) !!}
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

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            {!! Form::submit('Register Teacher', ['class' => 'btn btn-success']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
  </div>
</div>
                                
<!------------------------ END ADD MODAL  -------------------------->