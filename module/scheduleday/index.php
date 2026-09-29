<?php

// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE SCHEDULE DAY MODULE
// =========================================================

require_once("../../include/initialize.php");

// if (!isset($_SESSION['ACCOUNT_ID'])){
//     redirect(web_root."/index.php");
// }


// =========================================================
// PAGE SETTINGS
// =========================================================

$view = (isset($_GET['view']) && $_GET['view'] != '')
    ? $_GET['view']
    : '';

$title = "Schedule Day Module";
$header = $view;


// =========================================================
// PAGE CONTENT
// =========================================================

switch ($view) {

    case 'list':

        $content = 'list.php';

        break;

    case 'view':

        $content = 'view.php';

        break;

    default:

        $content = 'list.php';

        break;
}


// =========================================================
// LOAD TEMPLATE
// =========================================================

require_once("../../theme/template.php");

?>


<!-- =========================================================
     DELTARUNE SCHEDULE DAY THEME
========================================================= -->

<style>

/* =========================================================
   GOOGLE PIXEL FONT
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');


/* =========================================================
   MAIN PAGE
========================================================= */

body {

    background: #080611 !important;

    color: #d8d5e8 !important;

}

.content-wrapper {

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(75, 55, 170, 0.15),
            transparent 45%
        ),
        linear-gradient(
            180deg,
            #0b0818 0%,
            #080611 100%
        ) !important;

    color: #d8d5e8 !important;

}


/* =========================================================
   PAGE TITLE
========================================================= */

.content-header h1 {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 18px !important;

    text-shadow:
        0 0 5px rgba(120, 100, 255, .7),
        0 0 12px rgba(80, 60, 255, .35);

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

    text-transform: uppercase;

    padding: 12px 8px !important;

}

.table tbody td {

    background: #0c0918 !important;

    color: #c4bfd8 !important;

    border-color: #211b40 !important;

    font-size: 12px;

}

.table tbody tr {

    transition:
        background .12s ease,
        transform .12s ease;

}

.table tbody tr:hover td {

    background: #17102e !important;

    color: #ffffff !important;

}


/* =========================================================
   STRIPED TABLE
========================================================= */

.table-striped tbody tr:nth-of-type(odd) {

    background: #0a0714 !important;

}

.table-striped tbody tr:nth-of-type(odd) td {

    background: #0a0714 !important;

}

.table-striped tbody tr:nth-of-type(even) td {

    background: #0d0919 !important;

}


/* =========================================================
   DATATABLE
========================================================= */

.dataTables_wrapper {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace;

    font-size: 8px;

}


/* =========================================================
   SEARCH
========================================================= */

.dataTables_filter label {

    color: #817ba5 !important;

}

.dataTables_filter input {

    background: #080611 !important;

    color: #ffffff !important;

    border:
        1px solid #40347d !important;

    border-radius: 0 !important;

    padding: 7px 10px !important;

    outline: none !important;

}

.dataTables_filter input:focus {

    border-color: #7769e8 !important;

    box-shadow:
        0 0 8px rgba(100, 80, 255, .35);

}


/* =========================================================
   LENGTH
========================================================= */

.dataTables_length label {

    color: #817ba5 !important;

}

.dataTables_length select {

    background: #080611 !important;

    color: #ffffff !important;

    border:
        1px solid #40347d !important;

    border-radius: 0 !important;

}


/* =========================================================
   INFORMATION
========================================================= */

.dataTables_info {

    color: #716b91 !important;

}


/* =========================================================
   PAGINATION
========================================================= */

.dataTables_paginate .paginate_button {

    color: #aaa5c7 !important;

    background: #0c0918 !important;

    border:
        1px solid #30265f !important;

    border-radius: 0 !important;

}

.dataTables_paginate .paginate_button:hover {

    color: #ffffff !important;

    background: #211653 !important;

    border-color: #6c5ce7 !important;

}

.dataTables_paginate .paginate_button.current {

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #302277,
            #17102f
        ) !important;

    border:
        1px solid #7769e8 !important;

    box-shadow:
        0 0 8px rgba(100, 80, 255, .35);

}

.dataTables_paginate .paginate_button.disabled {

    color: #45405d !important;

    background: #080611 !important;

}


/* =========================================================
   ALL BUTTONS
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
   PRIMARY BUTTON
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
   SUCCESS BUTTON
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
   DANGER BUTTON
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
   WARNING BUTTON
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


/* =========================================================
   SECONDARY BUTTON
========================================================= */

.btn-secondary,
.btn-default {

    background: #17132a !important;

    border-color: #4b426d !important;

    color: #aaa5c7 !important;

}

.btn-secondary:hover,
.btn-default:hover {

    background: #211b3b !important;

    color: #ffffff !important;

}


/* =========================================================
   FORM LABELS
========================================================= */

label {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   INPUTS
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
   TEXTAREA
========================================================= */

textarea.form-control {

    resize: vertical;

}


/* =========================================================
   SELECT
========================================================= */

select.form-control {

    background-color: #080611 !important;

    color: #ffffff !important;

}

select.form-control option {

    background: #0b0818 !important;

    color: #ffffff !important;

}


/* =========================================================
   INPUT GROUP
========================================================= */

.input-group-text {

    background: #17102f !important;

    color: #766be0 !important;

    border:
        1px solid #352a69 !important;

    border-radius: 0 !important;

}


/* =========================================================
   MODAL
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

    font-family: 'Press Start 2P', monospace !important;

    font-size: 11px !important;

    color: #ffffff !important;

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
   CLOSE BUTTON
========================================================= */

.close {

    color: #ffffff !important;

    opacity: .7;

}

.close:hover {

    color: #ff315b !important;

    opacity: 1;

}


/* =========================================================
   SWEET ALERT
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
            #7b1231,
            #400b1d
        ) !important;

    border:
        1px solid #ff315b !important;

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}

.swal2-cancel {

    background: #17132a !important;

    border:
        1px solid #4b426d !important;

    border-radius: 0 !important;

    color: #aaa5c7 !important;

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
   DATATABLE SCROLL
========================================================= */

.dataTables_scrollBody {

    border-bottom:
        1px solid #33276d !important;

}


/* =========================================================
   EMPTY TABLE
========================================================= */

.dataTables_empty {

    color: #716b91 !important;

    background: #080611 !important;

    font-family: 'Press Start 2P', monospace;

    font-size: 8px;

}


/* =========================================================
   DELTARUNE SOUL
========================================================= */

.deltarune-soul {

    color: #ff1744;

    text-shadow:
        0 0 5px #ff1744,
        0 0 12px #ff1744;

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

    .table thead th {

        font-size: 7px !important;

    }

    .table tbody td {

        font-size: 10px;

    }

}

</style>


<!-- =========================================================
     SCHEDULE DAY DATATABLE
========================================================= -->

<script type="text/javascript">

$(document).ready(function() {

    var t = $('#tblscheduleday').DataTable({

        "processing": true,

        "serverSide": true,

        "order": [],

        "ajax": {

            url: "<?php echo WEB_ROOT; ?>module/scheduleday/ajax.php",

            type: "POST"

        },

        "columnDefs": [

            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },

            {
                "searchable": false,
                "orderable": false,
                "targets": 3
            }

        ],

        "scrollY": "400px",

        "scrollCollapse": true,

        "order": [[1, 'asc']]

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
     EDIT SCHEDULE DAY
========================================================= -->

<script type="text/javascript">

$(document).on('click', '.editEntry', function() {

    var ID = $(this).attr("ID");


    $.ajax({

        url: "<?php echo WEB_ROOT; ?>module/scheduleday/ajax.php",

        method: "POST",

        data: {

            ID: ID

        },

        dataType: "json",

        success: function(data) {

            $('#editEntry').modal('show');

            $('#ID').val(data.ID);

            $('#NAME1').val(data.NAME);

            $('#DESCRIPTION1').val(data.DESCRIPTION);

            $('.modal-title').text("Modify Schedule Day");

        },

        error: function() {

            Swal.fire({

                title: 'Error',

                text: 'Could not load the schedule day information.',

                icon: 'error'

            });

        }

    });

});

</script>


<!-- =========================================================
     DELETE SCHEDULE DAY
========================================================= -->

<script type="text/javascript">

$(document).on('click', '.deleteEntry', function() {

    var ID = $(this).attr("ID");


    Swal.fire({

        title: 'Delete Schedule Day?',

        text: "This action cannot be undone. Are you sure you want to delete this schedule day?",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Yes, delete it',

        cancelButtonText: 'Cancel'

    }).then((result) => {

        if (result.value) {

            window.location.href =
                "<?php echo WEB_ROOT; ?>module/scheduleday/controller.php?action=delete&id="
                + ID;

        }

    });

});

</script>