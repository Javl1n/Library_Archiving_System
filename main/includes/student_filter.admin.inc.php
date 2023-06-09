<div class="col-3 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="courseOptions" aria-labelledby="courseOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="courseOptionsLabel">Courses</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#courseOptions" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body col-12">
        <?php
        if ($status == 1) {
            $page = 'active';
        } elseif ($status == 2) {
            $page = 'restricted';
        }
        ?>
        <form action="student_<?php echo $page; ?>_manage.admin.php" method="post">
            <div class="d-sm-none d-md-block">
                <div class="row py-3">
                    <div class="col-9">
                        <h2>Courses</h2>
                    </div>
                    <div class="col-2 ps-5">
                        <a class="btn btn-outline-light" href="student_<?php echo $page; ?>_manage.admin.php">Reset</a>
                    </div>
                </div>
            </div>
            <div class="col-2 pb-3 d-md-none">
                <a class="btn btn-outline-light" href="student_<?php echo $page; ?>_manage.admin.php">Reset</a>
            </div>
            <?php
            $courses = new studentview;
            $courses->showcoursebuttons();
            ?>
        </form>

    </div>
</div>