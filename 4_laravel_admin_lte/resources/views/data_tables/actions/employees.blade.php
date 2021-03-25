<a href="javascript:void(0);" class="text-secondary float-right" onClick="showDeleteModal({{ $row->id }})"><i class="fas fa-trash-alt"></i></a>
<a href="{{ route('employees.edit', ['employee' => $row]) }}" class="text-secondary"><i class="fas fa-pencil-alt"></i></a>

<div id="Modal{{ $row->id }}" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove employee {{ $row->name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                {!! Form::open(['url' => route('employees.destroy', ['employee' => $row]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                {{ method_field('DELETE') }}
                {!! Form::button('Remove', ['class' => 'btn btn-secondary', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
