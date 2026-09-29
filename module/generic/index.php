<?php
// =========================================================
// TAJALE SOLUTIONS
// DELTARUNE GENERIC MODULE
// =========================================================

require_once("../../include/initialize.php");
require_once("config.php");


// =========================================================
// TABLE CONFIGURATION
// =========================================================

$table = isset($_GET['t']) ? $_GET['t'] : '';

$cfg = generic_table_config($table);


// =========================================================
// INVALID / UNKNOWN TABLE
// =========================================================

if (!$cfg) {

    redirect(
        WEB_ROOT . "module/error/index.php?view=list"
    );

    exit;
}


// =========================================================
// PAGE SETTINGS
// =========================================================

$title = $cfg['title'];

$header = isset($_GET['view'])
        ? $_GET['view']
        : '';

$content = 'list.php';


// =========================================================
// LOAD TEMPLATE
// =========================================================

require_once("../../theme/template.php");

?>



<!-- =========================================================
     DELTARUNE GENERIC MODULE THEME
     ========================================================= -->

<style>

/* =========================================================
   PIXEL FONT
   ========================================================= */

@import url(
    'https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap'
);


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
   PAGE TITLE
   ========================================================= */

.content-header h1 {

    color: #ffffff !important;

    font-family:
        'Press Start 2P',
        monospace !important;

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

    font-family:
        'Press Start 2P',
        monospace !important;

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
.card-header h5,
.card-header .card-title {

    color: #ffffff !important;

    font-family:
        'Press Start 2P',
        monospace !important;

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

    font-family:
        'Press Start 2P',
        monospace !important;

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
   TABLE STRIPES
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
   DATATABLES
   ========================================================= */

.dataTables_wrapper {

    color: #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 8px !important;

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
   LENGTH SELECT
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
   DATATABLE INFO
   ========================================================= */

.dataTables_info {

    color: #716b91 !important;

}


/* =========================================================
   DATATABLE PROCESSING
   ========================================================= */

.dataTables_processing {

    background:

        #0b0818 !important;

    color: #ffffff !important;

    border:

        1px solid #51429b !important;

    font-family:

        'Press Start 2P',
        monospace !important;

    font-size: 8px !important;

    box-shadow:

        0 0 15px rgba(65, 45, 180, .35);

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

    font-family:
        'Press Start 2P',
        monospace !important;

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

    background:

        linear-gradient(
            135deg,
            #8d7108,
            #514000
        ) !important;

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


.btn-secondary:hover {

    background: #211b3a !important;

    color: #ffffff !important;

}


/* =========================================================
   FORM LABELS
   ========================================================= */

label {

    color: #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   FORM INPUTS
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
   TEXTAREA
   ========================================================= */

textarea.form-control {

    resize: vertical;

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


/* =========================================================
   MODAL HEADER
   ========================================================= */

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

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 11px !important;

    color: #ffffff !important;

    text-shadow:

        0 0 6px #7165ff;

}


/* =========================================================
   MODAL BODY
   ========================================================= */

.modal-body {

    background: #0a0714 !important;

    color: #c7c2dc !important;

}


/* =========================================================
   MODAL FOOTER
   ========================================================= */

.modal-footer {

    background: #080611 !important;

    border-top:

        1px solid #2d2456 !important;

}


/* =========================================================
   MODAL CLOSE
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

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 14px !important;

    text-shadow:

        0 0 6px #7165ff;

}


.swal2-html-container {

    color: #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

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

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 8px !important;

}


.swal2-cancel {

    background: #17132a !important;

    border:

        1px solid #4b426d !important;

    border-radius: 0 !important;

    color: #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

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

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size: 8px !important;

}


/* =========================================================
   GENERIC PAGE TEXT
   ========================================================= */

.content-wrapper p {

    color: #aaa5c7 !important;

}


.content-wrapper h1,
.content-wrapper h2,
.content-wrapper h3,
.content-wrapper h4,
.content-wrapper h5 {

    font-family:
        'Press Start 2P',
        monospace;

}


/* =========================================================
   DELTARUNE SOUL
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


    .table thead th {

        font-size: 7px !important;

    }


    .table tbody td {

        font-size: 10px !important;

    }


    .dataTables_wrapper {

        font-size: 7px !important;

    }


    .btn {

        font-size: 7px !important;

    }

}

</style>



<!-- =========================================================
     GENERIC DATATABLE
     ========================================================= -->

<script type="text/javascript">

$(document).ready(function() {

    var t = $('#tblgeneric').DataTable({

        "processing": true,

        "serverSide": true,

        "order": [],

        "ajax": {

            url:
                "<?php echo WEB_ROOT; ?>module/generic/generic_ajax.php?t=<?php echo urlencode($table); ?>",

            type:
                "POST"

        },

        "scrollX": true,

        "scrollY": "400px",

        "scrollCollapse": true

    });


    /* =====================================================
       AUTOMATIC NUMBERING
       ===================================================== */

    t.on(
        'order.dt search.dt',
        function() {

            t.column(
                0,
                {
                    search: 'applied',
                    order: 'applied'
                }
            )
            .nodes()
            .each(
                function(cell, i) {

                    cell.innerHTML = i + 1;

                }
            );

        }

    ).draw();

});

</script>



<!-- =========================================================
     EDIT RECORD
     ========================================================= -->

<script type="text/javascript">

$(document).on(
    'click',
    '.editEntry',
    function() {

        var recId =
            $(this).attr('data-id');


        $.ajax({

            url:
                "<?php echo WEB_ROOT; ?>module/generic/generic_ajax.php?t=<?php echo urlencode($table); ?>",

            method:
                "POST",

            data:
                {
                    record_id: recId
                },

            dataType:
                "json",


            success:
                function(data) {

                    $.each(
                        data,
                        function(key, value) {

                            $('#edit_' + key).val(value);

                        }
                    );


                    $('#record_pk').val(recId);


                    $('#editEntry').modal('show');

                }

        });

    }

);

</script>



<!-- =========================================================
     DELETE RECORD
     ========================================================= -->

<script type="text/javascript">

$(document).on(
    'click',
    '.deleteEntry',
    function() {

        var recId =
            $(this).attr('data-id');


        Swal.fire({

            title:
                'Delete this record?',


            text:
                "This action cannot be undone. Are you sure you want to delete it?",


            icon:
                'warning',


            showCancelButton:
                true,


            confirmButtonText:
                'Yes, delete it',


            cancelButtonText:
                'Cancel'

        })


        .then(

            (result) => {

                if (result.value) {

                    window.location.href =

                        "<?php echo WEB_ROOT; ?>module/generic/controller.php?action=delete&t=<?php echo urlencode($table); ?>&id="

                        + recId;

                }

            }

        );

    }

);

</script>