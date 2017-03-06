
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Menu List
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url($this->router->fetch_class() . "/store_menulist"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div style="clear: both;margin-bottom: 10px"></div><br/>

                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="mlist">
                            <thead class="cf">
                                <tr>
                                    <th data-options="menu_parent" style="width:10%;">Parent Menu</th>
                                    <th data-options="u_menu" style="width:20%;">Menu</th>
                                    <th data-options="function_name" style="width:20%;">Function Name</th>
                                    <th data-options="u_menu_index" style="width:10%;">Index</th>
                                    <th data-options="u_menu_desc" style="width:15%;">Description</th>
                                    <th data-options="aksi" style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="col-md-12 col-xs-12"></div>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<script type="text/javascript">

    var base_url = "<?= base_url(); ?>";

 
    
    if ($("#mlist").hasClass("sapTable")) {
        $("#mlist").refresh_sapTable({
            url: base_url + "rbac/json_mlist"
        });
    } else {
        $("#mlist").sapTable({
            url: base_url + "rbac/json_mlist",
            cSearch: {
                'menu_parent': 'Parent Menu',
                'u_menu': 'Menu',
                'function_name': 'Function Name',
                'u_menu_index': 'Index',
                'u_menu_desc': 'Description'
            },
            formatters: {
                "aksi": function () {
                    var buton = "<a href='" + base_url + "rbac/store_menulist/" + rows.id + "' class='btn btn-default btn-xs'>Edit</a>";
                    buton += " <a href='" + base_url + "rbac/delete_menulist/" + rows.id + "' onclick=\"return confirm('Are you sure you want to delete this Data (" + rows.u_menu + ") ?');\" class='btn btn-default btn-xs'>Delete</a>";
                    return buton;
                }
            }
        });
    }

</script>
