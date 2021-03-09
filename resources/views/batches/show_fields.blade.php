
<div class="form-group">
    {!! Form::label('batch_id', 'ID:') !!}
    <p>{{ $batch->batch_id }}</p>
</div>

<div class="form-group">
    {!! Form::label('batch', 'Batch Year:') !!}
    <p>{{ $batch->batch }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $batch->created_at }}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $batch->updated_at }}</p>
</div>

