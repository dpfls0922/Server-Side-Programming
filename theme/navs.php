<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand nos" href="http://localhost/nku/Server-Side%20Programming/Final%20project/index.php">Ced<span class="gree">Cab</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars logo text-dark"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-5">
                    <p class="mt-1">Welcome <?php echo $_SESSION['userdata']['username'] ?></p>
                </li>
                <li class="nav-item rbtn">
                    <a class="btn" href="http://localhost/nku/Server-Side%20Programming/Final%20project/index.php">Book now</a>
                </li>
                <li class="nav-item rbtn">
                    <a class="btn" href="http://localhost/nku/Server-Side%20Programming/Final%20project/user/userride.php">Dashboard</a>
                </li>
                <li class="nav-item rbtn">
                    <a class="btn" href="http://localhost/nku/Server-Side%20Programming/Final%20project/libs/signout.php">Sign out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>