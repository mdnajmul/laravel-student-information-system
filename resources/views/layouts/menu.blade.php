@if(Auth::user()->role < 2)
  <li class="nav-item has-treeview menu-close">

    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        General
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
      <li class="nav-item">
          <a href="{{ route('classes.index') }}"
             class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Classes</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('classrooms.index') }}"
             class="nav-link {{ Request::is('classrooms*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Classrooms</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('levels.index') }}"
             class="nav-link {{ Request::is('levels*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Levels</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('batches.index') }}"
             class="nav-link {{ Request::is('batches*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Batches</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('shifts.index') }}"
             class="nav-link {{ Request::is('shifts*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Shifts</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('courses.index') }}"
             class="nav-link {{ Request::is('courses*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Courses</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('faculties.index') }}"
             class="nav-link {{ Request::is('faculties*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Faculties</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('times.index') }}"
             class="nav-link {{ Request::is('times*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Times</span>
          </a>
      </li>

      <li class="nav-item">
          <a href="{{ route('academics.index') }}"
             class="nav-link {{ Request::is('academics*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Academics</span>
          </a>
      </li>

      <li class="nav-item">
          <a href="{{ route('semesters.index') }}"
             class="nav-link {{ Request::is('semesters*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Semesters</span>
          </a>
      </li>

      <li class="nav-item">
          <a href="{{ route('days.index') }}"
             class="nav-link {{ Request::is('days*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   </i><span>Days</span>
          </a>
      </li>
    </ul>
  </li>


  <li class="nav-item has-treeview menu-close">

    <a href="#" class="nav-link active">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        Schedule
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
      <li class="nav-item">
          <a href="{{ route('classAssignings.index') }}"
             class="nav-link {{ Request::is('classAssignings*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Class Assignings</span>
          </a>
      </li>


      <li class="nav-item">
          <a href="{{ route('classSchedulings.index') }}"
             class="nav-link {{ Request::is('classSchedulings*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>   <span>Class Schedulings</span>
          </a>
      </li>
    </ul>
  </li>
@endif


    <li class="nav-item">
        <a href="{{ route('admissions.index') }}"
           class="nav-link {{ Request::is('admissions*') ? 'active' : '' }}">
            <i class="fa fa-user-graduate nav-icon"></i>   <span>Admissions</span>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{ route('teachers.index') }}"
           class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
            <i class="fa fa-user-circle nav-icon"></i>   <span>Teachers</span>
        </a>
    </li>

    @if(Auth::user()->role < 2)
      <li class="nav-item">
          <a href="{{ route('attendances.index') }}"
             class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
              <i class="fa fa-calendar nav-icon"></i>   <span>Attendances</span>
          </a>
      </li>
    

      <li class="nav-item">
          <a href="{{ route('roles.index') }}"
           class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
              <i class="far fa-registered nav-icon"></i>   <span>Roles</span>
          </a>
      </li>

      <li class="nav-item">
          <a href="{{ route('transactions.index') }}"
             class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
              <i class="fa fa-money-check-alt nav-icon"></i>   <span>Transactions</span>
          </a>
      </li>
    @endif


    <li class="nav-item">
        <a href="{{ route('users.index') }}"
           class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <i class="fa fa-user nav-icon"></i>   <span>Users</span>
        </a>
    </li>

  


<li class="nav-item">
    <a href="{{ route('departments.index') }}"
       class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <p>Departments</p>
    </a>
</li>


