<div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6">
                @if (!is_null($user))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">New Registration!</h4>
                        <p>
                            You have a new registration from <strong>{{ $user['name'] }}</strong> with email
                            <strong>{{ $user['email'] }}</strong>.
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
