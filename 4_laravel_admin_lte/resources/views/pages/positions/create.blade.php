@extends('layouts.main')

@section('content')

    <div class="row mb-3">
        <div class="col-8"><h3 class="mb-0">Positions</h3></div>
    </div>

    <div class="card-body border col-6">

        <h5 class="mb-4">Add position</h5>

        {!! Form::open(['url' => route('positions.store'), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        @include('form_elements.text', [
            'name' => 'name',
            'label' => 'Name',
            'attributes' => ['class' => 'form-control limitInput', 'data-label-id' => 'label-name', 'placeholder' => 'Enter the Name']
        ])

        @include('form_elements.control_buttons', ['backRoute' => route('positions.index')])

        {!! Form::close() !!}

    </div>

@endsection
