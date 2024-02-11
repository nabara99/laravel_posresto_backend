@if ($message = Session::get('success'))
    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Sukses</div>
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
@endif
