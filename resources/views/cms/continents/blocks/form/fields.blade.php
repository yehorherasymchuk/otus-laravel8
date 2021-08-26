<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <?php

            $class = '';
            if ($errors->has('name')) {
                $class = 'danger';
            }

            ?>
            {{ Form::label('name', trans('messages.title')) }}
            {{ Form::text('name', null, array('class'=> "form-control $class")) }}
        </div>
    </div>
</div>
