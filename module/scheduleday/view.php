<?php

$schedule_day = null;


if (isset($_GET['id']) && $_GET['id'] != '') {

    $schedule_day_id = (int)$_GET['id'];


    $mydb->setQuery("
        SELECT *
        FROM tblscheduleday
        WHERE id = '".$schedule_day_id."'
        LIMIT 1
    ");


    $schedule_day = $mydb->loadSingleResult();

}

?>

<section class="content">

    <div class="container-fluid">


        <?php if (!$schedule_day): ?>


            <div class="alert alert-warning">

                No schedule day was selected.

                Please go back to the

                <a href="<?php echo WEB_ROOT; ?>module/scheduleday/">

                    schedule day list

                </a>

                and click the view button of a schedule day.

            </div>


        <?php else: ?>


            <div class="row">


                <!-- LEFT SIDE -->

                <div class="col-md-4">


                    <!-- SUMMARY -->

                    <div class="card card-primary card-outline">

                        <div class="card-body box-profile">


                            <div class="text-center">

                                <i
                                    class="fa fa-calendar"
                                    style="font-size:64px;color:#8B0000;">
                                </i>

                            </div>


                            <h3 class="profile-username text-center">

                                <?php

                                echo htmlspecialchars(
                                    $schedule_day->name
                                );

                                ?>

                            </h3>


                            <p class="text-muted text-center">

                                Schedule Day

                            </p>


                            <ul class="list-group list-group-unbordered mb-3">


                                <li class="list-group-item">

                                    <b>Schedule Day ID</b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $schedule_day->id
                                        );

                                        ?>

                                    </span>

                                </li>


                                <li class="list-group-item">

                                    <b>Day</b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $schedule_day->name
                                        );

                                        ?>

                                    </span>

                                </li>


                            </ul>


                            <a
                                href="<?php echo WEB_ROOT; ?>module/scheduleday/"
                                class="btn btn-primary btn-block">

                                <b>Back to List</b>

                            </a>


                        </div>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="card card-secondary card-outline">


                        <div class="card-header">

                            <h3 class="card-title">

                                Description

                            </h3>

                        </div>


                        <div class="card-body">

                            <p class="text-muted">

                                <?php

                                echo !empty(
                                    $schedule_day->description
                                )

                                    ? nl2br(
                                        htmlspecialchars(
                                            $schedule_day->description
                                        )
                                    )

                                    : 'No description provided.';

                                ?>

                            </p>

                        </div>


                    </div>


                </div>


                <!-- RIGHT SIDE -->

                <div class="col-md-8">


                    <div class="card">


                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fa fa-calendar"></i>

                                Schedule Day Information

                            </h3>

                        </div>


                        <div class="card-body">


                            <table class="table table-bordered">


                                <tbody>


                                    <tr>

                                        <th width="25%">
                                            Schedule Day ID
                                        </th>

                                        <td>

                                            <?php

                                            echo htmlspecialchars(
                                                $schedule_day->id
                                            );

                                            ?>

                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            Day Name
                                        </th>

                                        <td>

                                            <?php

                                            echo htmlspecialchars(
                                                $schedule_day->name
                                            );

                                            ?>

                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            Description
                                        </th>

                                        <td>

                                            <?php

                                            echo !empty(
                                                $schedule_day->description
                                            )

                                                ? nl2br(
                                                    htmlspecialchars(
                                                        $schedule_day->description
                                                    )
                                                )

                                                : 'No description provided.';

                                            ?>

                                        </td>

                                    </tr>


                                </tbody>

                            </table>


                        </div>

                    </div>


                </div>


            </div>


        <?php endif; ?>


    </div>

</section>