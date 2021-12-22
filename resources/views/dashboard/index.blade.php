@extends('layouts.app')
@section('content')
    @if (isset($data))
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-body">
                        <h1>Status
                            @if ($data->status == 'menunggu')
                                <span class="badge badge-secondary">Menunggu</span>
                            @elseif ($data->status == 'diterima')
                                <span class="badge badge-primary">Diterima</span>
                            @elseif ($data->status == 'dicadangkan')
                                <span class="badge badge-warning">dicadangkan</span>
                            @elseif ($data->status == 'tidak diterima')
                                <span class="badge badge-danger">Tidak Diterima</span>
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
