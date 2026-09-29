<?php

// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE DASHBOARD
// =========================================================

global $mydb;


// =========================================================
// SAFE COUNT FUNCTION
// =========================================================

function home_safe_count($table) {

    global $mydb;

    if (!$mydb->tableExists($table)) {
        return 0;
    }

    $mydb->setQuery(
        "SELECT * FROM `".$table."`"
    );

    return $mydb->num_rows();
}


// =========================================================
// MAIN COUNTS
// =========================================================

$totalAlumni  = home_safe_count('alumni_details');

$totalStudent = home_safe_count('tblstudent');

$totalCourse  = home_safe_count('tblcourses');

$totalSection = home_safe_count('tblsections');

$totalSubject = home_safe_count('tblsubjects');

$totalEnrollment = home_safe_count('tblenrollment');


// =========================================================
// ACTIVE STUDENTS
// =========================================================

$activeStudents = 0;

if ($mydb->tableExists('tblstudent')) {

    $mydb->setQuery("
        SELECT *
        FROM tblstudent
        WHERE STATUS = 'Active'
    ");

    $activeStudents = $mydb->num_rows();
}


// =========================================================
// STUDENT PERCENTAGES
// =========================================================

$activePercentage = 0;

$alumniPercentage = 0;

if ($totalStudent > 0) {

    $activePercentage =
        round(
            ($activeStudents / $totalStudent) * 100
        );

    $alumniPercentage =
        round(
            ($totalAlumni / $totalStudent) * 100
        );
}


// =========================================================
// DATE / TIME - GMT+8 (Philippines)
// =========================================================

date_default_timezone_set('Asia/Manila');

$currentDate = date("F d, Y");

$currentTime = date("h:i A");

?>

<style>

/* =========================================================
   DASHBOARD
   ========================================================= */

.tajale-dashboard {

    width: 100%;

    color: #d8d5e8;

}


/* =========================================================
   REMOVE WHITE BACKGROUNDS
   ========================================================= */

.content,
.content > .container-fluid,
.content > .container-fluid > .row,
.content > .container-fluid > .row > [class*="col-"] {

    background: transparent !important;

}


/* =========================================================
   ORIGINAL ADMINLTE SMALL BOX
   ========================================================= */

.tajale-dashboard .small-box {

    border-radius: 0 !important;

    background:
        linear-gradient(
            145deg,
            #120d25,
            #080611
        ) !important;

    border:
        1px solid #33276b !important;

    color: #ffffff !important;

    box-shadow:

        0 0 12px
        rgba(61,43,150,.20),

        inset 0 0 15px
        rgba(30,20,80,.15);

    overflow: hidden;

    transition:
        .15s ease;

}


.tajale-dashboard .small-box:hover {

    transform:
        translateY(-3px);

    border-color:
        #7565ff !important;

    box-shadow:

        0 0 18px
        rgba(100,80,255,.4);

}


/* =========================================================
   SMALL BOX CONTENT
   ========================================================= */

.tajale-dashboard .small-box .inner {

    padding:
        18px;

}


.tajale-dashboard .small-box h3 {

    color:
        #ffffff !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        24px !important;

    text-shadow:

        0 0 6px #7565ff,

        0 0 12px
        rgba(100,80,255,.5);

}


.tajale-dashboard .small-box p {

    color:
        #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        8px !important;

}


/* =========================================================
   SMALL BOX ICON
   ========================================================= */

.tajale-dashboard .small-box .icon {

    color:
        rgba(117,101,255,.18) !important;

}


.tajale-dashboard .small-box .icon i {

    font-size:
        55px;

}


/* =========================================================
   SMALL BOX FOOTER
   ========================================================= */

.tajale-dashboard .small-box-footer {

    background:
        rgba(20,15,45,.7) !important;

    color:
        #8174e5 !important;

    border-top:
        1px solid #211b40;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

    padding:
        10px;

}


.tajale-dashboard .small-box-footer:hover {

    background:
        #211653 !important;

    color:
        #ffffff !important;

}


/* =========================================================
   DASHBOARD PANELS
   ========================================================= */

.tajale-panel {

    background:

        linear-gradient(
            145deg,
            #100c21,
            #080611
        );

    border:
        1px solid #33276b;

    box-shadow:

        0 0 15px
        rgba(61,43,150,.16);

    margin-bottom:
        18px;

}


/* =========================================================
   PANEL HEADER
   ========================================================= */

.tajale-panel-header {

    padding:
        13px 16px;

    background:

        linear-gradient(
            90deg,
            #17102f,
            #0b0818
        );

    border-bottom:
        1px solid #3a2d7d;

    color:
        #ffffff;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        9px;

    text-shadow:
        0 0 5px #5c4ed0;

}


/* =========================================================
   PANEL BODY
   ========================================================= */

.tajale-panel-body {

    padding:
        18px;

}


/* =========================================================
   STATISTICS GRID
   ========================================================= */

.tajale-stat-grid {

    display:
        grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap:
        12px;

}


/* =========================================================
   STAT ITEM
   ========================================================= */

.tajale-stat {

    padding:
        15px;

    background:
        #0a0714;

    border:
        1px solid #292050;

    transition:
        .15s ease;

}


.tajale-stat:hover {

    border-color:
        #5c4ed0;

    background:
        #100b22;

}


/* =========================================================
   STAT TITLE
   ========================================================= */

.tajale-stat-title {

    color:
        #716b91;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        7px;

    margin-bottom:
        8px;

}


/* =========================================================
   STAT VALUE
   ========================================================= */

.tajale-stat-value {

    color:
        #ffffff;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        20px;

    text-shadow:
        0 0 7px
        rgba(117,101,255,.6);

}


/* =========================================================
   PROGRESS SECTION
   ========================================================= */

.tajale-progress {

    margin-bottom:
        18px;

}


.tajale-progress:last-child {

    margin-bottom:
        0;

}


.tajale-progress-top {

    display:
        flex;

    justify-content:
        space-between;

    margin-bottom:
        7px;

    color:
        #aaa5c7;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        7px;

}


.tajale-progress-track {

    width:
        100%;

    height:
        8px;

    background:
        #05030c;

    border:
        1px solid #30265f;

}


.tajale-progress-fill {

    height:
        100%;

    background:

        linear-gradient(
            90deg,
            #382a91,
            #7565ff
        );

    box-shadow:
        0 0 7px
        rgba(100,80,255,.4);

}


/* =========================================================
   SYSTEM STATUS
   ========================================================= */

.tajale-system-row {

    display:
        flex;

    justify-content:
        space-between;

    padding:
        11px 0;

    border-bottom:
        1px solid #211b40;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        7px;

}


.tajale-system-row:last-child {

    border-bottom:
        none;

}


.tajale-system-name {

    color:
        #aaa5c7;

}


.tajale-online {

    color:
        #00d9a6;

    text-shadow:
        0 0 6px
        rgba(0,217,166,.5);

}


/* =========================================================
   DATE / TIME
   ========================================================= */

.tajale-date {

    text-align:
        center;

    margin-top:
        18px;

    padding-top:
        15px;

    border-top:
        1px solid #211b40;

    color:
        #77709d;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        7px;

}


.tajale-time {

    margin-top:
        10px;

    text-align:
        center;

    color:
        #ffffff;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        18px;

    text-shadow:

        0 0 7px #7565ff,

        0 0 15px
        rgba(100,80,255,.4);

}


/* =========================================================
   QUICK ACTIONS
   ========================================================= */

.tajale-actions {

    display:
        grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap:
        10px;

}


.tajale-action {

    display:
        block;

    padding:
        17px 8px;

    text-align:
        center;

    color:
        #aaa5c7 !important;

    text-decoration:
        none !important;

    background:

        linear-gradient(
            135deg,
            #17102f,
            #0b0818
        );

    border:
        1px solid #33276b;

    font-family:
        'Press Start 2P',
        monospace;

    font-size:
        7px;

    transition:
        .15s ease;

}


.tajale-action:hover {

    color:
        #ffffff !important;

    border-color:
        #7565ff;

    background:

        linear-gradient(
            135deg,
            #302277,
            #17102f
        );

    box-shadow:
        0 0 10px
        rgba(100,80,255,.3);

    transform:
        translateY(-2px);

}


.tajale-action i {

    display:
        block;

    margin-bottom:
        9px;

    font-size:
        18px;

    color:
        #7565ff;

}


/* =========================================================
   SOUL
   ========================================================= */

.tajale-soul {

    color:
        #ff1744;

    text-shadow:

        0 0 5px #ff1744,

        0 0 12px #ff1744;

}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width:1000px) {

    .tajale-stat-grid {

        grid-template-columns:
            1fr 1fr;

    }

    .tajale-actions {

        grid-template-columns:
            1fr 1fr;

    }

}


@media(max-width:700px) {

    .tajale-stat-grid {

        grid-template-columns:
            1fr;

    }

}


@media(max-width:500px) {

    .tajale-actions {

        grid-template-columns:
            1fr;

    }

}

</style>


<section class="content">

    <div class="container-fluid tajale-dashboard">


        <!-- =================================================
             ORIGINAL DASHBOARD BOXES
             ================================================= -->

        <div class="row">


            <!-- ALUMNI -->

            <div class="col-lg-3 col-6">

                <div class="small-box">

                    <div class="inner">

                        <h3>
                            <?php echo $totalAlumni; ?>
                        </h3>

                        <p>
                            Alumni Count
                        </p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-user-graduate"></i>

                    </div>

                    <a
                        href="<?php echo WEB_ROOT; ?>module/generic/index.php?t=alumni_details"
                        class="small-box-footer"
                    >

                        More info

                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>


            <!-- STUDENTS -->

            <div class="col-lg-3 col-6">

                <div class="small-box">

                    <div class="inner">

                        <h3>
                            <?php echo $totalStudent; ?>
                        </h3>

                        <p>
                            Total Students
                        </p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-users"></i>

                    </div>

                    <a
                        href="<?php echo WEB_ROOT; ?>module/student/"
                        class="small-box-footer"
                    >

                        More info

                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>


            <!-- COURSES -->

            <div class="col-lg-3 col-6">

                <div class="small-box">

                    <div class="inner">

                        <h3>
                            <?php echo $totalCourse; ?>
                        </h3>

                        <p>
                            Total Courses
                        </p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-book"></i>

                    </div>

                    <a
                        href="<?php echo WEB_ROOT; ?>module/course/"
                        class="small-box-footer"
                    >

                        More info

                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>


            <!-- SECTIONS -->

            <div class="col-lg-3 col-6">

                <div class="small-box">

                    <div class="inner">

                        <h3>
                            <?php echo $totalSection; ?>
                        </h3>

                        <p>
                            Total Sections
                        </p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-layer-group"></i>

                    </div>

                    <a
                        href="<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblsections"
                        class="small-box-footer"
                    >

                        More info

                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>


        </div>


        <!-- =================================================
             SECONDARY STATISTICS
             ================================================= -->

        <div class="tajale-panel">

            <div class="tajale-panel-header">

                <span class="tajale-soul">♥</span>

                &nbsp;

                SYSTEM STATISTICS

            </div>


            <div class="tajale-panel-body">


                <div class="tajale-stat-grid">


                    <!-- SUBJECTS -->

                    <div class="tajale-stat">

                        <div class="tajale-stat-title">

                            TOTAL SUBJECTS

                        </div>

                        <div class="tajale-stat-value">

                            <?php echo $totalSubject; ?>

                        </div>

                    </div>


                    <!-- ENROLLMENTS -->

                    <div class="tajale-stat">

                        <div class="tajale-stat-title">

                            TOTAL ENROLLMENTS

                        </div>

                        <div class="tajale-stat-value">

                            <?php echo $totalEnrollment; ?>

                        </div>

                    </div>


                    <!-- ACTIVE STUDENTS -->

                    <div class="tajale-stat">

                        <div class="tajale-stat-title">

                            ACTIVE STUDENTS

                        </div>

                        <div class="tajale-stat-value">

                            <?php echo $activeStudents; ?>

                        </div>

                    </div>


                    <!-- ALUMNI -->

                    <div class="tajale-stat">

                        <div class="tajale-stat-title">

                            REGISTERED ALUMNI

                        </div>

                        <div class="tajale-stat-value">

                            <?php echo $totalAlumni; ?>

                        </div>

                    </div>


                </div>


            </div>

        </div>


        <!-- =================================================
             LOWER DASHBOARD
             ================================================= -->

        <div class="row">


            <!-- STUDENT OVERVIEW -->

            <div class="col-lg-7">

                <div class="tajale-panel">

                    <div class="tajale-panel-header">

                        STUDENT OVERVIEW

                    </div>


                    <div class="tajale-panel-body">


                        <!-- ACTIVE STUDENTS -->

                        <div class="tajale-progress">

                            <div class="tajale-progress-top">

                                <span>
                                    ACTIVE STUDENTS
                                </span>

                                <span>
                                    <?php
                                    echo $activePercentage;
                                    ?>%
                                </span>

                            </div>


                            <div class="tajale-progress-track">

                                <div
                                    class="tajale-progress-fill"
                                    style="
                                        width:
                                        <?php
                                        echo $activePercentage;
                                        ?>%;
                                    "
                                ></div>

                            </div>

                        </div>


                        <!-- ALUMNI -->

                        <div class="tajale-progress">

                            <div class="tajale-progress-top">

                                <span>
                                    ALUMNI
                                </span>

                                <span>
                                    <?php
                                    echo $alumniPercentage;
                                    ?>%
                                </span>

                            </div>


                            <div class="tajale-progress-track">

                                <div
                                    class="tajale-progress-fill"
                                    style="
                                        width:
                                        <?php
                                        echo $alumniPercentage;
                                        ?>%;
                                    "
                                ></div>

                            </div>

                        </div>


                        <!-- TOTAL STUDENTS -->

                        <div class="tajale-progress">

                            <div class="tajale-progress-top">

                                <span>
                                    STUDENT DATABASE
                                </span>

                                <span>
                                    <?php
                                    echo $totalStudent;
                                    ?> RECORDS
                                </span>

                            </div>


                            <div class="tajale-progress-track">

                                <div
                                    class="tajale-progress-fill"
                                    style="width:100%;"
                                ></div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            <!-- SYSTEM STATUS -->

            <div class="col-lg-5">

                <div class="tajale-panel">

                    <div class="tajale-panel-header">

                        SYSTEM STATUS

                    </div>


                    <div class="tajale-panel-body">


                        <div class="tajale-system-row">

                            <span class="tajale-system-name">
                                DATABASE
                            </span>

                            <span class="tajale-online">
                                ● ONLINE
                            </span>

                        </div>


                        <div class="tajale-system-row">

                            <span class="tajale-system-name">
                                STUDENTS
                            </span>

                            <span class="tajale-online">
                                ● READY
                            </span>

                        </div>


                        <div class="tajale-system-row">

                            <span class="tajale-system-name">
                                COURSES
                            </span>

                            <span class="tajale-online">
                                ● READY
                            </span>

                        </div>


                        <div class="tajale-system-row">

                            <span class="tajale-system-name">
                                ENROLLMENT
                            </span>

                            <span class="tajale-online">
                                ● READY
                            </span>

                        </div>


                        <div class="tajale-date">

                            <?php echo $currentDate; ?>

                        </div>


                        <div class="tajale-time">

                            <?php echo $currentTime; ?>

                        </div>


                    </div>

                </div>

            </div>


        </div>


        <!-- =================================================
             QUICK ACTIONS
             ================================================= -->

        <div class="tajale-panel">

            <div class="tajale-panel-header">

                QUICK ACTIONS

            </div>


            <div class="tajale-panel-body">


                <div class="tajale-actions">


                    <a
                        href="<?php echo WEB_ROOT; ?>module/student/"
                        class="tajale-action"
                    >

                        <i class="fas fa-users"></i>

                        STUDENTS

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/course/"
                        class="tajale-action"
                    >

                        <i class="fas fa-book"></i>

                        COURSES

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/subject/"
                        class="tajale-action"
                    >

                        <i class="fas fa-book-open"></i>

                        SUBJECTS

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/enrollment/"
                        class="tajale-action"
                    >

                        <i class="fas fa-user-graduate"></i>

                        ENROLLMENT

                    </a>


                </div>


            </div>

        </div>


    </div>

</section>