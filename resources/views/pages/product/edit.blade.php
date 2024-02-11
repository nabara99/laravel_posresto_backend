@extends('layouts.app')

@section('title', 'Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
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
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('product.update', $product) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-header">
                                    <h4>Edit Produk</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('product.index') }}" class="btn btn-primary btn-icon"><i
                                                class="fa-solid fa-arrow-rotate-left"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            name="name" value="{{ $product->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text"
                                            class="form-control @error('description')
                                            is-invalid
                                        @enderror"
                                            name="description" value="{{ $product->description }}">
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number"
                                            class="form-control @error('price')
                                            is-invalid
                                        @enderror"
                                            name="price" value="{{ $product->price }}">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number"
                                            class="form-control @error('stock')
                                            is-invalid
                                        @enderror"
                                            name="stock" value="{{ $product->stock }}">
                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control selectric @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            <option value="">-- Pilih Kategory --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Photo Product</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image"
                                                @error('image') is-invalid @enderror>
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($product->image)
                                            <img src="{{ asset('/' . $product->image) }}" alt="" width="100px"
                                                class="img-thumbnail">
                                        @else
                                            <span class="badge badge-danger">No Image</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="1"
                                                    class="selectgroup-input" {{ $product->status == 1 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Aktiv</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="1"
                                                    class="selectgroup-input" {{ $product->status == 0 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">In Aktiv</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Favorite</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="is_favorite" value="1"
                                                    class="selectgroup-input"
                                                    {{ $product->is_favorite == 1 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Ya</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="is_favorite" value="0"
                                                    class="selectgroup-input"
                                                    {{ $product->is_favorite == 0 ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Tidak</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
