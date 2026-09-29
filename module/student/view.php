<?php
// TAJALE SOLUTIONS

$student = null;
$enroll  = null;


/*
|----------------------------------------------------------------------
| GET STUDENT
|----------------------------------------------------------------------
*/

if (isset($_GET['id']) && $_GET['id'] != '') {

    $studentID = (int)$_GET['id'];

    $mydb->setQuery("
        SELECT *
        FROM `tblstudent`
        WHERE `S_ID` = '".$studentID."'
        LIMIT 1
    ");

    $student = $mydb->loadSingleResult();


    /*
    |----------------------------------------------------------------------
    | GET LATEST ENROLLMENT
    |----------------------------------------------------------------------
    */

    if ($student) {

        $mydb->setQuery("
            SELECT
                e.*,
                c.COURSE_CODE,
                c.COURSE_NAME,
                s.SECTION_NAME,
                sy.SCHOOL_YEAR
            FROM `tblenrollment` e

            LEFT JOIN `tblcourses` c
                ON c.COURSE_ID = e.COURSE_ID

            LEFT JOIN `tblsections` s
                ON s.SECTION_ID = e.SECTION_ID

            LEFT JOIN `tblschoolyear` sy
                ON sy.SY_ID = e.SY_ID

            WHERE e.S_ID = '".$studentID."'

            ORDER BY e.ENROLLMENT_ID DESC

            LIMIT 1
        ");

        $enroll = $mydb->loadSingleResult();
    }
}


/*
|----------------------------------------------------------------------
| STUDENT PHOTO
|----------------------------------------------------------------------
*/

function student_photo_url($idno)
{
    $dir = __DIR__ . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR;

    $web = WEB_ROOT . 'module/student/image/';


    /*
    |----------------------------------------------------------------------
    | CLEAN IDNO
    |----------------------------------------------------------------------
    */

    $safeIDNO = preg_replace(
        '/[^A-Za-z0-9_-]/',
        '',
        (string)$idno
    );


    /*
    |----------------------------------------------------------------------
    | NO IDNO
    |----------------------------------------------------------------------
    */

    if ($safeIDNO === '') {

        if (is_file($dir . 'default.png')) {
            return $web . 'default.png';
        }

        return '';
    }


    /*
    |----------------------------------------------------------------------
    | SUPPORTED IMAGE EXTENSIONS
    |----------------------------------------------------------------------
    */

    $extensions = array(
        'jpg',
        'jpeg',
        'png',
        'JPG',
        'JPEG',
        'PNG'
    );


    /*
    |----------------------------------------------------------------------
    | FIND STUDENT PHOTO
    |----------------------------------------------------------------------
    */

    foreach ($extensions as $ext) {

        $file = $dir . $safeIDNO . '.' . $ext;

        if (is_file($file)) {

            return $web .
                   $safeIDNO .
                   '.' .
                   $ext .
                   '?v=' .
                   filemtime($file);
        }
    }


    /*
    |----------------------------------------------------------------------
    | DEFAULT PHOTO
    |----------------------------------------------------------------------
    */

    if (is_file($dir . 'default.png')) {

        return $web . 'default.png';
    }


    return '';
}


/*
|----------------------------------------------------------------------
| GET PHOTO URL
|----------------------------------------------------------------------
*/

$photoUrl = '';

if ($student) {

    $photoUrl = student_photo_url(
        $student->IDNO
    );
}

?>


<section class="content">

    <div class="container-fluid">


        <?php if (!$student): ?>


            <!-- =========================================================
                 STUDENT NOT FOUND
            ========================================================== -->

            <div class="alert alert-warning">

                <h5>

                    <i class="icon fas fa-exclamation-triangle"></i>

                    Student Not Found

                </h5>


                No student was selected or the student does not exist.


                <br><br>


                <a
                    href="<?php echo WEB_ROOT; ?>module/student/"
                    class="btn btn-primary"
                >

                    <i class="fas fa-arrow-left"></i>

                    Back to Student List

                </a>

            </div>


        <?php else: ?>


            <!-- =========================================================
                 STUDENT PROFILE
            ========================================================== -->

            <div class="row">


                <!-- =====================================================
                     LEFT COLUMN
                ====================================================== -->

                <div class="col-md-4">


                    <!-- =================================================
                         PROFILE CARD
                    ================================================== -->

                    <div class="card card-primary card-outline">

                        <div class="card-body box-profile">


                            <!-- STUDENT PHOTO -->

                            <div class="text-center">

                                <?php if ($photoUrl != ''): ?>

                                    <img
                                        class="profile-user-img img-fluid img-circle"
                                        src="<?php echo htmlspecialchars($photoUrl); ?>"
                                        alt="Student Photo"
                                        style="
                                            width:160px;
                                            height:160px;
                                            object-fit:cover;
                                            border:4px solid #007bff;
                                        "
                                    >

                                <?php else: ?>

                                    <div
                                        style="
                                            width:160px;
                                            height:160px;
                                            margin:0 auto;
                                            border-radius:50%;
                                            background:#e9ecef;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            border:4px solid #007bff;
                                        "
                                    >

                                        <i
                                            class="fas fa-user"
                                            style="
                                                font-size:70px;
                                                color:#6c757d;
                                            "
                                        ></i>

                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- STUDENT NAME -->

                            <h3 class="profile-username text-center mt-3">

                                <?php

                                echo htmlspecialchars(
                                    trim(
                                        $student->FNAME . ' ' .
                                        $student->MNAME . ' ' .
                                        $student->LNAME
                                    )
                                );

                                ?>

                            </h3>


                            <!-- STUDENT ID -->

                            <p class="text-muted text-center">

                                Student ID:

                                <strong>

                                    <?php

                                    echo htmlspecialchars(
                                        $student->IDNO
                                    );

                                    ?>

                                </strong>

                            </p>


                            <!-- BASIC INFORMATION -->

                            <ul class="list-group list-group-unbordered mb-3">


                                <!-- GENDER -->

                                <li class="list-group-item">

                                    <b>

                                        <i class="fas fa-venus-mars mr-1"></i>

                                        Gender

                                    </b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $student->SEX
                                        );

                                        ?>

                                    </span>

                                </li>


                                <!-- BIRTHDAY -->

                                <li class="list-group-item">

                                    <b>

                                        <i class="fas fa-birthday-cake mr-1"></i>

                                        Birthday

                                    </b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $student->BDAY
                                        );

                                        ?>

                                    </span>

                                </li>


                                <!-- AGE -->

                                <li class="list-group-item">

                                    <b>

                                        <i class="fas fa-user-clock mr-1"></i>

                                        Age

                                    </b>

                                    <span class="float-right">

                                        <?php

                                        echo isset($student->AGE)
                                            ? htmlspecialchars($student->AGE)
                                            : '';

                                        ?>

                                    </span>

                                </li>


                                <!-- STATUS -->

                                <li class="list-group-item">

                                    <b>

                                        <i class="fas fa-info-circle mr-1"></i>

                                        Status

                                    </b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $student->STATUS
                                        );

                                        ?>

                                    </span>

                                </li>


                            </ul>


                            <!-- BACK BUTTON -->

                            <a
                                href="<?php echo WEB_ROOT; ?>module/student/"
                                class="btn btn-primary btn-block"
                            >

                                <i class="fas fa-arrow-left"></i>

                                <b>Back to List</b>

                            </a>


                        </div>

                    </div>


                    <!-- =================================================
                         CURRENT ENROLLMENT
                    ================================================== -->

                    <div class="card card-primary">

                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-graduation-cap"></i>

                                Current Enrollment

                            </h3>

                        </div>


                        <div class="card-body">


                            <?php if ($enroll): ?>


                                <!-- COURSE -->

                                <strong>

                                    <i class="fas fa-book mr-1"></i>

                                    Course

                                </strong>

                                <p class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        $enroll->COURSE_CODE .
                                        ' - ' .
                                        $enroll->COURSE_NAME
                                    );

                                    ?>

                                </p>


                                <hr>


                                <!-- SECTION -->

                                <strong>

                                    <i class="fas fa-users mr-1"></i>

                                    Section

                                </strong>

                                <p class="text-muted">

                                    <?php

                                    if (
                                        $enroll->SECTION_NAME === null ||
                                        $enroll->SECTION_NAME === ''
                                    ) {

                                        echo 'Not yet sectioned';

                                    } else {

                                        echo htmlspecialchars(
                                            $enroll->SECTION_NAME
                                        );

                                    }

                                    ?>

                                </p>


                                <hr>


                                <!-- SCHOOL YEAR -->

                                <strong>

                                    <i class="fas fa-calendar-alt mr-1"></i>

                                    School Year

                                </strong>

                                <p class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        $enroll->SCHOOL_YEAR
                                    );

                                    ?>

                                </p>


                                <hr>


                                <!-- ENROLLMENT STATUS -->

                                <strong>

                                    <i class="fas fa-info-circle mr-1"></i>

                                    Enrollment Status

                                </strong>

                                <p class="text-muted">

                                    <?php

                                    echo htmlspecialchars(
                                        $enroll->STATUS
                                    );

                                    ?>

                                </p>


                            <?php else: ?>


                                <div class="text-center">

                                    <i
                                        class="fas fa-graduation-cap"
                                        style="
                                            font-size:45px;
                                            color:#adb5bd;
                                        "
                                    ></i>

                                    <p class="text-muted mt-3">

                                        This student is not yet enrolled
                                        in any course or section.

                                    </p>

                                </div>


                            <?php endif; ?>


                        </div>

                    </div>


                </div>


                <!-- =====================================================
                     RIGHT COLUMN
                ====================================================== -->

                <div class="col-md-8">


                    <div class="card">


                        <!-- =================================================
                             TABS
                        ================================================== -->

                        <div class="card-header p-2">

                            <ul class="nav nav-pills">


                                <!-- PROFILE -->

                                <li class="nav-item">

                                    <a
                                        class="nav-link active"
                                        href="#profile"
                                        data-toggle="tab"
                                    >

                                        <i class="fas fa-user"></i>

                                        Profile Info

                                    </a>

                                </li>


                                <!-- CONTACT -->

                                <li class="nav-item">

                                    <a
                                        class="nav-link"
                                        href="#contact"
                                        data-toggle="tab"
                                    >

                                        <i class="fas fa-address-book"></i>

                                        Contact Info

                                    </a>

                                </li>


                                <!-- ENROLLMENT -->

                                <li class="nav-item">

                                    <a
                                        class="nav-link"
                                        href="#enrollment"
                                        data-toggle="tab"
                                    >

                                        <i class="fas fa-graduation-cap"></i>

                                        Enrollment

                                    </a>

                                </li>


                            </ul>

                        </div>


                        <!-- =================================================
                             CARD BODY
                        ================================================== -->

                        <div class="card-body">

                            <div class="tab-content">


                                <!-- =================================================
                                     PROFILE TAB
                                ================================================== -->

                                <div
                                    class="active tab-pane"
                                    id="profile"
                                >


                                    <h5 class="mb-3">

                                        <i class="fas fa-user mr-1"></i>

                                        Student Information

                                    </h5>


                                    <table class="table table-bordered table-striped">


                                        <tr>

                                            <th style="width:30%">
                                                Student ID Number
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->IDNO
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Full Name
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    trim(
                                                        $student->FNAME . ' ' .
                                                        $student->MNAME . ' ' .
                                                        $student->LNAME
                                                    )
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                First Name
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->FNAME
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Middle Name
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->MNAME
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Last Name
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->LNAME
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Gender
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->SEX
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Birthday
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->BDAY
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Birth Place
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->BPLACE)
                                                    ? htmlspecialchars(
                                                        $student->BPLACE
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Age
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->AGE)
                                                    ? htmlspecialchars(
                                                        $student->AGE
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Status
                                            </th>

                                            <td>

                                                <?php

                                                echo htmlspecialchars(
                                                    $student->STATUS
                                                );

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Nationality
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->NATIONALITY)
                                                    ? htmlspecialchars(
                                                        $student->NATIONALITY
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Religion
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->RELIGION)
                                                    ? htmlspecialchars(
                                                        $student->RELIGION
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                    </table>


                                </div>


                                <!-- =================================================
                                     CONTACT TAB
                                ================================================== -->

                                <div
                                    class="tab-pane"
                                    id="contact"
                                >


                                    <h5 class="mb-3">

                                        <i class="fas fa-address-book mr-1"></i>

                                        Contact Information

                                    </h5>


                                    <table class="table table-bordered table-striped">


                                        <tr>

                                            <th style="width:30%">
                                                Contact Number
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->CONTACT_NO)
                                                    ? htmlspecialchars(
                                                        $student->CONTACT_NO
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Email
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->EMAIL)
                                                    ? htmlspecialchars(
                                                        $student->EMAIL
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                        <tr>

                                            <th>
                                                Home Address
                                            </th>

                                            <td>

                                                <?php

                                                echo isset($student->HOME_ADD)
                                                    ? htmlspecialchars(
                                                        $student->HOME_ADD
                                                    )
                                                    : '';

                                                ?>

                                            </td>

                                        </tr>


                                    </table>


                                </div>


                                <!-- =================================================
                                     ENROLLMENT TAB
                                ================================================== -->

                                <div
                                    class="tab-pane"
                                    id="enrollment"
                                >


                                    <h5 class="mb-3">

                                        <i class="fas fa-graduation-cap mr-1"></i>

                                        Enrollment Information

                                    </h5>


                                    <?php if ($enroll): ?>


                                        <table class="table table-bordered table-striped">


                                            <!-- COURSE -->

                                            <tr>

                                                <th style="width:30%">
                                                    Course
                                                </th>

                                                <td>

                                                    <?php

                                                    echo htmlspecialchars(
                                                        $enroll->COURSE_CODE .
                                                        ' - ' .
                                                        $enroll->COURSE_NAME
                                                    );

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- SECTION -->

                                            <tr>

                                                <th>
                                                    Section
                                                </th>

                                                <td>

                                                    <?php

                                                    if (
                                                        $enroll->SECTION_NAME === null ||
                                                        $enroll->SECTION_NAME === ''
                                                    ) {

                                                        echo '<span class="badge badge-warning">
                                                                Not yet sectioned
                                                              </span>';

                                                    } else {

                                                        echo htmlspecialchars(
                                                            $enroll->SECTION_NAME
                                                        );

                                                    }

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- SCHOOL YEAR -->

                                            <tr>

                                                <th>
                                                    School Year
                                                </th>

                                                <td>

                                                    <?php

                                                    echo htmlspecialchars(
                                                        $enroll->SCHOOL_YEAR
                                                    );

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- SEMESTER -->

                                            <tr>

                                                <th>
                                                    Semester
                                                </th>

                                                <td>

                                                    <?php

                                                    echo isset($enroll->SEMESTER)
                                                        ? htmlspecialchars(
                                                            $enroll->SEMESTER
                                                        )
                                                        : '';

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- YEAR LEVEL -->

                                            <tr>

                                                <th>
                                                    Year Level
                                                </th>

                                                <td>

                                                    <?php

                                                    echo isset($enroll->YEARLEVEL)
                                                        ? htmlspecialchars(
                                                            $enroll->YEARLEVEL
                                                        )
                                                        : '';

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- CATEGORY -->

                                            <tr>

                                                <th>
                                                    Category
                                                </th>

                                                <td>

                                                    <?php

                                                    echo isset($enroll->CATEGORY)
                                                        ? htmlspecialchars(
                                                            $enroll->CATEGORY
                                                        )
                                                        : '';

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- CURRICULUM -->

                                            <tr>

                                                <th>
                                                    Curriculum Year
                                                </th>

                                                <td>

                                                    <?php

                                                    echo isset($enroll->CURRICULUM)
                                                        ? htmlspecialchars(
                                                            $enroll->CURRICULUM
                                                        )
                                                        : '';

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- DATE RESERVED -->

                                            <tr>

                                                <th>
                                                    Date Reserved
                                                </th>

                                                <td>

                                                    <?php

                                                    echo isset($enroll->DATE_RESERVED)
                                                        ? htmlspecialchars(
                                                            $enroll->DATE_RESERVED
                                                        )
                                                        : '';

                                                    ?>

                                                </td>

                                            </tr>


                                            <!-- ENROLLMENT STATUS -->

                                            <tr>

                                                <th>
                                                    Enrollment Status
                                                </th>

                                                <td>

                                                    <?php

                                                    $enrollmentStatus =
                                                        isset($enroll->STATUS)
                                                        ? $enroll->STATUS
                                                        : '';


                                                    if (
                                                        strtolower(
                                                            $enrollmentStatus
                                                        ) === 'reserved'
                                                    ) {

                                                        echo '<span class="badge badge-warning">
                                                                Reserved
                                                              </span>';

                                                    } elseif (
                                                        strtolower(
                                                            $enrollmentStatus
                                                        ) === 'enrolled'
                                                    ) {

                                                        echo '<span class="badge badge-success">
                                                                Enrolled
                                                              </span>';

                                                    } else {

                                                        echo htmlspecialchars(
                                                            $enrollmentStatus
                                                        );

                                                    }

                                                    ?>

                                                </td>

                                            </tr>


                                        </table>


                                    <?php else: ?>


                                        <div class="alert alert-info">

                                            <i class="fas fa-info-circle"></i>

                                            This student is not yet enrolled
                                            in any course or section.

                                        </div>


                                    <?php endif; ?>


                                </div>


                            </div>

                        </div>

                    </div>


                </div>

            </div>


        <?php endif; ?>


    </div>

</section>


<!-- =========================================================
     STYLING
========================================================= -->

<style>

.profile-user-img {

    background-color:#f4f6f9;

    object-fit:cover;

}


.box-profile .list-group-item {

    padding:10px 12px;

}


.box-profile .list-group-item b {

    color:#495057;

}


.card-primary.card-outline .profile-user-img {

    transition:transform 0.2s ease;

}


.card-primary.card-outline .profile-user-img:hover {

    transform:scale(1.05);

}

</style>