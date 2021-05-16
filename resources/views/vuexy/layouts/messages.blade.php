@if (session('success'))
    <div class="alert alert-success">
        <button type="button" aria-hidden="true" class="close">
        <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <span class="alert-msg"><b> Success - </b> {{ session('success') }}</span>
    </div>
@endif

@if (session('failure'))
    <div class="alert alert-danger">
        <button type="button" aria-hidden="true" class="close">
        <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <span class="alert-msg"><b> Failed - </b> {{ session('failure') }}</span>
    </div>
@endif
