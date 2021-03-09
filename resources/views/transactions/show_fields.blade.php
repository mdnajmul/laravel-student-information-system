<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $transaction->student_id }}</p>
</div>

<!-- Fee Id Field -->
<div class="col-sm-12">
    {!! Form::label('fee_id', 'Fee Id:') !!}
    <p>{{ $transaction->fee_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $transaction->user_id }}</p>
</div>

<!-- Paid Field -->
<div class="col-sm-12">
    {!! Form::label('paid', 'Paid:') !!}
    <p>{{ $transaction->paid }}</p>
</div>

<!-- Transaction Date Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_date', 'Transaction Date:') !!}
    <p>{{ $transaction->transaction_date }}</p>
</div>

<!-- Remark Field -->
<div class="col-sm-12">
    {!! Form::label('remark', 'Remark:') !!}
    <p>{{ $transaction->remark }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $transaction->description }}</p>
</div>

