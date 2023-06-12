<div class="col-3 min-vh-100 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="filters" aria-labelledby="filterLabels">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="filterLabels">Filter by</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#filters" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body col-12">
        <?php
        ?>
        <form action="<?php echo $action; ?>" class="w-100" method="post">
            <div class="row d-sm-none d-md-block py-3">

                <h2>Filter by:</h2>

            </div>
            <?php
            $filter = new articleview;
            ?>
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-3 py-sm-0 ps-0">
                    <label for="student_id" class="col-form-label form-control-lg fs-4">Search</label>
                </div>
                <div class="col-sm-6 col-lg-9 pe-4">
                    <div class="input-group input-group-md text-bg-dark">
                        <input type="text" id="search" class="form-control text-bg-dark">
                        <button class="btn btn-outline-light" type="submit" name="year_search">Search</button>
                    </div>
                </div>
            </div>
            <hr>
            <a class="link-underline link-underline-opacity-0 text-white fs-4 ps-1" data-bs-toggle="collapse" href="#courseOption" role="button" aria-expanded="false" aria-controls="courseOption">
                Courses
            </a>
            <div class="collapse" id="courseOption">
                <br>
                <?php
                $filter->showCourseButtons();
                ?>
            </div>
            <hr>

            <a class="link-underline link-underline-opacity-0 text-white fs-4 ps-1" data-bs-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
                Tags
            </a>
            <div class="collapse" id="tags">
                <br>
                <?php
                $filter->showTagButtons();
                ?>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4 py-sm-0 ps-0">
                    <label for="student_id" class="col-form-label form-control-lg fs-4">Year</label>
                </div>
                <div class="col-sm-6 col-lg-9 pe-4">
                    <div class="input-group input-group-md text-bg-dark">
                        <select class="form-select text-bg-dark" id="inputGroupSelect04" name="year" aria-label="Example select with button addon">
                            <?php
                            for ($year = 2017; $year <= 2023; $year++) {
                                if (isset($_POST['year_search'])) {
                                    if ($year == $_POST['year']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = ' ';
                                    }
                                } else {
                                    $selected = '';
                                }
                            ?>
                                <option value="<?php echo $year; ?>" <?php echo $selected; ?>><?php echo $year; ?></option>
                            <?php } ?>
                        </select>
                        <button class="btn btn-outline-light" type="submit" name="year_search">Search</button>
                    </div>
                </div>
            </div>
            <hr>
            <!-- <div class="input-group input-group-md text-bg-dark">
                <select class="form-select text-bg-dark" id="inputGroupSelect04" name="year" aria-label="Example select with button addon">
                    <?php
                    for ($year = 2017; $year <= 2023; $year++) {
                        if (isset($_POST['year_search'])) {
                            if ($year == $_POST['year']) {
                                $selected = 'selected';
                            } else {
                                $selected = ' ';
                            }
                        } else {
                            $selected = ' ';
                        }
                    ?>
                        <option value="<?php echo $year; ?>" <?php echo $selected; ?>><?php echo $year; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-outline-light" type="submit" name="year_search">Search</button>
            </div>
            <hr> -->
            <div class="row justify-content-end pt-3 pe-lg-4 pe-5">
                <div class="col-2">
                    <a class="btn btn-outline-light" href="<?php echo $action; ?>">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>