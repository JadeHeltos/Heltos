<?php

$schedule_time = null;


if (isset($_GET['id']) && $_GET['id'] != '') {

    $schedule_time_id = (int)$_GET['id'];


    $mydb->setQuery("
        SELECT *
        FROM tblscheduletime
        WHERE id = '".$schedule_time_id."'
        LIMIT 1
    ");


    $schedule_time = $mydb->loadSingleResult();

}

?>

<section class="content">

    <div class="container-fluid">


        <?php if (!$schedule_time): ?>


            <div class="alert alert-warning">

                No schedule time was selected.

                Please go back to the

                <a href="<?php echo WEB_ROOT; ?>module/scheduletime/">

                    schedule time list

                </a>

                and click the view button of a schedule time.

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
                                    class="fa fa-clock"
                                    style="font-size:64px;color:#8B0000;">
                                </i>

                            </div>


                            <h3 class="profile-username text-center">

                                <?php

                                echo htmlspecialchars(
                                    date(
                                        "h:i A",
                                        strtotime(
                                            $schedule_time->time_start
                                        )
                                    )
                                );

                                ?>

                            </h3>


                            <p class="text-muted text-center">

                                Schedule Time

                            </p>


                            <ul class="list-group list-group-unbordered mb-3">


                                <li class="list-group-item">

                                    <b>Time Start</b>

                                    <span class="float-right">

                                        <?php

                                        echo date(
                                            "h:i A",
                                            strtotime(
                                                $schedule_time->time_start
                                            )
                                        );

                                        ?>

                                    </span>

                                </li>


                                <li class="list-group-item">

                                    <b>Time End</b>

                                    <span class="float-right">

                                        <?php

                                        echo date(
                                            "h:i A",
                                            strtotime(
                                                $schedule_time->time_end
                                            )
                                        );

                                        ?>

                                    </span>

                                </li>


                            </ul>


                            <a
                                href="<?php echo WEB_ROOT; ?>module/scheduletime/"
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
                                    $schedule_time->description
                                )

                                    ? nl2br(
                                        htmlspecialchars(
                                            $schedule_time->description
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

                                <i class="fa fa-clock"></i>

                                Schedule Time Information

                            </h3>

                        </div>


                        <div class="card-body">


                            <table class="table table-bordered">


                                <tbody>


                                    <tr>

                                        <th width="25%">
                                            Schedule Time ID
                                        </th>

                                        <td>

                                            <?php

                                            echo htmlspecialchars(
                                                $schedule_time->id
                                            );

                                            ?>

                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            Time Start
                                        </th>

                                        <td>

                                            <?php

                                            echo date(
                                                "h:i A",
                                                strtotime(
                                                    $schedule_time->time_start
                                                )
                                            );

                                            ?>

                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            Time End
                                        </th>

                                        <td>

                                            <?php

                                            echo date(
                                                "h:i A",
                                                strtotime(
                                                    $schedule_time->time_end
                                                )
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
                                                $schedule_time->description
                                            )

                                                ? nl2br(
                                                    htmlspecialchars(
                                                        $schedule_time->description
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