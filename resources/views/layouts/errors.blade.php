@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Error! </strong>There were some errors with inputs.
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>

@endif