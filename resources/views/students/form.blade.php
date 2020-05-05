<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">
        Photo
    </label>
    <div class="col-md-6">
        <input type="file" class="form-control-file @error('photo') is-invalid @enderror" accept="image/*" name="photo" id="photo" @if(!isset($form)) required @endif>
        <small id="imageHelp" class="form-text text-muted">Max size 2048 kb.</small>
        @if($errors->has('photo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class='form-group row'>
    {!! Form::label('name', 'Name:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control','id' => 'name', 'required' => 'required'])!!}
    </div>

    @if($errors->has('name'))
        <span class="help-block m-b-none">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class='form-group row'>
    {!! Form::label('grade', 'Grade:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-3">
        {!! Form::label('a', 'A:') !!}
        {!! Form::radio('grade', 'a', null ,['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('b', 'B:') !!}
        {!! Form::radio('grade', 'b', null ,['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="offset-4 col-md-3">
        {!! Form::label('c', 'C:') !!}
        {!! Form::radio('grade', 'c', null ,['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('d', 'D:') !!}
        {!! Form::radio('grade', 'd', null ,['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    @if($errors->has('grade'))
        <span class="help-block m-b-none">{{ $errors->first('grade') }}</span>
    @endif
</div>
<div class='form-group row'>
    {!! Form::label('birth_date', 'Date Of Birth:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!!Form::date('birth_date', null,['class' => 'form-control','id' => 'birth_date', 'required' => 'required']);!!}
    </div>

    @if($errors->has('birth_date'))
        <span class="help-block m-b-none">{{ $errors->first('birth_date') }}</span>
    @endif
</div>
<div class='form-group row'>
    {!! Form::label('address', 'Address:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ['class' => 'form-control','id' => 'address', 'required' => 'required'])!!}
    </div>

    @if($errors->has('address'))
        <span class="help-block m-b-none">{{ $errors->first('address') }}</span>
    @endif
</div>
<div class='form-group row'>
    {!! Form::label('city', 'City:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('city', null, ['class' => 'form-control','id' => 'city', 'required' => 'required'])!!}
    </div>

    @if($errors->has('city'))
        <span class="help-block m-b-none">{{ $errors->first('city') }}</span>
    @endif
</div>
<div class='form-group row'>
    {!! Form::label('country', 'Country:',['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('country', null, ['class' => 'form-control','id' => 'country', 'required' => 'required'])!!}
    </div>

    @if($errors->has('country'))
        <span class="help-block m-b-none">{{ $errors->first('country') }}</span>
    @endif
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>