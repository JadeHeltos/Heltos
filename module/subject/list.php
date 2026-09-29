<?php
// DELFIN SOLUTIONS

$course = new Course();
$allCourses = $course->listOfCourses();
?>

<style>

/* =========================================================
   DELTARUNE SUBJECT LIST
   FIX WHITE CARD / WHITE BACKGROUND
   ========================================================= */

/* Main section */
section.content {
    background: transparent !important;
    color: #ffffff !important;
}


/* Container */
section.content .container-fluid {
    background: transparent !important;
}


/* =========================================================
   CARD
   ========================================================= */

/* THIS FIXES THE WHITE AREA */
section.content .card,
section.content .card.card-primary,
section.content .card-default,
section.content .card-info {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    border: 2px solid #4c1d95 !important;

    border-radius: 0 !important;

    box-shadow:
        0 0 10px rgba(124, 58, 237, 0.35),
        inset 0 0 20px rgba(76, 29, 149, 0.10) !important;

    color: #ffffff !important;

}


/* =========================================================
   CARD HEADER
   ========================================================= */

section.content .card-header {

    background:
        linear-gradient(
            90deg,
            #17102d,
            #0d091b,
            #17102d
        ) !important;

    background-color: #100b20 !important;

    color: #ffffff !important;

    border-bottom: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

    padding: 14px 16px !important;

}


/* Title */
section.content .card-header .card-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 12px !important;

    text-shadow:
        0 0 5px #ffffff,
        0 0 10px #8b5cf6;

}


/* =========================================================
   CARD BODY
   ========================================================= */

section.content .card-body {

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(91, 33, 182, 0.10),
            transparent 55%
        ),
        #0b0818 !important;

    background-color: #0b0818 !important;

    color: #ffffff !important;

    border: none !important;

    border-radius: 0 !important;

}


/* =========================================================
   DATATABLE AREA
   ========================================================= */

#tblsubject_wrapper {

    background: #0b0818 !important;

    color: #ffffff !important;

}


/* DataTables top controls */
#tblsubject_wrapper .dataTables_length,
#tblsubject_wrapper .dataTables_filter {

    color: #aaa5c7 !important;

}


/* Show entries */
#tblsubject_wrapper .dataTables_length select {

    background: #080611 !important;

    background-color: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #6d28d9 !important;

    border-radius: 0 !important;

}


/* Search */
#tblsubject_wrapper .dataTables_filter input {

    background: #080611 !important;

    background-color: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #6d28d9 !important;

    border-radius: 0 !important;

    outline: none !important;

}


#tblsubject_wrapper .dataTables_filter input:focus {

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.5) !important;

}


/* =========================================================
   TABLE
   ========================================================= */

#tblsubject {

    width: 100% !important;

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #ffffff !important;

    border: 1px solid #4c1d95 !important;

}


/* Table header */
#tblsubject thead th {

    background:
        linear-gradient(
            180deg,
            #211653,
            #100b20
        ) !important;

    background-color: #17102d !important;

    color: #ffffff !important;

    border: 1px solid #4c1d95 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

    padding: 11px 8px !important;

    text-shadow:
        0 0 5px #8b5cf6;

}


/* Table rows */
#tblsubject tbody tr {

    background: #0b0818 !important;

    color: #ffffff !important;

}


/* Table cells */
#tblsubject tbody td {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #eeeeee !important;

    border: 1px solid #281c4b !important;

    padding: 9px 8px !important;

}


/* Alternating rows */
#tblsubject tbody tr:nth-child(odd) td {

    background: #0a0714 !important;

}

#tblsubject tbody tr:nth-child(even) td {

    background: #0d0919 !important;

}


/* Hover */
#tblsubject tbody tr:hover td {

    background: #17102d !important;

    color: #ffffff !important;

    box-shadow:
        inset 0 0 10px rgba(124, 58, 237, 0.12);

}


/* =========================================================
   DATATABLE SCROLL AREA
   ========================================================= */

#tblsubject_wrapper .dataTables_scroll {

    background: #0b0818 !important;

}


#tblsubject_wrapper .dataTables_scrollHead {

    background: #100b20 !important;

}


#tblsubject_wrapper .dataTables_scrollHeadInner {

    background: #100b20 !important;

}


#tblsubject_wrapper .dataTables_scrollBody {

    background: #0b0818 !important;

    border: none !important;

}


/* =========================================================
   DATATABLE INFORMATION
   ========================================================= */

#tblsubject_wrapper .dataTables_info {

    color: #77709d !important;

}


/* =========================================================
   PAGINATION
   ========================================================= */

#tblsubject_wrapper .dataTables_paginate .paginate_button {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #aaa5c7 !important;

    border: 1px solid #4c1d95 !important;

    border-radius: 0 !important;

}


#tblsubject_wrapper .dataTables_paginate .paginate_button:hover {

    background: #211653 !important;

    background-color: #211653 !important;

    color: #ffffff !important;

    border-color: #8b5cf6 !important;

}


#tblsubject_wrapper .dataTables_paginate .paginate_button.current {

    background:
        linear-gradient(
            135deg,
            #6d28d9,
            #3b1b77
        ) !important;

    background-color: #6d28d9 !important;

    color: #ffffff !important;

    border-color: #a78bfa !important;

    box-shadow:
        0 0 8px rgba(139, 92, 246, 0.5);

}


#tblsubject_wrapper .dataTables_paginate .paginate_button.disabled {

    background: #080611 !important;

    color: #45405d !important;

}


/* =========================================================
   BUTTONS
   ========================================================= */

.btn {

    border-radius: 0 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

    transition: all .15s ease !important;

}


/* Add New */
.btn-primary {

    background:
        linear-gradient(
            135deg,
            #5b21b6,
            #32146b
        ) !important;

    background-color: #5b21b6 !important;

    border: 1px solid #8b5cf6 !important;

    color: #ffffff !important;

}


.btn-primary:hover {

    background: #7c3aed !important;

    background-color: #7c3aed !important;

    border-color: #c4b5fd !important;

    box-shadow:
        0 0 10px rgba(139, 92, 246, .6);

}


/* Print */
.btn-success {

    background:
        linear-gradient(
            135deg,
            #075f4b,
            #063c31
        ) !important;

    background-color: #075f4b !important;

    border: 1px solid #00d9a6 !important;

    color: #ffffff !important;

}


.btn-success:hover {

    background: #087d63 !important;

    background-color: #087d63 !important;

    box-shadow:
        0 0 10px rgba(0, 220, 170, .4);

}


/* Edit */
.btn-warning {

    background: #725b05 !important;

    background-color: #725b05 !important;

    border: 1px solid #e8c933 !important;

    color: #ffffff !important;

}


/* Delete */
.btn-danger {

    background: #7b1231 !important;

    background-color: #7b1231 !important;

    border: 1px solid #ff315b !important;

    color: #ffffff !important;

}


/* =========================================================
   MODALS
   ========================================================= */

.modal-content {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #ffffff !important;

    border: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

    box-shadow:
        0 0 25px rgba(124, 58, 237, .5) !important;

}


.modal-header {

    background:
        linear-gradient(
            90deg,
            #17102d,
            #0b0818
        ) !important;

    background-color: #100b20 !important;

    color: #ffffff !important;

    border-bottom: 2px solid #6d28d9 !important;

    border-radius: 0 !important;

}


.modal-title {

    color: #ffffff !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 11px !important;

    text-shadow:
        0 0 6px #8b5cf6;

}


.modal-body {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #ffffff !important;

}


.modal-footer {

    background: #080611 !important;

    background-color: #080611 !important;

    border-top: 1px solid #4c1d95 !important;

}


/* =========================================================
   FORM FIELDS
   ========================================================= */

.form-group label {

    color: #aaa5c7 !important;

    font-family: 'Press Start 2P', monospace !important;

    font-size: 8px !important;

}


.form-control {

    background: #080611 !important;

    background-color: #080611 !important;

    color: #ffffff !important;

    border: 1px solid #40347d !important;

    border-radius: 0 !important;

}


.form-control:focus {

    background: #0b0818 !important;

    background-color: #0b0818 !important;

    color: #ffffff !important;

    border-color: #7769e8 !important;

    box-shadow:
        0 0 8px rgba(100, 80, 255, .35) !important;

}


.form-control::placeholder {

    color: #55506f !important;

}


select.form-control option {

    background: #0b0818 !important;

    color: #ffffff !important;

}


/* =========================================================
   MODAL CLOSE BUTTON
   ========================================================= */

.modal-header .close {

    color: #ffffff !important;

    opacity: .8 !important;

}


.modal-header .close:hover {

    color: #ff315b !important;

    opacity: 1 !important;

}


/* =========================================================
   SCROLLBAR
   ========================================================= */

#tblsubject_wrapper ::-webkit-scrollbar {

    width: 8px;

    height: 8px;

}


#tblsubject_wrapper ::-webkit-scrollbar-track {

    background: #080611;

}


#tblsubject_wrapper ::-webkit-scrollbar-thumb {

    background: #4c1d95;

    border: 1px solid #6d28d9;

}


#tblsubject_wrapper ::-webkit-scrollbar-thumb:hover {

    background: #6d28d9;

}

</style>


<!-- =========================================================
     SUBJECT CONTENT
     ========================================================= -->

<section class="content">

    <div class="container-fluid">

        <?php check_message(); ?>

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            List of Subjects
                        </h3>

                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">

                        <table
                            id="tblsubject"
                            class="table table-bordered table-striped"
                        >

                            <thead>

                                <tr>

                                    <th width="5%">#</th>

                                    <th>Subject Code</th>

                                    <th>Subject Name</th>

                                    <th>Units</th>

                                    <th>Course</th>

                                    <th>Year Level</th>

                                    <th>Semester</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>

                            <tfoot>

                            </tfoot>

                        </table>


                        <div class="btn-group">

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#AddNewEntry"
                            >
                                Add New
                            </button>


                            <a
                                href="print.php"
                                target="_blank"
                                class="btn btn-success"
                            >
                                <i class="fas fa-print"></i>
                                Print All Subjects
                            </a>

                        </div>

                    </div>

                    <!-- /.card-body -->

                </div>

                <!-- /.card -->

            </div>

            <!-- /.col -->

        </div>

        <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

</section>


<!-- =========================================================
     ADD SUBJECT MODAL
     ========================================================= -->

<div class="modal fade" id="AddNewEntry">

    <div class="modal-dialog">

        <form
            action="controller.php?action=add"
            method="POST"
        >

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Add New Subject
                    </h4>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >

                        <span aria-hidden="true">
                            &times;
                        </span>

                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">


                        <!-- SUBJECT CODE -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SUBJECT_CODE"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Subject Code
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="SUBJECT_CODE"
                                    id="SUBJECT_CODE"
                                    placeholder="e.g. IT101"
                                    required
                                >

                            </div>

                        </div>


                        <!-- SUBJECT NAME -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SUBJECT_NAME"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Subject Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="SUBJECT_NAME"
                                    id="SUBJECT_NAME"
                                    placeholder="e.g. Introduction to Computing"
                                    required
                                >

                            </div>

                        </div>


                        <!-- UNITS -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="UNITS"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Units
                                </label>

                                <input
                                    type="number"
                                    step="1"
                                    min="1"
                                    class="form-control form-control-sm"
                                    name="UNITS"
                                    id="UNITS"
                                    placeholder="3"
                                    value="3"
                                    required
                                >

                            </div>

                        </div>


                        <!-- COURSE -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="COURSE_ID"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Course
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="COURSE_ID"
                                    id="COURSE_ID"
                                    required
                                >

                                    <option value="">
                                        -- Select Course --
                                    </option>

                                    <?php foreach($allCourses as $c): ?>

                                        <option
                                            value="<?php echo $c->COURSE_ID; ?>"
                                        >
                                            <?php
                                            echo htmlspecialchars(
                                                $c->COURSE_CODE .
                                                " - " .
                                                $c->COURSE_NAME
                                            );
                                            ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>


                        <!-- YEAR LEVEL -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="YEAR_LEVEL"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Year Level
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="YEAR_LEVEL"
                                    id="YEAR_LEVEL"
                                    required
                                >

                                    <option value="1st Year">
                                        1st Year
                                    </option>

                                    <option value="2nd Year">
                                        2nd Year
                                    </option>

                                    <option value="3rd Year">
                                        3rd Year
                                    </option>

                                    <option value="4th Year">
                                        4th Year
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- SEMESTER -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SEMESTER"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Semester
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="SEMESTER"
                                    id="SEMESTER"
                                    required
                                >

                                    <option value="1st Semester">
                                        1st Semester
                                    </option>

                                    <option value="2nd Semester">
                                        2nd Semester
                                    </option>

                                    <option value="Summer">
                                        Summer
                                    </option>

                                </select>

                            </div>

                        </div>


                    </div>

                </div>


                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >
                        Close
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="save"
                    >
                        Save changes
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     EDIT SUBJECT MODAL
     ========================================================= -->

<div class="modal fade" id="editEntry">

    <div class="modal-dialog">

        <form
            action="controller.php?action=edit"
            method="POST"
        >

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Modify Subject
                    </h4>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >

                        <span aria-hidden="true">
                            &times;
                        </span>

                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">

                        <input
                            type="hidden"
                            name="SUBJECT_ID"
                            id="SUBJECT_ID"
                        >


                        <!-- SUBJECT CODE -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SUBJECT_CODE1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Subject Code
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="SUBJECT_CODE1"
                                    id="SUBJECT_CODE1"
                                    placeholder="Subject Code"
                                >

                            </div>

                        </div>


                        <!-- SUBJECT NAME -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SUBJECT_NAME1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Subject Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="SUBJECT_NAME1"
                                    id="SUBJECT_NAME1"
                                    placeholder="Subject Name"
                                >

                            </div>

                        </div>


                        <!-- UNITS -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="UNITS1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Units
                                </label>

                                <input
                                    type="number"
                                    step="1"
                                    min="1"
                                    class="form-control form-control-sm"
                                    name="UNITS1"
                                    id="UNITS1"
                                    placeholder="Units"
                                >

                            </div>

                        </div>


                        <!-- COURSE -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="COURSE_ID1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Course
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="COURSE_ID1"
                                    id="COURSE_ID1"
                                >

                                    <option value="">
                                        -- Select Course --
                                    </option>

                                    <?php foreach($allCourses as $c): ?>

                                        <option
                                            value="<?php echo $c->COURSE_ID; ?>"
                                        >
                                            <?php
                                            echo htmlspecialchars(
                                                $c->COURSE_CODE .
                                                " - " .
                                                $c->COURSE_NAME
                                            );
                                            ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>


                        <!-- YEAR LEVEL -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="YEAR_LEVEL1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Year Level
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="YEAR_LEVEL1"
                                    id="YEAR_LEVEL1"
                                >

                                    <option value="1st Year">
                                        1st Year
                                    </option>

                                    <option value="2nd Year">
                                        2nd Year
                                    </option>

                                    <option value="3rd Year">
                                        3rd Year
                                    </option>

                                    <option value="4th Year">
                                        4th Year
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- SEMESTER -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="SEMESTER1"
                                    class="col-form-label col-form-label-sm"
                                >
                                    Semester
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="SEMESTER1"
                                    id="SEMESTER1"
                                >

                                    <option value="1st Semester">
                                        1st Semester
                                    </option>

                                    <option value="2nd Semester">
                                        2nd Semester
                                    </option>

                                    <option value="Summer">
                                        Summer
                                    </option>

                                </select>

                            </div>

                        </div>


                    </div>

                </div>


                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >
                        Close
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="edit"
                    >
                        Save changes
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>