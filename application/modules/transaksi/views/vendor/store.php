<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Vendor Registration Form
                </header>
                <div class="panel-body">
                    <form id="myform" class="uploaders"  role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>">
                        <input type="hidden" name="vendor_date_registration" value="<?php echo $vendor_date_registration; ?>">
                        <input type="hidden" name="oke" value="<?php echo $list->payment_type; ?>" id="key">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                                <input type="text" name="vendor_name" class="form-control" value="<?php echo $list->vendor_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Vendor Code</label>
                                <input type="text" name="vendor_code" id="vendor_code" class="form-control" value="<?php echo $list->vendor_code; ?>">
                            </div>
                            <div class="form-group">
                                <label>Upload NPWP</label>
                                <input type="file" name="upload_npwp" id="upload_npwp" class="form-control" >

                                <br>
                                <?php
                                if ($list->npwp != '') {
                                    ?>
                                    <h4> <label class="label label-default">  <?php echo "<a href=" . base_url('upload_files/' . $list->npwp) . " target='_blank'> " . $list->npwp . "</a>"; ?>  </label> </h4>
                                    <?php
                                } else {
                                    ?>

                                    <?php
                                }
                                ?>

                                <input type="hidden" name="npwp" id="filename" value="<?php echo $list->npwp; ?>">
                            </div>
                            <div class="form-group">
                                <label>Vendor Address</label>
                                <input type="text" name="vendor_address" class="form-control" value="<?php echo $list->vendor_address; ?>">
                            </div>
                            <div class="form-group">
                                <label>Vendor Email</label>
                                <input type="text" name="vendor_email" class="form-control" value="<?php echo $list->vendor_email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Vendor Phone</label>
                                <input type="text" name="vendor_phone" class="form-control" value="<?php echo $list->vendor_phone; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Bank</label>
                                <select name="id_bank" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    foreach ($list_bank as $row) {
                                        if ($row->id == $list->id_bank) {
                                            echo "<option value=" . $row->id . " selected=selected> " . $row->bank_name . "</option>";
                                        } else {
                                            echo "<option value=" . $row->id . "> " . $row->bank_name . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Account No.</label>
                                <input type="text" name="account_no" class="form-control" value="<?php echo $list->account_no; ?>">
                            </div>
                            <div class="form-group">
                                <label>Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="cash" <?php if ($list->payment_type == 'cash') {
                                        echo "selected=selected";
                                    } ?> >Cash</option>
                                    <option value="kredit" <?php if ($list->payment_type == 'kredit') {
                                        echo "selected=selected";
                                    } ?>>Kredit</option>
                                </select>
                            </div>
                            <div id="seleksi">
                                <div class="form-group">
                                    <label>TOP</label>
                                    <select name="top" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="45" <?php if ($list->top == '45') {
                                        echo "selected=selected";
                                    } ?> >45 Hari</option>
                                        <option value="90" <?php if ($list->top == '90') {
                                        echo "selected=selected";
                                    } ?> >90 Hari</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Service Type</label>
                                <select name="type_service" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="ftl" <?php if ($list->type_service == 'ftl') {
                                        echo "selected=selected";
                                    } ?> >FTL</option>
                                    <option value="ltl" <?php if ($list->type_service == 'ltl') {
                                        echo "selected=selected";
                                    } ?> >LTL</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Vendor Info</label>
                                <input type="text" name="vendor_info" value="<?php echo $list->vendor_info; ?>" class="form-control" value=" ">
                            </div>
                            <div class="form-group">
                                <label>Vendor Status  </label>
                                <select name="vendor_status" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="en" <?php if ($list->vendor_status == 'en') {
                                        echo "selected=selected";
                                    } ?> >Enable</option>
                                    <option value="ds" <?php if ($list->vendor_status == 'ds') {
                                        echo "selected=selected";
                                    } ?> >Disable</option>
                                </select>
                            </div>
                        </div>

                        <hr/>
                        <div style="clear: both;margin-bottom: 5px;"></div>

                        <div class="col-md-12 col-xs-12">
                            <!--tab nav start-->
                            <section class="panel">
                                <header class="panel-heading tab-bg-dark-navy-blue ">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">PIC</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#about">Driver</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#profile">Vehicle</a>
                                        </li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane active">
<?php
$this->load->view('vendor/pic');
?>
                                        </div>
                                        <div id="about" class="tab-pane">
<?php
$this->load->view('vendor/driver');
?>
                                        </div>
                                        <div id="profile" class="tab-pane">
<?php
$this->load->view('vendor/vehicle');
?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--tab nav start-->
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-shadow btn-success">Save</button>
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url('master/' . $this->router->fetch_class()); ?>">Cancel</a>
                        </div>

                    </form>

                </div>
            </section>
        </div>

    </div>
</section>




