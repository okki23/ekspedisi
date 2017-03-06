
<div class="col-md-12 col-xs-12">
    <header class="panel-heading">
        <h2>Vehicle Vendor</h2>
    </header>
    <div class="form-group">
        <label>Vehicle No.</label>
         <input type="hidden" id="vendor_vehicle_id" name="vendor_vehicle_id" class="form-control vendor_vehicle">
        <input type="text" name="vendor_vehicle_no" id="vendor_vehicle_no" class="form-control vendor_vehicle" placeholder="Vendor Vehicle No">
    </div>
    <div class="form-group">
        <label>Vehicle Type</label>
        <select name="vendor_vehicle_type" type="vendor_vehicle_type" class="form-control vendor_vehicle">
            <option value="box"> Box </option>
            <option value="open_box"> Open Box </option>
        </select>
        
    </div>
    <div class="form-group">
        <label>Vehicle Sub Type</label>
         <select name="id_vehicle_type" type="id_vehicle_type" class="form-control vendor_vehicle">
            <?php
            foreach($list_vehicle as $row_vehicles){
                echo "<option value=".$row_vehicles->id."> ".$row_vehicles->name_vehicle."</option>";
            }
            ?>
        </select>
         
    </div>
    <div class="form-group">
        <label>Dimension</label>
        <input type="text" name="vendor_vehicle_box_dimension" id="vendor_vehicle_box_dimension" class="form-control vendor_vehicle" placeholder="ex :PxLxT">
    </div>
    <div class="form-group">
        <label>Cubication</label>
        <input type="text" name="vendor_vehicle_cubication" id="vendor_vehicle_cubication" class="form-control vendor_vehicle" placeholder="Cubication">
    </div>
    <div class="form-group">
        <label>Tonase</label>
        <input type="text" name="vendor_vehicle_tonase" id="vendor_vehicle_tonase" class="form-control vendor_vehicle" placeholder="Tonase">
    </div>
    
    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload Pink Slip</label>
        
        <div id="fileuploader_pink_slip">Upload</div>
        <div id="extrabutton_pink_slip" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_pink_slip" id="vendor_vehicle_pink_slip" value="">
    </div>
    
    <div class="form-group">
        <label>Pink Slip Expired </label>
        <input type="text" name="vendor_vehicle_pink_slip_expired" id="vendor_vehicle_pink_slip_expired" class="form-control vendor_vehicle datepicker " placeholder="Pink Slip Expired">
    </div>
    
    
    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload Tax</label>
        
        <div id="fileuploader_tax">Upload</div>
        <div id="extrabutton_tax" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_tax" id="vendor_vehicle_tax" value="">
    </div>
    
    <div class="form-group">
        <label>Tax Expired </label>
        <input type="text" name="vendor_vehicle_tax_expired" id="vendor_vehicle_tax_expired" class="form-control vendor_vehicle datepicker" placeholder="Tax Expired">
    </div>
    
    
     <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload Infraction</label>
        
        <div id="fileuploader_infraction">Upload</div>
        <div id="extrabutton_infraction" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_infraction" id="vendor_vehicle_infraction" value="">
    </div>
    
    <div class="form-group">
        <label>Infraction Expired </label>
        <input type="text" name="vendor_vehicle_infraction_expired" id="vendor_vehicle_infraction_expired" class="form-control vendor_vehicle datepicker" placeholder="Infraction Expired">
    </div>
 
    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload KIR</label>
        
        <div id="fileuploader_kir">Upload</div>
        <div id="extrabutton_kir" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_kir" id="vendor_vehicle_kir" value="">
    </div>
    
    <div class="form-group">
        <label>KIR Expired </label>
        <input type="text" name="vendor_vehicle_kir_expired" id="vendor_vehicle_kir_expired" class="form-control vendor_vehicle datepicker" placeholder="KIR Expired">
    </div>
    
    
     <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload SIPA</label>
        
        <div id="fileuploader_sipa">Upload</div>
        <div id="extrabutton_sipa" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_sipa" id="vendor_vehicle_sipa" value="">
    </div>
    
    <div class="form-group">
        <label>SIPA Expired </label>
        <input type="text" name="vendor_vehicle_sipa_expired" id="vendor_vehicle_sipa_expired" class="form-control vendor_vehicle datepicker" placeholder="SIPA Expired">
    </div>
    
    
     <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload IBM</label>
        
        <div id="fileuploader_ibm">Upload</div>
        <div id="extrabutton_ibm" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_ibm" id="vendor_vehicle_ibm" value="">
    </div>
    
    <div class="form-group">
        <label>IBM Expired </label>
        <input type="text" name="vendor_vehicle_ibm_expired" id="vendor_vehicle_ibm_expired" class="form-control vendor_vehicle datepicker" placeholder="IBM Expired">
    </div>
    
    
    <div class="form-group" style="border-top:1px solid grey; border-bottom:1px solid grey;">
        <label>Upload KIU</label>
        
        <div id="fileuploader_kiu">Upload</div>
        <div id="extrabutton_kiu" class="ajax-file-upload-green">Start Upload</div>
         
        <input type="hidden" class="form-control vendor_vehicle" name="vendor_vehicle_kiu" id="vendor_vehicle_kiu" value="">
    </div>
    
    <div class="form-group">
        <label>KIU Expired </label>
        <input type="text" name="vendor_vehicle_kiu_expired" id="vendor_vehicle_kiu_expired" class="form-control vendor_vehicle datepicker" placeholder="KIU Expired">
    </div>

    <button type="button" class="btn btn-success" id="savevhc">Save</button>
    <button type="reset" class="btn btn-danger" id="cancelvhc">Cancel</button>

    <div class="panel-body">
        <section id="flip-scroll">
            <table class="table table-bordered table-striped cf" id="tbl-vendor-vehicle">
                <thead class="cf">
                    <tr>
                        <th>Vehicle No.</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Sub Type</th>
                        <th>Cubication</th>
                        <th>Tonase</th>
                        <th>Option</th>
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
        if ($("#tbl-vendor-vehicle").hasClass("sapTable")) {
            $("#tbl-vendor-vehicle").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code
            });
            return false;
        } else {
            $("#tbl-vendor-vehicle").sapTable({
                url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code,
                cSearch: {
                    'vendor_vehicle_no': 'Vehicle No',
                    'vendor_vehicle_type': 'Vehicle Type',
                    'name_vehicle': 'Vehicle Sub Type',
                    'vendor_vehicle_cubication': 'Cubication',
                    'vendor_vehicle_tonase': 'Tonase'
               
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editvhc(\"" + vendor_code + "\",\"" + rows.vendor_vehicle_no + "\");return false;'>Edit</a> \n\
                              <a href='javascript:void(0)' onclick='delvhc(\"" + vendor_code + "\",\"" + rows.vendor_vehicle_no + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
            });
        }
        //end load table pic 
 
  
        //fileuploader_pink_slip
        var extraObj_pink_slip = $("#fileuploader_pink_slip").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_pink_slip'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_pink_slip",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_pink_slip = JSON.parse(value);
                filename.push(isi_pink_slip.upload_data.file_name);
            });
            $("#vendor_vehicle_pink_slip").val(JSON.stringify(filename));
           
            
        }
        });

        $("#extrabutton_pink_slip").click(function (){
        extraObj_pink_slip.startUpload();
            $("#extrabutton_pink_slip").text("File Successfully Upload!");
            $("#extrabutton_pink_slip").addClass("disabled");
        });
       //fileuploader_pink_slip
        
        
        //upload tax
        
        var extraObj_tax = $("#fileuploader_tax").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_tax'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_tax",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_tax = JSON.parse(value);
                filename.push(isi_tax.upload_data.file_name);
            });
            $("#vendor_vehicle_tax").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_tax").click(function (){
            extraObj_tax.startUpload();
            $("#extrabutton_tax").text("File Successfully Upload!");
            $("#extrabutton_tax").addClass("disabled");
        });
        //upload tax
        
        //upload infraction
        var extraObj_infraction = $("#fileuploader_infraction").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_infraction'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_infraction",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_infraction = JSON.parse(value);
                filename.push(isi_infraction.upload_data.file_name);
            });
            $("#vendor_vehicle_infraction").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_infraction").click(function (){
            extraObj_infraction.startUpload();
            $("#extrabutton_infraction").text("File Successfully Upload!");
            $("#extrabutton_infraction").addClass("disabled");
        });
        //upload infraction
        
        //upload kir
        var extraObj_kir = $("#fileuploader_kir").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_kir'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_kir",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_kir = JSON.parse(value);
                filename.push(isi_kir.upload_data.file_name);
            });
            $("#vendor_vehicle_kir").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_kir").click(function (){
            extraObj_kir.startUpload();
            $("#extrabutton_kir").text("File Successfully Upload!");
            $("#extrabutton_kir").addClass("disabled");
        });
        //upload kir
        
        
        //upload sipa
        var extraObj_sipa = $("#fileuploader_sipa").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_sipa'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_sipa",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_sipa = JSON.parse(value);
                filename.push(isi_sipa.upload_data.file_name);
            });
            $("#vendor_vehicle_sipa").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_sipa").click(function (){
            extraObj_sipa.startUpload();
            $("#extrabutton_sipa").text("File Successfully Upload!");
            $("#extrabutton_sipa").addClass("disabled");
        });
        //upload sipa
        
        
        //upload ibm
        var extraObj_ibm = $("#fileuploader_ibm").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_ibm'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_ibm",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_ibm = JSON.parse(value);
                filename.push(isi_ibm.upload_data.file_name);
            });
            $("#vendor_vehicle_ibm").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_ibm").click(function (){
            extraObj_ibm.startUpload();
            $("#extrabutton_ibm").text("File Successfully Upload!");
            $("#extrabutton_ibm").addClass("disabled");
        });
        //upload ibm
        
        
        //upload kiu
        var extraObj_iku = $("#fileuploader_kiu").uploadFile({
        url: "<?php echo base_url('master/vendor/ajax_upload_files_kiu'); ?>",
        multiple: true,
        dragDrop: true,
        fileName: "myfile_kiu",
        autoSubmit: false,
        afterUploadAll: function (obj)
        {
            
            var filename = new Array();
            $.each(obj.responses,function(index,value){
                var isi_kiu = JSON.parse(value);
                filename.push(isi_kiu.upload_data.file_name);
            });
            $("#vendor_vehicle_kiu").val(JSON.stringify(filename));
          
        }
        });

        $("#extrabutton_kiu").click(function (){
            extraObj_iku.startUpload();
            $("#extrabutton_kiu").text("File Successfully Upload!");
            $("#extrabutton_kiu").addClass("disabled");
        });
        //upload kiu
          
          
        
        $("#refreshvhc").on('click',function(){
           $("#tbl-vendor-vehicle").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code
            });
        });
        
        $("#cancelvhc").on('click',function(){
            $(".vendor_vehicle").val('');
        });
        
        //ketika area input vendor code diluar focus
        $("#vendor_code").focusout(function () {
        var vendor_code = $(this).val();

        
        if ($("#tbl-vendor-vehicle").hasClass("sapTable")) {
            $("#tbl-vendor-vehicle").refresh_sapTable({
                url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code
            });
            return false;
        } else {
            $("#tbl-vendor-vehicle").sapTable({
                url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code,
                cSearch: {
                    'vendor_vehicle_no': 'Vehicle No',
                    'vendor_vehicle_type': 'Vehicle Type',
                    'name_vehicle': 'Vehicle Sub Type',
                    'vendor_vehicle_cubication': 'Cubication',
                    'vendor_vehicle_tonase': 'Tonase'
               
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editvhc(\"" + vendor_code + "\",\"" + rows.vendor_vehicle_no + "\");return false;'>Edit</a> \n\
                            <a href='javascript:void(0)' onclick='delvhc(\"" + vendor_code + "\",\"" + rows.vendor_vehicle_no + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
            });
        }
        
    });
    
    
    
        
        
    
    });
    
    
    //ketika tombol delete ditekan
    function delvhc (vendor_code, vendor_vehicle_no) {
        var dt = {vendor_code: vendor_code, vendor_vehicle_no: vendor_vehicle_no};
        var result = confirm("Want to delete ?");
        if (result) {

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('master/vendor/pro_delete_vendor_vehicle'); ?>",
                data: dt,
                dataType: 'json',
                success: function (hasil) {
                    if (hasil.success == true) {
                        $("#tbl-vendor-vehicle").refresh_sapTable({
                            url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code
                        });
                        //alert('kehapus');
                    }
                }
            })
        }
        return false;
    }

    //ketika tombol edit diklik
    function editvhc(vendor_code, vendor_vehicle_no) {
        var dt = {vendor_code: vendor_code, vendor_vehicle_no: vendor_vehicle_no};
        console.log(dt);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('master/vendor/get_data_vehicle_vendor'); ?>",
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
    
    $("#savevhc").on("click", function () {
        //alert('ok');
       
        var dtVendorVhc = $(".vendor_vehicle").serializeArray();
        
        var vendor_code = $("#vendor_code").val();
        var vendor_vehicle_id = $("#vendor_vehicle_id").val();
        var url;
        var dt = {vendor_code: vendor_code, dtpost: dtVendorVhc};
        //console.log(dt);
         
        $.ajax({
            type: "post",
            url: "<?php echo base_url('master/vendor/pro_store_vendor_vhc/'); ?>",
            data: dt,
            dataType: "json",
            success: function (hasil) {
                if (hasil.success == true) {
                    $("#tbl-vendor-vehicle").refresh_sapTable({
                        url: "<?php echo base_url('master/vendor/vehicle_vendor_json/'); ?>" + vendor_code
                    });
                    $(".vendor_vehicle").val("");
                    $("#vendor_vehicle_name").focus();
                }
            }
        })

        return false;
       
        });
    
    
    
    $('#vendor_vehicle_pink_slip_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_tax_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_infraction_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_kir_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_sipa_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_ibm_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
    
    $('#vendor_vehicle_kiu_expired').datepicker({
            format: 'yyyy-mm-dd'
    });
        
</script>