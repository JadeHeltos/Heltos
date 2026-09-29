<?php

require_once("../../include/initialize.php");

// =========================================================
// STUDENT MODULE
// DELTARUNE THEME
// =========================================================

$view = (isset($_GET['view']) && $_GET['view'] != '')
        ? $_GET['view']
        : '';

$title = "Student Module";
$header = $view;


// =========================================================
// PAGE CONTENT
// =========================================================

switch ($view) {

    case 'list':

        $content = 'list.php';

        break;


    case 'add':

        $content = 'add.php';

        break;


    case 'edit':

        $content = 'edit.php';

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
     DELTARUNE STUDENT MODULE THEME
     ========================================================= -->

<style>

body {

    background:
        #080611 !important;

    color: #d8d5e8;

}


/* =========================================================
   CONTENT WRAPPER
   ========================================================= */

.content-wrapper {

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(64, 45, 150, 0.12),
            transparent 40%
        ),
        linear-gradient(
            180deg,
            #0b0818 0%,
            #080611 100%
        ) !important;

    color: #d8d5e8;

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

    font-size: 8px;

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


.table tbody tr:hover {

    background: #17102e !important;

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


/* =========================================================
   DATATABLES
   ========================================================= */

.dataTables_wrapper {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace;

    font-size: 8px;

}


/* Search */

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


/* Length dropdown */

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


/* Info */

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
   SUCCESS / REGISTER BUTTON
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

    box-shadow:
        0 0 7px rgba(0, 220, 170, .2);

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

.btn-secondary {

    background: #17132a !important;

    border-color: #4b426d !important;

    color: #aaa5c7 !important;

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
   FORM INPUTS
   ========================================================= */

.form-control {

    background:
        #080611 !important;

    color:
        #ffffff !important;

    border:
        1px solid #352a69 !important;

    border-radius:
        0 !important;

}


.form-control:focus {

    background:
        #0b0818 !important;

    color:
        #ffffff !important;

    border-color:
        #7769e8 !important;

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
   INPUT GROUP
   ========================================================= */

.input-group-text {

    background:
        #17102f !important;

    color:
        #766be0 !important;

    border:
        1px solid #352a69 !important;

    border-radius:
        0 !important;

}


/* =========================================================
   CHECKBOX
   ========================================================= */

.icheck-primary > input:first-child:checked + label::before {

    background-color: #5142bb !important;

    border-color: #7565ff !important;

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

    border-radius:
        0 !important;

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

    font-family: 'Press Start 2P', monospace !important;

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
   ALERTS
   ========================================================= */

.alert {

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


.alert-success {

    background: #063c31 !important;

    color: #8dffe7 !important;

    border:
        1px solid #00a982 !important;

}


.alert-danger {

    background: #400b1d !important;

    color: #ff9db3 !important;

    border:
        1px solid #b51b45 !important;

}


/* =========================================================
   BADGES
   ========================================================= */

.badge {

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 7px !important;

    padding: 6px 8px;

}


.badge-primary {

    background: #4938aa !important;

}


.badge-success {

    background: #08755d !important;

}


.badge-danger {

    background: #8b1737 !important;

}


.badge-warning {

    background: #806a08 !important;

    color: #ffffff !important;

}


/* =========================================================
   FILE UPLOAD
   ========================================================= */

.btn-file {

    background: #17102f !important;

    color: #aaa5c7 !important;

    border:
        1px solid #40347d !important;

}


.btn-file:hover {

    background: #211653 !important;

    color: #ffffff !important;

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
   DATA TABLE SCROLL AREA
   ========================================================= */

.dataTables_scrollBody {

    border-bottom:
        1px solid #33276d !important;

}


/* =========================================================
   TABLE SORTING ARROWS
   ========================================================= */

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc {

    color: #ffffff !important;

}


/* =========================================================
   EMPTY TABLE MESSAGE
   ========================================================= */

.dataTables_empty {

    color: #716b91 !important;

    background: #080611 !important;

    font-family: 'Press Start 2P', monospace;

    font-size: 8px;

}


/* =========================================================
   SMALL INFORMATION TEXT
   ========================================================= */

.text-muted {

    color: #716b91 !important;

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
   DELTARUNE SOUL DECORATION
   ========================================================= */

.deltarune-soul {

    color: #ff1744;

    text-shadow:
        0 0 5px #ff1744,
        0 0 12px #ff1744;

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
     PIXEL FONT
     ========================================================= -->

<link
    href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
    rel="stylesheet"
>



<!-- =========================================================
     STUDENT DATATABLE
     ========================================================= -->

<script type="text/javascript">

$(document).ready(function() {

    var t = $('#tblstudent').DataTable({

        "processing": true,

        "serverSide": true,

        "order": [],

        "ajax": {

            url: "<?php echo WEB_ROOT; ?>module/student/ajax.php",

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


    t.on(
        'order.dt search.dt',

        function() {

            t.column(
                0,
                {
                    search: 'applied',
                    order: 'applied'
                }

            ).nodes().each(

                function(cell, i) {

                    cell.innerHTML = i + 1;

                }

            );

        }

    ).draw();

});

</script>



<!-- =========================================================
     DATE PICKER
     ========================================================= -->

<script type="text/javascript">

$(function() {

    $('#reservationdate').datetimepicker({

        format: 'L'

    });

});

</script>



<!-- =========================================================
     IMAGE UPLOAD PREVIEW
     ========================================================= -->

<script type="text/javascript">

$(document).ready(function() {


    $(document).on(
        'change',
        '.btn-file :file',
        function() {

            var input = $(this),

                label = input
                    .val()
                    .replace(/\\/g, '/')
                    .replace(/.*\//, '');


            input.trigger(
                'fileselect',
                [label]
            );

        }
    );


    $('.btn-file :file').on(
        'fileselect',
        function(event, label) {

            var input = $(this)
                    .parents('.input-group')
                    .find(':text'),

                log = label;


            if (input.length) {

                input.val(log);

            } else {

                if (log) {

                    alert(log);

                }

            }

        }
    );


    function readURL(input) {

        if (
            input.files &&
            input.files[0]
        ) {

            var reader =
                new FileReader();


            reader.onload = function(e) {

                $('#img-upload')
                    .attr(
                        'src',
                        e.target.result
                    );

            };


            reader.readAsDataURL(
                input.files[0]
            );

        }

    }


    $("#imgInp").change(function() {

        readURL(this);

    });


});

</script>



<!-- =========================================================
     EDIT STUDENT
     ========================================================= -->

<script type="text/javascript">

$(document).on(
    'click',
    '.editEntry',
    function() {


        var uid =
            $(this).attr("UID");


        $.ajax({

            url:
                "<?php echo WEB_ROOT; ?>module/student/ajax.php",

            method:
                "POST",

            data:
                {
                    UID: uid
                },

            dataType:
                "json",


            success:
                function(data)
                {


                    $('#UID').val(
                        data.UID
                    );


                    $('#IDNO1').val(
                        data.IDNO
                    );


                    $('#FNAME1').val(
                        data.FNAME
                    );


                    $('#MNAME1').val(
                        data.MNAME
                    );


                    $('#LNAME1').val(
                        data.LNAME
                    );


                    /*
                     * Gender
                     */

                    var sex =
                        data.SEX
                        ? $.trim(data.SEX)
                        : '';


                    if (
                        sex !== 'Male' &&
                        sex !== 'Female'
                    ) {

                        sex = '';

                    }


                    $('#SEX1').val(
                        sex
                    );


                    /*
                     * Date of Birth
                     */

                    $('#BDAY1').val(
                        data.BDAY
                        ? data.BDAY
                        : ''
                    );


                    /*
                     * Birth Place
                     */

                    $('#BPLACE1').val(
                        data.BPLACE
                        ? data.BPLACE
                        : ''
                    );


                    /*
                     * Status
                     */

                    var status =
                        data.STATUS
                        ? $.trim(data.STATUS)
                        : '';


                    if (
                        status !== 'Single' &&
                        status !== 'Married' &&
                        status !== 'Walmart Bag'
                    ) {

                        status = '';

                    }


                    $('#STATUS1').val(
                        status
                    );


                    /*
                     * Age
                     */

                    $('#AGE1').val(
                        data.AGE
                        ? data.AGE
                        : ''
                    );


                    /*
                     * Nationality
                     */

                    $('#NATIONALITY1').val(
                        data.NATIONALITY
                        ? data.NATIONALITY
                        : ''
                    );


                    /*
                     * Religion
                     */

                    $('#RELIGION1').val(
                        data.RELIGION
                        ? data.RELIGION
                        : ''
                    );


                    /*
                     * Contact Number
                     */

                    $('#CONTACT_NO1').val(
                        data.CONTACT_NO
                        ? data.CONTACT_NO
                        : ''
                    );


                    $('#editEntry').modal(
                        'show'
                    );

                }

        });

    }

);

</script>



<!-- =========================================================
     STAGE 1: RESERVE STUDENT
     ========================================================= -->

<script type="text/javascript">

/*
|--------------------------------------------------------------------------
| STAGE 1: RESERVE
|--------------------------------------------------------------------------
|
| The green Reg button opens the reservation form.
|
| No section is selected here.
| Section selection happens later on the Enrollment screen.
|
*/

$(document).on(
    'click',
    '.registerEntry',
    function() {


        var uid =
            $(this).attr("UID");


        $.ajax({

            url:
                "<?php echo WEB_ROOT; ?>module/student/ajax.php",

            method:
                "POST",

            data:
                {
                    act: 'register_info',
                    UID: uid
                },

            dataType:
                "json",


            success:
                function(data)
                {


                    $('#R_SID').val(
                        data.S_ID
                    );


                    $('#R_IDNO_TEXT').text(

                        data.IDNO
                        ? data.IDNO
                        : '-'

                    );


                    $('#R_NAME_TEXT').text(

                        data.FULLNAME
                        ? data.FULLNAME
                        : '-'

                    );


                    /*
                     * Reset previous selections.
                     */

                    $('#R_SEMESTER').val('');

                    $('#R_YEARLEVEL').val('');


                    /*
                     * Active school year.
                     */

                    $('#R_SY').val(

                        data.ACTIVE_SY
                        ? data.ACTIVE_SY
                        : ''

                    );


                    /*
                     * Course already stored
                     * on student record.
                     */

                    $('#R_COURSE').val(

                        data.COURSE_ID
                        ? data.COURSE_ID
                        : ''

                    );


                    /*
                     * Curriculum / AY.
                     */

                    $('#R_CURRICULUM').val(

                        data.ACTIVE_AY
                        ? data.ACTIVE_AY
                        : ''

                    );


                    /*
                     * Student category.
                     */

                    $('#R_CATEGORY').val(

                        data.SUGGEST_CATEGORY
                        ? data.SUGGEST_CATEGORY
                        : 'New'

                    );


                    $('#registerEntry').modal(
                        'show'
                    );

                },


            error:
                function()
                {

                    alert(
                        'Could not load the student record.'
                    );

                }

        });

    }

);

</script>