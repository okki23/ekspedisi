
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Bank Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>">

                        <div class="form-group">
                            <label>Bank Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                            <input type="text" name="bank_name" class="form-control" value="<?php echo $list->bank_name; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Bank Address</label>
                            
                            <input type="text" name="bank_info" class="form-control" value="<?php echo $list->bank_info; ?>">
                        </div>
                        <div class="form-group">
                                <label>Bank Status</label>

                                <select name="bank_status" class="form-control">
                                    <option value=""> --Pilih-- </option>
                                    <option value="en" <?php
                                                if ($list->bank_status == 'en') {
                                                    echo "selected=selected";
                                                }
                                ?> > Enable </option>
                                    <option value="ds" <?php
                                            if ($list->bank_status == 'ds') {
                                                echo "selected=selected";
                                            }
                                ?> > Disable </option>
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
    })
</script>

