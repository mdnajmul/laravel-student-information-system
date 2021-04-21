<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


   <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('assets/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
 

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
</div>

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<!-- jQuery -->
<!-- <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{ url('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script> -->

<!-- Bootstrap 4 -->
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<!-- <script src="{{ url('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{ url('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script> -->
<!-- daterangepicker -->
<script src="{{ url('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ url('assets/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/dist/js/demo.js') }}"></script>
<script src="{{ url('assets/js/custom.js') }}"></script>

<script type="text/javascript">

  //============START BATCH MODAL=============//
  $('#edit-batch').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var batch_year = button.data('batch');
    var batch_id = button.data('batch_id');

    var modal = $(this);

    modal.find('.modal-title').text('EDIT BATCH INFORMATION');
    modal.find('.modal-body #batch').val(batch_year);
    modal.find('.modal-body #batch_id').val(batch_id);
  });


  $('#delete-batch').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var batch_id = button.data('batch_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE BATCH INFORMATION');
    modal.find('.modal-body #batch_id').val(batch_id);
    });


  $('#view-batch').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var batch_year = button.data('bath_year');
    var batch_created = button.data('created_at');
    var batch_updated = button.data('updated_at');
    var batch_id = button.data('batch_id');
    var create = new Date(batch_created).toLocaleString();
    var update = new Date(batch_updated).toLocaleString();

    var modal = $(this);

    modal.find('.modal-title').text('VIEW BATCH INFORMATION');
    modal.find('.modal-body #batch').val(batch_year);
    modal.find('.modal-body #created_at').val(create);
    modal.find('.modal-body #updated_at').val(update);
    modal.find('.modal-body #batch_id').val(batch_id);
  });

  //============END BATCH MODAL=============//


  //============START LEVEL MODAL=============//

  $('#view-level').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var level = button.data('level');
    var course_name = button.data('course_name');
    var level_description = button.data('level_description');
    var level_created = button.data('created_level');
    var level_updated = button.data('updated_level');
    var level_id = button.data('level_id');
    var create = new Date(level_created).toLocaleString();
    var update = new Date(level_updated).toLocaleString();

    var modal = $(this);

    modal.find('.modal-title').text('VIEW LEVEL INFORMATION');
    modal.find('.modal-body #level').val(level);
    modal.find('.modal-body #course_name').val(course_name);
    modal.find('.modal-body #level_description').val(level_description);
    modal.find('.modal-body #created_at').val(create);
    modal.find('.modal-body #updated_at').val(update);
    modal.find('.modal-body #level_id').val(level_id);
  });



  $('#edit-level').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var level = button.data('level');
    var level_description = button.data('level_description');
    var level_id = button.data('level_id');

    var modal = $(this);

    modal.find('.modal-title').text('EDIT LEVEL INFORMATION');
    modal.find('.modal-body #level').val(level);
    modal.find('.modal-body #level_description').val(level_description);
    modal.find('.modal-body #level_id').val(level_id);
  });


  $('#delete-level').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var level_id = button.data('level_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE LEVEL INFORMATION');
    modal.find('.modal-body #level_id').val(level_id);
    });

  //=============END LEVEL MODAL==============//


  //=============START COURSE MODAL=============//

    $('#view-course').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var course_name = button.data('course_name');
      var course_code = button.data('course_code');
      var description = button.data('description');
      var status = button.data('status');
      var created_course = button.data('created_course');
      var updated_course = button.data('updated_course');
      var course_id = button.data('course_id');
      var create = new Date(created_course).toLocaleString();
      var update = new Date(updated_course).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW COURSE INFORMATION');
      modal.find('.modal-body #course_name').val(course_name);
      modal.find('.modal-body #course_code').val(course_code);
      modal.find('.modal-body #description').val(description);
      if(status == 1)
      {
        modal.find('.modal-body #status').val('ACTIVE');
      }
      else
      {
        modal.find('.modal-body #status').val('DEACTIVE');
      }
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #course_id').val(course_id);
    });


    $('#edit-course').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var course_name = button.data('course_name');
      var course_code = button.data('course_code');
      var description = button.data('description');
      var status = button.data('status');
      var course_id = button.data('course_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT COURSE INFORMATION');
      modal.find('.modal-body #course_name').val(course_name);
      modal.find('.modal-body #course_code').val(course_code);
      modal.find('.modal-body #description').val(description);
      if(status == 1)
      {
        modal.find('.modal-body #status').attr("checked", true);
      }
      else
      {
        modal.find('.modal-body #status').attr("checked", false);
      }
      modal.find('.modal-body #course_id').val(course_id);
    });


    $('#delete-course').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var course_id = button.data('course_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE COURSE INFORMATION');
    modal.find('.modal-body #course_id').val(course_id);
    });


  //=============END COURSE MODAL==============//


  //=============START CLASS MODAL=============//

    $('#view-class').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var class_name = button.data('class_name');
      var class_code = button.data('class_code');
      var created_class = button.data('created_class');
      var updated_class = button.data('updated_class');
      var class_id = button.data('class_id');
      var create = new Date(created_class).toLocaleString();
      var update = new Date(updated_class).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW CLASS INFORMATION');
      modal.find('.modal-body #class_name').val(class_name);
      modal.find('.modal-body #class_code').val(class_code);
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #class_id').val(class_id);
    });


    $('#edit-class').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var class_name = button.data('class_name');
      var class_code = button.data('class_code');
      var class_id = button.data('class_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT CLASS INFORMATION');
      modal.find('.modal-body #class_name').val(class_name);
      modal.find('.modal-body #class_code').val(class_code);
      modal.find('.modal-body #class_id').val(class_id);
    });


    $('#delete-class').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var class_id = button.data('class_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE CLASS INFORMATION');
    modal.find('.modal-body #class_id').val(class_id);
    });


  //=============END CLASS MODAL==============//


  //=============START DAYS MODAL=============//

    $('#view-day').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var day_name = button.data('day_name');
      var created_day = button.data('created_day');
      var updated_day = button.data('updated_day');
      var day_id = button.data('day_id');
      var create = new Date(created_day).toLocaleString();
      var update = new Date(updated_day).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW DAY INFORMATION');
      modal.find('.modal-body #name').val(day_name);
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #day_id').val(day_id);
    });


    $('#edit-day').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var day_name = button.data('day_name');
      var day_id = button.data('day_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT DAYS INFORMATION');
      modal.find('.modal-body #name').val(day_name);
      modal.find('.modal-body #day_id').val(day_id);
    });


    $('#delete-day').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var day_id = button.data('day_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE DAYS INFORMATION');
    modal.find('.modal-body #day_id').val(day_id);
    });


  //=============END DAYS MODAL==============//


  //=============START CLASSROOM MODAL=============//

    $('#view-classroom').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var classroom_name = button.data('classroom_name');
      var classroom_code = button.data('classroom_code');
      var classroom_description = button.data('classroom_description');
      var classroom_status = button.data('classroom_status');
      var created_classroom = button.data('created_classroom');
      var updated_classroom = button.data('updated_classroom');
      var classroom_id = button.data('classroom_id');
      var create = new Date(created_classroom).toLocaleString();
      var update = new Date(updated_classroom).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW CLASSROOM INFORMATION');
      modal.find('.modal-body #classroom_name').val(classroom_name);
      modal.find('.modal-body #classroom_code').val(classroom_code);
      modal.find('.modal-body #classroom_description').val(classroom_description);
      if(classroom_status == 1)
      {
        modal.find('.modal-body #classroom_status').val('ACTIVE');
      }
      else
      {
        modal.find('.modal-body #classroom_status').val('DEACTIVE');
      }
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #classroom_id').val(classroom_id);
    });


    $('#edit-classroom').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var classroom_name = button.data('classroom_name');
      var classroom_code = button.data('classroom_code');
      var classroom_description = button.data('classroom_description');
      var classroom_status = button.data('classroom_status');
      var classroom_id = button.data('classroom_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT CLASSROOM INFORMATION');
      modal.find('.modal-body #classroom_name').val(classroom_name);
      modal.find('.modal-body #classroom_code').val(classroom_code);
      modal.find('.modal-body #classroom_description').val(classroom_description);
      if(classroom_status == 1)
      {
        modal.find('.modal-body #classroom_status').attr("checked", true);
      }
      else
      {
        modal.find('.modal-body #classroom_status').attr("checked", false);
      }
      modal.find('.modal-body #classroom_id').val(classroom_id);
    });


    $('#delete-classroom').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var classroom_id = button.data('classroom_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE CLASSROOM INFORMATION');
    modal.find('.modal-body #classroom_id').val(classroom_id);
    });


  //=============END CLASSROOM MODAL==============//


  //=============START ACADEMIC MODAL=============//

    $('#view-academic').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var academic_year = button.data('academic_year');
      var created_academic = button.data('created_academic');
      var updated_academic = button.data('updated_academic');
      var academic_id = button.data('academic_id');
      var create = new Date(created_academic).toLocaleString();
      var update = new Date(updated_academic).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW ACADEMIC INFORMATION');
      modal.find('.modal-body #academic_year').val(academic_year);
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #academic_id').val(academic_id);
    });


    $('#edit-academic').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var academic_year = button.data('academic_year');
      var academic_id = button.data('academic_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT ACADEMIC INFORMATION');
      modal.find('.modal-body #academic_year').val(academic_year);
      modal.find('.modal-body #academic_id').val(academic_id);
    });


    $('#delete-academic').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var academic_id = button.data('academic_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE ACADEMIC INFORMATION');
    modal.find('.modal-body #academic_id').val(academic_id);
    });


  //=============END ACADEMIC MODAL==============//


  //=============START SEMESTER MODAL=============//

    $('#view-semester').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var semester_name = button.data('semester_name');
      var semester_code = button.data('semester_code');
      var semester_duration = button.data('semester_duration');
      var semester_description = button.data('semester_description');
      var created_semester = button.data('created_semester');
      var updated_semester = button.data('updated_semester');
      var semester_id = button.data('semester_id');
      var create = new Date(created_semester).toLocaleString();
      var update = new Date(updated_semester).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW SEMESTER INFORMATION');
      modal.find('.modal-body #semester_name').val(semester_name);
      modal.find('.modal-body #semester_code').val(semester_code);
      modal.find('.modal-body #semester_duration').val(semester_duration);
      modal.find('.modal-body #semester_description').val(semester_description);
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #semester_id').val(semester_id);
    });


    $('#edit-semester').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var semester_name = button.data('semester_name');
      var semester_code = button.data('semester_code');
      var semester_duration = button.data('semester_duration');
      var semester_description = button.data('semester_description');
      var semester_id = button.data('semester_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT SEMESTER INFORMATION');
      modal.find('.modal-body #semester_name').val(semester_name);
      modal.find('.modal-body #semester_code').val(semester_code);
      modal.find('.modal-body #semester_duration').val(semester_duration);
      modal.find('.modal-body #semester_description').val(semester_description);
      modal.find('.modal-body #semester_id').val(semester_id);
    });


    $('#delete-semester').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var semester_id = button.data('semester_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE SEMESTER INFORMATION');
    modal.find('.modal-body #semester_id').val(semester_id);
    });


  //=============END SEMESTER MODAL==============//


   //=============START ROLE MODAL=============//

    $('#view-role').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var name = button.data('name');
      var created_role = button.data('created_role');
      var updated_role = button.data('updated_role');
      var role_id = button.data('role_id');
      var create = new Date(created_role).toLocaleString();
      var update = new Date(updated_role).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW ROLE INFORMATION');
      modal.find('.modal-body #role_id').val(role_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
    });


    $('#edit-role').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var name = button.data('name');
      var role_id = button.data('role_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT ROLE INFORMATION');
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #role_id').val(role_id);
    });


    $('#delete-role').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var role_id = button.data('role_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE ROLE INFORMATION');
    modal.find('.modal-body #role_id').val(role_id);
    });


  //=============END ROLE MODAL==============//


    //============START SHIFT MODAL=============//

    $('#view-shift').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var shift = button.data('shift');
    var shift_created = button.data('created_shift');
    var shift_updated = button.data('updated_shift');
    var shift_id = button.data('shift_id');
    var create = new Date(shift_created).toLocaleString();
    var update = new Date(shift_updated).toLocaleString();

    var modal = $(this);

    modal.find('.modal-title').text('VIEW SHIFT INFORMATION');
    modal.find('.modal-body #shift').val(shift);
    modal.find('.modal-body #created_at').val(create);
    modal.find('.modal-body #updated_at').val(update);
    modal.find('.modal-body #shift_id').val(shift_id);
  });



  $('#edit-shift').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var shift = button.data('shift');
    var shift_id = button.data('shift_id');

    var modal = $(this);

    modal.find('.modal-title').text('EDIT SHIFT INFORMATION');
    modal.find('.modal-body #shift').val(shift);
    modal.find('.modal-body #shift_id').val(shift_id);
  });


  $('#delete-shift').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var shift_id = button.data('shift_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE SHIFT INFORMATION');
    modal.find('.modal-body #shift_id').val(shift_id);
    });

  //=============END SHIFT MODAL==============//


  //============START TIME MODAL=============//

    $('#view-time').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var time = button.data('time');
    var time_created = button.data('created_time');
    var time_updated = button.data('updated_time');
    var time_id = button.data('time_id');
    var create = new Date(time_created).toLocaleString();
    var update = new Date(time_updated).toLocaleString();

    var modal = $(this);

    modal.find('.modal-title').text('VIEW TIME INFORMATION');
    modal.find('.modal-body #time').val(time);
    modal.find('.modal-body #created_at').val(create);
    modal.find('.modal-body #updated_at').val(update);
    modal.find('.modal-body #time_id').val(time_id);
  });



  $('#edit-time').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var time = button.data('time');
    var time_id = button.data('time_id');

    var modal = $(this);

    modal.find('.modal-title').text('EDIT TIME INFORMATION');
    modal.find('.modal-body #time').val(time);
    modal.find('.modal-body #time_id').val(time_id);
  });


  $('#delete-time').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var time_id = button.data('time_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE TIME INFORMATION');
    modal.find('.modal-body #time_id').val(time_id);
    });

  //=============END TIME MODAL==============//


  //=============START CLASS SCHEDULE MODAL=============//

  $('#view-shedule').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var course_name = button.data('course_name');
      var class_name = button.data('class_name');
      var level = button.data('level');
      var shift = button.data('shift');
      var classroom_name = button.data('classroom_name');
      var batch = button.data('batch');
      var day_name = button.data('day_name');
      var time = button.data('time');
      var semester_name = button.data('semester_name');
      var start_date = button.data('start_date');
      var end_date = button.data('end_date');
      var status = button.data('status');
      var created_schedule = button.data('created_schedule');
      var updated_schedule = button.data('updated_schedule');
      var schedule_id = button.data('schedule_id');
      var create = new Date(created_schedule).toLocaleString();
      var update = new Date(updated_schedule).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW CLASS SCHEDULE INFORMATION');
      modal.find('.modal-body #class_id').val(class_name);
      modal.find('.modal-body #course_id').val(course_name);
      modal.find('.modal-body #level_id').val(level);
      modal.find('.modal-body #shift_id').val(shift);
      modal.find('.modal-body #classroom_id').val(classroom_name);
      modal.find('.modal-body #batch_id').val(batch);
      modal.find('.modal-body #day_id').val(day_name);
      modal.find('.modal-body #time_id').val(time);
      modal.find('.modal-body #semester_id').val(semester_name);
      modal.find('.modal-body #start_date').val(start_date);
      modal.find('.modal-body #end_date').val(end_date);
      if(status == 1)
      {
        modal.find('.modal-body #status').val('Active');
      }
      else
      {
        modal.find('.modal-body #status').val('Deactive');
      }
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #schedule_id').val(schedule_id);
      
     
    });




    $('#delete-schedule').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var schedule_id = button.data('schedule_id');

      var modal = $(this);

      modal.find('.modal-title').text('DELETE CLASS SCHEDULE INFORMATION');
      modal.find('.modal-body #schedule_id').val(schedule_id);
    });



  //=============END CLASS SCHEDULE MODAL==============//


    //=============START FACULTY MODAL=============//

    $('#view-faculty').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var faculty_name = button.data('faculty_name');
      var faculty_code = button.data('faculty_code');
      var faculty_description = button.data('faculty_description');
      var faculty_status = button.data('faculty_status');
      var created_faculty = button.data('created_faculty');
      var updated_faculty = button.data('updated_faculty');
      var faculty_id = button.data('faculty_id');
      var create = new Date(created_faculty).toLocaleString();
      var update = new Date(updated_faculty).toLocaleString();

      var modal = $(this);

      modal.find('.modal-title').text('VIEW FACULTY INFORMATION');
      modal.find('.modal-body #faculty_name').val(faculty_name);
      modal.find('.modal-body #faculty_code').val(faculty_code);
      modal.find('.modal-body #faculty_description').val(faculty_description);
      if(faculty_status == 1)
      {
        modal.find('.modal-body #faculty_status').val('ACTIVE');
      }
      else
      {
        modal.find('.modal-body #faculty_status').val('DEACTIVE');
      }
      modal.find('.modal-body #created_at').val(create);
      modal.find('.modal-body #updated_at').val(update);
      modal.find('.modal-body #faculty_id').val(faculty_id);
    });


    $('#edit-faculty').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget);
      var faculty_name = button.data('faculty_name');
      var faculty_code = button.data('faculty_code');
      var faculty_description = button.data('faculty_description');
      var faculty_status = button.data('faculty_status');
      var faculty_id = button.data('faculty_id');

      var modal = $(this);

      modal.find('.modal-title').text('EDIT FACULTY INFORMATION');
      modal.find('.modal-body #faculty_name').val(faculty_name);
      modal.find('.modal-body #faculty_code').val(faculty_code);
      modal.find('.modal-body #faculty_description').val(faculty_description);
      if(faculty_status == 1)
      {
        modal.find('.modal-body #faculty_status').attr("checked", true);
      }
      else
      {
        modal.find('.modal-body #faculty_status').attr("checked", false);
      }
      modal.find('.modal-body #faculty_id').val(faculty_id);
    });


    $('#delete-faculty').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var faculty_id = button.data('faculty_id');

    var modal = $(this);

    modal.find('.modal-title').text('DELETE FACULTY INFORMATION');
    modal.find('.modal-body #faculty_id').val(faculty_id);
    });


  //=============END FACULTY MODAL==============//

</script>

<script type="text/javascript">
    $('#course_id').on('change', function(e){
        var course_id = e.target.value;
        $('#level_id').empty();
        $.get('dynamicLevel?course_id='+ course_id, function(data){
          $.each(data, function(index, lev){
            $('#level_id').append('<option value="'+lev.level_id+'">'+lev.level+'</option>');
          })
        })
    })
</script>

<script type="text/javascript">
    $('#course_id1').on('change', function(e){
        var course_id = e.target.value;
        $('#level_id1').empty();
        $.get('dynamicLevel?course_id='+ course_id, function(data){
          $.each(data, function(index, lev){
            $('#level_id1').append('<option value="'+lev.level_id+'">'+lev.level+'</option>');
          })
        })
    })
</script>

<script type="text/javascript">
  $(document).on('click', '#Edit', function(data){
    var schedule_id = $(this).data('schedule_id');

    $.get("{{ route('edit')}}", {schedule_id:schedule_id}, function(data){
      $('#class_id1').val(data.class_id);
      $('#course_id1').val(data.course_id);
      $('#level_id1').val(data.level_id);
      $('#shift_id1').val(data.shift_id);
      $('#classroom_id1').val(data.classroom_id);
      $('#batch_id1').val(data.batch_id);
      $('#day_id1').val(data.day_id);
      $('#time_id1').val(data.time_id);
      $('#semester_id1').val(data.semester_id);
      $('#start_date1').attr("value", data.start_date);
      $('#end_date1').attr("value", data.end_date);
      $('#schedule_id1').val(data.schedule_id);
      if(data.schedule_status == 1){
        $('#status1').attr("checked", true);
      }else{
        $('#status1').attr("checked", false);
      }
      console.log(data);
    });
  })
</script>

<script type="text/javascript">

        //-------------- Browse image -----------------------//
                        $('#browse_file').on('click', function(){
                            $('#image').click();
                        })
                        $('#image').on('change', function(e){
                            showFile(this, '#showImage');
                        })

                        //---------- (parameter) fileInput:any ------//
                        function showFile(fileInput,img,showName){
                            if(fileInput.files[0]){
                                var reader = new FileReader();
                                reader.onload = function(e){
                                    $(img).attr('src', e.target.result);
                                }
                                reader.readAsDataURL(fileInput.files[0]);
                            }
                            $(showName).text(fileInput.files[0].name);
                        };

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.datatable').dataTable();
  });
</script>


<script>
    $(function () {
        bsCustomFileInput.init();
    });
    
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>



@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
