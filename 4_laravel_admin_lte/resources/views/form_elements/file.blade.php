<div class='form-group mb-0'>
    <strong>
        @if(count($errors->get($name)))
            <i class='far fa-times-circle text-danger'></i>
            {!! Form::label($name, $label, ['class'=>'col-xs-2 control-label mt-3 text-danger']) !!}
        @else
            {!! Form::label($name, $label, ['class'=>'col-xs-2 control-label mt-3']) !!}
        @endif

    </strong>
    @if(isset($model) && $model->$name)
        <div class='form-group'>
            <div class='col-xs-offset-2 col-xs-10'>
                {!! Html::image($model->$name, null, ['class' => 'img-circle img-responsive']) !!}
            </div>
        </div>
    @endif
    <div class='col-xs-8 @if(count($errors->get($name))) validation-error @endif'>
        {!! Form::file($name, ['class' => 'filestyle', 'data-buttonText' => 'Browse',
        'data-buttonName' => 'btn-secondary', 'data-placeholder' => "$label is missing"]) !!}
    </div>
    <div class='form-group mb-0'>
        <div class='row'>
            <div class='col-4'>
                @if($errorData = $errors->get($name))
                    @foreach ($errorData as $error)
                        {!! Form::label('error', $error, ['class' => 'col-xs-2 control-label  text-danger']) !!}
                    @endforeach
                @endif
            </div>
            <div class='col-8'>
                {!! Form::label(
                    "$label format jpg,png up to 5MB, the minimum size of 300x300px",
                    null,
                    [
                        'class' => count($errors->get($name)) ?
                         'col-xs-2 control-label float-right mr-3 text-danger' :
                         'col-xs-2 control-label float-right mr-3',
                         'style' => 'position: absolute;  right: 0;'
                    ]) !!}
            </div>
        </div>
    </div>
</div>
