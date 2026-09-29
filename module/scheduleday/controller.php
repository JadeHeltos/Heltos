<?php

require_once("../../include/initialize.php");

global $mydb;


/*
|--------------------------------------------------------------------------
| ACTION
|--------------------------------------------------------------------------
*/

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'add') {

    doAdd();

} elseif ($action == 'edit') {

    doEdit();

} elseif ($action == 'delete') {

    doDelete();

} else {

    redirect('index.php');
}


/*
|--------------------------------------------------------------------------
| ADD SCHEDULE DAY
|--------------------------------------------------------------------------
*/

function doAdd()
{
    global $mydb;

    $name = isset($_POST['NAME'])
        ? trim($_POST['NAME'])
        : '';

    $description = isset($_POST['DESCRIPTION'])
        ? trim($_POST['DESCRIPTION'])
        : '';


    /* VALIDATE */

    if ($name == '') {

        message(
            "Please provide a schedule day.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* ESCAPE */

    $name = addslashes($name);
    $description = addslashes($description);


    /* CHECK DUPLICATE */

    $mydb->setQuery("
        SELECT id
        FROM tblscheduleday
        WHERE name = '".$name."'
        LIMIT 1
    ");

    $existing = $mydb->loadResultList();


    if (count($existing) > 0) {

        message(
            "That schedule day already exists.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* INSERT */

    $sql = "
        INSERT INTO tblscheduleday
        (
            name,
            description
        )
        VALUES
        (
            '".$name."',
            '".$description."'
        )
    ";


    $result = $mydb->InsertThis($sql);


    if ($result === true) {

        message(
            "Schedule day has been added successfully!",
            "success"
        );

    } else {

        message(
            "Schedule day could not be added.",
            "error"
        );
    }


    redirect('index.php');
}


/*
|--------------------------------------------------------------------------
| EDIT SCHEDULE DAY
|--------------------------------------------------------------------------
*/

function doEdit()
{
    global $mydb;

    $id = isset($_POST['ID'])
        ? intval($_POST['ID'])
        : 0;

    $name = isset($_POST['NAME1'])
        ? trim($_POST['NAME1'])
        : '';

    $description = isset($_POST['DESCRIPTION1'])
        ? trim($_POST['DESCRIPTION1'])
        : '';


    /* VALIDATE ID */

    if ($id <= 0) {

        message(
            "Invalid schedule day ID.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* VALIDATE NAME */

    if ($name == '') {

        message(
            "Please provide a schedule day.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* ESCAPE */

    $name = addslashes($name);
    $description = addslashes($description);


    /* CHECK RECORD */

    $mydb->setQuery("
        SELECT id
        FROM tblscheduleday
        WHERE id = '".$id."'
        LIMIT 1
    ");

    $record = $mydb->loadResultList();


    if (count($record) == 0) {

        message(
            "The selected schedule day does not exist.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* CHECK DUPLICATE */

    $mydb->setQuery("
        SELECT id
        FROM tblscheduleday
        WHERE name = '".$name."'
        AND id != '".$id."'
        LIMIT 1
    ");

    $duplicate = $mydb->loadResultList();


    if (count($duplicate) > 0) {

        message(
            "Another schedule day with this name already exists.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /* UPDATE */

    $sql = "
        UPDATE tblscheduleday
        SET
            name = '".$name."',
            description = '".$description."'
        WHERE id = '".$id."'
    ";


    $result = $mydb->InsertThis($sql);


    if ($result === true) {

        message(
            "Schedule day has been updated successfully!",
            "success"
        );

    } else {

        message(
            "Schedule day could not be updated.",
            "error"
        );
    }


    redirect('index.php');
}


/*
|--------------------------------------------------------------------------
| DELETE SCHEDULE DAY
|--------------------------------------------------------------------------
*/

function doDelete()
{
    global $mydb;

    $id = isset($_GET['id'])
        ? intval($_GET['id'])
        : 0;


    /* VALIDATE ID */

    if ($id <= 0) {

        message(
            "Invalid schedule day ID.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK IF USED IN SET SCHEDULE
    |--------------------------------------------------------------------------
    */

    $mydb->setQuery("
        SELECT id
        FROM tblsetschedule
        WHERE day_id = '".$id."'
        LIMIT 1
    ");

    $used = $mydb->loadResultList();


    if (count($used) > 0) {

        message(
            "This schedule day cannot be deleted because it is already used in a schedule.",
            "error"
        );

        redirect('index.php');
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    $sql = "
        DELETE FROM tblscheduleday
        WHERE id = '".$id."'
    ";


    $result = $mydb->InsertThis($sql);


    if ($result === true) {

        message(
            "Schedule day has been deleted successfully!",
            "success"
        );

    } else {

        message(
            "Schedule day could not be deleted.",
            "error"
        );
    }


    redirect('index.php');
}

?>