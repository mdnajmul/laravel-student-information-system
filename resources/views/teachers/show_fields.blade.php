<style>
    input[readonly], textarea{
        background: white !important;
        border: none;
    }
    span{
        padding-left: 20px;
    }
</style>

@extends('layouts.app')

@section('content')

    <section class="content-header" style="border-bottom: 3px solid #4187A9;">
        <h1>
            Teacher
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                  <section class="content-header">
                      <h1>
                        User Profile
                      </h1>
                  </section>
                  <section class="content">
    
                      <div class="row">
                        <div class="col-md-3">

                          <!-- Profile Image -->
                          <div class="box box-primary">
                            <div class="box-body box-profile">
                              <img class="profile-user-img img-responsive img-circle" src="{{ asset('teacher_images/' .$teacher->image ) }}" 
                              width="50" height="50" style="border-radius:50%; width:150px; height:150px; vartical-align:middle;margin-left:55px;" alt="Teacher profile 	picture">

                              <h3 class="profile-username text-center">{!! $teacher->first_name !!} {!! $teacher->last_name !!}</h3>

                              <p class="text-muted text-center">Teacher</p>

                              <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                  <b>Followers</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Following</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Friends</b> <a class="pull-right">13,287</a>
                                </li>
                              </ul>

                              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->

                          <!-- About Me Box -->
                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                              <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                              </p>

                              <hr>

                              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                              <p class="text-muted">{!! $teacher->address !!}</p>

                              <hr>

                              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                              <p>
                                <span class="label label-danger">UI Design</span>
                                <span class="label label-success">Coding</span>
                                <span class="label label-info">Javascript</span>
                                <span class="label label-warning">PHP</span>
                                <span class="label label-primary">Node.js</span>
                              </p>

                              {{-- <hr> --}}

                              {{-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                          <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#activity" data-toggle="tab">Teacher TimeTable</a></li>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <li><a href="#settings" data-toggle="tab">Full Details</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                  <div class="user-block">
                                    <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                                        <span class="username">
                                          <a href="#">Jonathan Burke Jr.</a>
                                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                        </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                  </div>
                                  <!-- /.user-block -->
                                  <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                  </p>
                                  <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a></li>
                                  </ul>

                                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                </div>
                                <!-- /.post -->

                                <!-- Post -->
                                <div class="post clearfix">
                                  <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                        <span class="username">
                                          <a href="#">Sarah Ross</a>
                                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                        </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                  </div>
                                  <!-- /.user-block -->
                                  <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                  </p>

                                  <form class="form-horizontal">
                                    <div class="form-group margin-bottom-none">
                                      <div class="col-sm-9">
                                        <input class="form-control input-sm" placeholder="Response">
                                      </div>
                                      <div class="col-sm-3">
                                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.post -->

                                <!-- Post -->
                                <div class="post">
                                  <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                        <span class="username">
                                          <a href="#">Adam Jones</a>
                                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                        </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                  </div>
                                  <!-- /.user-block -->
                                  <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                          <br>
                                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                          <br>
                                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                      <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->

                                  <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a></li>
                                  </ul>

                                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                </div>
                                <!-- /.post -->
                              </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                  <div class="form-group">
                                    <label for="inputName" class="col-sm-3 control-label">Full Name</label>

                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" id="inputName" 
                                    value="{{$teacher->first_name}} {{$teacher->last_name}}" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" id="inputEmail" 
                                      value="{{$teacher->email}}" readonly>
                                    </div>
                                  </div>
                              
                                  <div class="form-group col-sm-12">
                                        <div class="row">
                                    <label for="inputName" class="col-sm-2 control-label">Gender</label>

                                    <div class="col-sm-4">
                                        @if($teacher->gender == 0)
                                      <span> Male </span>
                                        @else 
                                        <span> Female </span>
                                        @endif
                                    </div>
                                  
                                        <label for="inputName" class="col-sm-2 control-label">Status</label>
                    
                                        <div class="col-sm-4">
                                          <p> @if($teacher->status =0)
                                                Single 
                                                @else Married
                                              @endif
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputName" class="col-sm-3 control-label">Date of Birth</label>
                    
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputName" 
                                          value="{{date("d-m-Y", strtotime ($teacher->dob))}}" readonly>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Phone No.</label>
                        
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputName" 
                                              value="+88{{$teacher->phone}}" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                                <label for="inputName" class="col-sm-3 control-label">Passport No.</label>
                            
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="inputName" 
                                                  value="{{$teacher->passport}}" readonly>
                                                </div>
                                              </div>
                                  <div class="form-group">
                                    <label for="inputExperience" class="col-sm-3 control-label" >Address</label>

                                    <div class="col-sm-9">
                                      <textarea class="form-control" id="inputExperience" readonly>{{$teacher->address}}</textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputSkills" class="col-sm-3 control-label">Nationality</label>

                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="inputSkills"  
                                      value="{{$teacher->nationality}}" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                        <label for="inputSkills" class="col-sm-3 control-label">Register Date</label>
                    
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputSkills" 
                                          value="{{date("d-m-Y", strtotime ($teacher->registered_date))}}" readonly>
                                        </div>
                                      </div>
                                </form>
                              </div>
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div>
                          <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                    </section>
              </div>
          </div>
    </div>

@endsection


