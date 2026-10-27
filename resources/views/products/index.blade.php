<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Monitor - Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Product Monitor</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Produk Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Daftar Produk</h5>
            </div>
            <div class="card-body">
                @if($products->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($product->foto_produk)
                                                <img src="{{ asset('images/' . $product->foto_produk) }}"
                                                     alt="{{ $product->nama_produk }}"
                                                     class="img-thumbnail"
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center"
                                                     style="width: 80px; height: 80px;">
                                                    <i class="bi bi-image text-secondary"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td><strong>{{ $product->nama_produk }}</strong></td>
                                        <td>Rp {{ number_format($product->harga_satuan, 0, ',', '.') }}</td>
                                        <td>{{ Str::limit($product->deskripsi_produk, 50) }}</td>
                                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('products.show', $product->id) }}"
                                                   class="btn btn-info btn-sm" title="Lihat">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                   class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-inbox display-1 text-secondary"></i>
                        <h4 class="mt-3">Belum ada produk</h4>
                        <p class="text-muted">Mulai dengan menambahkan produk pertama Anda.</p>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Produk
                        </a>
                    </div>
                @endif
            </div>
            @if($products->count() > 0)
                <div class="card-footer">
                    <small class="text-muted">Total: {{ $products->count() }} produk</small>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
