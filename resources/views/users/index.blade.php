@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>System Users</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
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
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create User</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th> Full Name </th>
                                <th> Phone Number </th>
                                <th> Email </th>
                                {{-- <th> Password </th> --}}
                                <th> Role </th>
                                <th> Link </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $User)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                @if ($User->ProfilePhoto != null && $User->ProfilePhoto != '')
                                                    <img src="data:image/png;base64,{{ $User->ProfilePhoto }}">

                                                    @if ($User->id % 3 == 0)
                                                        <span class="avatar-status bg-success"></span>
                                                    @else
                                                        <span class="avatar-status bg-danger"></span>
                                                    @endif
                                                @else
                                                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                                                @endif
                                            </div>
                                            <p class="font-bold ms-3 mb-0"><a href="#">{{ $User->FullName }}</a></p>
                                        </div>
                                    </td>

                                    <td>{{ $User->PhoneNumber }}</td>
                                    <td>{{ $User->Email }}</td>
                                    {{-- <td>{{ $User->Password }}</td> --}}
                                    <td>
                                        @if ($User->IsAdmin == 1)
                                            <span class="badge bg-dark">Admin</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ substr($User->Link, strpos($User->Link, 'text=')) }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $User->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('users.edit', $User->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
    </div>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
