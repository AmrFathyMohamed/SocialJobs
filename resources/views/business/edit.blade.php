@extends('layouts.app')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Business For User</h3>
                    <p class="text-subtitle text-muted">For Edit Business for User Fill This Form</p>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Jobs</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('users.index') }}">Business</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Business</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('businesses.update', $business->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input hidden name="UserId" id="UserId" value="{{ $business->UserId }}" />
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Name Of Work</label>
                                                <input type="text" id="Name" class="form-control" name="Name"
                                                    value="{{ $business->Name }}">
                                                @error('Name')
                                                    <p><small class="text-muted"><code>{{ $message }}</code></small></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Photo">Profile Photo</label>
                                                <input type="file" id="Photo" class="form-control" name="Photo">
                                                @error('Photo')
                                                    <p><small class="text-muted"><code>{{ $message }}</code></small></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="VideoFrame">Video Frame</label>
                                                <textarea type="tel" id="VideoFrame" class="form-control" name="VideoFrame">
                                                {{ $business->VideoFrame }}</textarea>
                                                @error('VideoFrame')
                                                    <p><small class="text-muted"><code>{{ $message }}</code></small></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Discription">Discription</label>
                                                <textarea type="tel" id="Discription" class="form-control" name="Discription">
                                                {{ $business->Discription }}</textarea>
                                                @error('Discription')
                                                    <p><small class="text-muted"><code>{{ $message }}</code></small></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Link">Full Link</label>
                                                <input type="text" id="Link" class="form-control" placeholder="Link"
                                                    name="Link" value="{{ $business->Link }}">
                                                @error('Link')
                                                    <p><small class="text-muted"><code>{{ $message }}</code></small></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
