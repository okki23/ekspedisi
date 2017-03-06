
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Position Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('master/' . $this->router->fetch_class() . '/pro_store'); ?>">

                        <div class="form-group">
                            <label>Position</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                            <input type="text" name="position_name" class="form-control" value="<?php echo $list->position_name; ?>">
                        </div>

                        <div class="form-group">
                            <label>Position Status</label>

                            <select name="position_status" class="form-control">
                                <?php
                                if ($list->position_status <> "") {
                                    if ($list->position_status == "en") {
                                        echo '<option value="en" selected> Enable </option>';
                                        echo '<option value="ds"> Disable </option>';
                                    } else {
                                        echo '<option value="en"> Enable </option>';
                                        echo '<option value="ds" selected> Disable </option>';
                                    }
                                } else {
                                    echo '<option value="en" selected> Enable </option>';
                                    echo '<option value="ds"> Disable</option>';
                                }
                                ?>
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

