<?php

require_once("../../include/initialize.php");

confirm_logged_in();

$view = isset($_GET['view']) ? $_GET['view'] : '';

switch ($view) {

    case 'view':
        $content = 'view.php';
        $title = 'Classroom Module';
        $header = 'Classroom';
        break;

    default:
        $content = 'list.php';
        $title = 'Classroom Module';
        $header = 'Classroom';
        break;
}

require_once("../../theme/template.php");

?>

<script>

$(document).ready(function () {

    $('#tblclassroom').DataTable({

        processing: true,

        serverSide: true,

        ajax: {
            url: '<?php echo WEB_ROOT; ?>module/classroom/ajax.php',

            type: 'POST',

            dataSrc: function (json) {

                console.log("Classroom AJAX Response:", json);

                if (json.error) {

                    console.error("Classroom AJAX Error:", json.error);

                    return [];
                }

                return json.data;
            },

            error: function (xhr, error, thrown) {

                console.error("Classroom AJAX Error");
                console.error("Status:", xhr.status);
                console.error("Response:", xhr.responseText);
                console.error("Error:", error);
                console.error("Thrown:", thrown);

            }
        },

        columns: [

            {
                data: 0,
                orderable: false,
                searchable: false
            },

            {
                data: 1
            },

            {
                data: 2
            },

            {
                data: 3,
                orderable: false,
                searchable: false
            }

        ],

        order: [
            [1, 'asc']
        ],

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ]

    });


    /*
    |--------------------------------------------------------------------------
    | EDIT CLASSROOM
    |--------------------------------------------------------------------------
    */

    window.editClassroom = function (id) {

        $.ajax({

            url: '<?php echo WEB_ROOT; ?>module/classroom/ajax.php',

            type: 'POST',

            dataType: 'json',

            data: {
                ID: id
            },

            success: function (response) {

                console.log("Edit Response:", response);

                if (response.status === 'success') {

                    $('#ID').val(response.data.id);

                    $('#NAME1').val(response.data.name);

                    $('#DESCRIPTION1').val(
                        response.data.description
                    );

                    $('#editClassroomModal').modal('show');

                } else {

                    alert(
                        response.message ||
                        'Unable to load classroom.'
                    );

                }

            },

            error: function (xhr) {

                console.error(
                    "Edit AJAX Error:",
                    xhr.responseText
                );

                alert('Unable to load classroom.');

            }

        });

    };


    /*
    |--------------------------------------------------------------------------
    | DELETE CLASSROOM
    |--------------------------------------------------------------------------
    */

    window.deleteClassroom = function (id) {

        if (confirm('Are you sure you want to delete this classroom?')) {

            window.location.href =
                '<?php echo WEB_ROOT; ?>module/classroom/controller.php?action=delete&id='
                + id;

        }

    };

});

</script>