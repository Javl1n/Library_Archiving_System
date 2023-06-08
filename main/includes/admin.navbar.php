<?php

function admin_nav($page)
{
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
            <a class='navbar-brand' href='article_manage.admin.php'>
                <img src='../assets/SEAIT.jpg' height='40' alt='seait' class='d-inline-block align-text-center'>
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <p class='h4'><a class='nav-link <?php echo $article; ?>' href='article_manage.admin.php'>Manage Articles</a></p>
                    </li>
                    <li class='nav-item'>
                        <p class='h4'><a class='nav-link <?php echo $student; ?>' href='student_active_manage.admin.php'>Manage Student</a></p>
                    </li>
                    <li class='nav-item'>
                        <p class='h4'><a class='nav-link <?php echo $requests; ?>' href='#'>Manage Requests</a></p>
                    </li>
                </ul>
                <span class="navbar-brand mb-0 h1"><?php echo $_SESSION['first_name'] ?></span>
                <form class='d-flex' role='search' method='post' action='/LIBRARY_ARCHIVING_SYSTEM2/main/includes/logout.inc.php'>
                    <button class='btn btn-outline-danger p-2' type='submit'>logout</button>
                </form>
            </div>
        </div>
    </nav>
<?php }
