@extends('layouts.app')

@section('content')
<div class="container">
       
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" style="display: block; padding:10px; background-color:blue; color:white; margin-left:10px; margin-top:10px; width:130px; text-align:center;" href="{{url('/home')}}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" style="display: block; padding:10px; background-color:blue; color:white; margin-left:10px; margin-top:10px; width:130px; text-align:center;" href="{{ route('inbox.index')}}">Inbox</a>
            </li>
            </ul>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
