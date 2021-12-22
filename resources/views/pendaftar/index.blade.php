@extends('layouts.app')

@section('title', 'Data Pendaftar')

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover dataTable" id="pendaftar">
                    <tr>
                        <th>No. Pendaftaran</th>
                        <th>B. Indonesia</th>
                        <th>B. Inggris</th>
                        <th>Matematika</th>
                        <th>IPA</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($form as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->nilai_indo }}</td>
                            <td>{{ $f->nilai_ing }}</td>
                            <td>{{ $f->nilai_mtk }}</td>
                            <td>{{ $f->nilai_ipa }}</td>
                            <td>{{ $f->nilai_indo + $f->nilai_ing + $f->nilai_ipa + $f->nilai_mtk }}</td>
                            <td>
                                @if ($f->status == 'menunggu')
                                    <span class="badge badge-secondary">Menunggu</span>
                                @elseif ($f->status == 'diterima')
                                    <span class="badge badge-primary">Diterima</span>
                                @elseif ($f->status == 'dicadangkan')
                                    <span class="badge badge-warning">dicadangkan</span>
                                @elseif ($f->status == 'tidak diterima')
                                    <span class="badge badge-danger">Tidak Diterima</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn-link" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('pendaftar.show', $f->id) }}"
                                            data-id="{{ $f->id }}">
                                            <span>Detail</span>
                                        </a>
                                        <a class="dropdown-item diterima" href="#" data-id="{{ $f->id }}">
                                            <span>Diterima</span>
                                        </a>
                                        <a class="dropdown-item dicadangkan" href="#" data-id="{{ $f->id }}">
                                            <span>Dicadangkan</span>
                                        </a>
                                        <a class="dropdown-item tidak-diterima" href="#" data-id="{{ $f->id }}">
                                            <span>Tidak Diterima</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#pendaftar').on('click', '.diterima', function(event) {
            event.preventDefault();
            swal({
                title: `Warning`,
                text: `Are you sure?`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#229ebc',
                confirmButtonText: 'Yes',
                dangerMode: true,
            }, () => {
                $.ajax({
                    type: 'PATCH',
                    url: `{{ url('/pendaftar/') }}/${$(this).data('id')}`,
                    data: {
                        "status": "diterima",
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                type: "success",
                                title: "Diterima",
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            location.reload();
                        }
                    }
                });
            })
        });
        $('#pendaftar').on('click', '.dicadangkan', function(event) {
            event.preventDefault();
            swal({
                title: `Warning`,
                text: `Are you sure?`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#229ebc',
                confirmButtonText: 'Yes',
                dangerMode: true,
            }, () => {
                $.ajax({
                    type: 'PATCH',
                    url: `{{ url('/pendaftar/') }}/${$(this).data('id')}`,
                    data: {
                        "status": "dicadangkan",
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                type: "success",
                                title: "Dicadangkan",
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            location.reload();
                        }
                    }
                });
            })
        });
        $('#pendaftar').on('click', '.tidak-diterima', function(event) {
            event.preventDefault();
            swal({
                title: `Warning`,
                text: `Are you sure?`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#229ebc',
                confirmButtonText: 'Yes',
                dangerMode: true,
            }, () => {
                $.ajax({
                    type: 'PATCH',
                    url: `{{ url('/pendaftar/') }}/${$(this).data('id')}`,
                    data: {
                        "status": "tidak diterima",
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                type: "success",
                                title: "Tidak diterima",
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            location.reload();
                        }
                    }
                });
            })
        });
    </script>
@endpush
