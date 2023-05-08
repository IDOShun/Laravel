<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <!-- Only Above Admin Can -->
                    @cannot('merchant')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Admins
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <!-- Only Admin who has 'Create' Permission Can -->
                                @can('Create')
                                    <a class="nav-link" href="{{route('get.create')}}">Upload Product</a>
                                @endcan
                                <!-- Only superAdmin Can -->
                                @can('superAdmin')
                                    <form action="{{route('post.superAdmin.showUsers')}}" method="POST">
                                        @csrf
                                        <button class="nav-link btn btn-link" type="submit">Edit CRUD Permission</button>
                                    </form>
                                @endcan
                            </nav>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                @auth('user')
                    @if (auth('user')->user()->role_id == 1)
                        'SuperAdmin'
                    @elseif(auth('user')->user()->role_id == 2)
                        'Admin'
                    @else
                        'Merchant'
                    @endif
                @endauth

            </div>
        </nav>
    </div>
</div>
