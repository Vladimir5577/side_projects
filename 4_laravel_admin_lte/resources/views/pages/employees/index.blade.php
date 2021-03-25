@extends('layouts.main')

@section('content')

    <div class="row mb-3">
        <div class="col-8"><h3 class="mb-0">Employees</h3></div>
        <div class="col-4">{!! Html::link(route('employees.create'), 'Add employee', ['class'=>'btn btn-secondary float-right ']) !!}</div>
    </div>

    <div class="card-body border">

        <h5>Employee list</h5>

        <div class="table-responsive">
            <table class="table table-bordered employees" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="hide-icons">Photo</th>
                        <th class="hide-icons">Name</th>
                        <th class="hide-icons">Position</th>
                        <th class="hide-icons">Date of employment</th>
                        <th class="hide-icons">Phone number</th>
                        <th class="hide-icons">Email</th>
                        <th class="hide-icons">Salary</th>
                        <th class="hide-icons">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        $(function() {
            $('.employees').dataTable({
                processing: true,
                serverSide: true,
                oSearch: { bSmart: false, bRegex: true },
                ajax: '{{ route('employees.index') }}',
                columns: [
                    { data: 'photo', name: 'photo', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position', orderable: false },
                    { data: 'date', name: 'date' },
                    { data: 'phone', name: 'phone', orderable: false },
                    { data: 'email', name: 'email' },
                    { data: 'salary', name: 'salary' },
                    {
                        data: 'action',
                        name: 'action',
                        sWidth: '10px',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
        });
    </script>

@endsection
