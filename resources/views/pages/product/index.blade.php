@extends('layouts.app')

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Produk</h4>
                                <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Produk</a>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari produk"
                                                name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->name_category }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ number_format($product->price) }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>
                                                    @if ($product->image)
                                                        <img src="{{ asset('/' . $product->image) }}" alt=""
                                                            width="100px" class="img-thumbnail">
                                                    @else
                                                        <span class="badge badge-danger">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-left">
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-pencil"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('product.destroy', $product->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                onclick="return confirm('Yakin menghapus data?')">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
