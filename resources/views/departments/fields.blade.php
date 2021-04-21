<!-- Add Modal -->
<div class="modal fade right" id="add-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-foursquare"></i> ADD FACULTY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('classSchedulings.store')}}" method ="post">
          @csrf

            <div class="row">

                <!-- Faculty Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('faculty_id', 'Faculty Id:') !!}
                    {!! Form::number('faculty_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Department Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_name', 'Department Name:') !!}
                    {!! Form::text('department_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Department Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('department_code', 'Department Code:') !!}
                    {!! Form::text('department_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Department Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('department_description', 'Department Description:') !!}
                    {!! Form::textarea('department_description', null, ['class' => 'form-control']) !!}
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Faculty</button>
        </div>
     </form>
    </div>
  </div>
</div>
