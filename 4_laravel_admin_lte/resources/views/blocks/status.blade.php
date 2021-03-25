@if (session('status'))
    <div id="status-block" class="container-fluid">
        <div class="bg-dark" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 0;">
            <div style="position: absolute; right: 0; z-index: 1;">
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
