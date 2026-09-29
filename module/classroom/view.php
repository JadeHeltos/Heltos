```php
<?php

$classroom = null;


if (isset($_GET['id']) && $_GET['id'] != '') {

    $classroom_id = (int)$_GET['id'];


    $mydb->setQuery("
        SELECT *
        FROM tblclassroom
        WHERE id = '".$classroom_id."'
        LIMIT 1
    ");


    $classroom = $mydb->loadSingleResult();

}

?>

<section class="content">

    <div class="container-fluid">


        <?php if (!$classroom): ?>


            <div class="alert alert-warning">

                No classroom was selected.

                Please go back to the

                <a href="<?php echo WEB_ROOT; ?>module/classroom/">

                    classroom list

                </a>

                and click the view button of a classroom.

            </div>


        <?php else: ?>


            <div class="row">


                <!-- LEFT SIDE -->

                <div class="col-md-4">


                    <!-- CLASSROOM SUMMARY -->

                    <div class="card card-primary card-outline">

                        <div class="card-body box-profile">


                            <div class="text-center">

                                <i
                                    class="fa fa-home"
                                    style="font-size:64px;color:#8B0000;">
                                </i>

                            </div>


                            <h3 class="profile-username text-center">

                                <?php

                                echo htmlspecialchars(
                                    $classroom->name
                                );

                                ?>

                            </h3>


                            <p class="text-muted text-center">

                                Classroom

                            </p>


                            <ul class="list-group list-group-unbordered mb-3">


                                <li class="list-group-item">

                                    <b>Classroom ID</b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $classroom->id
                                        );

                                        ?>

                                    </span>

                                </li>


                                <li class="list-group-item">

                                    <b>Name</b>

                                    <span class="float-right">

                                        <?php

                                        echo htmlspecialchars(
                                            $classroom->name
                                        );

                                        ?>

                                    </span>

                                </li>


                            </ul>


                            <a
                                href="<?php echo WEB_ROOT; ?>module/classroom/"
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

                                echo !empty($classroom->description)

                                    ? nl2br(
                                        htmlspecialchars(
                                            $classroom->description
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

                                <i class="fa fa-home"></i>

                                Classroom Information

                            </h3>

                        </div>


                        <div class="card-body">


                            <table class="table table-bordered">


                                <tbody>


                                    <tr>

                                        <th width="25%">
                                            Classroom ID
                                        </th>

                                        <td>

                                            <?php

                                            echo htmlspecialchars(
                                                $classroom->id
                                            );

                                            ?>

                                        </td>

                                    </tr>


                                    <tr>

                                        <th>
                                            Classroom Name
                                        </th>

                                        <td>

                                            <?php

                                            echo htmlspecialchars(
                                                $classroom->name
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
                                                $classroom->description
                                            )

                                                ? nl2br(
                                                    htmlspecialchars(
                                                        $classroom->description
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
```
