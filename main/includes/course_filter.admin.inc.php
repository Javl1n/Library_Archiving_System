<div class="col-3 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="courseOptions" aria-labelledby="courseOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="courseOptionsLabel">Courses</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#courseOptions" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body col-12 ">
        <?php
        if ($status == 1) {
            $page = 'active';
        } elseif ($status == 2) {
            $page = 'restricted';
        }
        ?>
        <form action="student_<?php echo $page; ?>_manage.admin.php" method="post">
            <div class="row d-sm-none d-md-block">
                <h2>Courses</h2>
            </div>
            <br>
            <?php
            $courses = new studentview;
            $courses->showcoursebuttons();
            ?>
        </form>

    </div>
</div>