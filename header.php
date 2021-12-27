<nav class="navbar navbar-expand-lg navbar-dark bg-dark .sticky-top">
    <div class="container">
        <div class="brand">
            <a class="navbar-brand" href="#">Navbar</a>
        </div>
        <div class="menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user.php?user=<?php echo $_SESSION["userid"] ?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="profile.php?user=<?php echo $_SESSION["userid"] ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>