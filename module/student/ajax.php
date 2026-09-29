<?php

require_once("../../include/initialize.php");

global $mydb;


/* =========================================================
   RESERVATION INFO
   ========================================================= */

$act = isset($_POST['act']) ? $_POST['act'] : '';

if ($act === 'register_info') {

    $sid = isset($_POST['UID'])
        ? intval($_POST['UID'])
        : 0;

    $output = array();

    /*
     * Default values
     */

    $output['S_ID'] = '';
    $output['IDNO'] = '';
    $output['FULLNAME'] = '';
    $output['COURSE_ID'] = '';

    $output['ACTIVE_SY'] = '';
    $output['ACTIVE_AY'] = '';

    $output['SUGGEST_CATEGORY'] = 'New';


    /*
     * Get student
     */

    if ($sid > 0) {

        $mydb->setQuery("
            SELECT *
            FROM `tblstudent`
            WHERE `S_ID` = '".$sid."'
            LIMIT 1
        ");

        $studentResult =
            $mydb->loadResultList();


        foreach ($studentResult as $row) {

            $output['S_ID'] =
                $row->S_ID;

            $output['IDNO'] =
                $row->IDNO;

            $output['FULLNAME'] =
                trim(
                    $row->LNAME . ', ' .
                    $row->FNAME . ' ' .
                    $row->MNAME
                );

            /*
             * COURSE_ID may not exist in tblstudent
             * depending on your database structure.
             *
             * Keep it safe.
             */

            $output['COURSE_ID'] =
                isset($row->COURSE_ID)
                    ? $row->COURSE_ID
                    : '';
        }
    }


    /*
     * Active school year
     */

    $mydb->setQuery("
        SELECT
            `SY_ID`,
            `SCHOOL_YEAR`
        FROM `tblschoolyear`
        WHERE `STATUS` = 'Active'
        ORDER BY `SY_ID` DESC
        LIMIT 1
    ");

    $schoolYearResult =
        $mydb->loadResultList();


    foreach ($schoolYearResult as $row) {

        $output['ACTIVE_SY'] =
            $row->SY_ID;

        $output['ACTIVE_AY'] =
            $row->SCHOOL_YEAR;
    }


    /*
     * Student category
     *
     * If the student has any previous enrollment,
     * suggest Old. Otherwise suggest New.
     */

    if ($sid > 0) {

        $mydb->setQuery("
            SELECT `ENROLLMENT_ID`
            FROM `tblenrollment`
            WHERE `S_ID` = '".$sid."'
            LIMIT 1
        ");

        if ($mydb->num_rows() > 0) {

            $output['SUGGEST_CATEGORY'] =
                'Old';
        }
    }


    echo json_encode($output);

    exit;
}



/* =========================================================
   GET ONE STUDENT
   ========================================================= */

if (isset($_POST['UID'])) {

    $output = array();

    $sid =
        intval($_POST['UID']);


    /*
     * Default values
     */

    $output["UID"] = '';
    $output["IDNO"] = '';
    $output["FNAME"] = '';
    $output["MNAME"] = '';
    $output["LNAME"] = '';
    $output["SEX"] = '';
    $output["BDAY"] = '';
    $output["BPLACE"] = '';
    $output["STATUS"] = '';
    $output["AGE"] = '';

    $output["NATIONALITY"] = '';
    $output["RELIGION"] = '';
    $output["CONTACT_NO"] = '';
    $output["HOME_ADD"] = '';
    $output["EMAIL"] = '';


    /*
     * Get student
     */

    $mydb->setQuery("
        SELECT *
        FROM `tblstudent`
        WHERE `S_ID` = '".$sid."'
        LIMIT 1
    ");


    $result =
        $mydb->loadResultList();


    foreach ($result as $row) {

        $output["UID"] =
            $row->S_ID;

        $output["IDNO"] =
            $row->IDNO;

        $output["FNAME"] =
            $row->FNAME;

        $output["MNAME"] =
            $row->MNAME;

        $output["LNAME"] =
            $row->LNAME;

        $output["SEX"] =
            $row->SEX;

        $output["BDAY"] =
            $row->BDAY;

        $output["BPLACE"] =
            isset($row->BPLACE)
                ? $row->BPLACE
                : '';

        $output["STATUS"] =
            $row->STATUS;

        $output["AGE"] =
            isset($row->AGE)
                ? $row->AGE
                : '';


        /*
         * Additional student information
         */

        $output["NATIONALITY"] =
            isset($row->NATIONALITY)
                ? $row->NATIONALITY
                : '';

        $output["RELIGION"] =
            isset($row->RELIGION)
                ? $row->RELIGION
                : '';

        $output["CONTACT_NO"] =
            isset($row->CONTACT_NO)
                ? $row->CONTACT_NO
                : '';

        $output["HOME_ADD"] =
            isset($row->HOME_ADD)
                ? $row->HOME_ADD
                : '';

        $output["EMAIL"] =
            isset($row->EMAIL)
                ? $row->EMAIL
                : '';


        /*
         * Normalize birthday
         */

        $bday =
            $row->BDAY;


        if (
            $bday === null ||
            $bday == '0000-00-00' ||
            $bday == ''
        ) {

            $output["BDAY"] = '';

        } else {

            $output["BDAY"] =
                substr($bday, 0, 10);
        }
    }


    echo json_encode($output);

    exit;
}



/* =========================================================
   DATATABLE
   ========================================================= */

$output = array();


$query = "
    SELECT
        `S_ID`,
        `IDNO`,
        `LNAME`,
        `FNAME`,
        `MNAME`,
        `SEX`,
        `BDAY`,
        `BPLACE`,
        `STATUS`,
        `AGE`,
        `NATIONALITY`,
        `RELIGION`,
        `CONTACT_NO`
    FROM `tblstudent`
";


/* =========================================================
   SEARCH
   ========================================================= */

if (
    isset($_POST["search"]) &&
    isset($_POST["search"]["value"])
) {

    $search =
        $mydb->escape_value(
            $_POST["search"]["value"]
        );


    if ($search != '') {

        $query .= "
            WHERE
                `LNAME` LIKE '%".$search."%'
                OR `FNAME` LIKE '%".$search."%'
                OR `MNAME` LIKE '%".$search."%'
                OR `IDNO` LIKE '%".$search."%'
                OR `SEX` LIKE '%".$search."%'
                OR `BDAY` LIKE '%".$search."%'
                OR `BPLACE` LIKE '%".$search."%'
                OR `STATUS` LIKE '%".$search."%'
                OR `AGE` LIKE '%".$search."%'
                OR `NATIONALITY` LIKE '%".$search."%'
                OR `RELIGION` LIKE '%".$search."%'
                OR `CONTACT_NO` LIKE '%".$search."%'
        ";
    }
}



/* =========================================================
   ORDER
   ========================================================= */

$orderColumns = array(

    'S_ID',
    'LNAME',
    'FNAME',
    'MNAME',
    'SEX',
    'BDAY',
    'BPLACE',
    'STATUS',
    'AGE',
    'NATIONALITY',
    'RELIGION',
    'CONTACT_NO'

);


if (
    isset($_POST["order"]) &&
    isset($_POST['order']['0']['column'])
) {

    $column =
        intval(
            $_POST['order']['0']['column']
        );


    $direction =
        (
            isset($_POST['order']['0']['dir']) &&
            strtolower(
                $_POST['order']['0']['dir']
            ) == 'desc'
        )
            ? 'DESC'
            : 'ASC';


    /*
     * DataTables column 0 is our row number.
     * Therefore shift the requested column by -1.
     */

    $databaseColumn =
        $column - 1;


    if (
        $databaseColumn >= 0 &&
        isset(
            $orderColumns[$databaseColumn]
        )
    ) {

        $query .=
            " ORDER BY `" .
            $orderColumns[$databaseColumn] .
            "` " .
            $direction;

    } else {

        $query .=
            " ORDER BY `S_ID` DESC";
    }

} else {

    $query .=
        " ORDER BY `S_ID` DESC";
}



/* =========================================================
   LIMIT
   ========================================================= */

if (
    isset($_POST["length"]) &&
    intval($_POST["length"]) != -1
) {

    $start =
        isset($_POST['start'])
            ? intval($_POST['start'])
            : 0;


    $length =
        intval($_POST['length']);


    /*
     * Safety check
     */

    if ($start < 0) {
        $start = 0;
    }


    if ($length < 1) {
        $length = 10;
    }


    $query .=
        " LIMIT ".$start.", ".$length;
}



/* =========================================================
   GET DATA
   ========================================================= */

$mydb->setQuery($query);

$cur =
    $mydb->loadResultList();


$data =
    array();


foreach ($cur as $result) {

    $sub_array =
        array();


    /*
     * COLUMN 0
     * Row number
     */

    $sub_array[] =
        $start + 1;


    /*
     * COLUMN 1
     * Last Name
     */

    $sub_array[] =
        htmlspecialchars(
            $result->LNAME
        );


    /*
     * COLUMN 2
     * First Name
     */

    $sub_array[] =
        htmlspecialchars(
            $result->FNAME
        );


    /*
     * COLUMN 3
     * Middle Name
     */

    $sub_array[] =
        htmlspecialchars(
            $result->MNAME
        );


    /*
     * COLUMN 4
     * Sex
     */

    $sub_array[] =
        htmlspecialchars(
            $result->SEX
        );


    /*
     * COLUMN 5
     * Birthday
     */

    $sub_array[] =
        htmlspecialchars(
            $result->BDAY
        );


    /*
     * COLUMN 6
     * Birth Place
     */

    $sub_array[] =
        htmlspecialchars(
            $result->BPLACE
        );


    /*
     * COLUMN 7
     * Status
     */

    $sub_array[] =
        htmlspecialchars(
            $result->STATUS
        );


    /*
     * COLUMN 8
     * Age
     */

    $sub_array[] =
        htmlspecialchars(
            $result->AGE
        );


    /*
     * COLUMN 9
     * Nationality
     */

    $sub_array[] =
        htmlspecialchars(
            $result->NATIONALITY
        );


    /*
     * COLUMN 10
     * Religion
     */

    $sub_array[] =
        htmlspecialchars(
            $result->RELIGION
        );


    /*
     * COLUMN 11
     * Contact Number
     */

    $sub_array[] =
        htmlspecialchars(
            $result->CONTACT_NO
        );


    /*
     * COLUMN 12
     * ACTION
     */

    $sub_array[] = '

        <button
            type="button"
            name="update"
            UID="'.$result->S_ID.'"
            class="btn btn-warning btn-xs editEntry"
            title="Edit">

            <span class="fa fa-edit fw-fa"></span>

        </button>


        <a
            href="index.php?view=view&id='.$result->S_ID.'"
        >

            <button
                type="button"
                class="btn btn-info btn-xs"
                title="View">

                <span class="fa fa-eye"></span>

            </button>

        </a>


        <button
            type="button"
            UID="'.$result->S_ID.'"
            class="btn btn-success btn-xs registerEntry"
            title="Reserve Enrollment Slot">

            <span class="fa fa-clipboard-check fw-fa"></span>
            Reg

        </button>


        <a
            href="controller.php?action=delete&id='.$result->S_ID.'"
        >

            <button
                type="button"
                class="btn btn-danger btn-xs SaveReg"
                title="Delete">

                <span class="fa fa-trash fw-fa"></span>
                Del

            </button>

        </a>

    ';


    $data[] =
        $sub_array;


    $start++;
}



/* =========================================================
   TOTAL RECORDS
   ========================================================= */

function get_total_all_records()
{

    global $mydb;


    $statement = "
        SELECT `S_ID`
        FROM `tblstudent`
    ";


    $mydb->setQuery(
        $statement
    );


    return $mydb->num_rows();
}



/* =========================================================
   FILTERED RECORD COUNT
   ========================================================= */

function get_filtered_records($search)
{

    global $mydb;


    $statement = "
        SELECT `S_ID`
        FROM `tblstudent`
    ";


    if ($search != '') {

        $search =
            $mydb->escape_value(
                $search
            );


        $statement .= "
            WHERE
                `LNAME` LIKE '%".$search."%'
                OR `FNAME` LIKE '%".$search."%'
                OR `MNAME` LIKE '%".$search."%'
                OR `IDNO` LIKE '%".$search."%'
                OR `SEX` LIKE '%".$search."%'
                OR `BDAY` LIKE '%".$search."%'
                OR `BPLACE` LIKE '%".$search."%'
                OR `STATUS` LIKE '%".$search."%'
                OR `AGE` LIKE '%".$search."%'
                OR `NATIONALITY` LIKE '%".$search."%'
                OR `RELIGION` LIKE '%".$search."%'
                OR `CONTACT_NO` LIKE '%".$search."%'
        ";
    }


    $mydb->setQuery(
        $statement
    );


    return $mydb->num_rows();
}



/* =========================================================
   SEARCH VALUE
   ========================================================= */

$searchValue = '';

if (
    isset($_POST["search"]) &&
    isset($_POST["search"]["value"])
) {

    $searchValue =
        $_POST["search"]["value"];
}



/* =========================================================
   DATATABLE RESPONSE
   ========================================================= */

$output = array(

    /*
     * Total students in database
     */

    "recordsTotal" =>
        get_total_all_records(),


    /*
     * Students after search filter
     */

    "recordsFiltered" =>
        get_filtered_records(
            $searchValue
        ),


    /*
     * Table data
     */

    "data" =>
        $data

);


echo json_encode(
    $output
);

?>