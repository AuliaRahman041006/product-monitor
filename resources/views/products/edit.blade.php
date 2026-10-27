<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Product Monitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5 class="mb-0">Edit Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk *</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                       id="nama_produk" name="nama_produk"
                                       value="{{ old('nama_produk', $product->nama_produk) }}" required>
                                @error('nama_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga_satuan" class="form-label">Harga Satuan (Rp) *</label>
                                <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror"
                                       id="harga_satuan" name="harga_satuan"
                                       value="{{ old('harga_satuan', $product->harga_satuan) }}" min="0" required>
                                @error('harga_satuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk" class="form-label">Deskripsi Produk *</label>
                                <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror"
                                          id="deskripsi_produk" name="deskripsi_produk"
                                          rows="4" required>{{ old('deskripsi_produk', $product->deskripsi_produk) }}</textarea>
                                @error('deskripsi_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="foto_produk" class="form-label">Foto Produk</label>

                                @if($product->foto_produk)
                                    <div class="mb-2">
                                        <img src="{{ asset('images/' . $product->foto_produk) }}"
                                             alt="Foto saat ini"
                                             class="img-thumbnail"
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="form-text">Foto saat ini</div>
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('foto_produk') is-invalid @enderror"
                                       id="foto_produk" name="foto_produk"
                                       accept="image/jpeg,image/png,image/jpg,image/gif">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengganti foto.</div>
                                @error('foto_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    ← Kembali
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-save"></i> Perbarui Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
