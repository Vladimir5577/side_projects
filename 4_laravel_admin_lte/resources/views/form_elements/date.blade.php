<div class='form-group'>
    <strong>
        @if(count($errors->get($name)))
            <i class='far fa-times-circle text-danger'></i>
            {!! Form::label($name, $label, ['class' => 'col-xs-2 control-label mt-3 text-danger']) !!}
        @else
            {!! Form::label($name, $label, ['class' => 'col-xs-2 control-label mt-3']) !!}
        @endif
    </strong>
    <div class='col-xs-8 @if(count($errors->get($name))) validation-error @endif'>
        {!! Form::text($name, isset($model) ? $model->$name->isoFormat('DD.MM.YY') : old($name),
        ['class' => 'form-control date', 'placeholder' => "Enter the $label", 'readonly']) !!}
    </div>
    <div class='form-group'>
        <div class='row'>
            <div class='col-6'>
                @if($errorData = $errors->get($name))
                    @foreach ($errorData as $error)
                        {!! Form::label('error', $error, ['class' => 'col-xs-2 control-label text-danger']) !!}
                    @endforeach
                @endif
            </div>
            <div class='col-6'></div>
        </div>
    </div>
</div>
