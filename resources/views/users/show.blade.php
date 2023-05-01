@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    {{-- <h3>System Users</h3> --}}
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Jobs</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>

                        </ol>
                    </nav>
                </div> --}}
            </div>
        </div>
        <section class="section">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-3 mb-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    @if ($User->ProfilePhoto != null && $User->ProfilePhoto != '')
                                        <img src="data:image/png;base64,{{ $User->ProfilePhoto }}" class="rounded-circle"
                                            style="width: 150px;height: 150px;object-fit: cover;">
                                    @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle"
                                            style="width: 150px;height: 150px;object-fit: cover;">
                                    @endif

                                    <div class="mt-3">
                                        <h4>{{ $User->FullName }}</h4>
                                        {{-- <p class="text-secondary mb-1">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-globe mr-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path
                                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                </path>
                                            </svg> <a href="./{{ $User->Link }}"> WebSite</a></h6>
                                        </p> --}}
                                        <p class="text-muted font-size-sm">
                                            <span class="badge bg-success"><a style="color: white;"
                                                    href="{{ route('downloadPhoneNumber') }}">
                                                    Save to Contacts</a></span>
                                            {{-- <i class="bi bi-plus-circle"></i>  --}}
                                            @if (request()->session()->get('LoginID') == $User->Link)
                                                @if ($User->IsAdmin == 1)
                                                    <span class="badge bg-dark">Edit

                                                        <a style="color: white;" class="bi bi-pencil"
                                                            href="{{ route('users.edit', $User->id) }}"></a>


                                                    </span>
                                                @else
                                                    <span class="badge bg-primary">Edit
                                                        <a style="color: white;" class="bi bi-pencil"
                                                            href="{{ route('users.edit', $User->id) }}"></a>
                                                @endif
                                                </span>
                                            @endif
                                        </p>
                                        <div class="buttonsiconss">
                                            @foreach ($User->UserSocial as $item)
                                                @php
                                                    $link = !empty($item['Link']) ? $item['Link'] : '';
                                                    switch ($item['Name']) {
                                                        case 'Facebook':
                                                            $iconClass = 'fa-brands fa-2x fa-facebook';
                                                            $title = 'Facebook';
                                                            break;
                                                        case 'Twitter':
                                                            $iconClass = 'fa-brands fa-2x fa-twitter';
                                                            $title = 'Twitter';
                                                            break;
                                                        case 'Snapchat':
                                                            $iconClass = 'fa-brands fa-2x fa-snapchat';
                                                            $title = 'Snapchat';
                                                            break;
                                                        case 'WhatsApp':
                                                            $iconClass = 'fa-brands fa-2x fa-whatsapp';
                                                            $title = 'WhatsApp';
                                                            break;
                                                        case 'Linkedin':
                                                            $iconClass = 'fa-brands fa-2x fa-linkedin';
                                                            $title = 'Linkedin';
                                                            break;
                                                        case 'Youtube':
                                                            $iconClass = 'fa-brands fa-2x fa-youtube';
                                                            $title = 'Youtube';
                                                            break;
                                                        case 'Tiktok':
                                                            $iconClass = 'fa-brands fa-2x fa-tiktok';
                                                            $title = 'Tiktok';
                                                            break;
                                                        case 'Instagram':
                                                            $iconClass = 'fa-brands fa-2x fa-instagram';
                                                            $title = 'Instagram';
                                                            break;
                                                        default:
                                                            $iconClass = '';
                                                            $title = '';
                                                    }
                                                @endphp

                                                {{-- <li><i
                                                               class="{{ $iconClass }} "></i></a></li> --}}
                                                {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-codepen"></i></a></li> --}}
                                                <a style="color: black" href="{{ url($link) }}"><i
                                                        class="{{ $iconClass }}"></i></a>
                                                {{-- <i class="fa fa-5x fa-twitter"></i> --}}
                                            @endforeach

                                        </div>
                                        @if (request()->session()->get('LoginID') == $User->Link)
                                            <div class="buttons">
                                                <a href="{{ route('socials.create', $User->id) }}"
                                                    class="btn icon icon-left btn-success btn-sm">Add Social</a>
                                                <a href="{{ route('businesses.create', $User->id) }}"
                                                    class="btn icon icon-left btn-primary  btn-sm">Add Work</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (request()->session()->get('LoginID') == $User->Link)
                            <div class="card mt-1">

                                <ul class="list-group list-group-flush">


                                    @foreach ($User->UserSocial as $item)
                                        @php
                                            $link = !empty($item['Link']) ? $item['Link'] : '';
                                            switch ($item['Name']) {
                                                case 'Facebook':
                                                    $iconClass = 'fa-brands fa-facebook';
                                                    $title = 'Facebook';
                                                    break;
                                                case 'Twitter':
                                                    $iconClass = 'fa-brands fa-twitter';
                                                    $title = 'Twitter';
                                                    break;
                                                case 'Snapchat':
                                                    $iconClass = 'fa-brands fa-snapchat';
                                                    $title = 'Snapchat';
                                                    break;
                                                case 'WhatsApp':
                                                    $iconClass = 'fa-brands fa-whatsapp';
                                                    $title = 'WhatsApp';
                                                    break;
                                                case 'Linkedin':
                                                    $iconClass = 'fa-brands fa-linkedin';
                                                    $title = 'Linkedin';
                                                    break;
                                                case 'Youtube':
                                                    $iconClass = 'fa-brands fa-youtube';
                                                    $title = 'Youtube';
                                                    break;
                                                case 'Tiktok':
                                                    $iconClass = 'fa-brands fa-tiktok';
                                                    $title = 'Tiktok';
                                                    break;
                                                case 'Instagram':
                                                    $iconClass = 'fa-brands fa-2x fa-instagram';
                                                    $title = 'Instagram';
                                                    break;
                                                default:
                                                    $iconClass = '';
                                                    $title = '';
                                            }
                                        @endphp
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <a href="{{ url($link) }}">
                                                <h5 class="mb-0"><i class="{{ $iconClass }}"></i> {{ $title }}
                                                </h5>
                                            </a>
                                            {{-- <a href="{{ route('socials.destroy', $item->id) }}">
                                        <i class="fa-sharp fa-solid fa-trash ml-auto" style="color: #ff0000;"></i>
                                        </a> --}}

                                            <form action="{{ route('socials.destroy', $item->id) }}" method="Post">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn icon icon-left"><i
                                                        class="fa-sharp fa-solid fa-trash ml-auto"
                                                        style="color: #ff0000;"></i></button>
                                            </form>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $User->FullName }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $User->Email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href='tel:{{ $User->PhoneNumber }}'><i class="bi bi-telephone"></i></a>
                                        {{ $User->PhoneNumber }}


                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Link</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href='{{ $User->Link }}'> {{ $User->Link }}</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="row gutters-sm">
                            @foreach ($User->UserBusiness as $item)
                                <div class="col-12 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">

                                                <div class="mt-3">
                                                    <h4>{{ $item->Name }}</h4>
                                                    <p class="text-muted font-size-sm">{{ $item->Discription }}</p>
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-globe mr-2 icon-inline">
                                                            <circle cx="12" cy="12" r="10">
                                                            </circle>
                                                            <line x1="2" y1="12" x2="22"
                                                                y2="12"></line>
                                                            <path
                                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                            </path>
                                                        </svg> <a href="{{ url($item->Link) }}">WorkLink</a></h6>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mx-auto">
                                                    <div class="mt-1 w-100">
                                                        @if ($item->Photo)
                                                            <img src="data:image/png;base64,{{ $item->Photo }}"
                                                                style="width: 100%;object-fit: cover;">
                                                        @endif
                                                    </div>
                                                    <div class="mt-1 w-100">
                                                        @if ($item->VideoFrame)
                                                            <iframe
                                                                src="http://localhost/phpmyadmin/index.php?route=/sql&db=socialjobs&table=users&pos=0"
                                                                style="width: 100%;object-fit: cover;">
                                                            </iframe>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if (request()->session()->get('LoginID') == $User->Link)
                                                    <div class="buttons border-top w-100 text-center mt-3 pt-3">
                                                        <form action="{{ route('businesses.destroy', $item->id) }}"
                                                            method="Post">
                                                            <a href="{{ route('businesses.edit', $item->id) }}"
                                                                class="btn icon btn-warning icon-left"><i
                                                                    class="fa-sharp fa-solid fa-pen-to-square ml-auto"></i>Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn icon btn-danger icon-left"><i
                                                                    class="fa-sharp fa-solid fa-trash ml-auto"></i>
                                                                Delete</button>
                                                        </form>

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>



                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
