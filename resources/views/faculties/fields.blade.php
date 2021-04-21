 <!-- Add Faculty Modal -->
<div class="modal fade right" id="add-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-foursquare" aria-hidden="true"></i> ADD FACULTY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('faculties.store')}}" method ="post">
          @csrf

            <div class="row">             
              
              
                <!-- Faculty Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_name', 'Faculty Name:') !!}
                    {!! Form::text('faculty_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Faculty Name']) !!}
                </div>

                <!-- Faculty Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_code', 'Faculty Code:') !!}
                    {!! Form::text('faculty_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'placeholder' => 'Enter Faculty Code']) !!}
                </div>

                <!-- Faculty Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('faculty_description', 'Faculty Description:') !!}
                    {!! Form::textarea('faculty_description', null, ['class' => 'form-control','placeholder' => 'Write Faculty Description','rows' => 3]) !!}
                </div>

                <!-- Faculty Status Field -->
                <div class="form-group col-sm-6">
                    <div class="form-check">
                        {!! Form::hidden('faculty_status', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('faculty_status', '1', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('faculty_status', 'Faculty Status', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Faculty</button>
        </div>
     </form>
    </div>
  </div>
</div>



  <!-- View Faculty Modal -->
  <div class="modal fade bottom" id="view-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('faculties.show','faculty_id')}}" method ="get">
          @csrf
          <input type="hidden" name="faculty_id" id="faculty_id">
          <div class="form-group col-md-12">
              {!! Form::label('faculty_name', 'Faculty Name') !!}
              {!! Form::text('faculty_name', null, ['class' => 'form-control','id' => 'faculty_name','name' => 'faculty_name','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('faculty_code', 'Faculty Code') !!}
              {!! Form::text('faculty_code', null, ['class' => 'form-control','id' => 'faculty_code','name' => 'faculty_code','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('faculty_description', 'Faculty Description') !!}
              {!! Form::textarea('faculty_description', null, ['class' => 'form-control','id' => 'faculty_description','name' => 'faculty_description','cols' => 2, 'rows' => 2,'readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('faculty_status', 'Status') !!}
              {!! Form::text('faculty_status', null, ['class' => 'form-control','id' => 'faculty_status','name' => 'faculty_status','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('created_at', 'Faculty Created') !!}
              {!! Form::text('created_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'created_at','name' => 'created_at','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group col-md-12">
              {!! Form::label('updated_at', 'Faculty Updated') !!}
              {!! Form::text('updated_at', null, ['class' => 'form-control','maxlength' => 255,'id' => 'updated_at','name' => 'updated_at', 'readonly' => 'readonly']) !!}
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Delete Faculty -->
<div class="modal fade top" id="delete-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white;" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background:yellow; color:red">
        <form action="{{route('faculties.destroy','faculty_id')}}" method ="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="faculty_id" id="faculty_id">
          <p class="text-center" width="50px">Are you sure you want to delete this faculty?</p>
        </div>
          <div class="modal-footer" style="background:red; color:white">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="color: white;">NO/Cancel</button>
            <button type="submit" class="btn btn-danger">YES/Delete Faculty</button>
          </div>
        </form>
      </div>
    </div>
  </div>
