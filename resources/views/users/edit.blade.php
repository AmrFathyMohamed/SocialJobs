@extends('layouts.app')
@section('content')


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>System Users</h3>
                    <p class="text-subtitle text-muted">For Edit New User Fill This Form</p>
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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a>
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
                            <h4 class="card-title">Edit User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('users.update', $Users->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @if ($request->session()->get('IsAdmin'))
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="FullName">Full Name</label>
                                                    <input type="text" id="FullName" class="form-control"
                                                        placeholder="Full Name" name="FullName"
                                                        value="{{ $Users->FullName }}">
                                                    @error('FullName')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ProfilePhoto">Profile Photo</label>
                                                    <input type="file" id="ProfilePhoto" class="form-control"
                                                        name="ProfilePhoto">
                                                    @error('ProfilePhoto')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="PhoneNumber">Phone Number</label>
                                                    <input type="tel" id="PhoneNumber" class="form-control"
                                                        placeholder="Phone Number" name="PhoneNumber"
                                                        value="{{ $Users->PhoneNumber }}">
                                                    @error('PhoneNumber')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Email">Email</label>
                                                    <input type="email" id="Email" class="form-control" name="Email"
                                                        placeholder="Email" value="{{ $Users->Email }}">
                                                    @error('Email')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="Password" id="Password" class="form-control"
                                                        name="Password" placeholder="Password"
                                                        value="{{ $Users->Password }}">
                                                    @error('Password')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Link">Link</label>
                                                    <input type="text" id="Link" class="form-control" name="Link"
                                                        placeholder="Link" value="{{ $Users->Link }}">
                                                    @error('Link')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="form-group col-12">
                                                <div class='form-check'>
                                                    <div class="checkbox">
                                                        <input class="form-check-input" type="checkbox" id="IsAdmin" name="IsAdmin" value="1"
           {{ $Users->IsAdmin ? 'checked' : '' }}>

                                                        {{-- <input type="checkbox" id="IsAdmin" name="IsAdmin"
                                                            class='form-check-input' checked>
                                                        <label for="checkbox5">Is Admin</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ProfilePhoto">Profile Photo</label>
                                                    <input type="file" id="ProfilePhoto" class="form-control"
                                                        name="ProfilePhoto">
                                                    @error('ProfilePhoto')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Email">Email</label>
                                                    <input type="email" id="Email" class="form-control"
                                                        name="Email" placeholder="Email" value="{{ $Users->Email }}">
                                                    @error('Email')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="Password" id="Password" class="form-control"
                                                        name="Password" placeholder="Password"
                                                        value="{{ $Users->Password }}">
                                                    @error('Password')
                                                        <p><small class="text-muted"><code>{{ $message }}</code></small>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    @endif

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
