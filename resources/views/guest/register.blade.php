@extends('guest.template.app')

@section('title', 'Register')

@section('content')
<section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row"> 
                            <div class="col-lg-12 col-md-14">
                                <div class="p-5 ">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                        </div>                                    
                                        <form class="user" method="POST" action="{{ url('signup/user') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control form-control-user" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"  placeholder="Password">
                                        </div>                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button> 
                                        <hr>
                                        {{-- <div class="text-center">
                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div> --}}
                                        <div class="text-center">
                                            <a class="small" href="/login">Already have an account? Login!</a>
                                        </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
       
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            const nama = document.querySelector('input[name="nama"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();

            if (!nama || !email || !password) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data tidak boleh kosong',
                });
            }
        });
    });
</script>
@endsection
