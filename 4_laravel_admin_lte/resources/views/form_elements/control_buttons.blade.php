<div class='form-group mt-5'>
    <div class='row'>
        <div class='col-4'></div>
        <div class='col-4'>
            <div class='col-xs-offset-2 col-xs-10'>
                <a href='{{ $backRoute }}' class='btn btn-outline-secondary btn-block'>Cancel</a>
            </div>
        </div>
        <div class='col-4'>
            <div class='col-xs-offset-2 col-xs-10'>
                {!! Form::button('Save', ['class' => 'btn btn-secondary btn-block', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
</div>
