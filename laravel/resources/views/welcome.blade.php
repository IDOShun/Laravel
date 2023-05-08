<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>
    <body class="bg-light">
            <div class=" bg-info d-inline-block w-100" style="height: 5vw;">
                <h1 class="text-center">Welcome to My Test PHP Server!!<h1>
            </div>
            <div class="" style="width: 60vw; height:10vw; margin-left:auto; margin-right:auto; margin-top: 10vw;">
                <a href="/merchant/signin" class="btn btn-primary text-center" style="width:40%; height:100%;">For Merchant</a>
                <a href="/aboveAdmin/signin" class="btn btn-primary" style="width:40%; height:100%; float:right;">For Above Admin</a>
            </div>
            <div class="fixed-bottom">
                <footer class="py-4 bg-white mt-auto">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
