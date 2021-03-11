@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile - ID: {{ $user->id }}</div>
                    <div class="panel-body">
                    <div class="col-md-8">
                        <b>Name: </b> {{ $user->name }}
                    </div>
                        <div class="col-md-8">
                            <b>Email: </b> {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection