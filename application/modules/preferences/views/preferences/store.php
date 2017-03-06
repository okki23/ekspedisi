
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel"> 
                <header class="panel-heading">
                    Preferences Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('preferences/pro_store'); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Application Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list->id;?>">
                            <input type="text" name="apps_name" value="<?php echo $list->apps_name;?>" class="form-control" value="">
                        </div>
                        
                        <div class="form-group">
                            <label>Application Description</label>
                            
                            <input type="text" name="apps_desc" value="<?php echo $list->apps_desc;?>" class="form-control" value="">
                        </div>
                        
                        <div class="form-group">
                            <label>Application URL</label>
                            
                            <input type="text" name="apps_url" value="<?php echo $list->apps_url;?>" class="form-control" value="">
                        </div>
                        
                         <div class="form-group">
                            <label>Company Name</label>
                            
                            <input type="text" name="company_name" value="<?php echo $list->company_name;?>" class="form-control" value="">
                        </div>
                        
                         <div class="form-group">
                            <label>Company Phone</label>
                            
                            <input type="text" name="company_phone" value="<?php echo $list->company_phone;?>" class="form-control" value="">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Application Favicon (Just .ICO files to be upload!) if you don't have the ico file's, generate your image/photo at the <a href="http://www.favicon-generator.org/" target="_blank">http://www.favicon-generator.org/</a> before upload</label>
                            
                            <input type="file" name="apps_faviconf" id="apps_faviconf" class="form-control" value=" ">
                            <input type="hidden" name="apps_favicon" value="<?php echo $list->apps_favicon;?>" id="apps_favicon" class="form-control" value=" ">
                            <img src="<?php echo base_url('upload_files/'.$list->apps_favicon);?>" width="50" height="50">
                        </div>
                        
                        <div class="btn-group">
                            <button type="submit" class="btn btn-shadow btn-success">Save</button>
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url('preferences'); ?>">Cancel</a>
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
    })
    
    $("#apps_faviconf").on("change",function(){
        $("#apps_favicon").val($(this).val())
      
    });
</script>

