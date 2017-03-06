
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Customer Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" action="<?php echo base_url($form_url); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="oke" value="<?php echo $list->payment_type; ?>" id="key">
                        <input type="hidden" name="id" value="<?php echo $list->id; ?>">
                        <input type="hidden" name="customer_date_registration" value="<?php echo $customer_date_registration; ?>">

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" name="customer_name" value="<?php echo $list->customer_name; ?>" class="form-control" placeholder="Customer Name">
                            </div>

                            <div class="form-group">
                                <label>Customer Code</label>
                                <input type="text" name="customer_code" id="customer_code" value="<?php echo $list->customer_code; ?>" class="form-control" placeholder="Customer Code">
                            </div>

                            <div class="form-group">
                                <label>Office Address</label>
                                <input type="text" name="office_address" id="office_address" value="<?php echo $list->office_address; ?>" class="form-control" placeholder="Office Address">
                            </div>

                            <div class="form-group">
                                <label>Office Email</label>
                                <input type="text" name="office_email" value="<?php echo $list->office_email; ?>" class="form-control" placeholder="Office Email">
                            </div>

                            <div class="form-group">
                                <label>Office Phone</label>
                                <input type="text" name="office_phone" value="<?php echo $list->office_phone; ?>" class="form-control" placeholder="Office Phone">
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Upload NPWP</label>
                                <input type="file" name="upload_npwp" id="upload_npwp" class="form-control">
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
                                <label>Payment Type</label>
                                <select name="payment_type" class="form-control" id="payment_type">
                                    <option value=""> --Pilih-- </option>
                                    <option value="cash" <?php
                                    if ($list->payment_type == 'cash') {
                                        echo "selected=selected";
                                    }
                                    ?> > Cash </option>
                                    <option value="kredit" <?php
                                    if ($list->payment_type == 'kredit') {
                                        echo "selected=selected";
                                    }
                                    ?>> Kredit </option>
                                </select>

                            </div>
                            <div id="seleksi">

                                <div class="form-group">
                                    <label>TOP</label>
                                    <select name="top" class="form-control">
                                        <option value="45" <?php
                                        if ($list->top == '45') {
                                            echo "selected=selected";
                                        }
                                        ?>> 45 Hari </option>
                                        <option value="90" <?php
                                        if ($list->top == '90') {
                                            echo "selected=selected";
                                        }
                                        ?>> 90 Hari </option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Customer Status</label>

                                <select name="customer_status" class="form-control">
                                    <option value=""> --Pilih-- </option>
                                    <option value="en" <?php
                                    if ($list->customer_status == 'en') {
                                        echo "selected=selected";
                                    }
                                    ?> > Enable </option>
                                    <option value="ds" <?php
                                    if ($list->customer_status == 'ds') {
                                        echo "selected=selected";
                                    }
                                    ?> > Disable </option>
                                </select>
                            </div>
                        </div>

                        <hr/>
                        <div style="clear: both;margin-bottom: 5px;"></div>

                        <div class="col-md-12 col-xs-12">

                            <div class="panel panel-primary" style="border: 1px solid #000;">
                                <div class="panel-heading">PIC Customer</div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" id="customer_pic_id" name="customer_pic_id" class="form-control customer_pic">
                                        <input type="text" id="customer_pic_name" name="customer_pic_name" class="form-control customer_pic" placeholder="Customer PIC Name">
                                    </div>

                                    <div class="form-group">
                                        <label>Position</label>
                                        <select name="customer_pic_position" id="customer_pic_position" class="form-control customer_pic"> 
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($list_position as $rowpos) {
                                                echo "<option value=" . $rowpos->id . "> " . $rowpos->position_name . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="customer_pic_phone" id="customer_pic_phone" class="form-control customer_pic" placeholder="Customer PIC Phone">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="customer_pic_email" id="customer_pic_email" class="form-control customer_pic" placeholder="Customer PIC Email">
                                    </div>

                                    <input type="button" class="btn btn-success"  value="Save" id="savepic" />
                                    <button type="reset" class="btn btn-danger" id="cancelpic">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="refreshpic">Refresh</button>


                                    <div class="panel-body">
                                        <section id="flip-scroll">
                                            <table class="table table-bordered table-striped cf" id="tbl-customer-pic">
                                                <thead class="cf">
                                                    <tr>
                                                        <th data-options="customer_pic_name">Name</th>
                                                        <th data-options="position_name">Position</th>
                                                        <th data-options="customer_pic_email">Email</th>
                                                        <th data-options="customer_pic_phone">Phone</th>
                                                        <th data-options="aksi">Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </section>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-shadow btn-block btn-success">Save</button>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-shadow btn-block btn-danger" href="<?php echo base_url('master/' . $this->router->fetch_class()); ?>">Cancel</a>
                            </div>

                        </div>
                    </form>

                </div>
            </section>
        </div>

    </div>
</section>

<script type="text/javascript">

    var base_url = "<?= base_url(); ?>";
    var code_customer = $("#customer_code").val();

    $(document).ready(function () {

        //panggil saat pertama kali dia di load


        if ($("#tbl-customer-pic").hasClass("sapTable")) {
            $("#tbl-customer-pic").refresh_sapTable({
                url: base_url + "master/customer/pic_customer_json/" + code_customer
            });
        } else {
            $("#tbl-customer-pic").sapTable({
                url: base_url + "master/customer/pic_customer_json/" + code_customer,
                cSearch: {
                    'customer_pic_name': 'Name',
                    'position_name': 'Position',
                    'customer_pic_phone': 'Phone',
                    'customer_pic_email': 'Email'
                },
                showSearch: true,
                formatters: {
                    "aksi": function () {
                            return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + code_customer + "\",\"" + rows.customer_pic_email + "\");return false;'>Edit</a> \n\
                            <a href='javascript:void(0)' onclick='delPIC(\"" + code_customer + "\",\"" + rows.customer_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                    }

                }
            });
        }

        $("#seleksi").hide();
        var key = $("#key").val();
        if (key == 'kredit') {
            $("#seleksi").show();
        }
    });

    $("#upload_npwp").change(function () {
        $("#filename").val($("#upload_npwp").val());
    });

    $("#payment_type").change(function () {
        if ($(this).val() == 'cash' || $(this).val() == '') {
            $("#seleksi").hide();
        } else {
            $("#seleksi").show();
        }
    });


    $("#b1").on("click", function () {
        var a = $("#ee").serializeArray();
        var s = JSON.stringify(a);
        console.log("s is ", s);
    });

    $("#savepic").click(function () {
        var dtCustPIC = $(".customer_pic").serializeArray();
        var customer_code = $("#customer_code").val();
        var customer_pic_id = $("#customer_pic_id").val();
        var url;
        if (customer_pic_id == '') {
            url = base_url + "master/customer/pro_store_pic";
        } else {
            url = base_url + "master/customer/pro_update_store_pic";
        }

        var dt = {custCode: customer_code, dtpost: dtCustPIC};

        $.ajax({
            type: "post",
            url: url,
            data: dt,
            dataType: "json",
            success: function (hasil) {
                
                if (hasil.success == true) {
                    $("#tbl-customer-pic").sapTable_refresh();

                    $(".customer_pic").val("");
                    $("#customer_pic_name").focus();
                }
            }
        })

        return false;
    })

    $("#cancelpic").click(function () {
        $(".customer_pic").val("");
        $("#customer_pic_name").focus();
        return false;
    })

    $("#customer_code").focusout(function () {
        var code_customer = $(this).val();

        if ($("#tbl-customer-pic").hasClass("sapTable")) {
            $("#tbl-customer-pic").refresh_sapTable({
                url: base_url + "master/customer/pic_customer_json/" + code_customer
            });
        } else {
            $("#tbl-customer-pic").sapTable({
                url: base_url + "master/customer/pic_customer_json/" + code_customer,
                cSearch: {
                    'customer_pic_name': 'Name',
                    'position_name': 'Position',
                    'customer_pic_phone': 'Phone',
                    'customer_pic_email': 'Email'
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + code_customer + "\",\"" + rows.customer_pic_email + "\");return false;'>Edit</a> \n\
                      <a href='javascript:void(0)' onclick='delPIC(\"" + code_customer + "\",\"" + rows.customer_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
            });
        }
    });



    function editPIC(custCode, emailPIC) {
        var dt = {code_customer: custCode, customer_pic_email: emailPIC};
        //console.log(dt);
        $.ajax({
            type: 'POST',
            url: base_url + "master/customer/get_data_pic",
            data: dt,
            dataType: 'json',
            success: function (hasil) {
                $.map(hasil, function (value, key) {
                    if (key != 'code_customer')
                        $("#" + key).val(value);
                });
            }
        })
        return false;
    }

    function delPIC(custCode, emailPIC) {
        var dt = {code_customer: custCode, customer_pic_email: emailPIC};
        //console.log(dt);
        
        var result = confirm("Want to delete ?");
        if (result) {

            $.ajax({
                type: 'POST',
                url: base_url + "master/customer/delete_pic_customer",
                data: dt,
                dataType: 'json',
                success: function (hasil) {
                    if (hasil.success == true) {
                        $("#tbl-customer-pic").sapTable_refresh();
                    }
                }
            })
        }
        return false;
    }

    $("#refreshpic").click(function () {
        $("#tbl-customer-pic").sapTable_refresh();
        //alert("OKE");
    });

</script>


