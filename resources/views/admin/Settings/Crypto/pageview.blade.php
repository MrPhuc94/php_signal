@extends('layouts.app')
@section('content')
    <div class="mt-2 mb-4">
        <h1 class="title1 ">Crypto swap Settings</h1>
    </div>
    <x-admin.alert />
    <div class="mb-5 row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <form action="{{ route('exchangefee') }}" method="post">
                            @csrf
                            <div class=" form-group">
                                <h5 class="">Exchange Fee</h5>
                                <input type="text" name="fee" value="{{ $moresettings->fee }}" class=" form-control "
                                    id="">
                            </div>
                            @if ($settings->currency != '$')
                                <div class=" form-group">
                                    <h5 class="">{{ $settings->s_currency }}/USD Rate</h5>
                                    <input type="number" name="rate" value="{{ $moresettings->currency_rate }}"
                                        step=".0" class=" form-control " placeholder="450">
                                    <small class="">This rate will be used to calculate your users crypto
                                        equivilent in your chosen currency.</small>
                                </div>
                            @endif
                            <div class=" form-group text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="my-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Token
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Token</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('addCrypto') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Token Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Token Symbol</label>
                                                <input type="text" placeholder="in Uppercase" class="form-control"
                                                    name="symbol" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Token Price in USD($)</label>
                                                <input type="number" step="any" class="form-control"
                                                    name="price_in_usd" placeholder="1 Token = how much $" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class=" table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th scope="col">Asset Name</th>
                                        <th scope="col">Asset Symbol</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($currencies as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->symbol }}</td>
                                            <td>
                                                @if ($item->status == 'enabled')
                                                    <span class="badge badge-success">enabled </span>
                                                @else
                                                    <span class="badge badge-danger">disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $item->id }}">Edit</a>
                                                @if ($item->status == 'enabled')
                                                    <a href="{{ route('setassetstatus', ['asset' => $item->name, 'status' => 'disabled', 'default' => false]) }}"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                @else
                                                    <a href="{{ route('setassetstatus', ['asset' => $item->name, 'status' => 'enabled', 'default' => false]) }}"
                                                        class="btn btn-success btn-sm">Enable</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Token</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('addCrypto') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Token Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    required value="{{ $item->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Token Symbol</label>
                                                                <input type="text" class="form-control" name="symbol"
                                                                    required value="{{ $item->symbol }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Token Price in USD($)</label>
                                                                <input type="number" step="any" class="form-control"
                                                                    name="price_in_usd" placeholder="1 Token = how much $"
                                                                    value="{{ $item->price_in_usd }}" required>
                                                            </div>
                                                            <input type="hidden" name="assetId"
                                                                value="{{ $item->id }}">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @include('admin.Settings.Crypto.assets')
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <small class="">Be sure that non of your users have balances greater than 0 in
                                thier asset account before you disable the asset.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#cryptoyes').on('click', function() {
            // let truevalue = $('#cryptoyes').val()
            let uurl = "{{ url('admin/dashboard/useexchange') }}" + '/' + 'true';
            $.ajax({
                url: uurl,
                type: 'GET',

                success: function(response) {
                    if (response.status === 200) {
                        $.notify({
                            // options
                            icon: 'flaticon-alarm-1',
                            title: 'Success',
                            message: response.success,
                        }, {
                            // settings
                            type: 'success',
                            allow_dismiss: true,
                            newest_on_top: false,
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            offset: 20,
                            spacing: 10,
                            z_index: 1031,
                            delay: 5000,
                            timer: 1000,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            },

                        });
                    } else {

                    }
                },
                error: function(error) {
                    console.log(error);
                },
            });
        });

        $('#cryptono').on('click', function() {
            // let truevalue = $('#cryptoyes').val()
            let uurl = "{{ url('admin/dashboard/useexchange') }}" + '/' + 'false';
            $.ajax({
                url: uurl,
                type: 'GET',

                success: function(response) {
                    if (response.status === 200) {
                        $.notify({
                            // options
                            icon: 'flaticon-alarm-1',
                            title: 'Success',
                            message: response.success,
                        }, {
                            // settings
                            type: 'success',
                            allow_dismiss: true,
                            newest_on_top: false,
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            offset: 20,
                            spacing: 10,
                            z_index: 1031,
                            delay: 5000,
                            timer: 1000,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            },

                        });
                    } else {

                    }
                },
                error: function(error) {
                    console.log(error);
                },
            });
        });
    </script>
@endpush
