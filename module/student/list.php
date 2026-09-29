<?php
/* ============================================================
   STUDENT LIST
   ============================================================ */

global $mydb;


/* ============================================================
   RESERVE SLOT DROPDOWN DATA
   ============================================================ */

$regSchoolYears = array();

$mydb->setQuery("
    SELECT SY_ID, SCHOOL_YEAR, STATUS
    FROM `tblschoolyear`
    ORDER BY SCHOOL_YEAR DESC
");

foreach ($mydb->loadResultList() as $r) {
    $regSchoolYears[] = $r;
}


$regCourses = array();

$mydb->setQuery("
    SELECT COURSE_ID, COURSE_CODE, COURSE_NAME
    FROM `tblcourses`
    WHERE STATUS = 'Active'
    ORDER BY COURSE_CODE ASC
");

foreach ($mydb->loadResultList() as $r) {
    $regCourses[] = $r;
}


$regYearLevels = array(
    '1st Year',
    '2nd Year',
    '3rd Year',
    '4th Year'
);


$regSemesters = array(
    '1st Semester',
    '2nd Semester',
    'Summer'
);


$regCategories = array(
    'New',
    'Old',
    'Transferee',
    'Returnee',
    'Shiftee'
);

?>

<section class="content">

    <div class="container-fluid">

        <?php check_message(); ?>

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            List of Students
                        </h3>

                    </div>


                    <div class="card-body">

                        <table
                            id="tblstudent"
                            class="table table-bordered table-striped"
                        >

                           <thead>
    <tr>
        <th>#</th>
        <th>LNAME</th>
        <th>FNAME</th>
        <th>MNAME</th>
        <th>SEX</th>
        <th>BDAY</th>
        <th>BPLACE</th>
        <th>STATUS</th>
        <th>AGE</th>
        <th>NATIONALITY</th>
        <th>RELIGION</th>
        <th>CONTACT NO</th>
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

                                <i class="fas fa-user-plus"></i>
                                Add New

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ============================================================
     ADD NEW STUDENT MODAL
     ============================================================ -->

<div
    class="modal fade"
    id="AddNewEntry"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="controller.php?action=add"
            method="POST"
            enctype="multipart/form-data"
        >

            <div class="modal-content">


                <!-- HEADER -->

                <div class="modal-header">

                    <h4 class="modal-title">

                        <i class="fas fa-user-plus"></i>
                        Add New Student

                    </h4>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>
                            &times;
                        </span>

                    </button>

                </div>


                <!-- BODY -->

                <div class="modal-body">

                    <div class="row">


                        <!-- =================================================
                             PROFILE PHOTO
                             ================================================= -->

                        <div class="col-md-4">

                            <div
                                class="card card-primary card-outline"
                                style="margin-bottom:0;"
                            >

                                <div class="card-body box-profile">


                                    <!-- PHOTO PREVIEW -->

                                    <div class="text-center">

                                        <img
                                            id="addPhotoPreview"
                                            src="<?php echo WEB_ROOT; ?>module/student/image/default.png"
                                            alt="Student Photo"
                                            class="profile-user-img img-fluid img-circle"
                                            style="
                                                width:170px;
                                                height:170px;
                                                object-fit:cover;
                                                border:4px solid #007bff;
                                                padding:3px;
                                            "
                                        >

                                    </div>


                                    <!-- NAME -->

                                    <h3
                                        class="profile-username text-center mt-3"
                                        id="addProfileName"
                                    >
                                        New Student
                                    </h3>


                                    <!-- ID -->

                                    <p
                                        class="text-muted text-center"
                                        id="addProfileID"
                                    >
                                        Student ID
                                    </p>


                                    <hr>


                                    <!-- PHOTO INPUT -->

                                    <div class="form-group">

                                        <label for="PHOTO">

                                            <i class="fas fa-camera"></i>
                                            Student Photo

                                        </label>


                                        <input
                                            type="file"
                                            class="form-control"
                                            name="PHOTO"
                                            id="PHOTO"
                                            accept="image/jpeg,image/png"
                                        >


                                        <small class="form-text text-muted">

                                            JPG, JPEG or PNG only.

                                            <br>

                                            Maximum size: 5 MB.

                                        </small>

                                    </div>


                                    <!-- REMOVE PHOTO -->

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary btn-sm btn-block"
                                        id="removeAddPhoto"
                                    >

                                        <i class="fas fa-times"></i>
                                        Remove Photo

                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             STUDENT INFORMATION
                             ================================================= -->

                        <div class="col-md-8">

                            <div class="row">


                                <!-- STUDENT ID -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="IDNO">
                                            Student ID Number
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="IDNO"
                                            id="IDNO"
                                            placeholder="Enter Student ID Number"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- FIRST NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="FNAME">
                                            First Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="FNAME"
                                            id="FNAME"
                                            placeholder="Enter First Name"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- MIDDLE NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="MNAME">
                                            Middle Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="MNAME"
                                            id="MNAME"
                                            placeholder="Enter Middle Name"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- LAST NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="LNAME">
                                            Last Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="LNAME"
                                            id="LNAME"
                                            placeholder="Enter Last Name"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- GENDER -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="SEX">
                                            Select Gender
                                        </label>

                                        <select
                                            class="form-control form-control-sm"
                                            name="SEX"
                                            id="SEX"
                                            required
                                        >

                                            <option value="">
                                                Select Gender
                                            </option>

                                            <option value="Male">
                                                Male
                                            </option>

                                            <option value="Female">
                                                Female
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                <!-- AGE -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="AGE">
                                            Age
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="AGE"
                                            id="AGE"
                                            placeholder="Enter Age"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- BIRTHDAY -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="BDAY">
                                            Birthday
                                        </label>

                                        <input
                                            type="date"
                                            class="form-control form-control-sm"
                                            name="BDAY"
                                            id="BDAY"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- BIRTH PLACE -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="BPLACE">
                                            Birth Place
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="BPLACE"
                                            id="BPLACE"
                                            placeholder="Enter Birth Place"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- NATIONALITY -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="NATIONALITY">
                                            Nationality
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="NATIONALITY"
                                            id="NATIONALITY"
                                            placeholder="Enter Nationality"
                                        >

                                    </div>

                                </div>


                                <!-- RELIGION -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="RELIGION">
                                            Religion
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="RELIGION"
                                            id="RELIGION"
                                            placeholder="Enter Religion"
                                        >

                                    </div>

                                </div>


                                <!-- CONTACT NUMBER -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="CONTACT_NO">
                                            Contact Number
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="CONTACT_NO"
                                            id="CONTACT_NO"
                                            placeholder="Enter Contact Number"
                                        >

                                    </div>

                                </div>


                                <!-- STATUS -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="STATUS">
                                            Select Status
                                        </label>

                                        <select
                                            class="form-control form-control-sm"
                                            name="STATUS"
                                            id="STATUS"
                                            required
                                        >

                                            <option value="">
                                                Select Status
                                            </option>

                                            <option value="Single">
                                                Single
                                            </option>

                                            <option value="Married">
                                                Married
                                            </option>

                                            <option value="Walmart Bag">
                                                Walmart Bag
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

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

                        <i class="fas fa-save"></i>
                        Save Student

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- ============================================================
     EDIT STUDENT MODAL
     ============================================================ -->

<div
    class="modal fade"
    id="editEntry"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="controller.php?action=edit"
            method="POST"
            enctype="multipart/form-data"
        >

            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title">

                        <i class="fas fa-user-edit"></i>
                        Edit Student

                    </h4>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>
                            &times;
                        </span>

                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">


                        <!-- PROFILE -->

                        <div class="col-md-4">

                            <div
                                class="card card-primary card-outline"
                                style="margin-bottom:0;"
                            >

                                <div class="card-body box-profile">


                                    <div class="text-center">

                                        <img
                                            id="editPhotoPreview"
                                            src="<?php echo WEB_ROOT; ?>module/student/image/default.png"
                                            alt="Student Photo"
                                            class="profile-user-img img-fluid img-circle"
                                            style="
                                                width:170px;
                                                height:170px;
                                                object-fit:cover;
                                                border:4px solid #007bff;
                                                padding:3px;
                                            "
                                        >

                                    </div>


                                    <h3
                                        class="profile-username text-center mt-3"
                                        id="editProfileName"
                                    >
                                        Student
                                    </h3>


                                    <p
                                        class="text-muted text-center"
                                        id="editProfileID"
                                    >
                                        Student ID
                                    </p>


                                    <hr>


                                    <div class="form-group">

                                        <label for="PHOTO1">

                                            <i class="fas fa-camera"></i>
                                            Change Student Photo

                                        </label>


                                        <input
                                            type="file"
                                            class="form-control"
                                            name="PHOTO1"
                                            id="PHOTO1"
                                            accept="image/jpeg,image/png"
                                        >


                                        <small class="form-text text-muted">

                                            Leave empty to keep current photo.

                                            <br>

                                            JPG, JPEG or PNG.

                                            <br>

                                            Maximum 5 MB.

                                        </small>

                                    </div>


                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary btn-sm btn-block"
                                        id="removeEditPhoto"
                                    >

                                        <i class="fas fa-times"></i>
                                        Remove Photo

                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- INFORMATION -->

                        <div class="col-md-8">

                            <div class="row">


                                <input
                                    type="hidden"
                                    name="UID"
                                    id="UID"
                                    value=""
                                >


                                <!-- STUDENT ID -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="IDNO1">
                                            Student ID Number
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="IDNO1"
                                            id="IDNO1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- FIRST NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="FNAME1">
                                            First Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="FNAME1"
                                            id="FNAME1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- MIDDLE NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="MNAME1">
                                            Middle Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="MNAME1"
                                            id="MNAME1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- LAST NAME -->

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label for="LNAME1">
                                            Last Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="LNAME1"
                                            id="LNAME1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- GENDER -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="SEX1">
                                            Select Gender
                                        </label>

                                        <select
                                            class="form-control form-control-sm"
                                            name="SEX1"
                                            id="SEX1"
                                            required
                                        >

                                            <option value="">
                                                Select Gender
                                            </option>

                                            <option value="Male">
                                                Male
                                            </option>

                                            <option value="Female">
                                                Female
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                <!-- AGE -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="AGE1">
                                            Age
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="AGE1"
                                            id="AGE1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- BIRTHDAY -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="BDAY1">
                                            Birthday
                                        </label>

                                        <input
                                            type="date"
                                            class="form-control form-control-sm"
                                            name="BDAY1"
                                            id="BDAY1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- BIRTH PLACE -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="BPLACE1">
                                            Birth Place
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="BPLACE1"
                                            id="BPLACE1"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- NATIONALITY -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="NATIONALITY1">
                                            Nationality
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="NATIONALITY1"
                                            id="NATIONALITY1"
                                            placeholder="Enter Nationality"
                                        >

                                    </div>

                                </div>


                                <!-- RELIGION -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="RELIGION1">
                                            Religion
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="RELIGION1"
                                            id="RELIGION1"
                                            placeholder="Enter Religion"
                                        >

                                    </div>

                                </div>


                                <!-- CONTACT NUMBER -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="CONTACT_NO1">
                                            Contact Number
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="CONTACT_NO1"
                                            id="CONTACT_NO1"
                                            placeholder="Enter Contact Number"
                                        >

                                    </div>

                                </div>


                                <!-- STATUS -->

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label for="STATUS1">
                                            Select Status
                                        </label>

                                        <select
                                            class="form-control form-control-sm"
                                            name="STATUS1"
                                            id="STATUS1"
                                            required
                                        >

                                            <option value="">
                                                Select Status
                                            </option>

                                            <option value="Single">
                                                Single
                                            </option>

                                            <option value="Married">
                                                Married
                                            </option>

                                            <option value="Walmart Bag">
                                                Walmart Bag
                                            </option>

                                        </select>

                                    </div>

                                </div>

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

                        <i class="fas fa-save"></i>
                        Save Changes

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- ============================================================
     RESERVE ENROLLMENT
     ============================================================ -->

<div
    class="modal fade"
    id="registerEntry"
    tabindex="-1"
>

    <div class="modal-dialog">

        <form
            action="controller.php?action=register"
            method="POST"
        >

            <div class="modal-content">


                <div class="modal-header bg-success">

                    <h4 class="modal-title">

                        <i class="fa fa-clipboard-check"></i>
                        &nbsp; Reserve Enrollment Slot

                    </h4>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>
                            &times;
                        </span>

                    </button>

                </div>


                <div class="modal-body">


                    <input
                        type="hidden"
                        name="R_SID"
                        id="R_SID"
                    >


                    <div class="callout callout-info py-2 mb-3">

                        <div class="row">

                            <div class="col-sm-5">

                                <small class="text-muted d-block">
                                    ID No.
                                </small>

                                <strong id="R_IDNO_TEXT">
                                    -
                                </strong>

                            </div>


                            <div class="col-sm-7">

                                <small class="text-muted d-block">
                                    Student Name
                                </small>

                                <strong id="R_NAME_TEXT">
                                    -
                                </strong>

                            </div>

                        </div>

                    </div>


                    <div class="row">


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_SY">
                                    Academic Year
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="R_SY"
                                    id="R_SY"
                                    required
                                >

                                    <option value="">
                                        Select Academic Year
                                    </option>

                                    <?php foreach ($regSchoolYears as $sy) { ?>

                                        <option
                                            value="<?php echo $sy->SY_ID; ?>"
                                        >

                                            <?php
                                            echo htmlspecialchars(
                                                $sy->SCHOOL_YEAR
                                            );
                                            ?>

                                            <?php
                                            echo (
                                                $sy->STATUS == 'Active'
                                            )
                                                ? ' (Active)'
                                                : '';
                                            ?>

                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_SEMESTER">
                                    Semester
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="R_SEMESTER"
                                    id="R_SEMESTER"
                                    required
                                >

                                    <option value="">
                                        Select Semester
                                    </option>

                                    <?php foreach ($regSemesters as $sem) { ?>

                                        <option value="<?php echo $sem; ?>">
                                            <?php echo $sem; ?>
                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>


                        <div class="col-sm-12">

                            <div class="form-group">

                                <label for="R_COURSE">
                                    Course
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="R_COURSE"
                                    id="R_COURSE"
                                    required
                                >

                                    <option value="">
                                        Select Course
                                    </option>

                                    <?php foreach ($regCourses as $c) { ?>

                                        <option
                                            value="<?php echo $c->COURSE_ID; ?>"
                                        >

                                            <?php
                                            echo htmlspecialchars(
                                                $c->COURSE_CODE .
                                                ' - ' .
                                                $c->COURSE_NAME
                                            );
                                            ?>

                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_YEARLEVEL">
                                    Year Level
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="R_YEARLEVEL"
                                    id="R_YEARLEVEL"
                                    required
                                >

                                    <option value="">
                                        Select Year Level
                                    </option>

                                    <?php foreach ($regYearLevels as $yl) { ?>

                                        <option value="<?php echo $yl; ?>">
                                            <?php echo $yl; ?>
                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_CURRICULUM">
                                    Curriculum Yr
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="R_CURRICULUM"
                                    id="R_CURRICULUM"
                                    placeholder="e.g. 2023-2024"
                                >

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_CATEGORY">
                                    Category
                                </label>

                                <select
                                    class="form-control form-control-sm"
                                    name="R_CATEGORY"
                                    id="R_CATEGORY"
                                    required
                                >

                                    <?php foreach ($regCategories as $cat) { ?>

                                        <option value="<?php echo $cat; ?>">
                                            <?php echo $cat; ?>
                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="R_DATE_RESERVED">
                                    Date Reserved
                                </label>

                                <input
                                    type="date"
                                    class="form-control form-control-sm"
                                    name="R_DATE_RESERVED"
                                    id="R_DATE_RESERVED"
                                    value="<?php echo date('Y-m-d'); ?>"
                                    required
                                >

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
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="btn btn-success"
                        name="register"
                    >

                        <i class="fa fa-save"></i>
                        Reserve

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- ============================================================
     JAVASCRIPT
     ============================================================ -->

<script>

$(document).ready(function() {

    var studentImagePath =
        "<?php echo WEB_ROOT; ?>module/student/image/";

    var defaultStudentPhoto =
        studentImagePath + "default.png";


    /* ============================================================
       IMAGE PREVIEW
       ============================================================ */

    function previewStudentPhoto(input, previewSelector) {

        var file =
            input.files && input.files.length
                ? input.files[0]
                : null;

        var preview =
            $(previewSelector);


        if (!file) {

            preview.attr(
                "src",
                defaultStudentPhoto
            );

            return;

        }


        var allowedTypes = [
            "image/jpeg",
            "image/png"
        ];


        if (
            $.inArray(
                file.type,
                allowedTypes
            ) === -1
        ) {

            alert(
                "Please select a JPG, JPEG, or PNG image."
            );

            input.value = "";

            preview.attr(
                "src",
                defaultStudentPhoto
            );

            return;

        }


        if (
            file.size >
            5 * 1024 * 1024
        ) {

            alert(
                "The image must not be larger than 5 MB."
            );

            input.value = "";

            preview.attr(
                "src",
                defaultStudentPhoto
            );

            return;

        }


        var reader =
            new FileReader();


        reader.onload = function(e) {

            preview.attr(
                "src",
                e.target.result
            );

        };


        reader.onerror = function() {

            alert(
                "Could not preview this image."
            );

        };


        reader.readAsDataURL(file);

    }


    /* ============================================================
       ADD PHOTO PREVIEW
       ============================================================ */

    $(document).on(
        "change",
        "#PHOTO",
        function() {

            previewStudentPhoto(
                this,
                "#addPhotoPreview"
            );

        }
    );


    /* ============================================================
       EDIT PHOTO PREVIEW
       ============================================================ */

    $(document).on(
        "change",
        "#PHOTO1",
        function() {

            previewStudentPhoto(
                this,
                "#editPhotoPreview"
            );

        }
    );


    /* ============================================================
       REMOVE ADD PHOTO
       ============================================================ */

    $(document).on(
        "click",
        "#removeAddPhoto",
        function() {

            $("#PHOTO").val("");

            $("#addPhotoPreview").attr(
                "src",
                defaultStudentPhoto
            );

        }
    );


    /* ============================================================
       REMOVE EDIT PHOTO
       ============================================================ */

    $(document).on(
        "click",
        "#removeEditPhoto",
        function() {

            $("#PHOTO1").val("");

            $("#editPhotoPreview").attr(
                "src",
                defaultStudentPhoto
            );

        }
    );


    /* ============================================================
       ADD PROFILE NAME / ID
       ============================================================ */

    function updateAddProfile() {

        var fname =
            $("#FNAME").val();

        var mname =
            $("#MNAME").val();

        var lname =
            $("#LNAME").val();

        var idno =
            $("#IDNO").val();


        var fullName =
            (
                fname +
                " " +
                mname +
                " " +
                lname
            )
            .replace(/\s+/g, " ")
            .trim();


        if (fullName === "") {

            $("#addProfileName")
                .text("New Student");

        } else {

            $("#addProfileName")
                .text(fullName);

        }


        if (idno === "") {

            $("#addProfileID")
                .text("Student ID");

        } else {

            $("#addProfileID")
                .text("Student ID: " + idno);

        }

    }


    $(document).on(
        "keyup change",
        "#IDNO, #FNAME, #MNAME, #LNAME",
        function() {

            updateAddProfile();

        }
    );


    /* ============================================================
       ADD MODAL RESET
       ============================================================ */

    $("#AddNewEntry").on(
        "hidden.bs.modal",
        function() {

            $("#PHOTO").val("");

            $("#IDNO").val("");
            $("#FNAME").val("");
            $("#MNAME").val("");
            $("#LNAME").val("");

            $("#SEX").val("");
            $("#AGE").val("");
            $("#BDAY").val("");
            $("#BPLACE").val("");

            $("#NATIONALITY").val("");
            $("#RELIGION").val("");
            $("#CONTACT_NO").val("");

            $("#STATUS").val("");


            $("#addPhotoPreview").attr(
                "src",
                defaultStudentPhoto
            );


            $("#addProfileName")
                .text("New Student");

            $("#addProfileID")
                .text("Student ID");

        }
    );


    /* ============================================================
       EDIT PROFILE
       ============================================================ */

    function updateEditProfile() {

        var fname =
            $("#FNAME1").val();

        var mname =
            $("#MNAME1").val();

        var lname =
            $("#LNAME1").val();

        var idno =
            $("#IDNO1").val();


        var fullName =
            (
                fname +
                " " +
                mname +
                " " +
                lname
            )
            .replace(/\s+/g, " ")
            .trim();


        if (fullName === "") {

            $("#editProfileName")
                .text("Student");

        } else {

            $("#editProfileName")
                .text(fullName);

        }


        if (idno === "") {

            $("#editProfileID")
                .text("Student ID");

        } else {

            $("#editProfileID")
                .text("Student ID: " + idno);

        }

    }


    $(document).on(
        "keyup change",
        "#IDNO1, #FNAME1, #MNAME1, #LNAME1",
        function() {

            updateEditProfile();

        }
    );


    /* ============================================================
       FIND EXISTING STUDENT PHOTO
       ============================================================ */

    function findStudentPhoto(
        idno,
        callback
    ) {

        if (!idno) {

            callback(
                defaultStudentPhoto
            );

            return;

        }


        var extensions = [
            ".jpg",
            ".jpeg",
            ".png",
            ".JPG",
            ".JPEG",
            ".PNG"
        ];


        var index = 0;


        function tryNext() {

            if (
                index >=
                extensions.length
            ) {

                callback(
                    defaultStudentPhoto
                );

                return;

            }


            var url =
                studentImagePath +
                idno +
                extensions[index];


            var image =
                new Image();


            image.onload = function() {

                callback(url);

            };


            image.onerror = function() {

                index++;

                tryNext();

            };


            image.src =
                url +
                "?v=" +
                new Date().getTime();

        }


        tryNext();

    }


    function loadEditStudentPhoto() {

        var idno =
            $.trim(
                $("#IDNO1").val()
            );


        if (!idno) {

            $("#editPhotoPreview").attr(
                "src",
                defaultStudentPhoto
            );

            return;

        }


        findStudentPhoto(
            idno,
            function(photoUrl) {

                $("#editPhotoPreview").attr(
                    "src",
                    photoUrl
                );

            }
        );

    }


    $("#editEntry").on(
        "shown.bs.modal",
        function() {

            updateEditProfile();

            loadEditStudentPhoto();

        }
    );


    $("#editEntry").on(
        "hidden.bs.modal",
        function() {

            $("#PHOTO1").val("");

            $("#editPhotoPreview").attr(
                "src",
                defaultStudentPhoto
            );

        }
    );


    /* ============================================================
       DATATABLE
       ============================================================ */

    var t =
        $("#tblstudent").DataTable({

            "processing": true,

            "serverSide": true,

            "order": [],

            "ajax": {

                url:
                    "<?php echo WEB_ROOT; ?>module/student/ajax.php",

                type:
                    "POST"

            },

            "columnDefs": [

                {

                    "searchable": true,

                    "orderable": true,

                    "targets": 1

                }

            ],

            "scrollY":
                "400px",

            "scrollCollapse":
                true,

            "order":
                [[2, "asc"]]

        });


    t.on(
        "order.dt search.dt",
        function() {

            t.column(
                0,
                {
                    search: "applied",
                    order: "applied"
                }
            )
            .nodes()
            .each(
                function(cell, i) {

                    cell.innerHTML =
                        i + 1;

                }
            );

        }
    )
    .draw();


    /* ============================================================
       EDIT STUDENT
       ============================================================ */

    $(document).on(
        "click",
        ".editEntry",
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
                    function(data) {

                        $("#UID").val(
                            data.UID
                        );

                        $("#IDNO1").val(
                            data.IDNO
                        );

                        $("#FNAME1").val(
                            data.FNAME
                        );

                        $("#MNAME1").val(
                            data.MNAME
                        );

                        $("#LNAME1").val(
                            data.LNAME
                        );


                        var sex =
                            $.trim(
                                data.SEX || ""
                            );


                        if (
                            sex !== "Male" &&
                            sex !== "Female"
                        ) {

                            sex = "";

                        }


                        $("#SEX1").val(
                            sex
                        );


                        $("#BDAY1").val(
                            data.BDAY || ""
                        );


                        $("#BPLACE1").val(
                            data.BPLACE || ""
                        );


                        /* ============================================
                           NEW FIELDS
                           ============================================ */

                        $("#NATIONALITY1").val(
                            data.NATIONALITY || ""
                        );

                        $("#RELIGION1").val(
                            data.RELIGION || ""
                        );

                        $("#CONTACT_NO1").val(
                            data.CONTACT_NO || ""
                        );


                        var status =
                            $.trim(
                                data.STATUS || ""
                            );


                        $("#STATUS1").val(
                            status
                        );


                        $("#AGE1").val(
                            data.AGE || ""
                        );


                        updateEditProfile();

                        loadEditStudentPhoto();


                        $("#editEntry")
                            .modal("show");

                    },


                error:
                    function() {

                        alert(
                            "Could not load the student record."
                        );

                    }

            });

        }
    );


    /* ============================================================
       RESERVE ENROLLMENT
       ============================================================ */

    $(document).on(
        "click",
        ".registerEntry",
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
                        act:
                            "register_info",

                        UID:
                            uid
                    },

                dataType:
                    "json",


                success:
                    function(data) {

                        $("#R_SID").val(
                            data.S_ID
                        );


                        $("#R_IDNO_TEXT").text(
                            data.IDNO || "-"
                        );


                        $("#R_NAME_TEXT").text(
                            data.FULLNAME || "-"
                        );


                        $("#R_SEMESTER").val("");

                        $("#R_YEARLEVEL").val("");


                        $("#R_SY").val(
                            data.ACTIVE_SY || ""
                        );


                        $("#R_COURSE").val(
                            data.COURSE_ID || ""
                        );


                        $("#R_CURRICULUM").val(
                            data.ACTIVE_AY || ""
                        );


                        $("#R_CATEGORY").val(
                            data.SUGGEST_CATEGORY || "New"
                        );


                        $("#registerEntry")
                            .modal("show");

                    },


                error:
                    function() {

                        alert(
                            "Could not load the student record."
                        );

                    }

            });

        }
    );

});

</script>


<style>

.student-profile-photo {

    width:170px;

    height:170px;

    object-fit:cover;

    border-radius:50%;

}


.profile-user-img {

    background:#f4f6f9;

    transition:
        transform .2s ease;

}


.profile-user-img:hover {

    transform:
        scale(1.03);

}


.box-profile {

    padding:20px;

}


#addPhotoPreview,
#editPhotoPreview {

    background-color:#f4f6f9;

}


.modal-lg {

    max-width:900px;

}

</style>