<!-- Add Department Modal -->
<div class="modal fade right" id="add-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DEPARTMENT INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('departments.store')}}" method ="post">
          @csrf
            <!-- Department Name Field -->
            <div class="form-group col-md-12">
                {!! Form::label('department_name', 'Department Name') !!}
                {!! Form::text('department_name', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Department Name','required' => 'required']) !!}
            </div>

            <!-- Department Code Field -->
            <div class="form-group col-md-12">
                {!! Form::label('department_code', 'Department Code') !!}
                {!! Form::text('department_code', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Enter Department Code','required' => 'required']) !!}
            </div>

            <!-- Faculty Name Field -->
            <div class="form-group col-md-12">
          	  <label>Select Faculty</label>
          	  <select name="faculty_id" id="faculty_id" class="form-control" required="required">
          	  	<option value="0" selected="true" disabled="true">Choose Faculty</option>
          	  	@foreach($faculties as $key => $faculty)
          	  	<option value="{{$faculty['faculty_id']}}">{{$faculty['faculty_name']}}</option>
          	  	@endforeach
          	  </select>
            </div>

            <!-- Department Description Field -->
            <div class="form-group col-md-12">
              {!! Form::label('department_description', 'Department Description') !!}
              {!! Form::textarea('department_description', null, ['class' => 'form-control','placeholder' => 'Write Details About Department','cols' => 2, 'rows' => 2]) !!}
            </div>

            <!-- Department Status Field -->
            <div class="form-group col-sm-6">
                <div class="form-check">
                    {!! Form::hidden('department_status', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('department_status', '1', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('department_status', 'Department Status', ['class' => 'form-check-label']) !!}
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Department</button>
        </div>
      </form>
    </div>
  </div>
</div>



  <!-- View Department Modal -->
  <div class="modal fade bottom" id="view-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('departments.show','department_id')}}" method ="get">
            @csrf
            <input type="hidden" name="department_id" id="department_id">
            <div class="row">
              <!-- Department Name Field -->
              <div class="form-group col-md-6">
                  {!! Form::label('department_name', 'Department Name') !!}
                  {!! Form::text('department_name', null, ['class' => 'form-control','id' => 'department_name','name' => 'department_name','readonly' => 'readonly']) !!}
              </div>

              <!-- Department Code Field -->
              <div class="form-group col-md-6">
                  {!! Form::label('department_code', 'Department Code') !!}
                  {!! Form::text('department_code', null, ['class' => 'form-control','id' => 'department_code','name' => 'department_code','readonly' => 'readonly']) !!}
              </div>
            </div>
            
            <div class="row">
              <!-- Faculty Name Field -->
              <div class="form-group col-md-6">
                  {!! Form::label('faculty_name', 'Faculty Name') !!}
                  {!! Form::text('faculty_name', null, ['class' => 'form-control','id' => 'faculty_name','name' => 'faculty_name','readonly' => 'readonly']) !!}
              </div>

              <!-- Department Description Field -->
              <div class="form-group col-md-6">
                  {!! Form::label('department_description', 'Department Description') !!}
                  {!! Form::textarea('department_description', null, ['class' => 'form-control','id' => 'department_description','name' => 'department_description','rows' => 1,'readonly' => 'readonly']) !!}
              </div>
            </div>

            <div class="row">
              <!-- Department Status Field -->
              <div class="form-group col-md-4">
                  {!! Form::label('department_status', 'Status') !!}
                  {!! Form::text('department_status', null, ['class' => 'form-control','id' => 'department_status','name' => 'department_status','readonly' => 'readonly']) !!}
              </div>

              <!-- Department Created Field -->
              <div class="form-group col-md-4">
                  {!! Form::label('created_at', 'Department Created') !!}
                  {!! Form::text('created_at', null, ['class' => 'form-control','id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
              </div>

              <!-- Department Updated Field -->
              <div class="form-group col-md-4">
                  {!! Form::label('updated_at', 'Department Updated') !!}
                  {!! Form::text('updated_at', null, ['class' => 'form-control','id' => 'updated_at','name' => 'updated_at', 'readonly' => 'readonly']) !!}
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Delete Department Modal -->
<div class="modal fade top" id="delete-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('departments.destroy','department_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="department_id" id="department_id">
          <p class="text-center" width="50px">Are you sure you want to delete this department?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Department</button>
          </div>
        </form>
      </div>
    </div>
  </div>
