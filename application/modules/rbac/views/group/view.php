
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Group
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url($this->router->fetch_class() . "/store_grouplist"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div style="clear: both;margin-bottom: 10px"></div><br/>

                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="mlist">
                            <thead class="cf">
                                <tr>
                                    <th data-options="divisi" style="width:10%;">Divisi</th>
                                    <th data-options="u_group" style="width:10%;">Group</th>
                                    <th data-options="u_group_desc" style="width:20%;">Keterangan Group</th>
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

    $('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var param = $(this).attr("value");
        var concept = $(this).text();
        var oke = $('.input-group #search_param').val(param);
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
        if (oke != '') {
            $('.search').prop("disabled", false);
            if (param == 'pubdate') {
                $('.search').attr("id", "pubdate");
                $('#pubdate').datepicker({format: 'yyyy-mm-dd'});
            } else {
                $('.search').removeAttr('id');
            }
        } else {
            $('.search').prop("disabled", false);
        }
    });
    
    if ($("#mlist").hasClass("sapTable")) {
        $("#mlist").refresh_sapTable({
            url: base_url + "rbac/json_glist"
        });
    } else {
        $("#mlist").sapTable({
            url: base_url + "rbac/json_glist",
            cSearch: {
                'divisi': 'Divisi',
                'u_group': 'Group',
                'u_group_desc': 'Keterangan Group'
            },
            formatters: {
                "aksi": function () {
                    var buton = "<a href='" + base_url + "rbac/store_grouplist/" + rows.id + "' class='btn btn-default btn-xs'>Edit</a>";
                    buton += " <a href='" + base_url + "rbac/delete_grouplist/" + rows.id + "' onclick=\"return confirm('Are you sure you want to delete this Data (" + rows.u_group + ") ?');\" class='btn btn-default btn-xs'>Delete</a>";
                    return buton;
                }
            }
        });
    }

</script>
