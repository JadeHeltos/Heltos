<?php

require_once("../../include/initialize.php");

if (!isset($_SESSION['ACCOUNT_ID'])) {
    // redirect(web_root."admin/index.php");
}


$action =
    (isset($_GET['action']) && $_GET['action'] != '')
        ? $_GET['action']
        : '';


switch ($action) {

    case 'add':
        doInsert();
        break;

    case 'edit':
        doEdit();
        break;

    case 'delete':
        doDelete();
        break;

    case 'register':
        doRegister();
        break;

}


/* ============================================================
   ADD STUDENT
   ============================================================ */

function doInsert()
{
    $student = new Student();


    $IDNO =
        isset($_POST['IDNO'])
            ? trim($_POST['IDNO'])
            : '';

    $FNAME =
        isset($_POST['FNAME'])
            ? trim($_POST['FNAME'])
            : '';

    $LNAME =
        isset($_POST['LNAME'])
            ? trim($_POST['LNAME'])
            : '';

    $MNAME =
        isset($_POST['MNAME'])
            ? trim($_POST['MNAME'])
            : '';

    $SEX =
        isset($_POST['SEX'])
            ? trim($_POST['SEX'])
            : '';

    $BDAY =
        isset($_POST['BDAY'])
            ? trim($_POST['BDAY'])
            : '';

    $BPLACE =
        isset($_POST['BPLACE'])
            ? trim($_POST['BPLACE'])
            : '';

    $STATUS =
        isset($_POST['STATUS'])
            ? trim($_POST['STATUS'])
            : '';

    $AGE =
        isset($_POST['AGE'])
            ? trim($_POST['AGE'])
            : '';
    $NATIONALITY =
    isset($_POST['NATIONALITY'])
        ? trim($_POST['NATIONALITY'])
        : '';

$RELIGION =
    isset($_POST['RELIGION'])
        ? trim($_POST['RELIGION'])
        : '';

$CONTACT_NO =
    isset($_POST['CONTACT_NO'])
        ? trim($_POST['CONTACT_NO'])
        : '';



    /* ========================================================
       CHECK DUPLICATE ID
       ======================================================== */

    $res =
        $student->find_all_student($IDNO);


    if ($res >= 1) {

        message(
            "Student IDNO already exist!",
            "error"
        );

        redirect('index.php');

        return;

    }


    /* ========================================================
       SAVE STUDENT DATA
       ======================================================== */

    $student->IDNO =
        $IDNO;

    $student->FNAME =
        $FNAME;

    $student->LNAME =
        $LNAME;

    $student->MNAME =
        $MNAME;

    $student->SEX =
        $SEX;

    $student->BDAY =
        $BDAY;

    $student->BPLACE =
        $BPLACE;

    $student->STATUS =
        $STATUS;

    $student->AGE =
        $AGE;

    $student->NATIONALITY =
    $NATIONALITY;

$student->RELIGION =
    $RELIGION;

$student->CONTACT_NO =
    $CONTACT_NO;    


    $istrue =
        $student->create();


    if ($istrue == true) {


        /* ====================================================
           UPLOAD STUDENT PHOTO
           ==================================================== */

        if (
            isset($_FILES['PHOTO']) &&
            $_FILES['PHOTO']['error'] == UPLOAD_ERR_OK
        ) {

            $photo =
                $_FILES['PHOTO'];


            /* Maximum 5 MB */

            if ($photo['size'] <= 5 * 1024 * 1024) {


                /* Check MIME type */

                $allowedTypes = array(
                    'image/jpeg',
                    'image/png'
                );


                $finfo =
                    finfo_open(
                        FILEINFO_MIME_TYPE
                    );


                $mime =
                    finfo_file(
                        $finfo,
                        $photo['tmp_name']
                    );


                finfo_close($finfo);


                if (
                    in_array(
                        $mime,
                        $allowedTypes
                    )
                ) {


                    /* Get extension */

                    if (
                        $mime ==
                        'image/png'
                    ) {

                        $extension =
                            'png';

                    } else {

                        $extension =
                            'jpg';

                    }


                    /* Clean ID number */

                    $safeIDNO =
                        preg_replace(
                            '/[^A-Za-z0-9_-]/',
                            '',
                            $IDNO
                        );


                    if ($safeIDNO != '') {


                        $imageDirectory =
                            __DIR__ .
                            DIRECTORY_SEPARATOR .
                            'image' .
                            DIRECTORY_SEPARATOR;


                        /* Create folder if needed */

                        if (
                            !is_dir(
                                $imageDirectory
                            )
                        ) {

                            mkdir(
                                $imageDirectory,
                                0755,
                                true
                            );

                        }


                        /* Remove old extensions */

                        $oldExtensions =
                            array(
                                'jpg',
                                'jpeg',
                                'png',
                                'JPG',
                                'JPEG',
                                'PNG'
                            );


                        foreach (
                            $oldExtensions
                            as $oldExt
                        ) {

                            $oldFile =
                                $imageDirectory .
                                $safeIDNO .
                                '.' .
                                $oldExt;


                            if (
                                is_file(
                                    $oldFile
                                )
                            ) {

                                unlink(
                                    $oldFile
                                );

                            }

                        }


                        /* Final filename */

                        $destination =
                            $imageDirectory .
                            $safeIDNO .
                            '.' .
                            $extension;


                        move_uploaded_file(
                            $photo['tmp_name'],
                            $destination
                        );

                    }

                }

            }

        }


        message(
            "New Student [" .
            $IDNO .
            "] has been created successfully!",
            "success"
        );


        redirect('index.php');


    } else {

        message(
            "No user has been created successfully!",
            "error"
        );

        redirect('index.php');

    }

}


/* ============================================================
   EDIT STUDENT
   ============================================================ */

function doEdit()
{

    global $mydb;


    $student =
        new Student();


    $UID =
        isset($_POST['UID'])
            ? intval($_POST['UID'])
            : 0;


    $IDNO =
        isset($_POST['IDNO1'])
            ? trim($_POST['IDNO1'])
            : '';

    $FNAME =
        isset($_POST['FNAME1'])
            ? trim($_POST['FNAME1'])
            : '';

    $MNAME =
        isset($_POST['MNAME1'])
            ? trim($_POST['MNAME1'])
            : '';

    $LNAME =
        isset($_POST['LNAME1'])
            ? trim($_POST['LNAME1'])
            : '';

    $SEX =
        isset($_POST['SEX1'])
            ? trim($_POST['SEX1'])
            : '';

    $BDAY =
        isset($_POST['BDAY1'])
            ? trim($_POST['BDAY1'])
            : '';

    $BPLACE =
        isset($_POST['BPLACE1'])
            ? trim($_POST['BPLACE1'])
            : '';

    $STATUS =
        isset($_POST['STATUS1'])
            ? trim($_POST['STATUS1'])
            : '';

    $AGE =
        isset($_POST['AGE1'])
            ? trim($_POST['AGE1'])
            : '';
    $NATIONALITY =
    isset($_POST['NATIONALITY1'])
        ? trim($_POST['NATIONALITY1'])
        : '';

$RELIGION =
    isset($_POST['RELIGION1'])
        ? trim($_POST['RELIGION1'])
        : '';

$CONTACT_NO =
    isset($_POST['CONTACT_NO1'])
        ? trim($_POST['CONTACT_NO1'])
        : '';        


    $student->IDNO =
        $IDNO;

    $student->FNAME =
        $FNAME;

    $student->MNAME =
        $MNAME;

    $student->LNAME =
        $LNAME;

    $student->BPLACE =
        $BPLACE;

    $student->AGE =
        $AGE;
    $student->NATIONALITY =
    $NATIONALITY;

$student->RELIGION =
    $RELIGION;

$student->CONTACT_NO =
    $CONTACT_NO;    


    if (
        $SEX == 'Male' ||
        $SEX == 'Female'
    ) {

        $student->SEX =
            $SEX;

    }


    if ($BDAY != '') {

        $student->BDAY =
            $BDAY;

    }


    if (
        $STATUS == 'Single' ||
        $STATUS == 'Married' ||
        $STATUS == 'Walmart Bag'
    ) {

        $student->STATUS =
            $STATUS;

    }


    $istrue =
        $student->update(
            $UID
        );


    if ($istrue == true) {


        /* ====================================================
           EDIT PHOTO
           ==================================================== */

        if (
            isset($_FILES['PHOTO1']) &&
            $_FILES['PHOTO1']['error'] ==
                UPLOAD_ERR_OK
        ) {

            $photo =
                $_FILES['PHOTO1'];


            if (
                $photo['size'] <=
                5 * 1024 * 1024
            ) {


                $allowedTypes =
                    array(
                        'image/jpeg',
                        'image/png'
                    );


                $finfo =
                    finfo_open(
                        FILEINFO_MIME_TYPE
                    );


                $mime =
                    finfo_file(
                        $finfo,
                        $photo['tmp_name']
                    );


                finfo_close($finfo);


                if (
                    in_array(
                        $mime,
                        $allowedTypes
                    )
                ) {


                    if (
                        $mime ==
                        'image/png'
                    ) {

                        $extension =
                            'png';

                    } else {

                        $extension =
                            'jpg';

                    }


                    $safeIDNO =
                        preg_replace(
                            '/[^A-Za-z0-9_-]/',
                            '',
                            $IDNO
                        );


                    if ($safeIDNO != '') {


                        $imageDirectory =
                            __DIR__ .
                            DIRECTORY_SEPARATOR .
                            'image' .
                            DIRECTORY_SEPARATOR;


                        if (
                            !is_dir(
                                $imageDirectory
                            )
                        ) {

                            mkdir(
                                $imageDirectory,
                                0755,
                                true
                            );

                        }


                        $oldExtensions =
                            array(
                                'jpg',
                                'jpeg',
                                'png',
                                'JPG',
                                'JPEG',
                                'PNG'
                            );


                        foreach (
                            $oldExtensions
                            as $oldExt
                        ) {

                            $oldFile =
                                $imageDirectory .
                                $safeIDNO .
                                '.' .
                                $oldExt;


                            if (
                                is_file(
                                    $oldFile
                                )
                            ) {

                                unlink(
                                    $oldFile
                                );

                            }

                        }


                        $destination =
                            $imageDirectory .
                            $safeIDNO .
                            '.' .
                            $extension;


                        move_uploaded_file(
                            $photo['tmp_name'],
                            $destination
                        );

                    }

                }

            }

        }


        message(
            "Details has been Updated successfully!",
            "success"
        );


        redirect('index.php');


    } else {

        message(
            "No user account has been updated successfully!",
            "error"
        );

        redirect('index.php');

    }

}


/* ============================================================
   RESERVE ENROLLMENT
   ============================================================ */

function doRegister()
{

    global $mydb;


    $S_ID =
        isset($_POST['R_SID'])
            ? intval($_POST['R_SID'])
            : 0;

    $SY_ID =
        isset($_POST['R_SY'])
            ? intval($_POST['R_SY'])
            : 0;

    $COURSE_ID =
        isset($_POST['R_COURSE'])
            ? intval($_POST['R_COURSE'])
            : 0;

    $YEAR_LEVEL =
        isset($_POST['R_YEARLEVEL'])
            ? trim($_POST['R_YEARLEVEL'])
            : '';

    $SEMESTER =
        isset($_POST['R_SEMESTER'])
            ? trim($_POST['R_SEMESTER'])
            : '';

    $CATEGORY =
        isset($_POST['R_CATEGORY'])
            ? trim($_POST['R_CATEGORY'])
            : 'New';

    $CURRICULUM =
        isset($_POST['R_CURRICULUM'])
            ? trim($_POST['R_CURRICULUM'])
            : '';

    $RESERVED =
        isset($_POST['R_DATE_RESERVED'])
            ? trim($_POST['R_DATE_RESERVED'])
            : '';


    $enrollmentPage =
        WEB_ROOT .
        'module/enrollment/index.php';


    if (
        $S_ID <= 0 ||
        $SY_ID <= 0 ||
        $COURSE_ID <= 0 ||
        $YEAR_LEVEL == '' ||
        $SEMESTER == ''
    ) {

        message(
            "Please complete all the reservation fields.",
            "error"
        );

        redirect('index.php');

        return;

    }


    if ($RESERVED == '') {

        $RESERVED =
            date('Y-m-d');

    }


    $mydb->setQuery("
        SELECT ENROLLMENT_ID
        FROM `tblenrollment`
        WHERE S_ID = '".$S_ID."'
        AND SY_ID = '".$SY_ID."'
        AND SEMESTER = '".$mydb->escape_value($SEMESTER)."'
        LIMIT 1
    ");


    if ($mydb->num_rows() >= 1) {

        message(
            "This student already has a record for that academic year and semester.",
            "error"
        );

        redirect('index.php');

        return;

    }


    $encodedBy =
        isset($_SESSION['UID'])
            ? intval($_SESSION['UID'])
            : 0;


    $encodedSql =
        ($encodedBy > 0)
            ? "'".$encodedBy."'"
            : "NULL";


    $curriculumSql =
        ($CURRICULUM == '')
            ? "NULL"
            : "'".$mydb->escape_value(
                $CURRICULUM
            )."'";


    $sql = "
        INSERT INTO `tblenrollment`
        (
            `S_ID`,
            `COURSE_ID`,
            `SECTION_ID`,
            `SY_ID`,
            `YEAR_LEVEL`,
            `SEMESTER`,
            `CATEGORY`,
            `CURRICULUM_YR`,
            `DATE_RESERVED`,
            `DATE_ENROLLED`,
            `STATUS`,
            `ENCODED_BY`
        )
        VALUES
        (
            '".$S_ID."',
            '".$COURSE_ID."',
            NULL,
            '".$SY_ID."',
            '".$mydb->escape_value($YEAR_LEVEL)."',
            '".$mydb->escape_value($SEMESTER)."',
            '".$mydb->escape_value($CATEGORY)."',
            ".$curriculumSql.",
            '".$mydb->escape_value($RESERVED)."',
            NULL,
            'Reserved',
            ".$encodedSql."
        )
    ";


    $istrue =
        $mydb->InsertThis(
            $sql
        );


    if ($istrue) {

        $mydb->InsertThis("
            UPDATE `tblstudent`
            SET `COURSE_ID` = '".$COURSE_ID."'
            WHERE `S_ID` = '".$S_ID."'
        ");


        message(
            "Slot reserved. Use Sectioning to complete the enrollment.",
            "success"
        );


        redirect(
            $enrollmentPage
        );


    } else {

        message(
            "The reservation could not be saved.",
            "error"
        );

        redirect(
            'index.php'
        );

    }

}


/* ============================================================
   DELETE STUDENT
   ============================================================ */

function doDelete()
{

    $id =
        isset($_GET['id'])
            ? intval($_GET['id'])
            : 0;


    $student =
        new Student();


    $student->delete(
        $id
    );


    message(
        "Student already Deleted!",
        "info"
    );


    redirect(
        'index.php'
    );

}

?>