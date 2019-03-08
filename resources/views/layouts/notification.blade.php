
@if(session('danger'))
    <div id="notifications" class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Error!</strong> {{ session('danger') }} </strong>
    </div>
@endif

@if(session('success'))
    <div id="notifications" class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ session('success') }} </strong>
    </div>
@endif

@if(session('warning'))
    <div id="notifications" class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Warning!</strong> {{ session('warning') }}</strong>
    </div>
@endif
