<div class="col-md-12 col-xs-12">
    <header class="panel-heading">
        <h2>PIC Vendor  </h2>
    </header>
    <div class="form-group">
        <input type="hidden" id="vendor_pic_id" name="vendor_pic_id" class="form-control vendor_pic">

        <label>PIC Name</label>
        <input type="text" name="vendor_pic_name" id="vendor_pic_name" class="form-control vendor_pic" placeholder="vendor PIC Name">
    </div>

    <div class="form-group">
        <label>PIC Position</label>
        <select name="vendor_pic_position" id="vendor_pic_position" class="form-control vendor_pic">
            <option value="">- Choose Position -</option>
            <?php
            foreach ($list_position as $lposition) {
                echo '<option value="' . $lposition->id . '"> ' . $lposition->position_name . ' </option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>PIC Address</label>
        <input type="text" name="vendor_pic_address" id="vendor_pic_address" class="form-control vendor_pic" placeholder="Vendor PIC Address">
    </div>

    <div class="form-group">
        <label>PIC Email</label>
        <input type="text" name="vendor_pic_email" id="vendor_pic_email" class="form-control vendor_pic" placeholder="Vendor PIC Email">
    </div>
    <div class="form-group">
        <label>PIC Phone</label>
        <input type="text" name="vendor_pic_phone" id="vendor_pic_phone" class="form-control vendor_pic" placeholder="Vendor PIC Phone">
    </div>

    <input type="button" class="btn btn-success"  value="Save" id="savepic" />
    <button type="reset" class="btn btn-danger" id="cancelpic">Cancel</button>

    <button type="button" class="btn btn-success" id="refrespic">Refresh</button>


    <div class="panel-body">
        <section id="flip-scroll">
            <table id="tbl-vendor-pic" class="table table-bordered table-striped cf">
                <thead class="cf">
                    <tr>
                        <th data-options="vendor_pic_name">Name</th>
                        <th data-options="vendor_code">Code</th>
                        <th data-options="position_name">Position</th>
                        <th data-options="vendor_pic_phone">Phone</th>
                        <th data-options="vendor_pic_email">Email</th>
                        <th data-options="aksi_pic">Option</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </section>
    </div>
</div>

<script type="text/javascript">
    var vendor_code = $("#vendor_code").val();
    $(document).ready(function () {
        //semua yang ada disini akan di jalankan pertama kali ketika halaman di load


        //console.log(vendor_code);
        //load isi tabel pic pertama kali saat vendor code sudah terisi
        if ($("#tbl-vendor-pic").hasClass("sapTable")) {
            $("#tbl-vendor-pic").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
            });
            return false;
        } else {

            $("#tbl-vendor-pic").sapTable({
                url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code,
                cSearch: {
                    'vendor_pic_name': 'Name',
                    'position_name': 'Position',
                    'vendor_pic_phone': 'Phone',
                    'vendor_pic_email': 'Email'
                },
                showSearch: true,
                formatters: {
                    "aksi_pic" : function(){
                        var aksi = "CUOLUM";
                        return aksi;
                    }
                    /*
                    "aksi_pic_vendor": function () {
                        var button = "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + code_customer + "\",\"" + rows.vendor_pic_email + "\");return false;'>Edit</a> \n\
                <a href='javascript:void(0)' onclick='delPIC(\"" + vendor_code + "\",\"" + rows.vendor_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>";
                        return button;
                    }
                    */

                }

            });

            //end load table pic 
        }


    });
    //ketika tombol save pada PIC di klik
    $("#savepic").on("click", function () {

        var dtVendorPIC = $(".vendor_pic").serializeArray();
        var vendor_code = $("#vendor_code").val();
        var vendor_pic_id = $("#vendor_pic_id").val();
        var url;
        var dt = {vendor_code: vendor_code, dtpost: dtVendorPIC};
        //console.log(dt);
        url = "<?php echo base_url('master/vendor/pro_store_vendor_pic'); ?>";
        $.ajax({
            type: "post",
            url: url,
            data: dt,
            dataType: "json",
            success: function (hasil) {
                if (hasil.success == true) {
                    $("#tbl-vendor-pic").refresh_sapTable({
                        url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
                    });
                    $(".vendor_pic").val("");
                    $("#vendor_pic_name").focus();
                }
            }
        })

        return false;


    });

    //ketika area input vendor code diluar focus
    $("#vendor_code").focusout(function () {
        var vcode = $("#vendor_code").val();

        if ($("#tbl-vendor-pic").hasClass("sapTable")) {
            $("#tbl-vendor-pic").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vcode
            });
            return false;
        } else {
            if (vendor_code != "") {
                $("#tbl-vendor-pic").sapTable({
                    url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vcode,
                    cSearch: {
                        'a.vendor_pic_name': 'Name',
                        'b.position_name': 'Position',
                        'a.vendor_pic_phone': 'Phone',
                        'a.vendor_pic_email': 'Email'
                    },
                    formatters: function () {
                        //console.log(rows);
                        return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPICRR(\"" + vcode + "\",\"" + rows.vendor_pic_email + "\");return false;'>Edit</a> \n\
                          <a href='javascript:void(0)' onclick='delPIC(\"" + vcode + "\",\"" + rows.vendor_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                    }
                });
            }
        }
    });

    //ketika tombol delete ditekan
    function delPIC(vendor_code, emailPIC) {
        var dt = {vendor_code: vendor_code, vendor_pic_email: emailPIC};
        var result = confirm("Want to delete ?");
        if (result) {

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('master/vendor/pro_delete_vendor_pic'); ?>",
                data: dt,
                dataType: 'json',
                success: function (hasil) {
                    if (hasil.success == true) {
                        $("#tbl-vendor-pic").refresh_sapTable({
                            url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
                        });
                        //alert('kehapus');
                    }
                }
            })
        }
        return false;
    }

    function editPIC(vendor_code, vendor_pic_email) {
        //alert(vcode);
        var dt = {vendor_code: vendor_code, vendor_pic_email: vendor_pic_email};
        //console.log(dt);
        console.log(dt);
        //return false;
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('master/vendor/get_data_vendor_pic'); ?>",
            data: dt,
            dataType: 'json',
            success: function (hasil) {
                $.map(hasil, function (value, key) {
                    if (key != 'code_vendor')
                        $("#" + key).val(value);
                });
            }
        });
        return false;
    }

    function editPICRR(vendor_code, vendor_pic_email) {
        //alert(vcode);
        var dt = {vendor_code: vendor_code, vendor_pic_email: vendor_pic_email};
        //console.log(dt);
        console.log(dt);
        //return false;
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('master/vendor/get_data_vendor_pic'); ?>",
            data: dt,
            dataType: 'json',
            success: function (hasil) {
                $.map(hasil, function (value, key) {
                    if (key != 'code_vendor')
                        $("#" + key).val(value);
                });
            }
        });
        return false;
    }



    $("#refrespic").click(function () {
        /*
         var vendor_code = $("#vendor_code").val();
         $("#tbl-vendor-pic").refresh_sapTable({
         url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
         });
         */
        $("#tbl-vendor-pic").sapTable_refresh();
    });


</script>