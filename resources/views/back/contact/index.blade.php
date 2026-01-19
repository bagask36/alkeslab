    @extends('back.template.index')

    @section('title', 'Contact')

    @push('css')
        <!-- Add any custom CSS here if needed -->
    @endpush

    @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Alamat & Kontak</h1>
            </div>
        </div>

        <!-- Alamat Section -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Alamat</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addressModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="addressTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="fw-bolder">
                                <th>No</th>
                                <th>Alamat</th>
                                <th>Link Google Maps</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data alamat akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Telepon Section -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Telepon</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addressModal">Tambah</button>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="phoneTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="fw-bolder">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Telepon</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data telepon akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Media Sosial Section -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Media Sosial</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addressModal">Tambah</button>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="socialTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="fw-bolder">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Link Media Sosial</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data media sosial akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')
    @endpush
