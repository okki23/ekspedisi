
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Branch Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>">

                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                            <input type="text" name="branch_name" class="form-control" value="<?php echo $list->branch_name; ?>">
                        </div>
                        
                          <div class="form-group">
                            <label>Branch Address</label>
                            
                            <input type="text" name="branch_address" class="form-control" value="<?php echo $list->branch_address; ?>">
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
    })
</script>

