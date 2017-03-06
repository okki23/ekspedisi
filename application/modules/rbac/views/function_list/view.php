
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Function List
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url($this->router->fetch_class() . "/store_functionlist"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div style="clear: both;margin-bottom: 5px;"></div>
                    <br/>
                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="flist">
                            <thead class="cf">
                                <tr>
                                    <th data-options="nama_object" style="width:10%;">Object</th>
                                    <th data-options="parent_function" style="width:20%;">Menu</th>
                                    <th data-options="u_function_name" style="width:20%;">Function Name</th>
                                    <th data-options="u_module" style="width:10%;">Module</th>
                                    <th data-options="u_function" style="width:15%;">Function</th>
                                    <th data-options="u_params" style="width:10%;">Parameter</th>
                                    <th data-options="u_status" style="width:5%;">Status</th>
                                    <th data-options="aksi" style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>



<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";

    if ($("#flist").hasClass("sapTable")) {
        $("#flist").refresh_sapTable({
            url: "<?php echo base_url('rbac/json_flist'); ?>"
        });
        //return false;
    } else {
        $("#flist").sapTable({
            url: "<?php echo base_url('rbac/json_flist'); ?>",
            cSearch: {
                'nama_object': 'Object',
                'parent_function': 'Parent Function',
                'u_function_name': 'Function Name',
                'u_module': 'Module',
                'u_function': 'Function',
                'u_params': 'Parameter'
            },
            formatters: {
                "aksi": function () {
                    var buton = "<a href='" + base_url + "rbac/store_functionlist/" + rows.id + "' class='btn btn-default btn-xs'>Edit</a>";
                    buton += " <a href='" + base_url + "rbac/delete_functionlist/" + rows.id + "' onclick=\"return confirm('Are you sure you want to delete this Data (" + rows.u_function_name + ") ?');\" class='btn btn-default btn-xs'>Delete</a>";
                    return buton;
                }
            }
        });
    }


</script>
