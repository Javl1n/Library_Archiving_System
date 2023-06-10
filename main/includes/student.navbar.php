<?php


if ($page == 1) {
    $article = "active' aria-current='page";
} elseif ($page == 2) {
    $student = "active' aria-current='page";
} elseif ($page == 3) {
    $requests = "active' aria-current='page";
}
?>
<nav class='navbar sticky-top navbar-expand-lg bg-white '>
    <div class='container-fluid'>
        <a class='navbar-brand' href='article.student.php'>
            <img src='../assets/SEAIT.jpg' height='40' alt='seait' class='d-inline-block align-text-center'>
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <p class='h4'><a class='nav-link <?php echo $article; ?>' href='article.student.php'>Articles</a></p>
                </li>
                <li class='nav-item'>
                    <p class='h4'><a class='nav-link <?php echo $student; ?>' href='profile.student.php'>Profile</a></p>
                </li>
                <?php
                $user = new studentview;
                $row = $user->showStudent($_SESSION['user_id']);
                if ($row['verification_status_id'] == 1) {
                ?>
                    <li class='nav-item'>
                        <p class='h4'><a class='nav-link <?php echo $requests; ?>' href='#'>My Uploads</a></p>
                    </li>
                <?php
                }
                ?>
            </ul>
            <form class='d-flex' role='search' method='post' action='/LIBRARY_ARCHIVING_SYSTEM2/main/includes/logout.inc.php'>
                <button class='btn btn-outline-danger p-2' type='submit'>logout</button>
            </form>
        </div>
    </div>
</nav>