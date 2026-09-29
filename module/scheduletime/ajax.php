<?php

require_once("../../include/initialize.php");

global $mydb;


/*
|--------------------------------------------------------------------------
| GET SINGLE SCHEDULE TIME
|--------------------------------------------------------------------------
*/

if (isset($_POST['ID']) && $_POST['ID'] != '') {

    $ID = (int)$_POST['ID'];


    if ($ID <= 0) {

        echo json_encode([
            "error" => "Invalid schedule time ID."
        ]);

        exit;
    }


    $mydb->setQuery("

        SELECT

            id,

            time_start,

            time_end,

            description

        FROM tblscheduletime

        WHERE id = '".$ID."'

        LIMIT 1

    ");


    $result = $mydb->loadSingleResult();


    if (!$result) {

        echo json_encode([
            "error" => "Schedule time not found."
        ]);

        exit;
    }


    echo json_encode([

        "ID" => $result->id,

        "TIME_START" => $result->time_start,

        "TIME_END" => $result->time_end,

        "DESCRIPTION" => $result->description

    ]);

    exit;
}



/*
|--------------------------------------------------------------------------
| DATATABLE VARIABLES
|--------------------------------------------------------------------------
*/

$draw = isset($_POST['draw'])
    ? (int)$_POST['draw']
    : 0;


$start = isset($_POST['start'])
    ? (int)$_POST['start']
    : 0;


$length = isset($_POST['length'])
    ? (int)$_POST['length']
    : 10;


$search = '';


if (
    isset($_POST['search']) &&
    isset($_POST['search']['value'])
) {

    $search = trim($_POST['search']['value']);

}



/*
|--------------------------------------------------------------------------
| SEARCH CONDITION
|--------------------------------------------------------------------------
*/

$where = '';


if ($search != '') {

    $search = addslashes($search);


    $where = "

        WHERE

            time_start LIKE '%".$search."%'

            OR time_end LIKE '%".$search."%'

            OR description LIKE '%".$search."%'

    ";

}



/*
|--------------------------------------------------------------------------
| TOTAL RECORDS
|--------------------------------------------------------------------------
*/

$mydb->setQuery("

    SELECT

        COUNT(*) AS total

    FROM tblscheduletime

");


$totalResult = $mydb->loadSingleResult();


$recordsTotal = $totalResult
    ? (int)$totalResult->total
    : 0;



/*
|--------------------------------------------------------------------------
| FILTERED RECORDS
|--------------------------------------------------------------------------
*/

$mydb->setQuery("

    SELECT

        COUNT(*) AS total

    FROM tblscheduletime

    ".$where."

");


$filteredResult = $mydb->loadSingleResult();


$recordsFiltered = $filteredResult
    ? (int)$filteredResult->total
    : 0;



/*
|--------------------------------------------------------------------------
| GET SCHEDULE TIMES
|--------------------------------------------------------------------------
*/

$mydb->setQuery("

    SELECT

        id,

        time_start,

        time_end,

        description

    FROM tblscheduletime

    ".$where."

    ORDER BY time_start ASC

    LIMIT ".$start.", ".$length."

");


$rows = $mydb->loadResultList();



/*
|--------------------------------------------------------------------------
| CREATE DATA
|--------------------------------------------------------------------------
*/

$data = [];

$number = $start + 1;


foreach ($rows as $row) {


    /*
    |--------------------------------------------------------------------------
    | TIME START
    |--------------------------------------------------------------------------
    */

    $timeStart = '';

    if (!empty($row->time_start)) {

        $timeStart = date(
            "h:i A",
            strtotime($row->time_start)
        );

    }



    /*
    |--------------------------------------------------------------------------
    | TIME END
    |--------------------------------------------------------------------------
    */

    $timeEnd = '';

    if (!empty($row->time_end)) {

        $timeEnd = date(
            "h:i A",
            strtotime($row->time_end)
        );

    }



    /*
    |--------------------------------------------------------------------------
    | DESCRIPTION
    |--------------------------------------------------------------------------
    */

    $description = '';

    if (!empty($row->description)) {

        $description = htmlspecialchars(
            $row->description,
            ENT_QUOTES,
            'UTF-8'
        );

    }



    /*
    |--------------------------------------------------------------------------
    | ACTION
    |--------------------------------------------------------------------------
    */

    $action = '

        <div class="btn-group">

            <button
                type="button"
                class="btn btn-warning btn-sm editEntry"
                ID="'.$row->id.'"
                title="Edit"
            >

                <i class="fa fa-edit"></i>

            </button>


            <button
                type="button"
                class="btn btn-danger btn-sm deleteEntry"
                ID="'.$row->id.'"
                title="Delete"
            >

                <i class="fa fa-trash"></i>

            </button>

        </div>

    ';



    /*
    |--------------------------------------------------------------------------
    | ADD ROW
    |--------------------------------------------------------------------------
    */

    $data[] = [

        $number,

        $timeStart,

        $timeEnd,

        $description,

        $action

    ];


    $number++;

}



/*
|--------------------------------------------------------------------------
| RETURN JSON
|--------------------------------------------------------------------------
*/

echo json_encode([

    "draw" => $draw,

    "recordsTotal" => $recordsTotal,

    "recordsFiltered" => $recordsFiltered,

    "data" => $data

]);


exit;

?>