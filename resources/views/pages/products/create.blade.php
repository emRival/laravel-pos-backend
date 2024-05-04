@extends('layouts.app')

@section('title', 'Create New Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/ionicons201/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>

                <h1>Create New Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">Create New Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Product</h2>
                <p class="section-lead">
                    On this page you can create a new Product and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Write Your Product</h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                            name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>

                                        <textarea class="summernote-simple" name="description"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="food"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Food</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="snack"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Snack</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="category" value="drink"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Drink</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text" class="form-control currency" name="price">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="ion-ios-cart"></i>

                                                </div>
                                            </div>
                                            <input type="number" class="form-control" name="stock">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" accept="image/*" />
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer text-right">


                                    <button type="submit" class="btn btn-primary">Create Product</button>
                                </div>

                            </form>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-Post-create.js') }}"></script>
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('js/page/modules-ion-icons.js') }}"></script>

    <script>
        // Event listener untuk input harga
        document.querySelector('.currency').addEventListener('input', function(e) {
            // Ambil nilai input
            var input = e.target.value;

            // Hapus semua karakter non-digit
            input = input.replace(/[^\d]/g, '');

            // Format angka menjadi format rupiah dengan tanda titik sebagai pemisah ribuan
            var formattedInput = new Intl.NumberFormat('id-ID').format(input);

            // Set nilai input kembali
            e.target.value = formattedInput;
        });
    </script>
@endpush
