<div class="col-3 min-vh-100 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="filters" aria-labelledby="filterLabels">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="filterLabels">Filter by</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#filters" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body col-12">

        <form action="article_manage.admin.php" class="w-100" method="post">
            <div class="row d-sm-none d-md-block">
                <h2>Filter by:</h2>
            </div>
            <?php
            $filter = new articleview;
            ?>
            <a class="link-underline link-underline-opacity-0 text-white fs-3" data-bs-toggle="collapse" href="#courseOption" role="button" aria-expanded="false" aria-controls="courseOption">
                Courses

            </a>

            <div class="collapse" id="courseOption">
                <br>
                <?php
                $filter->showCourseButtons();
                ?>
            </div>
            <hr>
            <a class="link-underline link-underline-opacity-0 text-white fs-3" data-bs-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
                Tags
            </a>

            <div class="collapse" id="tags">
                <br>
                <?php
                $filter->showTagButtons();
                ?>
            </div>
            <hr>
        </form>

    </div>
</div>