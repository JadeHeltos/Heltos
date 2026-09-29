<?php

// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE DASHBOARD / HOME
// =========================================================

require_once("include/initialize.php");


// =========================================================
// LOGIN CHECK
// =========================================================

if (!isset($_SESSION['UID'])) {

    redirect(WEB_ROOT . "login.php");

}


// =========================================================
// PAGE SETTINGS
// =========================================================

$title   = "Home";
$content = 'home.php';

$view = (isset($_GET['page']) && $_GET['page'] != '')
        ? $_GET['page']
        : '';


// =========================================================
// PAGE ROUTING
// =========================================================

switch ($view) {

    case '1':

        $title   = "Home";
        $content = 'home.php';

        break;


    default:

        $title   = "Home";
        $content = 'home.php';

        break;

}


// =========================================================
// LOAD MAIN TEMPLATE
// =========================================================

require_once("theme/template.php");

?>



<!-- =========================================================
     DELTARUNE DASHBOARD THEME
     ========================================================= -->

<style>

/* =========================================================
   PIXEL FONT
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');


/* =========================================================
   MAIN BODY
   ========================================================= */

body {

    background: #080611 !important;

    color: #d8d5e8 !important;

}


/* =========================================================
   CONTENT WRAPPER
   ========================================================= */

.content-wrapper {

    background:

        radial-gradient(
            circle at 50% 0%,
            rgba(64, 45, 150, 0.18),
            transparent 42%
        ),

        radial-gradient(
            circle at 15% 70%,
            rgba(60, 30, 130, 0.08),
            transparent 35%
        ),

        linear-gradient(
            180deg,
            #0b0818 0%,
            #080611 100%
        ) !important;

    color: #d8d5e8 !important;

}


/* =========================================================
   CONTENT HEADER
   ========================================================= */

.content-header {

    background: transparent !important;

}


.content-header h1 {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 18px !important;

    text-shadow:

        0 0 5px rgba(120, 100, 255, .8),

        0 0 12px rgba(80, 60, 255, .4);

}


/* =========================================================
   BREADCRUMB
   ========================================================= */

.breadcrumb {

    background: transparent !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


.breadcrumb-item {

    color: #77709d !important;

}


.breadcrumb-item.active {

    color: #aaa4cc !important;

}


.breadcrumb-item a {

    color: #7166d8 !important;

}


.breadcrumb-item a:hover {

    color: #ffffff !important;

    text-decoration: none !important;

}


/* =========================================================
   DASHBOARD CARDS
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

    border-radius: 0 !important;

    color: #d8d5e8 !important;

    box-shadow:

        0 0 15px rgba(61, 43, 150, .18),

        inset 0 0 15px rgba(30, 20, 80, .15);

}


/* =========================================================
   CARD HEADER
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

    color: #ffffff !important;

    border-radius: 0 !important;

}


.card-header h3,
.card-header h4,
.card-header h5,
.card-header .card-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 11px !important;

    text-shadow:

        0 0 5px #5c4ed0;

}


/* =========================================================
   CARD BODY
   ========================================================= */

.card-body {

    background: transparent !important;

    color: #c7c2dc !important;

}


/* =========================================================
   SMALL BOX
   ========================================================= */

.small-box {

    background:

        linear-gradient(
            145deg,
            #120d27,
            #080611
        ) !important;

    color: #ffffff !important;

    border:

        1px solid #3b2d7b !important;

    border-radius: 0 !important;

    box-shadow:

        0 0 15px rgba(61, 43, 150, .18);

    overflow: hidden;

    transition:

        transform .15s ease,

        box-shadow .15s ease,

        border-color .15s ease;

}


.small-box:hover {

    transform: translateY(-3px);

    border-color: #7565ff !important;

    box-shadow:

        0 0 18px rgba(100, 80, 255, .35);

}


.small-box .inner {

    color: #ffffff !important;

}


.small-box h3 {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 22px !important;

    text-shadow:

        0 0 6px rgba(120, 100, 255, .7);

}


.small-box p {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   SMALL BOX ICON
   ========================================================= */

.small-box .icon {

    color: rgba(115, 95, 220, .25) !important;

}


.small-box:hover .icon {

    color: rgba(135, 115, 255, .45) !important;

}


/* =========================================================
   SMALL BOX FOOTER
   ========================================================= */

.small-box-footer {

    background:

        rgba(20, 14, 45, .75) !important;

    color: #8174e5 !important;

    border-top:

        1px solid #2c2458;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 7px !important;

}


.small-box-footer:hover {

    background: #211653 !important;

    color: #ffffff !important;

}


/* =========================================================
   INFO BOX
   ========================================================= */

.info-box {

    background:

        linear-gradient(
            145deg,
            #100c21,
            #080611
        ) !important;

    color: #ffffff !important;

    border:

        1px solid #33276b !important;

    border-radius: 0 !important;

    box-shadow:

        0 0 12px rgba(61, 43, 150, .15);

}


.info-box-icon {

    background:

        linear-gradient(
            135deg,
            #302277,
            #17102f
        ) !important;

    color: #ffffff !important;

    border-right:

        1px solid #4b3d91;

}


.info-box-content {

    color: #ffffff !important;

}


.info-box-text {

    color: #817ba5 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 7px !important;

}


.info-box-number {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 16px !important;

    text-shadow:

        0 0 5px rgba(120, 100, 255, .5);

}


/* =========================================================
   PROGRESS
   ========================================================= */

.progress {

    background: #17132a !important;

    border-radius: 0 !important;

}


.progress-bar {

    background:

        linear-gradient(
            90deg,
            #302277,
            #7565ff
        ) !important;

}


/* =========================================================
   TABLE
   ========================================================= */

.table {

    color: #c8c4dc !important;

    background: transparent !important;

    border-color: #282052 !important;

}


.table thead th {

    background:

        linear-gradient(
            180deg,
            #211653,
            #130d2e
        ) !important;

    color: #ffffff !important;

    border:

        1px solid #41347f !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


.table tbody td {

    background: #0c0918 !important;

    color: #c4bfd8 !important;

    border-color: #211b40 !important;

}


.table tbody tr:hover td {

    background: #17102e !important;

    color: #ffffff !important;

}


/* =========================================================
   BUTTONS
   ========================================================= */

.btn {

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

    border-width: 1px !important;

    transition:

        transform .12s ease,

        box-shadow .12s ease;

}


.btn:hover {

    transform: translateY(-1px);

}


/* =========================================================
   PRIMARY
   ========================================================= */

.btn-primary {

    background:

        linear-gradient(
            135deg,
            #382a91,
            #211653
        ) !important;

    border-color: #7565ff !important;

    color: #ffffff !important;

    box-shadow:

        0 0 7px rgba(100, 80, 255, .25);

}


.btn-primary:hover {

    background:

        linear-gradient(
            135deg,
            #4b39b4,
            #2c1d68
        ) !important;

    box-shadow:

        0 0 12px rgba(100, 80, 255, .5);

}


/* =========================================================
   SUCCESS
   ========================================================= */

.btn-success {

    background:

        linear-gradient(
            135deg,
            #075f4b,
            #063c31
        ) !important;

    border-color: #00d9a6 !important;

    color: #ffffff !important;

}


.btn-success:hover {

    background:

        linear-gradient(
            135deg,
            #087d63,
            #07503f
        ) !important;

    box-shadow:

        0 0 12px rgba(0, 220, 170, .4);

}


/* =========================================================
   WARNING
   ========================================================= */

.btn-warning {

    background:

        linear-gradient(
            135deg,
            #725b05,
            #443600
        ) !important;

    border-color: #e8c933 !important;

    color: #ffffff !important;

}


.btn-warning:hover {

    box-shadow:

        0 0 10px rgba(232, 201, 51, .4);

}


/* =========================================================
   DANGER
   ========================================================= */

.btn-danger {

    background:

        linear-gradient(
            135deg,
            #7b1231,
            #400b1d
        ) !important;

    border-color: #ff315b !important;

    color: #ffffff !important;

}


.btn-danger:hover {

    background:

        linear-gradient(
            135deg,
            #a8173d,
            #5c0d28
        ) !important;

    box-shadow:

        0 0 10px rgba(255, 30, 80, .35);

}


/* =========================================================
   SECONDARY
   ========================================================= */

.btn-secondary {

    background: #17132a !important;

    border-color: #4b426d !important;

    color: #aaa5c7 !important;

}


/* =========================================================
   FORM CONTROLS
   ========================================================= */

.form-control {

    background: #080611 !important;

    color: #ffffff !important;

    border:

        1px solid #352a69 !important;

    border-radius: 0 !important;

}


.form-control:focus {

    background: #0b0818 !important;

    color: #ffffff !important;

    border-color: #7769e8 !important;

    box-shadow:

        0 0 8px rgba(100, 80, 255, .3) !important;

}


.form-control::placeholder {

    color: #55506f !important;

}


/* =========================================================
   LABELS
   ========================================================= */

label {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   MODALS
   ========================================================= */

.modal-content {

    background:

        linear-gradient(
            145deg,
            #120d24,
            #07050e
        ) !important;

    color: #d8d5e8 !important;

    border:

        1px solid #51429b !important;

    border-radius: 0 !important;

    box-shadow:

        0 0 30px rgba(65, 45, 180, .4);

}


.modal-header {

    background:

        linear-gradient(
            90deg,
            #211653,
            #0c0818
        ) !important;

    color: #ffffff !important;

    border-bottom:

        1px solid #40347d !important;

}


.modal-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 11px !important;

    text-shadow:

        0 0 6px #7165ff;

}


.modal-body {

    background: #0a0714 !important;

}


.modal-footer {

    background: #080611 !important;

    border-top:

        1px solid #2d2456 !important;

}


/* =========================================================
   SWEETALERT
   ========================================================= */

.swal2-popup {

    background:

        linear-gradient(
            145deg,
            #120d24,
            #07050e
        ) !important;

    color: #ffffff !important;

    border:

        1px solid #51429b !important;

    border-radius: 0 !important;

    box-shadow:

        0 0 30px rgba(65, 45, 180, .5);

}


.swal2-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 14px !important;

    text-shadow:

        0 0 6px #7165ff;

}


.swal2-html-container {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 9px !important;

}


.swal2-confirm {

    background:

        linear-gradient(
            135deg,
            #382a91,
            #211653
        ) !important;

    border:

        1px solid #7565ff !important;

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   LINKS
   ========================================================= */

.content-wrapper a {

    color: #8174e5;

}


.content-wrapper a:hover {

    color: #ffffff;

    text-decoration: none;

}


/* =========================================================
   DASHBOARD HEADINGS
   ========================================================= */

.content-wrapper h1,
.content-wrapper h2,
.content-wrapper h3,
.content-wrapper h4,
.content-wrapper h5 {

    font-family: 'Press Start 2P', monospace;

}


/* =========================================================
   DASHBOARD TEXT
   ========================================================= */

.content-wrapper p {

    color: #aaa5c7;

}


/* =========================================================
   HORIZONTAL RULE
   ========================================================= */

.content-wrapper hr {

    border-color: #30265f !important;

}


/* =========================================================
   DELTARUNE GLOW
   ========================================================= */

.deltarune-glow {

    text-shadow:

        0 0 5px #7165ff,

        0 0 12px rgba(113, 101, 255, .5);

}


/* =========================================================
   SOUL
   ========================================================= */

.deltarune-soul {

    color: #ff1744 !important;

    text-shadow:

        0 0 5px #ff1744,

        0 0 12px #ff1744,

        0 0 20px rgba(255, 23, 68, .5);

}


/* =========================================================
   SCROLLBAR
   ========================================================= */

.content-wrapper ::-webkit-scrollbar {

    width: 7px;

    height: 7px;

}


.content-wrapper ::-webkit-scrollbar-track {

    background: #05030c;

}


.content-wrapper ::-webkit-scrollbar-thumb {

    background: #33276d;

}


.content-wrapper ::-webkit-scrollbar-thumb:hover {

    background: #5b4ac2;

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 768px) {

    .content-header h1 {

        font-size: 14px !important;

    }


    .card-header .card-title {

        font-size: 9px !important;

    }


    .small-box h3 {

        font-size: 16px !important;

    }


    .small-box p {

        font-size: 7px !important;

    }


    .info-box-text {

        font-size: 6px !important;

    }


    .info-box-number {

        font-size: 13px !important;

    }

}

</style>