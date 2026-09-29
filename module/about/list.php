<?php

// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE THEMED ABOUT PAGE
// =========================================================

require_once(__DIR__."/../generic/config.php");

global $mydb;


// =========================================================
// APPLICATION INFORMATION
// =========================================================

$appName     = 'Tajale Solutions';
$developer   = 'Tajale';
$appVersion  = '3.0.5';


// =========================================================
// GET DATABASE TABLES
// =========================================================

$mydb->setQuery("SHOW TABLES");

$allTablesRaw = $mydb->loadResultList();

$dbNameKey = 'Tables_in_'.DB_NAME;

$allTables = array();

foreach ($allTablesRaw as $t) {

    foreach ($t as $val) {

        $allTables[] = $val;

        break;

    }

}


// =========================================================
// MODULE LINKS
// =========================================================

$moduleLinks = array(

    'Student' =>
        WEB_ROOT.'module/student/',

    'Course' =>
        WEB_ROOT.'module/course/',

    'Subject' =>
        WEB_ROOT.'module/subject/',

    'User Accounts' =>
        WEB_ROOT.'module/user/',

    'User Type' =>
        WEB_ROOT.'module/usertype/',

);


foreach ($GENERIC_TABLES as $tblKey => $tblCfg) {

    $moduleLinks[$tblCfg['title']] =
        WEB_ROOT .
        'module/generic/index.php?t=' .
        urlencode($tblKey);

}

?>



<!-- =========================================================
     DELTARUNE ABOUT PAGE
     ========================================================= -->

<style>

/* =========================================================
   PAGE
   ========================================================= */

.content {

    color: #d8d5e8;

}


.content-wrapper {

    background:

        radial-gradient(
            circle at 50% 0%,
            rgba(67, 49, 160, .15),
            transparent 40%
        ),

        linear-gradient(
            180deg,
            #0b0818 0%,
            #080611 100%
        ) !important;

}


/* =========================================================
   CARDS
   ========================================================= */

.card {

    background:

        linear-gradient(
            145deg,
            #100c21,
            #080611
        ) !important;

    border:

        1px solid #33276b !important;

    border-radius:

        0 !important;

    color:

        #d8d5e8 !important;

    box-shadow:

        0 0 15px rgba(61, 43, 150, .18),

        inset 0 0 15px rgba(30, 20, 80, .12);

}


/* =========================================================
   CARD HEADERS
   ========================================================= */

.card-header {

    background:

        linear-gradient(
            90deg,
            #17102f,
            #0b0818
        ) !important;

    border-bottom:

        1px solid #3a2d7d !important;

    color:

        #ffffff !important;

    border-radius:

        0 !important;

}


.card-title {

    color:

        #ffffff !important;

    font-family:

        'Press Start 2P',
        monospace !important;

    font-size:

        11px !important;

    text-shadow:

        0 0 5px #5c4ed0;

}


/* =========================================================
   PROFILE AREA
   ========================================================= */

.box-profile {

    background:

        radial-gradient(
            circle at center,
            rgba(62, 45, 145, .12),
            transparent 65%
        );

}


/* =========================================================
   LOGO
   ========================================================= */

.profile-user-img {

    border:

        2px solid #6d5ce7 !important;

    background:

        #080611;

    padding:

        7px;

    box-shadow:

        0 0 10px rgba(100, 80, 255, .35),

        0 0 25px rgba(80, 60, 200, .15);

    transition:

        .2s ease;

}


.profile-user-img:hover {

    border-color:

        #9b8cff !important;

    box-shadow:

        0 0 15px rgba(120, 100, 255, .6),

        0 0 30px rgba(80, 60, 220, .3);

    transform:

        scale(1.03);

}


/* =========================================================
   APPLICATION NAME
   ========================================================= */

.profile-username {

    color:

        #ffffff !important;

    font-family:

        'Press Start 2P',
        monospace !important;

    font-size:

        15px !important;

    line-height:

        1.7;

    text-shadow:

        0 0 5px #7062e5,

        0 0 12px rgba(100, 80, 255, .45);

}


/* =========================================================
   DESCRIPTION
   ========================================================= */

.text-muted {

    color:

        #77709d !important;

}


.box-profile p {

    font-family:

        'Press Start 2P',
        monospace;

    font-size:

        7px;

    line-height:

        1.8;

}


/* =========================================================
   INFORMATION LIST
   ========================================================= */

.list-group {

    border:

        1px solid #29204f;

}


.list-group-item {

    background:

        #0c0918 !important;

    color:

        #c8c4dc !important;

    border-color:

        #29204f !important;

}


.list-group-item:hover {

    background:

        #17102e !important;

}


.list-group-item b {

    color:

        #ffffff !important;

    font-family:

        'Press Start 2P',
        monospace;

    font-size:

        8px;

}


.list-group-item .text-muted {

    color:

        #7169a0 !important;

    font-family:

        'Press Start 2P',
        monospace;

    font-size:

        7px;

}


/* =========================================================
   BUILT WITH
   ========================================================= */

.card-body ul {

    color:

        #aaa5c7;

}


.card-body li {

    margin-bottom:

        8px;

    font-size:

        12px;

}


.card-body li::marker {

    color:

        #6759d3;

}


/* =========================================================
   MODULE TABLE
   ========================================================= */

.table {

    color:

        #c8c4dc !important;

    background:

        transparent !important;

    margin-bottom:

        0 !important;

}


.table thead th {

    background:

        linear-gradient(
            180deg,
            #211653,
            #130d2e
        ) !important;

    color:

        #ffffff !important;

    border:

        1px solid #41347f !important;

    font-family:

        'Press Start 2P',
        monospace;

    font-size:

        8px;

    text-transform:

        uppercase;

    padding:

        12px;

}


.table tbody td {

    background:

        #0c0918 !important;

    color:

        #c4bfd8 !important;

    border-color:

        #211b40 !important;

    vertical-align:

        middle !important;

}


.table tbody tr:hover td {

    background:

        #17102e !important;

    color:

        #ffffff !important;

}


/* =========================================================
   OPEN BUTTON
   ========================================================= */

.btn-outline-primary {

    color:

        #9184ff !important;

    border:

        1px solid #6557d1 !important;

    background:

        #0c0918 !important;

    border-radius:

        0 !important;

    font-family:

        'Press Start 2P',
        monospace !important;

    font-size:

        7px !important;

    transition:

        .15s ease;

}


.btn-outline-primary:hover {

    background:

        #302277 !important;

    color:

        #ffffff !important;

    border-color:

        #8c7dff !important;

    box-shadow:

        0 0 10px rgba(100, 80, 255, .4);

}


/* =========================================================
   DATABASE TABLE BADGES
   ========================================================= */

.badge-info {

    background:

        #211653 !important;

    color:

        #aaa1ff !important;

    border:

        1px solid #493c91;

    border-radius:

        0 !important;

    font-family:

        'Press Start 2P',
        monospace;

    font-size:

        7px !important;

    padding:

        7px 9px;

    transition:

        .15s ease;

}


.badge-info:hover {

    background:

        #302277 !important;

    color:

        #ffffff !important;

    border-color:

        #7565ff;

    box-shadow:

        0 0 8px rgba(100, 80, 255, .3);

}


/* =========================================================
   DATABASE CARD
   ========================================================= */

.card-outline.card-info {

    border-top:

        2px solid #6759d3 !important;

}


/* =========================================================
   SECONDARY CARD
   ========================================================= */

.card-secondary {

    border-color:

        #33276b !important;

}


.card-secondary .card-header {

    background:

        linear-gradient(
            90deg,
            #151029,
            #0b0818
        ) !important;

}


/* =========================================================
   SOUL DECORATION
   ========================================================= */

.deltarune-soul {

    color:

        #ff1744;

    text-shadow:

        0 0 5px #ff1744,

        0 0 12px #ff1744;

}


/* =========================================================
   SCROLLBAR
   ========================================================= */

.content-wrapper ::-webkit-scrollbar {

    width:

        7px;

    height:

        7px;

}


.content-wrapper ::-webkit-scrollbar-track {

    background:

        #05030c;

}


.content-wrapper ::-webkit-scrollbar-thumb {

    background:

        #33276d;

}


.content-wrapper ::-webkit-scrollbar-thumb:hover {

    background:

        #5b4ac2;

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 768px) {

    .profile-username {

        font-size:

            11px !important;

    }


    .box-profile p {

        font-size:

            6px;

    }


    .card-title {

        font-size:

            9px !important;

    }


    .table {

        font-size:

            10px;

    }


    .table thead th {

        font-size:

            7px;

    }


    .btn-outline-primary {

        font-size:

            6px !important;

    }

}

</style>



<!-- =========================================================
     DELTARUNE PIXEL FONT
     ========================================================= -->

<link
    href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
    rel="stylesheet"
>



<!-- =========================================================
     ABOUT PAGE
     ========================================================= -->

<section class="content">

    <div class="container-fluid">


        <div class="row">


            <!-- =================================================
                 LEFT SIDE
                 ================================================= -->

            <div class="col-md-5">


                <!-- =============================================
                     APPLICATION INFORMATION
                     ============================================= -->

                <div class="card card-primary card-outline">

                    <div class="card-body box-profile text-center">


                        <!-- LOGO -->

                        <img
                            src="<?php echo WEB_ROOT; ?>deltalogo.png"
                            class="profile-user-img img-fluid"
                            style="max-width:120px;"
                            alt="Tajale Solutions Logo"
                        >


                        <!-- APPLICATION NAME -->

                        <h3 class="profile-username mt-3">

                            <?php

                            echo htmlspecialchars(
                                $appName
                            );

                            ?>

                        </h3>


                        <!-- DESCRIPTION -->

                        <p class="text-muted">

                            Student &amp; Alumni Records
                            Management System

                        </p>


                        <!-- =====================================
                             APPLICATION DETAILS
                             ===================================== -->

                        <ul
                            class="list-group list-group-unbordered mb-3"
                        >


                            <!-- VERSION -->

                            <li
                                class="list-group-item
                                       d-flex
                                       justify-content-between
                                       align-items-center
                                       text-left"
                            >

                                <b>Version</b>

                                <span class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        $appVersion
                                    );

                                    ?>

                                </span>

                            </li>


                            <!-- DEVELOPER -->

                            <li
                                class="list-group-item
                                       d-flex
                                       justify-content-between
                                       align-items-center
                                       text-left"
                            >

                                <b>Developer</b>

                                <span class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        $developer
                                    );

                                    ?>

                                </span>

                            </li>


                            <!-- DATABASE -->

                            <li
                                class="list-group-item
                                       d-flex
                                       justify-content-between
                                       align-items-center
                                       text-left"
                            >

                                <b>Database</b>

                                <span class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        DB_NAME
                                    );

                                    ?>

                                </span>

                            </li>


                            <!-- TABLE COUNT -->

                            <li
                                class="list-group-item
                                       d-flex
                                       justify-content-between
                                       align-items-center
                                       text-left"
                            >

                                <b>Tables Connected</b>

                                <span class="text-muted">

                                    <?php

                                    echo count(
                                        $allTables
                                    );

                                    ?>

                                </span>

                            </li>


                        </ul>

                    </div>

                </div>



                <!-- =============================================
                     BUILT WITH
                     ============================================= -->

                <div class="card card-secondary">


                    <div class="card-header">

                        <h3 class="card-title">

                            Built With

                        </h3>

                    </div>


                    <div class="card-body">

                        <ul>

                            <li>
                                PHP + PDO / MySQL
                            </li>

                            <li>
                                AdminLTE 3 (Bootstrap 4)
                            </li>

                            <li>
                                DataTables
                                (server-side paging &amp; search)
                            </li>

                            <li>
                                SweetAlert2
                                for confirmations &amp; notices
                            </li>

                        </ul>

                    </div>

                </div>


            </div>



            <!-- =================================================
                 RIGHT SIDE
                 ================================================= -->

            <div class="col-md-7">


                <!-- =============================================
                     MODULES
                     ============================================= -->

                <div class="card">


                    <div class="card-header">

                        <h3 class="card-title">

                            Modules

                        </h3>

                    </div>


                    <div class="card-body p-0">


                        <table
                            class="table table-striped"
                        >


                            <thead>

                                <tr>

                                    <th>
                                        Module
                                    </th>

                                    <th class="text-right">
                                        Open
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                <?php

                                foreach (
                                    $moduleLinks
                                    as $label => $url
                                ):

                                ?>


                                <tr>


                                    <td>

                                        <?php

                                        echo htmlspecialchars(
                                            $label
                                        );

                                        ?>

                                    </td>


                                    <td class="text-right">


                                        <a
                                            href="<?php echo $url; ?>"
                                            class="btn btn-outline-primary btn-xs"
                                        >

                                            Open

                                            <i
                                                class="fas fa-arrow-circle-right"
                                            ></i>

                                        </a>


                                    </td>


                                </tr>


                                <?php

                                endforeach;

                                ?>


                            </tbody>

                        </table>

                    </div>

                </div>



                <!-- =============================================
                     DATABASE TABLES
                     ============================================= -->

                <div
                    class="card card-outline card-info"
                >


                    <div class="card-header">

                        <h3 class="card-title">

                            All Database Tables

                        </h3>

                    </div>


                    <div class="card-body">


                        <?php

                        foreach (
                            $allTables
                            as $t
                        ):

                        ?>


                            <span
                                class="badge badge-info mr-1 mb-1"
                            >

                                <?php

                                echo htmlspecialchars(
                                    $t
                                );

                                ?>

                            </span>


                        <?php

                        endforeach;

                        ?>


                    </div>

                </div>


            </div>


        </div>


    </div>

</section>
