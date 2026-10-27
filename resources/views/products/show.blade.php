<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Product Monitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Detail Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                @if($product->foto_produk)
                                    <img src="{{ asset('images/' . $product->foto_produk) }}"
                                         alt="{{ $product->nama_produk }}"
                                         class="img-fluid rounded"
                                         style="max-height: 250px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                         style="height: 250px;">
                                        <div class="text-center">
                                            <i class="bi bi-image display-1 text-secondary"></i>
                                            <p class="mt-2 text-muted">Tidak ada foto</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-primary">{{ $product->nama_produk }}</h3>
                                <div class="mb-3">
                                    <h5 class="text-success">Rp {{ number_format($product->harga_satuan, 0, ',', '.') }}</h5>
                                </div>
                                <div class="mb-3">
                                    <h6>Deskripsi:</h6>
                                    <p class="text-muted">{{ $product->deskripsi_produk }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar"></i>
                                            Dibuat: {{ $product->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar-check"></i>
                                            Diperbarui: {{ $product->updated_at->format('d/m/Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                ← Kembali ke Daftar
                            </a>
                            <div>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
