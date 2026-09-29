<?php

require_once("../../include/initialize.php");

$view = (isset($_GET['view']) && $_GET['view'] != '')
    ? $_GET['view']
    : '';

$title = "Schedule Time Module";
$header = $view;

switch ($view) {

    case 'list':
        $content = 'list.php';
        break;

    case 'view':
        $content = 'view.php';
        break;

    default:
        $content = 'list.php';
        break;
}

require_once("../../theme/template.php");

?>

<script type="text/javascript">

$(document).ready(function() {

    var t = $('#tblscheduletime').DataTable({

        "processing": true,

        "serverSide": true,

        "order": [],

        "ajax": {
            "url": "<?php echo WEB_ROOT; ?>module/scheduletime/ajax.php",
            "type": "POST"
        },

        "columnDefs": [

            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },

            {
                "searchable": false,
                "orderable": false,
                "targets": 4
            }

        ],

        "order": [
            [1, "asc"]
        ]

    });


    /*
    |--------------------------------------------------------------------------
    | NUMBER COLUMN
    |--------------------------------------------------------------------------
    */

    t.on('order.dt search.dt', function() {

        t.column(
            0,
            {
                search: 'applied',
                order: 'applied'
            }
        ).nodes().each(function(cell, i) {

            cell.innerHTML = i + 1;

        });

    }).draw();


    /*
    |--------------------------------------------------------------------------
    | EDIT SCHEDULE TIME
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.editEntry', function() {

        var ID = $(this).attr('ID');

        $.ajax({

            url: "<?php echo WEB_ROOT; ?>module/scheduletime/ajax.php",

            type: "POST",

            data: {
                ID: ID
            },

            dataType: "json",

            success: function(data) {

                if (!data || data.error) {

                    Swal.fire(
                        'Error',
                        data.error || 'Schedule time not found.',
                        'error'
                    );

                    return;
                }


                $('#ID').val(data.ID);

                $('#TIME_START1').val(data.TIME_START);

                $('#TIME_END1').val(data.TIME_END);

                $('#DESCRIPTION1').val(data.DESCRIPTION);

                $('#editEntry').modal('show');

            },

            error: function(xhr) {

                console.log(xhr.responseText);

                Swal.fire(
                    'Error',
                    'Unable to load schedule time.',
                    'error'
                );

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | DELETE SCHEDULE TIME
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.deleteEntry', function() {

        var ID = $(this).attr('ID');

        Swal.fire({

            title: 'Delete Schedule Time?',

            text: 'This action cannot be undone.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'Yes, delete it',

            cancelButtonText: 'Cancel'

        }).then(function(result) {

            if (result.value) {

                window.location.href =
                    "<?php echo WEB_ROOT; ?>module/scheduletime/controller.php?action=delete&id="
                    + ID;

            }

        });

    });

});

</script>