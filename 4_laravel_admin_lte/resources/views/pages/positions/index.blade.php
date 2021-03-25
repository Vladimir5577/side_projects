@extends('layouts.main')

@section('content')

    <div class="row mb-3">
        <div class="col-8"><h3 class="mb-0">Positions</h3></div>
        <div class="col-4">{!! Html::link(route('positions.create'), 'Add position', ['class'=>'btn btn-secondary float-right ']) !!}</div>
    </div>

    <div class="card-body border">

        <h5>Position list</h5>

        <div class="table-responsive">
            <table class="table table-bordered positions">
                <thead>
                    <tr>
                        <th class="hide-icons">Name</th>
                        <th class="hide-icons">Last update</th>
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
            $('.positions').dataTable({
                processing: true,
                serverSide: true,
                oSearch: { bSmart: false, bRegex: true },
                ajax: '{{ route('positions.index') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'updated_at', name: 'updated_at', sWidth: '150px', orderable: false, searchable: false },
                    { data: 'action', name: 'action', sWidth: '10px', orderable: false, searchable: false },
                ]
            });
        });
    </script>

@endsection
