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
                    <h3>Social Media For Users</h3>
                    <p class="text-subtitle text-muted">For Create Link Social media for User Fill This Form</p>
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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Socials</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>

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
                            <h4 class="card-title">Create Socials</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('socials.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input hidden name="UserId" id="UserId" value="{{$id}}"/>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Social Media Site</label>
                                                <select class="form-select" id="Name" name="Name">
                                                <option value="Facebook" title="Facebook"> <i class="fa-brands fa-facebook"></i> Facebook </option>
                                                <option value="Twitter" title="Twitter"> <i class="fa-brands fa-twitter"></i> Twitter </option>
                                                <option value="Snapchat" title="Snapchat"> <i class="fa-brands fa-snapchat"></i> Snapchat </option>
                                                <option value="WhatsApp" title="Whatsapp"> <i class="fa-brands fa-whatsapp"></i> Whatsapp </option>
                                                <option value="Linkedin" title="Linkedin"> <i class="fa-brands fa-linkedin"></i> Linkedin </option>
                                                <option value="Youtube" title="Youtube"> <i class="fa-brands fa-youtube"></i> Youtube </option>
                                                <option value="Tiktok" title="Tiktok"> <i class="fa-brands fa-tiktok"></i> Tiktok </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Link">Full Link</label>
                                                <input type="text" id="Link" class="form-control"
                                                    placeholder="Link" name="Link">
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
