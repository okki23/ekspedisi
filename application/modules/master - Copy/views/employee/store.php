<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Employee Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>" enctype="multipart/form-data"> 

                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                            <input type="text" name="employee_name" class="form-control" value="<?php echo $list->employee_name; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" name="date_of_birth" id="dob" class="form-control default-date-picker" value="<?php echo $list->date_of_birth; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Place Of Birth</label>
                            <input type="text" name="place_of_birth" class="form-control" value="<?php echo $list->place_of_birth; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Position</label>
                            <select name="id_position" class="form-control"> 
                                <option value="">--Pilih--</option>
                                <?php
                                foreach($list_position as $rowpos){
                                    if($rowpos->id == $list->id_position){
                                        echo "<option value=".$rowpos->id." selected=selected> ".$rowpos->position_name."</option>";
                                    } else {
                                        echo "<option value=".$rowpos->id."> ".$rowpos->position_name."</option>";
                                    }
                                    
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Employee Domicile</label>
                            
                            <input type="text" name="employee_domicile" class="form-control" value="<?php echo $list->employee_domicile; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Employee Email</label>
                            
                            <input type="text" name="employee_email" class="form-control" value="<?php echo $list->employee_email; ?>">
                        </div>
                        
                         <div class="form-group">
                            <label>Employee Phone</label>
                            
                            <input type="text" name="employee_phone" class="form-control" value="<?php echo $list->employee_phone; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Identity Card</label>
                            
                            <input type="file" name="upload_identity_card" id="upload_identity_card" class="form-control">
                            <input type="text" name="identity_card" id="identity_card" value="<?php echo $list->identity_card; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Family Card</label>
                            
                            <input type="file" name="upload_family_card" id="upload_family_card" class="form-control">
                            <input type="text" name="family_card" id="family_card" value="<?php echo $list->family_card; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Police Certificate</label>
                            
                            <input type="file" name="upload_police_certificate" id="upload_police_certificate" class="form-control">
                            <input type="text" name="police_certificate" id="police_certificate" value="<?php echo $list->police_certificate; ?>" class="form-control">
                        </div>
                        
                         <div class="form-group">
                            <label>Tax ID</label>
                            
                            <input type="file" name="upload_tax_id" id="upload_tax_id" class="form-control">
                            <input type="text" name="tax_id" id="tax_id" value="<?php echo $list->tax_id; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Photo</label>
                            
                            <input type="file" name="upload_photo" id="upload_photo" class="form-control">
                            <input type="text" name="photo" id="photo" value="<?php echo $list->photo; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Last Education</label>
                            <select name="last_education" class="form-control"> 
                                <option value="">--Pilih--</option>
                                <option value="1" <?php if($list->last_education == '1'){ echo 'selected=selected'; } ?> >SD</option>
                                <option value="2" <?php if($list->last_education == '2'){ echo 'selected=selected'; } ?>>SMP</option>
                                <option value="3" <?php if($list->last_education == '3'){ echo 'selected=selected'; } ?>>SMA/K Sederajat</option>
                                <option value="4" <?php if($list->last_education == '4'){ echo 'selected=selected'; } ?>>D3</option>
                                <option value="5" <?php if($list->last_education == '5'){ echo 'selected=selected'; } ?>>S1</option>
                                <option value="6" <?php if($list->last_education == '6'){ echo 'selected=selected'; } ?>>S2</option>                               
                                <option value="7" <?php if($list->last_education == '7'){ echo 'selected=selected'; } ?>>S3</option>   
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label>Employee Status</label>
                            <select name="employee_status" class="form-control"> 
                                <option value="">--Pilih--</option>
                                <option value="en" <?php if($list->employee_status == 'en'){ echo 'selected=selected'; } ?> >Enable</option>
                                <option value="ds" <?php if($list->employee_status == 'ds'){ echo 'selected=selected'; } ?> >Disable</option>
                            </select>
                        </div>
                          

                        <hr/>
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
    $("#savepic").on("click", function () {
        var dataform = $(".customer_pic").serializeArray();
        console.log(dataform);
    });
    
    $("#upload_identity_card").change(function(){
            $("#identity_card").val($("#upload_identity_card").val());
    });
    
    $("#upload_family_card").change(function(){
            $("#family_card").val($("#upload_family_card").val());
    });
    
    $("#upload_police_certificate").change(function(){
            $("#police_certificate").val($("#upload_police_certificate").val());
    });
    
    $("#upload_tax_id").change(function(){
            $("#tax_id").val($("#upload_tax_id").val());
    });
    
     $("#upload_photo").change(function(){
            $("#photo").val($("#upload_photo").val());
    });
        
    $('#dob').datepicker({
            format: 'yyyy-mm-dd'
    });
</script>

