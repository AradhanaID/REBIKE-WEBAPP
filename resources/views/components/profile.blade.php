@extends('layouts.main')

@section('content')
    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="{{ Auth::user()->image }}" alt="Generic placeholder image"
                                    class="img-fluid img-thumbnail mt-4 mb-2"
                                    style="width: 150px; height: auto; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                    style="z-index: 1;">
                                    Edit profile
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{ Auth::user()->name }}</h5>
                                <p>Jakarta</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">253</p>
                                    <p class="small text-muted mb-0">Photos</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">1026</p>
                                    <p class="small text-muted mb-0">Followers</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">478</p>
                                    <p class="small text-muted mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">About</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Web Developer</p>
                                    <p class="font-italic mb-1">Lives in Jakarta</p>
                                    <p class="font-italic mb-0">Photographer</p>
                                </div>
                            </div>
                        </div>
                        @auth
                            <form action="/logout" method="POST">
                                @csrf
                                <button id="logout" class="btn btn-danger ms-4 mb-3 fw-bold">Logout</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection