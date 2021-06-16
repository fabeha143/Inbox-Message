@extends('layouts.master')

@section('content')

<div class="container">
<a href="{{ route('inbox.create')}}" class='btn btn-large btn-danger openbutton' style="margin-bottom: 36px; float:right; margin-top:20px;">send Message</a>
   
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Id</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">From</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">subject</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Messages</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($inboxdata))
                @foreach($inboxdata as $list)

                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->id}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->user->name}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->subject}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->message}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">
                         {!! Form::open(array('url' => route('inbox.destroy', ['inbox' => $list->id]), 'method' => 'delete')) !!}		
                            {!! Form::submit('Delete', array('class' => 'btn btn-large btn-primary openbutton','style'=> 'margin-right:10px;')) !!}
                    
                         {!! Form::close() !!}
                        </td>
                        
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="4">No data found!!</td>
            </tr>
            @endif
        
        </tbody>
    </table>
    </div>
    @endsection()