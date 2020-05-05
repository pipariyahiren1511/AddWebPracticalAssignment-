@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Student') }}</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'StudentController@store', 'id' => 'studentForm', 'enctype' => 'multipart/form-data']) !!}
                        @include('students.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection