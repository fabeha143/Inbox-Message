@extends('layouts.master')

@section('content')
{{ Form::open(array('route' => 'inbox.store' , 'method' => 'POST')) }}

    <div class="container">
        <div class="mb-3" style="width: 20%; ">
            {{ Form::label('from','from' , ['style' => 'margin-top:20px;']) }}
            <div>
            {!! Form::text('from', Auth::user()->email ,  ['style' => 'margin-bottom:20px;  width:260px;'] ) !!}
            </div>
            {{ Form::label('To','To') }}
            {!! Form::select('To', $To, ['style' => 'padding:500px;  width:260px;']) !!}

            {{ Form::label('subject','Subject', ['style' => 'margin-top:20px;']) }}
            {{ Form::text('subject','subject',array('class' => 'form-control' , 'style' => 'width:500px; margin-bottom:10px; '))}}
            
            {{ Form::label('message','Message') }}
            {{ Form::textarea('message','message',array('class' => 'form-control' ,'style' => 'width:500px;margin-bottom:10px;'))}}


        </div>
    {{ Form::submit('Send',array('class' => 'btn btn-large btn-primary openbutton' , 'style' => 'width:500px;'))}}
    </div>


{{ Form::close() }}
@endsection()