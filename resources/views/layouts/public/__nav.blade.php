<header>
    <nav class="d-flex justify-content-between align-items-center p-3">
        <img src="{{asset('images/logo.png')}}" alt="GoalFit Logo" class="img-fluid" style="height: 100px;">

        <div class="d-flex gap-4 d-none d-md-flex">
            <a href="#" class="text-decoration-none">Home</a>
            <a href="#" class="text-decoration-none">Gyms</a>
            <a href="#" class="text-decoration-none">Workout</a>
            <a href="#" class="text-decoration-none">Nutrition</a>
            <a href="#" class="text-decoration-none">About Us</a>
        </div>

        <div class="d-flex gap-2 align-items-center d-none d-md-flex">
            <form class="d-flex align-items-center siteSearch" action="">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search"
                    name="search" />
                <button title="Search" class="btn btn-outline-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <a href="#"><i class="fa-solid fa-user profileIcon" style="color: #ffffff;"></i></a>
        </div>

        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
            aria-expanded="false">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse bg-dark position-absolute top-100 start-0 w-100 p-3" id="mobileMenu"
            style="z-index: 1000;">
            <div class="d-flex flex-column gap-3">
                <a href="#" class="text-decoration-none text-white">Home</a>
                <a href="#" class="text-decoration-none text-white">Gyms</a>
                <a href="#" class="text-decoration-none text-white">Workout</a>
                <a href="#" class="text-decoration-none text-white">Nutrition</a>
                <a href="#" class="text-decoration-none text-white">About Us</a>
                <form class="d-flex mt-2" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" />
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="mt-2">
                    <a href="#" class="text-decoration-none text-white">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>