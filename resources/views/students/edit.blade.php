@extends('layouts.app')
@section("title", "Edit Student")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>
                    <div class="card-body">
                        {!! Form::model($form, ['method' => 'PATCH', 'action' => ['StudentController@update',$form->id], 'id' => 'studentForm','enctype' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="col justify-content-center">
                                    <img src="{{$form->image}}" class="img-thumbnail" alt="Image">
                                </div>
                            </div>
                            @include('students.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
