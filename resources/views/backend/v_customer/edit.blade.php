@extends('backend.v_layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $judul }}</h5>
                
                <form action="{{ route('backend.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="card shadow-sm p-3">
                                <h6>Foto Profil</h6>
                                <div class="mb-3">
                                    @if($customer->user->foto)
                                        <img src="{{ asset('storage/img-customer/'.$customer->user->foto) }}" class="img-fluid rounded shadow-sm" id="foto-preview" style="width: 100%; max-height: 350px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('storage/img-customer/no-image.jpg') }}" class="img-fluid rounded shadow-sm" id="foto-preview" style="width: 100%;">
                                    @endif
                                </div>
                                <div class="form-group text-left">
                                    <label>Ganti Foto</label>
                                    <input type="file" name="foto" class="form-control" onchange="previewImage(this)">
                                    <small class="text-muted">Format: JPG, PNG, JPEG. Maks: 1MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" value="{{ old('nama', $customer->user->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama sesuai identitas">
                                        @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ old('email', $customer->user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="contoh@mail.com">
                                        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nomor HP</label>
                                        <input type="text" name="hp" value="{{ old('hp', $customer->hp) }}" class="form-control @error('hp') is-invalid @enderror" placeholder="08xxxxxx">
                                        @error('hp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" name="pos" value="{{ old('pos', $customer->pos) }}" class="form-control @error('pos') is-invalid @enderror" placeholder="5 Digit">
                                        @error('pos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Akun</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror" style="border-left: 5px solid {{ $customer->user->status == 1 ? '#28a745' : '#dc3545' }};">
                                            <option value="1" {{ old('status', $customer->user->status) == 1 ? 'selected' : '' }} class="text-success">
                                                Aktif
                                            </option>
                                            <option value="0" {{ old('status', $customer->user->status) == 0 ? 'selected' : '' }} class="text-danger">
                                                Tidak Aktif
                                            </option>
                                        </select>
                                        @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4" placeholder="Jl. Nama Jalan, No. Rumah, RT/RW...">{{ old('alamat', $customer->alamat) }}</textarea>
                                @error('alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('backend.customer.index') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection