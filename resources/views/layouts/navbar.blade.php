<header class="bg-light sticky-top" style="z-index: 100">
    <nav class="navbar navbar-expand-lg shadow px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/baktify-logo.png" alt="Bootstrap" width="40" height="40">
            </a>
            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false"
                aria-label="Toggle navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarDropdown">
                @auth
                    @if (auth()->user()->role === '0')
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page" href="/about-us">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page"
                                    href="/products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page" href="/transactions">My
                                    Transactions</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-2 fw-bold">Cart</p>
                            <div class="d-flex flex-column text-secondary">
                                <p class="m-0">Member</p>
                                <p class="m-0"><a class="text-decoration-none text-secondary" href="#">View
                                        profile</a></p>
                            </div>

                        </div>
                    @elseif (auth()->user()->role === '1')
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page" href="/about-us">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page" href="/products">Manage
                                    Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="link-dark nav-link active fw-bold" aria-current="page" href="/add-category">Add
                                    Category</a>
                            </li>
                        </ul>
                        <div class="d-flex flex-column text-secondary">
                            <p class="m-0">Admin</p>
                            <p class="m-0"><a class="text-decoration-none text-secondary" href="#">View profile</a>
                            </p>
                        </div>
                    @endif

                @endauth
                @guest
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="link-dark nav-link active fw-bold" aria-current="page" href="/about-us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="link-dark nav-link active fw-bold" aria-current="page" href="/products">Products</a>
                        </li>
                    </ul>
                    <div>
                        <a href="/login" class="btn btn-outline-primary m-1">Sign In</a>
                        <a href="/register" class="btn btn-primary">Sign Up</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
