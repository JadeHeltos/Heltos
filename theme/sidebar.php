<?php
// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE SIDEBAR
// =========================================================
?>

<!-- =========================================================
     DELTARUNE SIDEBAR THEME
     ========================================================= -->

<style>

/* =========================================================
   DELTARUNE FONT
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');


/* =========================================================
   SIDEBAR
   ========================================================= */

.main-sidebar {

    background:
        radial-gradient(
            circle at 50% 20%,
            rgba(76, 29, 149, 0.20),
            transparent 45%
        ),
        linear-gradient(
            180deg,
            #0b0818 0%,
            #07050f 100%
        ) !important;

    border-right: 1px solid #4c1d95 !important;

    box-shadow:
        3px 0 15px rgba(76, 29, 149, 0.25) !important;

}


/* Sidebar background */
.main-sidebar::before {

    background: transparent !important;

}


/* =========================================================
   SIDEBAR CONTENT
   ========================================================= */

.main-sidebar .sidebar {

    background: transparent !important;

    padding-top: 8px;

}


/* =========================================================
   NAVIGATION
   ========================================================= */

.main-sidebar .nav-sidebar {

    font-family: 'Press Start 2P', monospace !important;

}


/* =========================================================
   NORMAL NAV ITEMS
   ========================================================= */

.main-sidebar .nav-sidebar > .nav-item {

    margin: 2px 8px;

}


/* =========================================================
   NAV LINKS
   ========================================================= */

.main-sidebar .nav-sidebar .nav-link {

    color: #aaa5c7 !important;

    background: transparent !important;

    border: 1px solid transparent;

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

    padding: 11px 10px !important;

    transition:
        color .15s ease,
        background .15s ease,
        border .15s ease,
        box-shadow .15s ease;

}


/* =========================================================
   ICONS
   ========================================================= */

.main-sidebar .nav-sidebar .nav-link .nav-icon {

    color: #766be0 !important;

    font-size: 13px !important;

    margin-right: 5px;

    transition:
        color .15s ease,
        text-shadow .15s ease;

}


/* =========================================================
   TEXT
   ========================================================= */

.main-sidebar .nav-sidebar .nav-link p {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   HOVER
   ========================================================= */

.main-sidebar .nav-sidebar .nav-link:hover {

    background:
        linear-gradient(
            90deg,
            rgba(76, 29, 149, .45),
            rgba(30, 20, 60, .25)
        ) !important;

    color: #ffffff !important;

    border: 1px solid #6d28d9;

    box-shadow:
        inset 3px 0 0 #8b5cf6,
        0 0 8px rgba(109, 40, 217, .25);

}


.main-sidebar .nav-sidebar .nav-link:hover p {

    color: #ffffff !important;

}


.main-sidebar .nav-sidebar .nav-link:hover .nav-icon {

    color: #c4b5fd !important;

    text-shadow:
        0 0 6px #8b5cf6;

}


/* =========================================================
   ACTIVE ITEM
   ========================================================= */

.main-sidebar .nav-sidebar .nav-link.active {

    background:
        linear-gradient(
            90deg,
            #211653,
            #120c25
        ) !important;

    color: #ffffff !important;

    border: 1px solid #8b5cf6 !important;

    box-shadow:
        inset 4px 0 0 #ff1744,
        0 0 10px rgba(109, 40, 217, .35);

}


/* Active text */
.main-sidebar .nav-sidebar .nav-link.active p {

    color: #ffffff !important;

    text-shadow:
        0 0 5px rgba(255,255,255,.4);

}


/* Active icon */
.main-sidebar .nav-sidebar .nav-link.active .nav-icon {

    color: #ffffff !important;

    text-shadow:
        0 0 6px #8b5cf6;

}


/* =========================================================
   NAV HEADERS
   ========================================================= */

.main-sidebar .nav-header {

    color: #6f6794 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 7px !important;

    letter-spacing: 1px;

    text-transform: uppercase;

    padding:
        15px 12px 8px 14px !important;

    border-bottom: 1px solid #241b42;

    margin-bottom: 5px;

}


/* =========================================================
   TREEVIEW
   ========================================================= */

.main-sidebar .nav-treeview {

    background:
        rgba(5, 3, 12, .35) !important;

    border-left: 1px solid #33276d;

    margin-left: 15px;

}


.main-sidebar .nav-treeview .nav-item {

    margin: 1px 4px;

}


.main-sidebar .nav-treeview .nav-link {

    padding-left: 15px !important;

    font-size: 7px !important;

}


.main-sidebar .nav-treeview .nav-link p {

    font-size: 7px !important;

}


/* =========================================================
   TREEVIEW ARROW
   ========================================================= */

.main-sidebar .nav-link .right {

    color: #7166d8 !important;

}


/* =========================================================
   ACCOUNT SETTINGS
   ========================================================= */

.main-sidebar .nav-item.has-treeview > .nav-link {

    background: transparent !important;

}


.main-sidebar .nav-item.has-treeview > .nav-link:hover {

    background:
        linear-gradient(
            90deg,
            rgba(76, 29, 149, .4),
            transparent
        ) !important;

}


/* =========================================================
   LOGOUT
   ========================================================= */

.main-sidebar .nav-link[href*="logout"] {

    color: #ff7b96 !important;

}


.main-sidebar .nav-link[href*="logout"] .nav-icon {

    color: #ff315b !important;

}


.main-sidebar .nav-link[href*="logout"]:hover {

    background:
        linear-gradient(
            90deg,
            rgba(123, 18, 49, .45),
            rgba(60, 10, 25, .25)
        ) !important;

    border-color: #ff315b !important;

    box-shadow:
        inset 3px 0 0 #ff1744,
        0 0 8px rgba(255, 49, 91, .25);

}


.main-sidebar .nav-link[href*="logout"]:hover p {

    color: #ffffff !important;

}


/* =========================================================
   STUDENT / PROFILE
   ========================================================= */

.main-sidebar .nav-link[href*="myprofile"] .nav-icon {

    color: #a78bfa !important;

}


/* =========================================================
   SIDEBAR SCROLLBAR
   ========================================================= */

.main-sidebar ::-webkit-scrollbar {

    width: 6px;

}


.main-sidebar ::-webkit-scrollbar-track {

    background: #05030c;

}


.main-sidebar ::-webkit-scrollbar-thumb {

    background: #33276d;

    border: 1px solid #4c1d95;

}


.main-sidebar ::-webkit-scrollbar-thumb:hover {

    background: #6d28d9;

}


/* =========================================================
   SIDEBAR BOTTOM GLOW
   ========================================================= */

.main-sidebar {

    position: relative;

}


.main-sidebar::after {

    content: "";

    position: absolute;

    bottom: 0;

    left: 0;

    width: 100%;

    height: 3px;

    background:
        linear-gradient(
            90deg,
            #3b1b77,
            #8b5cf6,
            #3b1b77
        );

    box-shadow:
        0 0 8px #6d28d9;

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 768px) {

    .main-sidebar .nav-sidebar .nav-link {

        font-size: 7px !important;

        padding: 10px 8px !important;

    }

    .main-sidebar .nav-sidebar .nav-link p {

        font-size: 7px !important;

    }

    .main-sidebar .nav-sidebar .nav-icon {

        font-size: 12px !important;

    }

}

</style>


<!-- =========================================================
     SIDEBAR MENU
     ========================================================= -->

<nav class="mt-2">

    <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
    >


<?php if (isset($_SESSION['TYPE']) && $_SESSION['TYPE'] == 'Student') : ?>


        <!-- =========================================
             STUDENT
        ========================================== -->

        <li class="nav-header">

            <a
                href='<?php echo WEB_ROOT; ?>module/student/myprofile.php'
                class="nav-link <?php echo ($title == 'My Profile') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-id-badge"></i>

                <p>
                    My Profile
                </p>

            </a>

        </li>


        <!-- MESSENGER -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>messenger.php'
                class="nav-link <?php echo ($title == 'Messenger') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-comments"></i>

                <p>
                    Messenger
                </p>

            </a>

        </li>


        <!-- LOGOUT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>logout.php'
                class="nav-link"
            >

                <i class="nav-icon fas fa-sign-out-alt"></i>

                <p>
                    Logout
                </p>

            </a>

        </li>


<?php elseif (isset($_SESSION['TYPE']) && $_SESSION['TYPE'] == 'Doctor') : ?>


        <!-- =========================================
             DOCTOR
        ========================================== -->

        <li class="nav-header">

            <a
                href='<?php echo WEB_ROOT; ?>'
                class="nav-link <?php echo ($title == 'Doctor Dashboard') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-tachometer-alt"></i>

                <p>
                    Dashboard
                </p>

            </a>

        </li>


        <!-- CONSULT STUDENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/student/'
                class="nav-link <?php echo ($title == 'Student Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-stethoscope"></i>

                <p>
                    Consult a Student
                </p>

            </a>

        </li>


        <!-- PATIENTS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/patient/'
                class="nav-link <?php echo ($title == 'Patient Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-user-injured"></i>

                <p>
                    Patients
                </p>

            </a>

        </li>


        <!-- MESSENGER -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>messenger.php'
                class="nav-link <?php echo ($title == 'Messenger') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-comments"></i>

                <p>
                    Messenger
                </p>

            </a>

        </li>


        <!-- MY PROFILE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/user/myprofile.php'
                class="nav-link <?php echo ($title == 'My Profile') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-id-badge"></i>

                <p>
                    My Profile
                </p>

            </a>

        </li>


        <!-- LOGOUT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>logout.php'
                class="nav-link"
            >

                <i class="nav-icon fas fa-sign-out-alt"></i>

                <p>
                    Logout
                </p>

            </a>

        </li>


<?php elseif (isset($_SESSION['TYPE']) && $_SESSION['TYPE'] == 'Registrar') : ?>


        <!-- =========================================
             REGISTRAR
        ========================================== -->

        <li class="nav-header">

            <a
                href='<?php echo WEB_ROOT; ?>'
                class="nav-link <?php echo ($title == 'Registrar Dashboard') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-tachometer-alt"></i>

                <p>
                    Dashboard
                </p>

            </a>

        </li>


        <!-- DETAILS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=alumni_details'
                class="nav-link <?php echo ($title == 'Alumni Details') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-id-card"></i>

                <p>
                    Details
                </p>

            </a>

        </li>


        <!-- STUDENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/student/'
                class="nav-link <?php echo ($title == 'Student Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-user-graduate"></i>

                <p>
                    Student
                </p>

            </a>

        </li>


        <!-- ENROLLMENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/enrollment/index.php'
                class="nav-link <?php echo ($title == 'Enrollment Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-clipboard-list"></i>

                <p>
                    Enrollment
                </p>

            </a>

        </li>


        <!-- COURSE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/course'
                class="nav-link <?php echo ($title == 'Course Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-book"></i>

                <p>
                    Course
                </p>

            </a>

        </li>


        <!-- SUBJECT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/subject'
                class="nav-link <?php echo ($title == 'Subject Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-book-open"></i>

                <p>
                    Subject
                </p>

            </a>

        </li>


        <!-- SCHEDULING -->

        <li class="nav-header">
            SCHEDULING
        </li>


        <!-- DEPARTMENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/department/'
                class="nav-link <?php echo ($title == 'Department Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-building"></i>

                <p>
                    Department
                </p>

            </a>

        </li>


        <!-- CLASSROOM -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/classroom/'
                class="nav-link <?php echo ($title == 'Classroom Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-door-open"></i>

                <p>
                    Classroom
                </p>

            </a>

        </li>


        <!-- SCHEDULE TIME -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/scheduletime/'
                class="nav-link <?php echo ($title == 'Schedule Time Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-clock"></i>

                <p>
                    Schedule Time
                </p>

            </a>

        </li>


        <!-- SCHEDULE DAY -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/scheduleday/'
                class="nav-link <?php echo ($title == 'Schedule Day Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-day"></i>

                <p>
                    Schedule Day
                </p>

            </a>

        </li>


        <!-- SET SCHEDULE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/setschedule/'
                class="nav-link <?php echo ($title == 'Set Schedule Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-check"></i>

                <p>
                    Set Schedule
                </p>

            </a>

        </li>


        <!-- SCHOOL YEAR -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblschoolyear'
                class="nav-link <?php echo ($title == 'School Year') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-alt"></i>

                <p>
                    School Year
                </p>

            </a>

        </li>


        <!-- SECTIONS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblsections'
                class="nav-link <?php echo ($title == 'Sections') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-chalkboard"></i>

                <p>
                    Sections
                </p>

            </a>

        </li>


        <!-- GRADES -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblgrades'
                class="nav-link <?php echo ($title == 'Grades') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-graduation-cap"></i>

                <p>
                    Grades
                </p>

            </a>

        </li>


        <!-- MESSENGER -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>messenger.php'
                class="nav-link <?php echo ($title == 'Messenger') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-comments"></i>

                <p>
                    Messenger
                </p>

            </a>

        </li>


        <!-- MY PROFILE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/user/myprofile.php'
                class="nav-link <?php echo ($title == 'My Profile') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-id-badge"></i>

                <p>
                    My Profile
                </p>

            </a>

        </li>


        <!-- LOGOUT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>logout.php'
                class="nav-link"
            >

                <i class="nav-icon fas fa-sign-out-alt"></i>

                <p>
                    Logout
                </p>

            </a>

        </li>


<?php else : ?>


        <!-- =========================================
             DEFAULT ADMIN / STAFF
        ========================================== -->

        <!-- DASHBOARD -->

        <li class="nav-header">

            <a
                href='<?php echo WEB_ROOT; ?>'
                class="nav-link <?php echo ($title == 'Home') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-tachometer-alt"></i>

                <p>
                    Dashboard
                </p>

            </a>

        </li>


        <!-- DETAILS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=alumni_details'
                class="nav-link <?php echo ($title == 'Alumni Details') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-id-card"></i>

                <p>
                    Details
                </p>

            </a>

        </li>


        <!-- STUDENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/student'
                class="nav-link <?php echo ($title == 'Student Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-user-graduate"></i>

                <p>
                    Student
                </p>

            </a>

        </li>


        <!-- COURSE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/course'
                class="nav-link <?php echo ($title == 'Course Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-book"></i>

                <p>
                    Course
                </p>

            </a>

        </li>


        <!-- SUBJECT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/subject'
                class="nav-link <?php echo ($title == 'Subject Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-book-open"></i>

                <p>
                    Subject
                </p>

            </a>

        </li>


        <!-- INSTRUCTOR -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/instructor/'
                class="nav-link <?php echo (isset($title) && $title == "Instructor Module") ? "active" : ""; ?>"
            >

                <i class="nav-icon fas fa-chalkboard-teacher"></i>

                <p>
                    Instructor
                </p>

            </a>

        </li>

        <!-- =================================================
     EMPLOYEE
================================================== -->

<li class="nav-item">

    <a
        href="<?php echo WEB_ROOT; ?>module/employee/"
        class="nav-link <?php echo (isset($title) && $title == "Employee Module") ? "active" : ""; ?>"
    >

        <i class="nav-icon fas fa-user-tie"></i>

        <p>
            Employee
        </p>

    </a>

</li>


        <!-- DEPARTMENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/department/'
                class="nav-link <?php echo ($title == 'Department Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-building"></i>

                <p>
                    Department
                </p>

            </a>

        </li>


        <!-- CLASSROOM -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/classroom/'
                class="nav-link <?php echo ($title == 'Classroom Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-door-open"></i>

                <p>
                    Classroom
                </p>

            </a>

        </li>


        <!-- SCHEDULE TIME -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/scheduletime/'
                class="nav-link <?php echo ($title == 'Schedule Time Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-clock"></i>

                <p>
                    Schedule Time
                </p>

            </a>

        </li>


        <!-- SCHEDULE DAY -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/scheduleday/'
                class="nav-link <?php echo ($title == 'Schedule Day Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-day"></i>

                <p>
                    Schedule Day
                </p>

            </a>

        </li>


        <!-- SET SCHEDULE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/setschedule/'
                class="nav-link <?php echo ($title == 'Set Schedule Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-check"></i>

                <p>
                    Set Schedule
                </p>

            </a>

        </li>


        <!-- SCHOOL YEAR -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblschoolyear'
                class="nav-link <?php echo ($title == 'School Year') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-calendar-alt"></i>

                <p>
                    School Year
                </p>

            </a>

        </li>


        <!-- SECTIONS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblsections'
                class="nav-link <?php echo ($title == 'Sections') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-chalkboard"></i>

                <p>
                    Sections
                </p>

            </a>

        </li>


        <!-- GRADES -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/generic/index.php?t=tblgrades'
                class="nav-link <?php echo ($title == 'Grades') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-graduation-cap"></i>

                <p>
                    Grades
                </p>

            </a>

        </li>


        <!-- ENROLLMENT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/enrollment/index.php'
                class="nav-link <?php echo ($title == 'Enrollment Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-clipboard-list"></i>

                <p>
                    Enrollment
                </p>

            </a>

        </li>


        <!-- DOCTORS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/doctor'
                class="nav-link <?php echo ($title == 'Doctor Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-user-md"></i>

                <p>
                    Doctors
                </p>

            </a>

        </li>


        <!-- PATIENTS -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/patient'
                class="nav-link <?php echo ($title == 'Patient Module') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fa fa-user-injured"></i>

                <p>
                    Patients
                </p>

            </a>

        </li>


        <!-- MESSENGER -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>messenger.php'
                class="nav-link <?php echo ($title == 'Messenger') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-comments"></i>

                <p>
                    Messenger
                </p>

            </a>

        </li>


        <!-- MY PROFILE -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>module/user/myprofile.php'
                class="nav-link <?php echo ($title == 'My Profile') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-id-badge"></i>

                <p>
                    My Profile
                </p>

            </a>

        </li>


        <!-- ACCOUNT SETTINGS -->

        <li class="nav-item has-treeview">

            <a
                href="#"
                class="nav-link <?php echo ($title == 'User Module' || $title == 'User Type') ? "active" : 'na'; ?>"
            >

                <i class="nav-icon fas fa-cog"></i>

                <p>

                    Account Settings

                    <i class="fas fa-angle-left right"></i>

                </p>

            </a>


            <ul class="nav nav-treeview">


                <!-- MANAGE USER ACCOUNTS -->

                <li class="nav-item">

                    <a
                        href='<?php echo WEB_ROOT; ?>module/user/'
                        class="nav-link"
                    >

                        <i class="nav-icon fa fa-users"></i>

                        <p>
                            Manage User Accounts
                        </p>

                    </a>

                </li>


                <!-- MANAGE USER TYPE -->

                <li class="nav-item">

                    <a
                        href='<?php echo WEB_ROOT; ?>module/usertype/'
                        class="nav-link"
                    >

                        <i class="nav-icon fa fa-key"></i>

                        <p>
                            Manage User Type
                        </p>

                    </a>

                </li>


            </ul>

        </li>


        <!-- LOGOUT -->

        <li class="nav-item">

            <a
                href='<?php echo WEB_ROOT; ?>logout.php'
                class="nav-link"
            >

                <i class="nav-icon fas fa-sign-out-alt"></i>

                <p>
                    Logout
                </p>

            </a>

        </li>


<?php endif; ?>


    </ul>

</nav>