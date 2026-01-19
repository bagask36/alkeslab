@extends('template.index')

@section('title', 'Login')

@push('css')
    <style>
        .btn-primary {
            width: 100%;
            padding: 10px;
        }
    </style>
@endpush
@section('content')
    <div class="row justify-content-sm-center h-100 align-items-start mb-5">
        <!-- Ubah h-40 menjadi h-100 dan tambahkan align-items-start -->
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="text-center my-5 bg-white">
                <img src="{{ asset('app/assets/logo.png') }}" alt="logo" class="mb-3" style="width: 25%;">
                <h1 class="text-primary fw-bolder">PT. ALKESLAB PRIMATAMA</h1>
            </div>
            <div class="card shadow-lg bg-light">
                <div class="card-body p-5">
                    <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate
                        autocomplete="off">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger mt-1">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required autofocus>
                            <div class="invalid-feedback">Email is invalid</div>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">Password is required</div>
                        </div>

                        <div class="align-items-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
