<div class='form-group mt-3'>
    <div class='row'>
        <div class='col-6'>
            <strong>{!! Form::label('text', 'Created at:', ['class'=>'col-xs-2 control-label']) !!}</strong>
            {!! Form::label('text', $model->created_at->isoFormat('DD.MM.YY'), ['class'=>'col-xs-2 control-label']) !!}
        </div>
        <div class='col-6'>
            <strong>{!! Form::label('text', 'Admin created ID:', ['class'=>'col-xs-2 control-label']) !!}</strong>
            {!! Form::label('', $model->admin_created_id, ['class'=>'col-xs-2 control-label']) !!}
        </div>
    </div>
    <div class='row'>
        <div class='col-6'>
            <strong>{!! Form::label('text', 'Updated at:', ['class'=>'col-xs-2 control-label']) !!}</strong>
            {!! Form::label('text', $model->updated_at->isoFormat('DD.MM.YY'), ['class'=>'col-xs-2 control-label']) !!}
        </div>
        <div class='col-6'>
            <strong>{!! Form::label('text', 'Admin updated ID:', ['class'=>'col-xs-2 control-label']) !!}</strong>
            {!! Form::label('', $model->admin_updated_id, ['class'=>'col-xs-2 control-label']) !!}
        </div>
    </div>
</div>
