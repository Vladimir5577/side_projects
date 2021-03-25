@extends('layouts.main')

@section('content')

    <div class="row mb-3">
        <div class="col-8"><h3 class="mb-0">Employees</h3></div>
    </div>

    <div class="card-body border col-6">

        <h5 class="mb-4">Add employee</h5>

        {!! Form::open(['url' => route('employees.store'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

        @include('form_elements.file', [
            'name' => 'photo',
            'label' => 'Photo'
        ])
        @include('form_elements.text', [
            'name' => 'name',
            'label' => 'Name',
            'attributes' => ['class' => 'form-control limitInput', 'data-label-id' => 'label-name', 'placeholder' => 'Enter the Name'],
        ])
        @include('form_elements.text', [
            'name' => 'phone',
            'label' => 'Phone',
            'label_text' => 'Required format +380 (XX) XXX XX XX',
            'attributes' => ['class' => 'form-control phone', 'placeholder' => 'Enter the Phone']
        ])
        @include('form_elements.text', [
            'name' => 'email',
            'label' => 'Email',
            'attributes' => ['class' => 'form-control', 'placeholder' => 'Enter the Email']
        ])
        @include('form_elements.select', [
            'name' => 'position_id',
            'label' => 'Position',
            'url_data' => route('positions'),
            'attributes' => ['class' => 'form-control', 'placeholder' => 'Select the Position']
        ])
        @include('form_elements.text', [
            'name' => 'salary',
            'label' => 'Salary, $',
            'attributes' => ['class' => 'form-control salary', 'placeholder' => 'Enter the Salary']
        ])
        @include('form_elements.select', [
            'name' => 'head_id',
            'label' => 'Head',
            'url_data' => route('employees'),
            'attributes' => ['class' => 'form-control', 'placeholder' => 'Select the Head']
        ])
        @include('form_elements.date', [
            'name' => 'date',
            'label' => 'Date of employment'
        ])

        @include('form_elements.control_buttons', ['backRoute' => route('employees.index')])

        {!! Form::close() !!}

    </div>

@endsection
