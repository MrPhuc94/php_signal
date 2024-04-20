@extends('layouts.app')
@section('content')
    <div class="mt-2 mb-4">
        <h1 class="title1 ">Email Templates</h1>
    </div>
    <x-admin.alert />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Membership Email</h5>
                    <p class="card-text">This email is fired when a user purchase a course.</p>
                    <div>
                        <small>You can make use of these variables</small>
                        <small>{$courseTitle} - {$amount} - {$description}</small>
                        <strong>To make sure you use the double curly braces in your variables</strong>
                    </div>
                    <div>
                        <form action="{{ route('saveTemplate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Body</label>
                                <textarea class="form-control" name="membership">{{ $settings->membership_email_template }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="type" value="membership">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funded Program Email template</h5>
                    <p class="card-text">This email is fired when a user joins a funded program.</p>
                    <div>
                        <form action="{{ route('saveTemplate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Body</label>
                                <textarea class="form-control" name="funded">{{ $settings->funded_email_template }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="type" value="funded">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Direct Trading Email template</h5>
                    <p class="card-text">This email is fired when a user subscribes to direct trading.</p>
                    <div>
                        <form action="{{ route('saveTemplate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Body</label>
                                <textarea class="form-control" name="direct">{{ $settings->direct_trade_email_template }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="type" value="direct">
                                <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
