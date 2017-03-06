
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Function List Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url($this->router->fetch_class() . '/process_store_functionlist'); ?>">

                        <div class="form-group">
                            <label>Menu</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $list['id']; ?>">
                            <input type="text" name="u_function_name" class="form-control" value="<?php echo $list['u_function_name']; ?>" placeholder="Function Name">
                        </div>

                        <div class="form-group">
                            <label>Menu Function</label>
                            <input type="text" name="u_module" class="form-control" required="" value="<?php echo $list['u_module']; ?>" placeholder="Module">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="u_function" class="form-control" required="" value="<?php echo $list['u_function']; ?>" placeholder="Function / Method">
                        </div>
                        <div class="form-group">
                            <label>Menu Index</label>
                            <input type="text" name="u_params"class="form-control" value="<?php echo $list['u_params']; ?>" placeholder="Parameter">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="u_object_id" class="form-control" required="">
                                <option value="">- Choose Object -</option>
                                <?php
                                foreach ($dtobjects as $dtobject) {
                                    if ($dtobject->id == $list['u_object_id']) {
                                        echo '<option value="' . $dtobject->id . '" selected>' . $dtobject->nama_object . '</option>';
                                    } else {
                                        echo '<option value="' . $dtobject->id . '">' . $dtobject->nama_object . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Parent Menu / Content</label>
                            <div class="input-group m-bot15">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning" onclick="show_parent();return false;"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="text" name="parent_id" id="parent_id" class="form-control" value="<?php echo $list['parent_id']; ?>" placeholder="Parent Menu / Cotent" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="u_status" class="form-control">
                                <option value="">- Choose Status -</option>
                                <option value="A" <?php echo $selected = $list['u_status'] == "A" ? "Selected" : "" ?>>Aktif</option>
                                <option value="D" <?php echo $selected = $list['u_status'] == "D" ? "Selected" : "" ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <hr/>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-shadow btn-success">Save</button>
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url($this->router->fetch_class() . "/call_function_list"); ?>">Cancel</a>
                        </div>

                    </form>

                </div>
            </section>
        </div>

    </div>
</section>

<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";
    function show_parent() {
        $("#saveChanges").hide();
        $("#gridSystemModalLabel").text("Function Data Content / Menu");
        $(".modal-body").load(base_url + 'rbac/view_functionlist_content');
        $(".modal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }

</script>