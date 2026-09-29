<?php
/*
|--------------------------------------------------------------------------
| SCHEDULE TIME LIST
|--------------------------------------------------------------------------
*/
?>

<section class="content">

    <div class="container-fluid">

        <?php check_message(); ?>


        <div class="row">

            <div class="col-12">

                <div class="card">


                    <!-- =====================================================
                         CARD HEADER
                    ====================================================== -->

                    <div class="card-header">

                        <h3 class="card-title">

                            List of Schedule Times

                        </h3>

                    </div>


                    <!-- =====================================================
                         CARD BODY
                    ====================================================== -->

                    <div class="card-body">


                        <!-- =================================================
                             SCHEDULE TIME TABLE
                        ================================================== -->

                        <table
                            id="tblscheduletime"
                            class="table table-bordered table-striped"
                        >

                            <thead>

                                <tr>

                                    <th width="5%">
                                        #
                                    </th>

                                    <th>
                                        TIME START
                                    </th>

                                    <th>
                                        TIME END
                                    </th>

                                    <th>
                                        DESCRIPTION
                                    </th>

                                    <th width="15%">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            </tbody>


                            <tfoot>

                            </tfoot>

                        </table>


                        <!-- =================================================
                             ADD NEW BUTTON
                             SAME POSITION AS SET SCHEDULE
                        ================================================== -->

                        <div class="btn-group">

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#AddNewEntry"
                            >

                                Add New

                            </button>

                        </div>


                    </div>


                    <!-- =====================================================
                         CARD FOOTER
                    ====================================================== -->

                    <div class="card-footer">

                        <small class="text-muted">

                            Manage schedule time periods used by the
                            Set Schedule module.

                        </small>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>



<!-- ====================================================================
     ADD NEW SCHEDULE TIME MODAL
===================================================================== -->

<div
    class="modal fade"
    id="AddNewEntry"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>

    <div class="modal-dialog">

        <form
            action="controller.php?action=add"
            method="POST"
        >

            <div class="modal-content">


                <!-- =====================================================
                     MODAL HEADER
                ====================================================== -->

                <div class="modal-header">

                    <h4 class="modal-title">

                        Add New Schedule Time

                    </h4>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >

                        <span aria-hidden="true">

                            &times;

                        </span>

                    </button>

                </div>



                <!-- =====================================================
                     MODAL BODY
                ====================================================== -->

                <div class="modal-body">

                    <div class="row">


                        <!-- TIME START -->

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label
                                    for="TIME_START"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Time Start

                                </label>


                                <input
                                    type="time"
                                    class="form-control form-control-sm"
                                    name="TIME_START"
                                    id="TIME_START"
                                    required
                                >

                            </div>

                        </div>



                        <!-- TIME END -->

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label
                                    for="TIME_END"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Time End

                                </label>


                                <input
                                    type="time"
                                    class="form-control form-control-sm"
                                    name="TIME_END"
                                    id="TIME_END"
                                    required
                                >

                            </div>

                        </div>



                        <!-- DESCRIPTION -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="DESCRIPTION"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Description

                                </label>


                                <textarea
                                    class="form-control form-control-sm"
                                    name="DESCRIPTION"
                                    id="DESCRIPTION"
                                    rows="3"
                                    placeholder="e.g. Morning Class"
                                ></textarea>

                            </div>

                        </div>


                    </div>

                </div>



                <!-- =====================================================
                     MODAL FOOTER
                ====================================================== -->

                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="save"
                    >

                        Save changes

                    </button>

                </div>


            </div>

        </form>

    </div>

</div>



<!-- ====================================================================
     EDIT SCHEDULE TIME MODAL
===================================================================== -->

<div
    class="modal fade"
    id="editEntry"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>

    <div class="modal-dialog">

        <form
            action="controller.php?action=edit"
            method="POST"
        >

            <div class="modal-content">


                <!-- =====================================================
                     MODAL HEADER
                ====================================================== -->

                <div class="modal-header">

                    <h4 class="modal-title">

                        Modify Schedule Time

                    </h4>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >

                        <span aria-hidden="true">

                            &times;

                        </span>

                    </button>

                </div>



                <!-- =====================================================
                     MODAL BODY
                ====================================================== -->

                <div class="modal-body">

                    <div class="row">


                        <!-- HIDDEN ID -->

                        <input
                            type="hidden"
                            name="ID"
                            id="ID"
                        >



                        <!-- TIME START -->

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label
                                    for="TIME_START1"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Time Start

                                </label>


                                <input
                                    type="time"
                                    class="form-control form-control-sm"
                                    name="TIME_START1"
                                    id="TIME_START1"
                                    required
                                >

                            </div>

                        </div>



                        <!-- TIME END -->

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label
                                    for="TIME_END1"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Time End

                                </label>


                                <input
                                    type="time"
                                    class="form-control form-control-sm"
                                    name="TIME_END1"
                                    id="TIME_END1"
                                    required
                                >

                            </div>

                        </div>



                        <!-- DESCRIPTION -->

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label
                                    for="DESCRIPTION1"
                                    class="col-form-label col-form-label-sm"
                                >

                                    Description

                                </label>


                                <textarea
                                    class="form-control form-control-sm"
                                    name="DESCRIPTION1"
                                    id="DESCRIPTION1"
                                    rows="3"
                                    placeholder="e.g. Morning Class"
                                ></textarea>

                            </div>

                        </div>


                    </div>

                </div>



                <!-- =====================================================
                     MODAL FOOTER
                ====================================================== -->

                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                        name="edit"
                    >

                        Save changes

                    </button>

                </div>


            </div>

        </form>

    </div>

</div>