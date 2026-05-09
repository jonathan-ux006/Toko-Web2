@extends('backend.v_layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $judul }}</h5>
                
                <div class="row d-flex align-items-stretch">
                    <div class="col-md-4">
                        <div class="card shadow-sm p-2 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                            @if($customer->user->foto)
                                <img src="{{ asset('storage/img-customer/'.$customer->user->foto) }}" class="img-fluid rounded" style="width: 100%; max-height: 400px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/img-customer/no-image.jpg') }}" class="img-fluid rounded" style="width: 100%;">
                            @endif
                            <div class="mt-3">
                                <span class="badge {{ $customer->user->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                    {{ $customer->user->status == 1 ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th width="200px" class="bg-light">Nama Lengkap</th>
                                    <td>: {{ $customer->user->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Email</th>
                                    <td>: {{ $customer->user->email }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Alamat</th>
                                    <td>: {{ $customer->alamat ?? 'Belum diisi' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Kode Pos</th>
                                    <td>: {{ $customer->pos ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">ID Google</th>
                                    <td>: <small class="text-muted">{{ $customer->google_id ?? 'Pendaftaran Manual' }}</small></td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Bergabung Pada</th>
                                    <td>: {{ $customer->created_at ? $customer->created_at->format('d M Y H:i') : '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('backend.customer.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('backend.customer.edit', $customer->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Ubah Data
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection