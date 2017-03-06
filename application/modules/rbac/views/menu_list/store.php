
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Menu List Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url($this->router->fetch_class() . '/process_store_menulist'); ?>">

                        <div class="form-group">
                            <label>Parent Menu</label>
                            <input type="hidden" name="id" class="form-control" value="<?=$list['id'];?>">

                            <div class="input-group m-bot15">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning" onclick="show_parent();return false;"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="hidden" name="id_menu_parent" id="id_menu_parent" class="form-control" value="<?=$list['id_menu_parent'];?>" placeholder="Parent Menu / Content" />
                                <input type="text" name="menu_parent" id="menu_parent" class="form-control" value="<?=$list['menu_parent'];?>" placeholder="Parent Menu / Content" disabled />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Menu</label>
                            <input type="text" name="u_menu" class="form-control" required value="<?=$list['u_menu'];?>" placeholder="Menu Name">
                        </div>
                        <div class="form-group">
                            <label>Menu Function</label>
                            <div class="input-group m-bot15">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning" onclick="show_content_parent();return false;"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="hidden" name="u_function_list_id" id="u_function_list_id" class="form-control" required value="<?=$list['u_function_list_id'];?>" placeholder="Function / Method">
                                <input type="text" name="u_function" id="u_function" class="form-control" required="" value="<?=$list['u_function'];?>" placeholder="Function / Method" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="u_menu_desc"class="form-control" placeholder="Menu Description"><?=$list['u_menu_desc'];?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Menu Index</label>
                            <input type="number" name="u_menu_index" id="u_menu_index" class="form-control input-sm txtcomponent" value="<?=$list['u_menu_index'];?>" placeholder="Menu Index" />
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
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url($this->router->fetch_class() . "/call_menulist"); ?>">Cancel</a>
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
        $("#gridSystemModalLabel").text("Parent Menu");
        $(".modal-body").load(base_url + 'rbac/view_mlist_content');
        $(".modal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }
    
    function show_content_parent(){
        $("#saveChanges").hide();
        $("#gridSystemModalLabel").text("Function Data Content / Menu");
        $(".modal-body").load(base_url + 'rbac/view_flist_content');
        $(".modal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }

</script>