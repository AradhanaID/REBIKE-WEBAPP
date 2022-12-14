@extends('layouts.main')
@section('extra')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/sass/forum.scss'])
@endsection
@section('content')
    <div data-aos="fade-up" class="row">
        <div class="col">
            <h1 class="custom-display-text display-4 mb-3">Forum</h1>
            <form action="/forum/search" method="POST">
                @csrf
                <div class="input-group w-100 ">
                    <input type="text" class="form-control p-3" style="height: 48px" placeholder="Search Topics"
                        aria-label="Search Topics" aria-describedby="button-addon2" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-primary px-4" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            @foreach ($posts as $post)
                <a data-aos="fade-up" href="/forum/post/{{ $post->slug }}" class="text-decoration-none text-dark">
                    <div class="card w-100 my-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between gap-3">
                                <div class="">
                                    @auth
                                        @if (Auth::user()->username === $post->user->username)
                                            <p class="text-primary mb-1">
                                                <i class="bi bi-person"></i>
                                                Your Post
                                            </p>
                                        @endif
                                    @endauth
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-3 text-muted fw-normal">{{ $post->user->username }}</h6>
                                </div>
                                @auth
                                    @if (Auth::user()->id === $post->user_id)
                                        <div class="text-muted d-flex gap-2">
                                            <i class="bi bi-pencil-square edit"></i>
                                            <form action="/form/post/{{ $post->slug }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="bi bi-trash3 delete p-0 border-0 bg-white"></button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            {!! Str::limit($post->content, 150) !!}
                            <div class="d-flex mt-3">
                                <a href="#" class="my-0 text-decoration-none d-block py-1 px-3 rounded actions"><i
                                        class="bi bi-hand-thumbs-up me-2"></i>Like</a>
                                <a href="#" class="my-0 text-decoration-none d-block py-1 px-3 rounded actions"><i
                                        class="bi bi-hand-thumbs-down me-2"></i>Dislike</a>
                                <a href="#" class="my-0 text-decoration-none d-block py-1 px-3 rounded actions"><i
                                        class="bi bi-chat-left-text me-2"></i>Comments</a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="col-4">
            @auth

                <a class="d-flex align-items-center gap-2 mb-3 text-decoration-none text-dark">
                    <div>
                        <img src="{{ Auth::user()->image !== null ? asset('storage/user-profile-image/' . Auth::user()->image) : asset('storage/user-profile-image/profile-image-default.jpg') }}"
                            class="rounded-circle" width="75px" height="75px" style="object-fit: cover">
                    </div>
                    <div class="">
                        <h5 class="card-title fw-bold">{{ Auth::user()->name }}</h5>
                        <p class="card-text text-muted">{{ Auth::user()->username }}</p>
                    </div>
                </a>
                <div class="card border-0 mb-3">
                    <a href="/forum/create" class="text-decoration-none">
                        <div class="mb-3">
                            <button
                                class="btn btn-primary py-3 px-4 text-white d-flex align-items-center justify-content-center"
                                style="border-radius: 50px" type="button">
                                <i class="bi bi-plus h5 me-1 my-0"></i><span class="h5 my-0">Create Post</span>
                            </button>
                        </div>
                    </a>
                    <a class="text-decoration-none text-black options py-2 px-3 rounded" href="/myPost"><i
                            class="bi bi-card-heading me-2"></i>Your Posts</a>
                    <a class="text-decoration-none text-black options py-2 px-3 rounded" href=""><i
                            class="bi bi-people me-2"></i>Connections</a>
                    <a class="text-decoration-none text-black options py-2 px-3 rounded" href=""><i
                            class="bi bi-gear me-2"></i>Settings</a>
                </div>

                <div class="card">
                    <div class="card-body d-flex flex-column gap-2">
                        <p class="my-0">Joined Since {{ date_format(date_create(Auth::user()->created_at), 'd M Y') }}</p>
                        <p class="my-0"><i class="bi bi-card-heading me-2"></i> {{ Auth::user()->posts->count() }} Post(s)</p>
                        <p class="my-0"><i class="bi bi-award me-2"></i> 0 Points</p>
                    </div>
                </div>
            @else
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">You are not logged in.</h5>
                        <p class="card-text">Login to create post and comment on other posts.</p>
                        <a type="button" href="/login" class="btn btn-primary text-white px-4">Login</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    @if (session()->has('post_create_success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('post_create_success') }}',
                icon: 'success',
                confirmButtonColor: '#37b6ff'
            })
        </script>
    @endif
    @if (session()->has('post_delete_success'))
        <script>
            Swal.fire({
                title: 'Deleted',
                text: '{{ session('post_delete_success') }}',
                icon: 'success',
                confirmButtonColor: '#37b6ff'
            })
        </script>
    @endif
@endsection
