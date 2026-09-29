<section class="content">

    <div class="container-fluid">

        <?php check_message(); ?>

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            List of Schedule Days
                        </h3>

                    </div>

                    <div class="card-body">

                        <table
                            id="tblscheduleday"
                            class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="5%">#</th>

                                    <th>Day Name</th>

                                    <th>Description</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>
                            </tbody>

                            <tfoot>
                            </tfoot>

                        </table>

                        <div class="btn-group">

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#AddNewEntry">

                                Add New

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     ADD SCHEDULE DAY MODAL
========================================================= -->

<div class="modal fade" id="AddNewEntry">

    <div class="modal-dialog">

        <form
            action="controller.php?action=add"
            method="POST">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Add New Schedule Day
                    </h4>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">

                        <span aria-hidden="true">
                            &times;
                        </span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="NAME"
                                    class="col-form-label col-form-label-sm">

                                    Day Name

                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="NAME"
                                    id="NAME"
                                    placeholder="e.g. Monday"
                                    required>

                            </div>

                        </div>


                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="DESCRIPTION"
                                    class="col-form-label col-form-label-sm">

                                    Description

                                </label>

                                <textarea
                                    class="form-control form-control-sm"
                                    name="DESCRIPTION"
                                    id="DESCRIPTION"
                                    placeholder="Short description"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal">

                        Close

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="save">

                        Save changes

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     EDIT SCHEDULE DAY MODAL
========================================================= -->

<div class="modal fade" id="editEntry">

    <div class="modal-dialog">

        <form
            action="controller.php?action=edit"
            method="POST">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Modify Schedule Day
                    </h4>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">

                        <span aria-hidden="true">
                            &times;
                        </span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <input
                            type="hidden"
                            name="ID"
                            id="ID">


                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="NAME1"
                                    class="col-form-label col-form-label-sm">

                                    Day Name

                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="NAME1"
                                    id="NAME1"
                                    placeholder="Day Name"
                                    required>

                            </div>

                        </div>


                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="DESCRIPTION1"
                                    class="col-form-label col-form-label-sm">

                                    Description

                                </label>

                                <textarea
                                    class="form-control form-control-sm"
                                    name="DESCRIPTION1"
                                    id="DESCRIPTION1"
                                    placeholder="Short description"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal">

                        Close

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="edit">

                        Save changes

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>