<?php

// DELFIN SOLUTIONS

require_once("../../include/initialize.php");
// if (!isset($_SESSION['ACCOUNT_ID'])){
//     redirect(web_root."/index.php");
// }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title = "Subject Module";
$header = $view;

switch ($view) {

    case 'list':
        $content = 'list.php';
        break;

    default:
        $content = 'list.php';
}

require_once("../../theme/template.php");

?>

<!-- =========================================================
     DELTARUNE SUBJECT MODULE THEME
     ========================================================= -->

<style>

/* ---------------------------------------------------------
   GOOGLE FONT
   --------------------------------------------------------- */

@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');


/* ---------------------------------------------------------
   MAIN PAGE
   --------------------------------------------------------- */

html,
body {
    background: #080611 !important;
}

body {
    color: #ffffff !important;
}

.content-wrapper {
    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(76, 29, 149, 0.22),
            transparent 45%
        ),
        #080611 !important;
}

.content {
    background: transparent !important;
}


/* ---------------------------------------------------------
   PAGE TITLE
   --------------------------------------------------------- */

.content-header h1 {
    font-family: 'Press Start 2P', cursive !important;
    color: #ffffff !important;
    text-shadow:
        0 0 5px #ffffff,
        0 0 10px #8b5cf6,
        0 0 20px rgba(139, 92, 246, 0.7);
}


/* ---------------------------------------------------------
   REMOVE WHITE ADMINLTE BOX
   --------------------------------------------------------- */

.content-wrapper .box,
.content-wrapper .box-primary,
.content-wrapper .box-default,
.content-wrapper .box-info,
.content-wrapper .box-success,
.content-wrapper .box-warning,
.content-wrapper .box-danger {

    background: #0b0818 !important;

    border: 2px solid #6d28d9 !important;

    border-top-color: #8b5cf6 !important;

    border-radius: 0 !important;

    box-shadow:
        0 0 8px rgba(124, 58, 237, 0.45),
        inset 0 0 25px rgba(76, 29, 149, 0.08) !important;
}


/* ---------------------------------------------------------
   BOX HEADER
   --------------------------------------------------------- */

.content-wrapper .box-header,
.content-wrapper .box-header.with-border {

    background:
        linear-gradient(
            90deg,
            #100b20,
            #1a1035,
            #100b20
        ) !important;

    color: #ffffff !important;

    border-bottom: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

    min-height: 55px;

    padding: 15px !important;
}


.content-wrapper .box-header .box-title {

    font-family: 'Press Start 2P', cursive !important;

    color: #ffffff !important;

    font-size: 13px !important;

    text-shadow:
        0 0 5px #ffffff,
        0 0 10px #8b5cf6 !important;
}


/* ---------------------------------------------------------
   BOX BODY
   THIS IS THE IMPORTANT FIX FOR THE WHITE AREA
   --------------------------------------------------------- */

.content-wrapper .box-body {

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(91, 33, 182, 0.08),
            transparent 50%
        ),
        #0b0818 !important;

    color: #ffffff !important;

    border: none !important;

    border-radius: 0 !important;

    padding: 15px !important;
}


/* ---------------------------------------------------------
   BOX FOOTER
   --------------------------------------------------------- */

.content-wrapper .box-footer {

    background: #080611 !important;

    color: #ffffff !important;

    border-top: 1px solid #4c1d95 !important;

    border-radius: 0 !important;
}


/* ---------------------------------------------------------
   DATATABLE WRAPPER
   --------------------------------------------------------- */

#tblsubject_wrapper {

    color: #ffffff !important;

    background: transparent !important;
}


/* DataTables top/bottom areas */

#tblsubject_wrapper .dataTables_length,
#tblsubject_wrapper .dataTables_filter,
#tblsubject_wrapper .dataTables_info,
#tblsubject_wrapper .dataTables_paginate {

    color: #cccccc !important;
}


/* ---------------------------------------------------------
   SEARCH BOX
   --------------------------------------------------------- */

#tblsubject_wrapper .dataTables_filter input {

    background: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #6d28d9 !important;

    border-radius: 0 !important;

    outline: none !important;

    padding: 5px 8px !important;
}


#tblsubject_wrapper .dataTables_filter input:focus {

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.6) !important;
}


/* ---------------------------------------------------------
   SHOW ENTRIES SELECT
   --------------------------------------------------------- */

#tblsubject_wrapper .dataTables_length select {

    background: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #6d28d9 !important;

    border-radius: 0 !important;

    outline: none !important;
}


#tblsubject_wrapper .dataTables_length select:focus {

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.5) !important;
}


/* ---------------------------------------------------------
   TABLE
   --------------------------------------------------------- */

#tblsubject {

    background: #0b0818 !important;

    color: #ffffff !important;

    border: 1px solid #4c1d95 !important;
}


/* ---------------------------------------------------------
   TABLE HEADER
   --------------------------------------------------------- */

#tblsubject thead th {

    background:
        linear-gradient(
            180deg,
            #17102d,
            #100b20
        ) !important;

    color: #ffffff !important;

    border-top: 1px solid #7c3aed !important;

    border-bottom: 2px solid #6d28d9 !important;

    border-right: 1px solid #31205c !important;

    font-family: 'Press Start 2P', cursive !important;

    font-size: 9px !important;

    padding: 12px !important;

    text-shadow:
        0 0 5px #8b5cf6 !important;
}


/* ---------------------------------------------------------
   TABLE BODY
   --------------------------------------------------------- */

#tblsubject tbody td {

    background: #0b0818 !important;

    color: #ffffff !important;

    border-bottom: 1px solid #31205c !important;

    border-right: 1px solid #1d1432 !important;

    padding: 10px !important;
}


/* ---------------------------------------------------------
   TABLE HOVER
   --------------------------------------------------------- */

#tblsubject tbody tr:hover td {

    background: #17102d !important;

    color: #ffffff !important;

    box-shadow:
        inset 0 0 12px rgba(139, 92, 246, 0.15) !important;
}


/* ---------------------------------------------------------
   DATATABLE SCROLL AREA
   --------------------------------------------------------- */

#tblsubject_wrapper .dataTables_scroll {

    background: #0b0818 !important;
}


#tblsubject_wrapper .dataTables_scrollHead,
#tblsubject_wrapper .dataTables_scrollHeadInner {

    background: #100b20 !important;
}


#tblsubject_wrapper .dataTables_scrollBody {

    background: #0b0818 !important;

    border: none !important;
}


/* ---------------------------------------------------------
   SCROLLBAR
   --------------------------------------------------------- */

#tblsubject_wrapper .dataTables_scrollBody::-webkit-scrollbar {

    width: 9px;

    height: 9px;
}


#tblsubject_wrapper .dataTables_scrollBody::-webkit-scrollbar-track {

    background: #080611;
}


#tblsubject_wrapper .dataTables_scrollBody::-webkit-scrollbar-thumb {

    background: #5b21b6;

    border: 1px solid #8b5cf6;
}


#tblsubject_wrapper .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {

    background: #7c3aed;
}


/* ---------------------------------------------------------
   PAGINATION
   --------------------------------------------------------- */

#tblsubject_wrapper .dataTables_paginate .paginate_button {

    background: #100b20 !important;

    color: #ffffff !important;

    border: 1px solid #4c1d95 !important;

    border-radius: 0 !important;

    margin-left: 2px !important;
}


#tblsubject_wrapper .dataTables_paginate .paginate_button:hover {

    background: #6d28d9 !important;

    color: #ffffff !important;

    border-color: #a78bfa !important;
}


#tblsubject_wrapper .dataTables_paginate .paginate_button.current {

    background: #7c3aed !important;

    color: #ffffff !important;

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.5);
}


/* ---------------------------------------------------------
   GENERAL BUTTONS
   --------------------------------------------------------- */

.btn {

    border-radius: 0 !important;

    transition:
        all 0.15s ease-in-out !important;

    font-weight: bold !important;
}


/* Purple */

.btn-primary {

    background: #5b21b6 !important;

    border: 1px solid #8b5cf6 !important;

    color: #ffffff !important;
}


.btn-primary:hover {

    background: #7c3aed !important;

    border-color: #c4b5fd !important;

    box-shadow:
        0 0 10px rgba(139, 92, 246, 0.6);
}


/* Green */

.btn-success {

    background: #166534 !important;

    border: 1px solid #22c55e !important;

    color: #ffffff !important;
}


.btn-success:hover {

    background: #15803d !important;

    box-shadow:
        0 0 10px rgba(34, 197, 94, 0.5);
}


/* Yellow / Edit */

.btn-warning {

    background: #92400e !important;

    border: 1px solid #f59e0b !important;

    color: #ffffff !important;
}


.btn-warning:hover {

    background: #b45309 !important;

    box-shadow:
        0 0 10px rgba(245, 158, 11, 0.5);
}


/* Red / Delete */

.btn-danger {

    background: #991b1b !important;

    border: 1px solid #ef4444 !important;

    color: #ffffff !important;
}


.btn-danger:hover {

    background: #dc2626 !important;

    box-shadow:
        0 0 10px rgba(239, 68, 68, 0.5);
}


/* ---------------------------------------------------------
   MODAL
   --------------------------------------------------------- */

.modal-content {

    background: #0b0818 !important;

    color: #ffffff !important;

    border: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

    box-shadow:
        0 0 20px rgba(124, 58, 237, 0.6) !important;
}


.modal-header {

    background:
        linear-gradient(
            90deg,
            #100b20,
            #1b1038,
            #100b20
        ) !important;

    color: #ffffff !important;

    border-bottom: 2px solid #6d28d9 !important;
}


.modal-title {

    font-family: 'Press Start 2P', cursive !important;

    color: #ffffff !important;

    font-size: 13px !important;

    text-shadow:
        0 0 7px #8b5cf6 !important;
}


.modal-body {

    background: #0b0818 !important;

    color: #ffffff !important;
}


.modal-footer {

    background: #080611 !important;

    border-top: 1px solid #4c1d95 !important;
}


/* ---------------------------------------------------------
   FORM INPUTS
   --------------------------------------------------------- */

.form-control {

    background: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #4c1d95 !important;

    border-radius: 0 !important;
}


.form-control:focus {

    background: #0b0818 !important;

    color: #ffffff !important;

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.45) !important;
}


.form-group label {

    color: #d8b4fe !important;
}


select.form-control {

    background: #080611 !important;

    color: #ffffff !important;
}


select.form-control option {

    background: #0b0818 !important;

    color: #ffffff !important;
}


/* ---------------------------------------------------------
   CLOSE BUTTON
   --------------------------------------------------------- */

.modal-header .close {

    color: #ffffff !important;

    opacity: 1 !important;

    text-shadow:
        0 0 5px #ffffff;
}


.modal-header .close:hover {

    color: #ff0000 !important;
}


/* ---------------------------------------------------------
   SWEETALERT
   --------------------------------------------------------- */

.swal2-popup {

    background: #0b0818 !important;

    color: #ffffff !important;

    border: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

    box-shadow:
        0 0 20px rgba(124, 58, 237, 0.6) !important;
}


.swal2-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', cursive !important;

    font-size: 16px !important;
}


.swal2-html-container {

    color: #cccccc !important;
}


/* ---------------------------------------------------------
   SOUL EFFECT
   --------------------------------------------------------- */

.subject-soul-glow {

    animation:
        subjectSoulPulse 1.5s infinite ease-in-out;
}


@keyframes subjectSoulPulse {

    0% {
        filter:
            drop-shadow(0 0 2px #ff0000);
    }

    50% {
        filter:
            drop-shadow(0 0 10px #ff0000);
    }

    100% {
        filter:
            drop-shadow(0 0 2px #ff0000);
    }
}

</style>


<!-- =========================================================
     DATATABLE
     ========================================================= -->

<script type="text/javascript">

$(document).ready(function() {

    var t = $('#tblsubject').DataTable({

        "processing": true,

        "serverSide": true,

        "order": [],

        "ajax": {
            url: "<?php echo WEB_ROOT; ?>module/subject/subject_ajax.php",
            type: "POST"
        },

        "columnDefs": [{
            "searchable": true,
            "orderable": true,
            "targets": 1
        }],

        "scrollY": "400px",

        "scrollCollapse": true,

        "order": [[2, 'asc']]

    });


    t.on('order.dt search.dt', function() {

        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {

            cell.innerHTML = i + 1;

        });

    }).draw();

});

</script>


<!-- =========================================================
     EDIT SUBJECT
     ========================================================= -->

<script type="text/javascript">

$(document).on('click', '.editEntry', function() {

    var SUBJECT_ID = $(this).attr("SUBJECT_ID");

    $.ajax({

        url: "<?php echo WEB_ROOT; ?>module/subject/subject_ajax.php",

        method: "POST",

        data: {
            SUBJECT_ID: SUBJECT_ID
        },

        dataType: "json",

        success: function(data) {

            $('#editEntry').modal('show');

            $('#SUBJECT_ID').val(data.SUBJECT_ID);

            $('#SUBJECT_CODE1').val(data.SUBJECT_CODE);

            $('#SUBJECT_NAME1').val(data.SUBJECT_NAME);

            $('#UNITS1').val(data.UNITS);

            $('#COURSE_ID1').val(data.COURSE_ID);

            $('#YEAR_LEVEL1').val(data.YEAR_LEVEL);

            $('#SEMESTER1').val(data.SEMESTER);

            $('.modal-title').text("Modify Subject");

        }

    });

});

</script>


<!-- =========================================================
     DELETE SUBJECT
     ========================================================= -->

<script type="text/javascript">

$(document).on('click', '.deleteEntry', function() {

    var SUBJECT_ID = $(this).attr("SUBJECT_ID");

    Swal.fire({

        title: 'Delete Subject?',

        text: "This action cannot be undone. Are you sure you want to delete this subject?",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Yes, delete it',

        cancelButtonText: 'Cancel'

    }).then((result) => {

        if (result.value) {

            window.location.href =
                "<?php echo WEB_ROOT; ?>module/subject/controller.php?action=delete&id="
                + SUBJECT_ID;

        }

    });

});

</script>