@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">All Product</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Product</h2>
                <p class="section-lead">
                    You can manage all Product, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="float-left">
                                    <form method="GET" action="{{ route('products.index') }}">
                                        <select class="form-control selectric" name="search" onchange="this.form.submit()">
                                            <option value=" "
                                                {{ request('search') == ' ' || !request('search') ? 'selected' : '' }}>
                                                ALL</option>
                                            //enum
                                            <option value="FOOD" {{ request('search') == 'FOOD' ? 'selected' : '' }}>
                                                FOOD</option>
                                            <option value="DRINK" {{ request('search') == 'DRINK' ? 'selected' : '' }}>
                                                DRINK</option>
                                            <option value="SNACK" {{ request('search') == 'SNACK' ? 'selected' : '' }}>
                                                SNACK
                                            </option>
                                        </select>
                                    </form>
                                </div>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('products.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                                    <td>{{ $product->created_at }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <!-- Tombol Edit -->
                                                            <a href='{{ route('products.edit', $product->id) }}'
                                                                class="btn btn-info btn-sm mr-2">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <!-- Tombol Hapus -->
                                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                                method="POST" id="delete{{ $product->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm"
                                                                    data-confirm="Hapus|Apakah anda yakin ingin menghapus produk {{ $product->name }}?"
                                                                    data-confirm-yes="event.preventDefault(); document.getElementById('delete{{ $product->id }}').submit()">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                                <!-- Modal Konfirmasi Hapus -->
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
