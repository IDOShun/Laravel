<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>
    <body class="bg-dark">
    <!-- Show Error Messages If Any -->
         @include('alert')

        <!-- Sign in Section -->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Sign in</h3></div>
                                    <div class="card-body">
                                        @if ($role == 'aboveAdmin')
                                            <form action="{{route('post.aboveAdmin.signin')}}" method="POST">
                                        @else
                                            <form action="{{route('post.merchant.signin')}}" method="POST">
                                        @endif
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            {{-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> --}}
                                            <div class="mt-4 mb-0 text-center">
                                                {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                                                <button class="btn btn-primary text-center" type="submit">Sign in</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        @if ($role == 'aboveAdmin')
                                            <div class="small"><a href="{{route('get.admin.signup')}}">Need an account? Sign up!</a></div>
                                        @else
                                            <div class="small"><a href="{{route('get.merchant.signup')}}">Need an account? Sign up!</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
