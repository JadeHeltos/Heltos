<?php
// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE DASHBOARD
// =========================================================

require_once("include/initialize.php");

global $mydb;


// =========================================================
// DATABASE STATISTICS
// =========================================================

// TOTAL STUDENTS
$mydb->setQuery("SELECT COUNT(*) AS total FROM tblstudent");
$studentResult = $mydb->loadResultList();
$totalStudents = 0;

if (!empty($studentResult)) {
    $totalStudents = intval($studentResult[0]->total);
}


// ACTIVE STUDENTS
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblstudent
    WHERE STATUS = 'Active'
");
$activeResult = $mydb->loadResultList();
$activeStudents = 0;

if (!empty($activeResult)) {
    $activeStudents = intval($activeResult[0]->total);
}


// ALUMNI
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblstudent
    WHERE STATUS = 'Alumni'
");
$alumniResult = $mydb->loadResultList();
$totalAlumni = 0;

if (!empty($alumniResult)) {
    $totalAlumni = intval($alumniResult[0]->total);
}


// COURSES
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblcourses
");
$courseResult = $mydb->loadResultList();
$totalCourses = 0;

if (!empty($courseResult)) {
    $totalCourses = intval($courseResult[0]->total);
}


// SUBJECTS
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblsubjects
");
$subjectResult = $mydb->loadResultList();
$totalSubjects = 0;

if (!empty($subjectResult)) {
    $totalSubjects = intval($subjectResult[0]->total);
}


// SECTIONS
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblsections
");
$sectionResult = $mydb->loadResultList();
$totalSections = 0;

if (!empty($sectionResult)) {
    $totalSections = intval($sectionResult[0]->total);
}


// TOTAL ENROLLMENTS
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblenrollment
");
$enrollmentResult = $mydb->loadResultList();
$totalEnrollments = 0;

if (!empty($enrollmentResult)) {
    $totalEnrollments = intval($enrollmentResult[0]->total);
}


// ACTIVE ENROLLMENTS
$mydb->setQuery("
    SELECT COUNT(*) AS total
    FROM tblenrollment
    WHERE STATUS = 'Enrolled'
");
$activeEnrollmentResult = $mydb->loadResultList();
$activeEnrollments = 0;

if (!empty($activeEnrollmentResult)) {
    $activeEnrollments = intval($activeEnrollmentResult[0]->total);
}


// =========================================================
// STUDENT STATUS PERCENTAGE
// =========================================================

$activePercentage = 0;
$alumniPercentage = 0;

if ($totalStudents > 0) {

    $activePercentage =
        round(($activeStudents / $totalStudents) * 100);

    $alumniPercentage =
        round(($totalAlumni / $totalStudents) * 100);
}


// =========================================================
// RECENT ENROLLMENTS
// =========================================================

$recentEnrollments = array();

$mydb->setQuery("
    SELECT
        e.ENROLLMENT_ID,
        e.STUDENT_ID,
        e.COURSE_ID,
        e.STATUS,
        s.IDNO,
        CONCAT(
            s.LNAME,
            ', ',
            s.FNAME,
            ' ',
            s.MNAME
        ) AS FULLNAME,
        c.COURSE_CODE,
        c.COURSE_NAME
    FROM tblenrollment e

    LEFT JOIN tblstudent s
        ON e.STUDENT_ID = s.S_ID

    LEFT JOIN tblcourses c
        ON e.COURSE_ID = c.COURSE_ID

    ORDER BY e.ENROLLMENT_ID DESC

    LIMIT 5
");

$recentEnrollments = $mydb->loadResultList();


// =========================================================
// CURRENT DATE
// =========================================================

$currentDate = date("F d, Y");
$currentTime = date("h:i A");

?>

<!-- =========================================================
     DELTARUNE DASHBOARD
     ========================================================= -->

<style>

/* =========================================================
   DASHBOARD WRAPPER
   ========================================================= */

.deltarune-dashboard {

    width: 100%;

    color: #d8d5e8;

    font-family:
        'Press Start 2P',
        monospace;

}


/* =========================================================
   STATISTICS GRID
   ========================================================= */

.dashboard-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 14px;

    margin-bottom: 18px;

}


/* =========================================================
   STAT CARD
   ========================================================= */

.dashboard-stat {

    position: relative;

    min-height: 125px;

    padding: 18px;

    background:

        linear-gradient(
            145deg,
            #120d25,
            #080611
        );

    border:

        1px solid #33276b;

    box-shadow:

        0 0 12px rgba(61, 43, 150, .18),

        inset 0 0 18px rgba(30, 20, 80, .15);

    overflow: hidden;

    transition:

        transform .15s ease,

        border-color .15s ease,

        box-shadow .15s ease;

}


.dashboard-stat:hover {

    transform: translateY(-3px);

    border-color: #6555d8;

    box-shadow:

        0 0 18px rgba(100, 80, 255, .3),

        inset 0 0 18px rgba(50, 35, 120, .2);

}


/* =========================================================
   STAT TITLE
   ========================================================= */

.dashboard-stat-title {

    color: #77709d;

    font-size: 8px;

    margin-bottom: 12px;

    text-transform: uppercase;

}


/* =========================================================
   STAT NUMBER
   ========================================================= */

.dashboard-stat-number {

    color: #ffffff;

    font-size: 25px;

    line-height: 1;

    text-shadow:

        0 0 5px #7565ff,

        0 0 12px rgba(100, 80, 255, .5);

}


/* =========================================================
   STAT DESCRIPTION
   ========================================================= */

.dashboard-stat-description {

    margin-top: 13px;

    color: #625b82;

    font-size: 7px;

}


/* =========================================================
   STAT ICON
   ========================================================= */

.dashboard-stat-icon {

    position: absolute;

    right: 15px;

    bottom: 10px;

    font-size: 35px;

    color: #30275f;

    opacity: .7;

}


/* =========================================================
   MAIN TWO COLUMN AREA
   ========================================================= */

.dashboard-columns {

    display: grid;

    grid-template-columns:
        2fr 1fr;

    gap: 14px;

    margin-bottom: 18px;

}


/* =========================================================
   DASHBOARD PANEL
   ========================================================= */

.dashboard-panel {

    background:

        linear-gradient(
            145deg,
            #100c21,
            #080611
        );

    border:

        1px solid #33276b;

    box-shadow:

        0 0 15px rgba(61, 43, 150, .16);

}


/* =========================================================
   PANEL HEADER
   ========================================================= */

.dashboard-panel-header {

    padding: 13px 16px;

    background:

        linear-gradient(
            90deg,
            #17102f,
            #0b0818
        );

    border-bottom:

        1px solid #3a2d7d;

    color: #ffffff;

    font-size: 9px;

    text-shadow:

        0 0 6px #5c4ed0;

}


/* =========================================================
   PANEL BODY
   ========================================================= */

.dashboard-panel-body {

    padding: 18px;

}


/* =========================================================
   PROGRESS ROW
   ========================================================= */

.dashboard-progress-row {

    margin-bottom: 18px;

}


.dashboard-progress-top {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 7px;

    font-size: 8px;

}


.dashboard-progress-label {

    color: #aaa5c7;

}


.dashboard-progress-value {

    color: #ffffff;

}


.dashboard-progress {

    height: 8px;

    background: #080611;

    border: 1px solid #30265f;

}


.dashboard-progress-bar {

    height: 100%;

    background:

        linear-gradient(
            90deg,
            #382a91,
            #7565ff
        );

    box-shadow:

        0 0 7px rgba(100, 80, 255, .4);

}


/* =========================================================
   SYSTEM STATUS
   ========================================================= */

.system-status {

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 11px 0;

    border-bottom:

        1px solid #211b40;

    font-size: 8px;

}


.system-status:last-child {

    border-bottom: none;

}


.system-status-name {

    color: #aaa5c7;

}


.system-online {

    color: #00d9a6;

    text-shadow:

        0 0 6px rgba(0, 217, 166, .5);

}


.system-ready {

    color: #7565ff;

    text-shadow:

        0 0 6px rgba(117, 101, 255, .5);

}


/* =========================================================
   RECENT ENROLLMENT TABLE
   ========================================================= */

.dashboard-table {

    width: 100%;

    border-collapse: collapse;

}


.dashboard-table th {

    padding: 10px;

    text-align: left;

    color: #ffffff;

    background: #130d2e;

    border:

        1px solid #30265f;

    font-size: 7px;

}


.dashboard-table td {

    padding: 10px;

    color: #aaa5c7;

    border-bottom:

        1px solid #211b40;

    font-size: 7px;

}


.dashboard-table tr:hover td {

    background: #17102e;

    color: #ffffff;

}


/* =========================================================
   STATUS BADGE
   ========================================================= */

.dashboard-status {

    display: inline-block;

    padding: 5px 7px;

    border: 1px solid #00d9a6;

    color: #00d9a6;

    font-size: 6px;

    background: rgba(0, 217, 166, .05);

}


/* =========================================================
   QUICK ACTIONS
   ========================================================= */

.quick-actions {

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 9px;

}


.quick-action {

    display: block;

    padding: 14px 8px;

    text-align: center;

    text-decoration: none !important;

    color: #aaa5c7 !important;

    background:

        linear-gradient(
            135deg,
            #17102f,
            #0b0818
        );

    border:

        1px solid #33276b;

    font-size: 7px;

    transition:

        .15s ease;

}


.quick-action:hover {

    color: #ffffff !important;

    border-color: #7565ff;

    background:

        linear-gradient(
            135deg,
            #302277,
            #17102f
        );

    box-shadow:

        0 0 10px rgba(100, 80, 255, .25);

    transform: translateY(-2px);

}


.quick-action i {

    display: block;

    margin-bottom: 8px;

    font-size: 18px;

    color: #7565ff;

}


/* =========================================================
   DATE / TIME PANEL
   ========================================================= */

.dashboard-clock {

    text-align: center;

    padding: 15px 5px 5px;

}


.dashboard-date {

    color: #77709d;

    font-size: 7px;

    margin-bottom: 10px;

}


.dashboard-time {

    color: #ffffff;

    font-size: 18px;

    text-shadow:

        0 0 7px #7565ff,

        0 0 15px rgba(100, 80, 255, .4);

}


/* =========================================================
   EMPTY DATA
   ========================================================= */

.dashboard-empty {

    padding: 20px;

    text-align: center;

    color: #625b82;

    font-size: 7px;

}


/* =========================================================
   SOUL DECORATION
   ========================================================= */

.dashboard-soul {

    color: #ff1744;

    text-shadow:

        0 0 5px #ff1744,

        0 0 12px #ff1744,

        0 0 20px rgba(255, 23, 68, .5);

}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 1100px) {

    .dashboard-grid {

        grid-template-columns:
            repeat(2, 1fr);

    }

}


@media (max-width: 800px) {

    .dashboard-grid {

        grid-template-columns:
            1fr;

    }

    .dashboard-columns {

        grid-template-columns:
            1fr;

    }

}


@media (max-width: 500px) {

    .quick-actions {

        grid-template-columns:
            1fr;

    }

    .dashboard-stat-number {

        font-size: 20px;

    }

}

</style>


<!-- =========================================================
     DASHBOARD CONTENT
     ========================================================= -->

<section class="content">

<div class="container-fluid">

<div class="deltarune-dashboard">


    <!-- =====================================================
         EXTRA STATISTICS
         ===================================================== -->

    <div class="dashboard-grid">


        <!-- STUDENTS -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Student Database
            </div>

            <div class="dashboard-stat-number">
                <?php echo $totalStudents; ?>
            </div>

            <div class="dashboard-stat-description">
                Registered Students
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-users"></i>
            </div>

        </div>


        <!-- ACTIVE STUDENTS -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Active Students
            </div>

            <div class="dashboard-stat-number">
                <?php echo $activeStudents; ?>
            </div>

            <div class="dashboard-stat-description">
                Currently Active
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-user-check"></i>
            </div>

        </div>


        <!-- SUBJECTS -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Subjects
            </div>

            <div class="dashboard-stat-number">
                <?php echo $totalSubjects; ?>
            </div>

            <div class="dashboard-stat-description">
                Available Subjects
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-book"></i>
            </div>

        </div>


        <!-- ENROLLMENTS -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Enrollments
            </div>

            <div class="dashboard-stat-number">
                <?php echo $totalEnrollments; ?>
            </div>

            <div class="dashboard-stat-description">
                Total Enrollment Records
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

        </div>


        <!-- ACTIVE ENROLLMENTS -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Current Enrollment
            </div>

            <div class="dashboard-stat-number">
                <?php echo $activeEnrollments; ?>
            </div>

            <div class="dashboard-stat-description">
                Currently Enrolled
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>

        </div>


        <!-- ALUMNI -->

        <div class="dashboard-stat">

            <div class="dashboard-stat-title">
                Alumni
            </div>

            <div class="dashboard-stat-number">
                <?php echo $totalAlumni; ?>
            </div>

            <div class="dashboard-stat-description">
                Former Students
            </div>

            <div class="dashboard-stat-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>

        </div>


    </div>


    <!-- =====================================================
         STATISTICS + SYSTEM STATUS
         ===================================================== -->

    <div class="dashboard-columns">


        <!-- =================================================
             STUDENT STATISTICS
             ================================================= -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                <span class="dashboard-soul">♥</span>

                &nbsp;

                STUDENT STATISTICS

            </div>


            <div class="dashboard-panel-body">


                <!-- ACTIVE -->

                <div class="dashboard-progress-row">

                    <div class="dashboard-progress-top">

                        <span class="dashboard-progress-label">
                            Active Students
                        </span>

                        <span class="dashboard-progress-value">
                            <?php echo $activePercentage; ?>%
                        </span>

                    </div>


                    <div class="dashboard-progress">

                        <div
                            class="dashboard-progress-bar"
                            style="width: <?php echo $activePercentage; ?>%;"
                        ></div>

                    </div>

                </div>


                <!-- ALUMNI -->

                <div class="dashboard-progress-row">

                    <div class="dashboard-progress-top">

                        <span class="dashboard-progress-label">
                            Alumni
                        </span>

                        <span class="dashboard-progress-value">
                            <?php echo $alumniPercentage; ?>%
                        </span>

                    </div>


                    <div class="dashboard-progress">

                        <div
                            class="dashboard-progress-bar"
                            style="width: <?php echo $alumniPercentage; ?>%;"
                        ></div>

                    </div>

                </div>


                <!-- ACADEMIC INFORMATION -->

                <div class="dashboard-progress-row">

                    <div class="dashboard-progress-top">

                        <span class="dashboard-progress-label">
                            Courses
                        </span>

                        <span class="dashboard-progress-value">
                            <?php echo $totalCourses; ?>
                        </span>

                    </div>


                    <div class="dashboard-progress">

                        <div
                            class="dashboard-progress-bar"
                            style="width: <?php echo ($totalCourses > 0 ? 100 : 0); ?>%;"
                        ></div>

                    </div>

                </div>


                <div class="dashboard-progress-row">

                    <div class="dashboard-progress-top">

                        <span class="dashboard-progress-label">
                            Sections
                        </span>

                        <span class="dashboard-progress-value">
                            <?php echo $totalSections; ?>
                        </span>

                    </div>


                    <div class="dashboard-progress">

                        <div
                            class="dashboard-progress-bar"
                            style="width: <?php echo ($totalSections > 0 ? 100 : 0); ?>%;"
                        ></div>

                    </div>

                </div>


            </div>

        </div>


        <!-- =================================================
             SYSTEM STATUS
             ================================================= -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                SYSTEM STATUS

            </div>


            <div class="dashboard-panel-body">


                <div class="system-status">

                    <span class="system-status-name">
                        Database
                    </span>

                    <span class="system-online">
                        ● ONLINE
                    </span>

                </div>


                <div class="system-status">

                    <span class="system-status-name">
                        Students
                    </span>

                    <span class="system-ready">
                        ● READY
                    </span>

                </div>


                <div class="system-status">

                    <span class="system-status-name">
                        Courses
                    </span>

                    <span class="system-ready">
                        ● READY
                    </span>

                </div>


                <div class="system-status">

                    <span class="system-status-name">
                        Enrollment
                    </span>

                    <span class="system-ready">
                        ● READY
                    </span>

                </div>


                <div class="dashboard-clock">

                    <div class="dashboard-date">

                        <?php echo $currentDate; ?>

                    </div>


                    <div class="dashboard-time">

                        <?php echo $currentTime; ?>

                    </div>

                </div>


            </div>

        </div>


    </div>


    <!-- =====================================================
         RECENT ENROLLMENTS + QUICK ACTIONS
         ===================================================== -->

    <div class="dashboard-columns">


        <!-- =================================================
             RECENT ENROLLMENTS
             ================================================= -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                RECENT ENROLLMENTS

            </div>


            <div class="dashboard-panel-body">

                <?php if (!empty($recentEnrollments)) { ?>


                    <div style="overflow-x:auto;">

                        <table class="dashboard-table">

                            <thead>

                                <tr>

                                    <th>IDNO</th>

                                    <th>STUDENT</th>

                                    <th>COURSE</th>

                                    <th>STATUS</th>

                                </tr>

                            </thead>


                            <tbody>


                            <?php foreach (
                                $recentEnrollments
                                as $enrollment
                            ) { ?>


                                <tr>

                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $enrollment->IDNO
                                        );
                                        ?>

                                    </td>


                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            trim(
                                                $enrollment->FULLNAME
                                            )
                                        );
                                        ?>

                                    </td>


                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $enrollment->COURSE_CODE
                                        );
                                        ?>

                                    </td>


                                    <td>

                                        <span
                                            class="dashboard-status"
                                        >

                                            <?php
                                            echo htmlspecialchars(
                                                $enrollment->STATUS
                                            );
                                            ?>

                                        </span>

                                    </td>

                                </tr>


                            <?php } ?>


                            </tbody>

                        </table>

                    </div>


                <?php } else { ?>


                    <div class="dashboard-empty">

                        NO RECENT ENROLLMENT RECORDS

                    </div>


                <?php } ?>

            </div>

        </div>


        <!-- =================================================
             QUICK ACTIONS
             ================================================= -->

        <div class="dashboard-panel">

            <div class="dashboard-panel-header">

                QUICK ACTIONS

            </div>


            <div class="dashboard-panel-body">


                <div class="quick-actions">


                    <a
                        href="<?php echo WEB_ROOT; ?>module/student/index.php?view=list"
                        class="quick-action"
                    >

                        <i class="fas fa-user-plus"></i>

                        STUDENTS

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/course/index.php?view=list"
                        class="quick-action"
                    >

                        <i class="fas fa-book"></i>

                        COURSES

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/subject/index.php?view=list"
                        class="quick-action"
                    >

                        <i class="fas fa-book-open"></i>

                        SUBJECTS

                    </a>


                    <a
                        href="<?php echo WEB_ROOT; ?>module/enrollment/index.php?view=list"
                        class="quick-action"
                    >

                        <i class="fas fa-user-graduate"></i>

                        ENROLLMENT

                    </a>


                </div>


            </div>

        </div>


    </div>


</div>

</div>

</section>


<!-- =========================================================
     DASHBOARD SCRIPT
     ========================================================= -->

<script>

$(document).ready(function() {

    /*
     * Small entrance animation
     */

    $('.dashboard-stat, .dashboard-panel').css({
        'opacity': '0',
        'transform': 'translateY(8px)'
    });


    $('.dashboard-stat, .dashboard-panel').each(
        function(index) {

            var element = $(this);

            setTimeout(
                function() {

                    element.css({
                        'opacity': '1',
                        'transform': 'translateY(0)',
                        'transition':
                            'opacity .25s ease, transform .25s ease'
                    });

                },
                index * 50
            );

        }
    );

});

</script>