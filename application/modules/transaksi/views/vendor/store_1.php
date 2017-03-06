<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Vendor Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>">
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
                                if($list->npwp != ''){
                                ?>
                                 <h4> <label class="label label-default">  <?php echo "<a href=".base_url('upload_files/'.$list->npwp)." target='_blank'> ".$list->npwp. "</a>";?>  </label> </h4>
                                <?php
                                }else{
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
								foreach($list_bank as $row){
									if($row->id == $list->id_bank){
										 echo "<option value=".$row->id." selected=selected> ".$row->bank_name."</option>";
									}else{
										 echo "<option value=".$row->id."> ".$row->bank_name."</option>";
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
								<option value="cash" <?php if($list->payment_type == 'cash'){ echo "selected=selected"; } ?> >Cash</option>
								<option value="kredit" <?php if($list->payment_type == 'kredit'){ echo "selected=selected"; } ?>>Kredit</option>
								</select>
                            </div>
							<div id="seleksi">
                            <div class="form-group">
                                <label>TOP</label>
                                 <select name="top" class="form-control">
								<option value="">--Pilih--</option>
								<option value="45" <?php if($list->top == '45'){ echo "selected=selected"; } ?> >45 Hari</option>
								<option value="90" <?php if($list->top == '90'){ echo "selected=selected"; } ?> >90 Hari</option>
								</select>
                            </div>
							</div>
							
                            <div class="form-group">
                                <label>Service Type</label>
                                <select name="type_service" class="form-control">
								<option value="">--Pilih--</option>
								<option value="ftl" <?php if($list->type_service == 'ftl'){ echo "selected=selected"; } ?> >FTL</option>
								<option value="ltl" <?php if($list->type_service == 'ltl'){ echo "selected=selected"; } ?> >LTL</option>
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
								<option value="en" <?php if($list->vendor_status == 'en'){ echo "selected=selected"; } ?> >Enable</option>
								<option value="ds" <?php if($list->vendor_status == 'ds'){ echo "selected=selected"; } ?> >Disable</option>
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

<script type="text/javascript">
		$(document).ready(function(){    
    
            var vendor_code = $("#vendor_code").val(); 
            //panggil pic saat pertama kali dia di load
            
            //load pic when page has been loaded
             if ($("#tbl-vendor-pic").hasClass("sapTable")) {
                $("#tbl-vendor-pic").refresh_sapTable({
                url : "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
                });
                return false;
            } else {
                $("#tbl-vendor-pic").sapTable({

                url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code,

                cSearch: {
                    'a.vendor_pic_name': 'Name',
                    'b.position_name': 'Position',
                    'a.vendor_pic_phone': 'Phone',
                    'a.vendor_pic_email': 'Email'
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_pic_email + "\");return false;'>Edit</a> \n\
                      <a href='javascript:void(0)' onclick='delPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
                });
            }
            //end load pic when page has been loaded
            
            //load driver when page has been loaded
            if ($("#tbl-driver-vendor").hasClass("sapTable")) {
            $("#tbl-driver-vendor").refresh_sapTable({
                url : "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code
            });
            return false;
            } else {
                $("#tbl-driver-vendor").sapTable({

                url: "<?php echo base_url('master/vendor/driver_vendor_json/'); ?>" + vendor_code,

                cSearch: {
                    'vendor_driver_name': 'Name',
                     
                    'vendor_driver_phone': 'Phone'
                    
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;'>Edit</a> \n\
                            <a href='javascript:void(0)' onclick='delPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_driver_phone + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
                });
            }
            //end load driver when page has been loaded
            
            
            $("#seleksi").hide();

            var key = $("#key").val();

            if(key == 'kredit'){
                    $("#seleksi").show();
            }
            
            
            var input_upload_driver_license = $('input[id=upload_driver_license]');
        var progressBar = $('#progress-bar');
 
        $('#upload_driver_license').on("change",function(){
            var input_upload_driver_license = $('input[id=upload_driver_license]').val();
            //alert(inputFile);
            $('#vendor_driver_license').val(input_upload_driver_license);
        });


        $('#upload-btn').on('click',function(event){
            //alert('ada');
            var filetoupload = input_upload_driver_license[0].files[0];

            if(filetoupload != 'undefined'){
                var formdata = new FormData();
                formdata.append("file",filetoupload);

                $.ajax({
                        url : '<?php echo base_url("master/vendor/ajax_upload_files");?>',
                        type : "POST",
                        data : formdata,
                        processData:false,
                        contentType:false,
                        success : function(hasil){
                             console.log(hasil);


                            $('.progress').fadeOut("slow");
                            $('#results').html("Your file has been uploaded!");
                        },
                        xhr: function() {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round( (event.loaded / event.total) * 100 );
                                // console.log(percentComplete);
                                $("#upload-btn").prop("disabled",true);
                                $('.progress').show();
                                progressBar.css({width: percentComplete + "%"});
                                progressBar.text(percentComplete + '%');
                            };
                        }, false);

                        return xhr;
                    }
                });
            }
        });



        $('body').on('change.bs.fileinput', function(e) {
            $('.progress').hide();
            progressBar.text("0%");
            progressBar.css({width: "0%"});
            $('.progress').fadeOut("slow");
        });
        });
        
        
        
         
        $("#upload_npwp").change(function(){
            $("#filename").val($("#upload_npwp").val());
        });
		
		$("#payment_type").change(function(){
            //alert($(this).val());
            
            if($(this).val() == 'cash' || $(this).val() == '' ){
                $("#seleksi").hide();
            }else{
                $("#seleksi").show();
            }
        });
	 
    $("#savepic").click(function () {
         
        var dtVendorPIC = $(".vendor_pic").serializeArray();
        var vendor_code = $("#vendor_code").val();
        var vendor_pic_id = $("#vendor_pic_id").val();
        var url;
        var dt = {vendor_code: vendor_code, dtpost: dtVendorPIC};
        
        url =  "<?php echo base_url('master/vendor/pro_store_vendor_pic'); ?>";
        $.ajax({
            type: "post",
            url: url,
            data: dt,
            dataType: "json",
            success: function (hasil) {
                if (hasil.success == true) {
                     
             
                    $("#tbl-vendor-pic").refresh_sapTable();
                    $(".vendor_pic").val("");
                    $("#vendor_pic_name").focus();
                }
            }
        })

        return false;
        
       
    })
    
    
    $("#vendor_code").focusout(function () {
        var vendor_code = $(this).val();

        if ($("#tbl-vendor-pic").hasClass("sapTable")) {
            $("#tbl-vendor-pic").refresh_sapTable({
                url : "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code
            });
            return false;
        } else {
            $("#tbl-vendor-pic").sapTable({

                url: "<?php echo base_url('master/vendor/pic_vendor_json/'); ?>" + vendor_code,

                cSearch: {
                    'a.vendor_pic_name': 'Name',
                    'b.position_name': 'Position',
                    'a.vendor_pic_phone': 'Phone',
                    'a.vendor_pic_email': 'Email'
                },
                formatters: function () {
                    return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='editPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_pic_email + "\");return false;'>Edit</a> \n\
                      <a href='javascript:void(0)' onclick='delPIC(\"" + rows.vendor_code + "\",\"" + rows.vendor_pic_email + "\");return false;' class='btn btn-danger btn-xs'>Delete</a>"
                }
            });
        }
    });
    
    
    function editPIC(vendor_code, emailPIC) {
        var dt = {vendor_code: vendor_code, vendor_pic_email: emailPIC};
        console.log(dt);
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
        })
        return false;
    }
    
    
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
                        $("#tbl-vendor-pic").refresh_sapTable();
                        //alert('kehapus');
                    }
                }
            })
        }
        return false;
    }

</script>

 