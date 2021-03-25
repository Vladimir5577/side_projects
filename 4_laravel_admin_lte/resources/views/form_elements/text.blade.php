<div class='form-group mb-0'>
    <strong>
        @if(count($errors->get($name)))
            <i class='far fa-times-circle text-danger'></i>
            {!! Form::label($name, $label, ['class' => 'col-xs-2 control-label mt-3 text-danger']) !!}
        @else
            {!! Form::label($name, $label, ['class' => 'col-xs-2 control-label mt-3']) !!}
        @endif
    </strong>
    <div class='col-xs-8 @if(count($errors->get($name))) validation-error @endif'>
        {!! Form::text($name, $model->$name ?? old($name), $attributes ?? []) !!}
    </div>
    <div class='form-group mb-0'>
        <div class='row'>
            <div class='col-6'>
                @if($errorData = $errors->get($name))
                    @foreach ($errorData as $error)
                        {!! Form::label('error', $error, ['class' => 'col-xs-2 control-label text-danger']) !!}
                    @endforeach
                @endif
            </div>
            <div class='col-6'>
                {!! Form::label($label_text ?? null, null, ['id'=>"label-$name",
                   'class'=> count($errors->get($name)) ?
                   'col-xs-2 control-label float-right mr-3 text-danger' :
                   'col-xs-2 control-label float-right mr-3',
                   'style' => 'position: absolute;  right: 0;']) !!}
            </div>
        </div>
    </div>
</div>
