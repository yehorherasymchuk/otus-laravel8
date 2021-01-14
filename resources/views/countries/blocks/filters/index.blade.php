{!! Form::open(['url' => route('cms.countries.index', ['locale' => $locale,]), 'method' => 'GET']) !!}
    <div class="row mb-4">
        <div class="col-sm-8">
            {!! Form::text('q', request()->get('q'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::submit(__('Search'), ['class' => 'btn btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}
