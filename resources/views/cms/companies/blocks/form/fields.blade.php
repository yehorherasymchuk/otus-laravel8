<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            {{ Form::label('city', trans('messages.city')) }}
            {{ Form::select('city_id', $citiesData, null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            {{ Form::label('status', trans('messages.status')) }}
            {{ Form::select('status', $statuses, null, array('class'=>'form-control')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            {{ Form::label('name', trans('messages.title')) }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            {{ Form::label('url', trans('messages.url')) }}
            {{ Form::text('url', null, array('class'=>'form-control')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('description', trans('messages.description')) }}
            {{ Form::textarea('description', null, array('class'=>'form-control')) }}
        </div>
    </div>
</div>
