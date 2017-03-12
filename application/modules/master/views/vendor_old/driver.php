 
<div class="col-md-12 col-xs-12">
    <header class="panel-heading">
        <h2>Driver Vendor</h2>
    </header>
    <div class="form-group">
        <input type="hidden" id="vendor_driver_id" name="vendor_driver_id" class="form-control vendor_driver">
        <label>Driver Name</label>
        <input type="text" name="vendor_driver_name" id="vendor_driver_name" class="form-control vendor_driver" placeholder="Vendor Driver Name">
    </div>

    <div class="form-group">
        <label>Driver Phone</label>
        <input type="text" name="vendor_driver_phone" id="vendor_driver_phone" class="form-control vendor_driver" placeholder="Vendor Driver Phone">
    </div>

    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload Driver Licensed</label>

        <div id="fileuploader">Upload</div>
        <div id="extrabutton" class="ajax-file-upload-green">Start Upload</div>

        <input type="hidden" class="form-control vendor_driver" name="vendor_driver_license" id="vendor_driver_license" value="">
    </div>

    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload Driver ID Card</label>

        <div id="fileuploader_id">Upload</div>
        <div id="extrabutton_id" class="ajax-file-upload-green">Start Upload</div>

        <input type="hidden" class="form-control vendor_driver" name="vendor_driver_idcard" id="vendor_driver_idcard" value="">
    </div>

    <button type="button" class="btn btn-success" id="savedriverpic">Save</button>
    <button type="reset" class="btn btn-danger" id="canceldriverpic">Cancel</button>

    <div class="panel-body">
        <section id="flip-scroll">
            <table class="table table-bordered table-striped cf" id="tbl-driver-vendor">
                <thead class="cf">
                    <tr>
                        <th data-options="vendor_driver_name">Name</th>
                        <th data-options="vendor_driver_phone">Phone</th>
                        <th data-options="aksi">Option</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </section>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //semua yang ada disini akan di jalankan pertama kali ketika halaman di load

        var vendor_code = $("#vendor_code").val();

        //load isi tabel pic pertama kali saat vendor code sudah terisi
        if ($("#tbl-driver-vendor").hasClass("sapTable")) {
            $("#tbl-driver-vendor").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code
            });
            return false;
        } else {
            if (vendor_code != "") {
                $("#tbl-driver-vendor").sapTable({
                    url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code,
                    cSearch: {
                        'vendor_driver_name': 'Name',
                        'vendor_driver_phone': 'Phone'

                    },
                    showSearch: true,
                    formatters: {
                        "aksi": function () {
                            return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editDrv(\"" + vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;'>Edit</a> \n\
                              <a href='javascript:void(0)' onclick='delDrv(\"" + vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                        }
                    }
                });
            }
        }
        //end load table pic 

        //upload license
        var extraObj = $("#fileuploader").uploadFile({
            url: "<?php echo base_url('master/vendor/ajax_upload_files'); ?>",
            multiple: true,
            dragDrop: true,
            fileName: "myfile",
            autoSubmit: false,
            afterUploadAll: function (obj)
            {

                var filename = new Array();
                $.each(obj.responses, function (index, value) {
                    var isi = JSON.parse(value);
                    filename.push(isi.upload_data.file_name);
                });
                $("#vendor_driver_license").val(JSON.stringify(filename));


            }
        });

        $("#extrabutton").click(function () {
            extraObj.startUpload();
            $("#extrabutton").text("File Successfully Upload!");
            $("#extrabutton").addClass("disabled");
        });
        //upload license


        //upload idcard
        var extraObj_id = $("#fileuploader_id").uploadFile({
            url: "<?php echo base_url('master/vendor/ajax_upload_files_id'); ?>",
            multiple: true,
            dragDrop: true,
            fileName: "myfile_id",
            autoSubmit: false,
            afterUploadAll: function (obj)
            {

                var filename = new Array();
                $.each(obj.responses, function (index, value) {
                    var isi_id = JSON.parse(value);
                    filename.push(isi_id.upload_data.file_name);
                });
                $("#vendor_driver_idcard").val(JSON.stringify(filename));

            }
        });

        $("#extrabutton_id").click(function () {
            extraObj_id.startUpload();
            $("#extrabutton_id").text("File Successfully Upload!");
            $("#extrabutton_id").addClass("disabled");
        });
        //upload idcard






        $("#canceldriverpic").on('click', function () {
            $("#tbl-driver-vendor").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code
            });
        });

        //ketika area input vendor code diluar focus
        $("#vendor_code").focusout(function () {
            var vendor_code = $(this).val();

            if ($("#tbl-driver-vendor").hasClass("sapTable")) {
                $("#tbl-driver-vendor").refresh_sapTable({
                    url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code
                });
                return false;
            } else {
                if (vendor_code != "") {
                    $("#tbl-driver-vendor").sapTable({
                        url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code,
                        cSearch: {
                            'vendor_driver_name': 'Name',
                            'vendor_driver_phone': 'Phone'

                        },
                        formatters: function () {
                            return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editDrv(\"" + vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;'>Edit</a> \n\
                              <a href='javascript:void(0)' onclick='delDrv(\"" + vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                        }
                    });
                }
            }
        });






    });

    $("#savedriverpic").on("click", function () {
        //alert('ok');

        var dtVendorDrv = $(".vendor_driver").serializeArray();
        var vendor_code = $("#vendor_code").val();
        var vendor_driver_id = $("#vendor_driver_id").val();
        var url;
        var dt = {vendor_code: vendor_code, dtpost: dtVendorDrv};
        //console.log(dt);

        $.ajax({
            type: "post",
            url: "<?php echo base_url('master/vendor/pro_store_vendor_drv/'); ?>",
            data: dt,
            dataType: "json",
            success: function (hasil) {
                if (hasil.success == true) {
                    $("#tbl-driver-vendor").sapTable_refresh();
                    $(".vendor_driver").val("");
                    $("#vendor_driver_name").focus();
                }
            }
        })

        return false;

    });

    //ketika tombol delete ditekan
    function delDrv(vendor_code, vendor_phone) {
        var dt = {vendor_code: vendor_code, vendor_driver_phone: vendor_phone};
        var result = confirm("Want to delete ?");
        if (result) {

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('master/vendor/pro_delete_vendor_driver'); ?>",
                data: dt,
                dataType: 'json',
                success: function (hasil) {
                    if (hasil.success == true) {
                        $("#tbl-driver-vendor").refresh_sapTable({
                            url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code
                        });
                        //alert('kehapus');
                    }
                }
            })
        }
        return false;
    }

    //ketika tombol edit diklik
    function editDrv(vendor_code, vendor_driver_phone) {
        var dt = {vendor_code: vendor_code, vendor_driver_phone: vendor_driver_phone};
        console.log(dt);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('master/vendor/get_data_driver_vendor'); ?>",
            data: dt,
            dataType: 'json',
            success: function (hasil) {
                $.map(hasil, function (value, key) {
                    if (key != 'code_vendor')
                        $("#" + key).val(value);
                });
            }
        })
        return false;
    }

</script>