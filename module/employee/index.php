<?php
// =========================================================
// TAJALE SOLUTIONS
// EMPLOYEE MODULE - DELTARUNE THEME
// =========================================================

require_once("../../include/initialize.php");

$view = isset($_GET['view']) ? $_GET['view'] : '';

if ($view === 'view') {

    $title   = "Employee Profile";
    $content = 'view.php';

} else {

    $title   = "Employee";
    $content = 'list.php';

}

require_once("../../theme/template.php");
?>


<style>

/* =========================================================
   DELTARUNE EMPLOYEE MODULE
   ========================================================= */

.content,
.content-wrapper {

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(76, 29, 149, .16),
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

    box-shadow:

        0 0 15px
        rgba(61, 43, 150, .18),

        inset 0 0 15px
        rgba(30, 20, 80, .15);

}


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

}


.card-title {

    color:
        #ffffff !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        10px !important;

    text-shadow:
        0 0 6px #7565ff;

}


/* =========================================================
   TABLE
   ========================================================= */

.table {

    color:
        #d8d5e8 !important;

    background:
        #080611 !important;

    border-color:
        #33276b !important;

}


.table thead th {

    background:
        #120c25 !important;

    color:
        #a78bfa !important;

    border-color:
        #33276b !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        8px !important;

    text-transform:
        uppercase;

}


.table tbody td {

    background:
        #0b0818 !important;

    color:
        #aaa5c7 !important;

    border-color:
        #211b40 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

}


.table tbody tr:hover td {

    background:
        #17102f !important;

    color:
        #ffffff !important;

    border-color:
        #4c3a91 !important;

}


/* =========================================================
   DATATABLES
   ========================================================= */

.dataTables_wrapper {

    color:
        #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

}


.dataTables_wrapper label {

    color:
        #aaa5c7 !important;

}


.dataTables_filter input,
.dataTables_length select {

    background:
        #080611 !important;

    color:
        #ffffff !important;

    border:
        1px solid #33276b !important;

    border-radius:
        0 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

}


.dataTables_filter input:focus {

    border-color:
        #8b5cf6 !important;

    box-shadow:
        0 0 7px
        rgba(139, 92, 246, .35) !important;

    outline:
        none !important;

}


.dataTables_info {

    color:
        #716b91 !important;

}


.dataTables_paginate .paginate_button {

    background:
        #120c25 !important;

    color:
        #aaa5c7 !important;

    border:
        1px solid #33276b !important;

    border-radius:
        0 !important;

}


.dataTables_paginate .paginate_button:hover {

    background:
        #211653 !important;

    color:
        #ffffff !important;

    border-color:
        #8b5cf6 !important;

}


.dataTables_paginate .paginate_button.current {

    background:
        #382a91 !important;

    color:
        #ffffff !important;

    border-color:
        #8b5cf6 !important;

}


/* =========================================================
   BUTTONS
   ========================================================= */

.btn {

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


.btn:hover {

    transform:
        translateY(-1px);

}


/* PRIMARY */

.btn-primary {

    background:
        linear-gradient(
            135deg,
            #382a91,
            #211653
        ) !important;

    border-color:
        #7565ff !important;

    color:
        #ffffff !important;

}


.btn-primary:hover {

    background:
        #4c3aa8 !important;

    box-shadow:
        0 0 9px
        rgba(117, 101, 255, .4);

}


/* SUCCESS */

.btn-success {

    background:
        linear-gradient(
            135deg,
            #075f4b,
            #063c31
        ) !important;

    border-color:
        #00d9a6 !important;

    color:
        #ffffff !important;

}


/* WARNING */

.btn-warning {

    background:
        linear-gradient(
            135deg,
            #725b05,
            #443600
        ) !important;

    border-color:
        #e8c933 !important;

    color:
        #ffffff !important;

}


/* DANGER */

.btn-danger {

    background:
        linear-gradient(
            135deg,
            #7b1231,
            #400b1d
        ) !important;

    border-color:
        #ff315b !important;

    color:
        #ffffff !important;

}


/* DEFAULT */

.btn-default {

    background:
        #120c25 !important;

    color:
        #aaa5c7 !important;

    border:
        1px solid #33276b !important;

}


.btn-default:hover {

    background:
        #211653 !important;

    color:
        #ffffff !important;

    border-color:
        #7565ff !important;

}


/* =========================================================
   STATUS FILTER BUTTONS
   ========================================================= */

#statusFilters {

    display:
        flex;

    flex-wrap:
        wrap;

    gap:
        5px;

    margin-bottom:
        12px;

}


#statusFilters button {

    border-radius:
        0 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

    background:
        #120c25 !important;

    color:
        #aaa5c7 !important;

    border:
        1px solid #33276b !important;

    padding:
        8px 10px;

}


#statusFilters button:hover {

    background:
        #211653 !important;

    color:
        #ffffff !important;

    border-color:
        #7565ff !important;

}


#statusFilters button.active {

    background:
        linear-gradient(
            135deg,
            #382a91,
            #211653
        ) !important;

    color:
        #ffffff !important;

    border-color:
        #8b5cf6 !important;

    box-shadow:
        0 0 8px
        rgba(117, 101, 255, .3);

}


/* =========================================================
   FORM INPUTS
   ========================================================= */

.form-control,
.custom-select,
select,
input[type="text"],
input[type="email"],
input[type="number"],
input[type="date"],
input[type="password"] {

    background:
        #080611 !important;

    color:
        #ffffff !important;

    border:
        1px solid #33276b !important;

    border-radius:
        0 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        8px !important;

}


.form-control:focus,
.custom-select:focus,
select:focus {

    background:
        #0b0818 !important;

    color:
        #ffffff !important;

    border-color:
        #8b5cf6 !important;

    box-shadow:
        0 0 7px
        rgba(139, 92, 246, .3) !important;

}


.form-control::placeholder {

    color:
        #57516f !important;

}


/* =========================================================
   LABELS
   ========================================================= */

label {

    color:
        #aaa5c7 !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        7px !important;

}


/* =========================================================
   MODAL
   ========================================================= */

.modal-content {

    background:
        linear-gradient(
            145deg,
            #100c21,
            #080611
        ) !important;

    border:
        1px solid #4c3a91 !important;

    border-radius:
        0 !important;

    box-shadow:

        0 0 25px
        rgba(76, 29, 149, .45);

}


.modal-header {

    background:
        #120c25 !important;

    border-bottom:
        1px solid #33276b !important;

}


.modal-title {

    color:
        #ffffff !important;

    font-family:
        'Press Start 2P',
        monospace !important;

    font-size:
        10px !important;

}


.modal-body {

    color:
        #aaa5c7 !important;

    background:
        #0b0818 !important;

}


.modal-footer {

    background:
        #080611 !important;

    border-top:
        1px solid #33276b !important;

}


.modal-header .close {

    color:
        #ffffff !important;

    opacity:
        .8;

}


.modal-header .close:hover {

    opacity:
        1;

    color:
        #ff315b !important;

}


/* =========================================================
   EMPLOYEE SOUL
   ========================================================= */

.employee-soul {

    color:
        #ff1744;

    text-shadow:

        0 0 5px #ff1744,

        0 0 12px #ff1744;

}


/* =========================================================
   LINKS
   ========================================================= */

a {

    color:
        #8b7cff;

}


a:hover {

    color:
        #ffffff;

}


/* =========================================================
   SCROLLBAR
   ========================================================= */

::-webkit-scrollbar {

    width:
        7px;

    height:
        7px;

}


::-webkit-scrollbar-track {

    background:
        #05030c;

}


::-webkit-scrollbar-thumb {

    background:
        #33276d;

    border:
        1px solid #4c1d95;

}


::-webkit-scrollbar-thumb:hover {

    background:
        #6d28d9;

}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 768px) {

    .dataTables_wrapper {

        font-size:
            6px !important;

    }

    .table thead th {

        font-size:
            7px !important;

    }

    .table tbody td {

        font-size:
            6px !important;

    }

}

</style>


<script type="text/javascript">

var employeeTable;

var currentStatusFilter = '';


$(document).ready(function() {


    /* =====================================================
       EMPLOYEE DATATABLE
       ===================================================== */

    employeeTable = $('#tblemployeelist').DataTable({

        "processing": true,

        "serverSide": true,

        "scrollX": true,

        "order": [],

        "ajax": {

            url:
                "<?php echo WEB_ROOT; ?>module/employee/ajax.php",

            type:
                "POST",

            data:
                function(d) {

                    d.status_filter =
                        currentStatusFilter;

                }

        },

        "columnDefs": [

            {
                "orderable": false,
                "targets": [11]
            }

        ]

    });


    /* =====================================================
       STATUS FILTER
       ===================================================== */

    $('#statusFilters button').on(
        'click',
        function() {

            $('#statusFilters button')
                .removeClass('active');

            $(this)
                .addClass('active');

            currentStatusFilter =
                $(this).data('filter');

            employeeTable
                .ajax
                .reload();

        }
    );


    /* =====================================================
       PRINT EMPLOYEES
       ===================================================== */

    $('#printEmployees').on(
        'click',
        function() {

            var url =
                "<?php echo WEB_ROOT; ?>module/employee/print.php";

            if (
                currentStatusFilter === '1' ||
                currentStatusFilter === '0'
            ) {

                url +=
                    "?status=" +
                    currentStatusFilter;

            }

            window.open(
                url,
                "_blank"
            );

        }
    );


    /* =====================================================
       ADD EMPLOYEE
       ===================================================== */

    $('#btnAddEmployee').on(
        'click',
        function() {

            $('#employeeModalTitle')
                .text('Add Employee');

            $('#EMP_ID').val('0');

            $('#E_FNAME').val('');

            $('#E_MNAME').val('');

            $('#E_LNAME').val('');

            $('#E_SUFFIX').val('');

            $('#E_EMAIL').val('');

            $('#E_PHONE').val('');

            $('#E_DOB').val('');

            $('#E_HIRE').val('');

            $('#E_JOBTITLE').val('');

            $('#E_DEPARTMENT').val('');

            $('#E_SALARY').val('');

            $('#E_MANAGER').val('');

            $('#E_ISACTIVE').val('1');

            $('#employeeModal')
                .modal('show');

        }
    );


    /* =====================================================
       EDIT EMPLOYEE
       ===================================================== */

    $(document).on(
        'click',
        '.editEmployee',
        function() {

            var id =
                $(this).attr('EID');

            $.ajax({

                url:
                    "<?php echo WEB_ROOT; ?>module/employee/ajax.php",

                method:
                    "POST",

                data: {

                    act:
                        'row',

                    EmployeeID:
                        id

                },

                dataType:
                    "json",

                success:
                    function(d) {

                        $('#employeeModalTitle')
                            .text('Edit Employee');

                        $('#EMP_ID')
                            .val(
                                d.EmployeeID || '0'
                            );

                        $('#E_FNAME')
                            .val(
                                d.FirstName || ''
                            );

                        $('#E_MNAME')
                            .val(
                                d.MiddleName || ''
                            );

                        $('#E_LNAME')
                            .val(
                                d.LastName || ''
                            );

                        $('#E_SUFFIX')
                            .val(
                                d.Suffix || ''
                            );

                        $('#E_EMAIL')
                            .val(
                                d.Email || ''
                            );

                        $('#E_PHONE')
                            .val(
                                d.Phone || ''
                            );

                        $('#E_DOB')
                            .val(
                                d.DateOfBirth || ''
                            );

                        $('#E_HIRE')
                            .val(
                                d.HireDate || ''
                            );

                        $('#E_JOBTITLE')
                            .val(
                                d.JobTitle || ''
                            );

                        $('#E_DEPARTMENT')
                            .val(
                                d.Department || ''
                            );

                        $('#E_SALARY')
                            .val(
                                d.Salary || ''
                            );


                        /*
                         * An employee should not
                         * be offered as their own manager.
                         */

                        $('#E_MANAGER option')
                            .prop(
                                'disabled',
                                false
                            );

                        $('#E_MANAGER option[value="' +
                            d.EmployeeID +
                            '"]')
                            .prop(
                                'disabled',
                                true
                            );

                        $('#E_MANAGER')
                            .val(
                                d.ManagerID || ''
                            );

                        $('#E_ISACTIVE')
                            .val(
                                String(
                                    d.IsActive
                                )
                            );

                        $('#employeeModal')
                            .modal('show');

                    },

                error:
                    function() {

                        alert(
                            'Could not load that employee record.'
                        );

                    }

            });

        }

    );


});

</script>