
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    User Account's Access
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url($this->router->fetch_class() . "/store_uac"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div style="clear: both;margin-bottom: 10px"></div><br/>

                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="mlist">
                            <thead class="cf">
                                <tr>
                                    <th data-options="username" style="width:20%;">Username</th>
                                    <th data-options="divisi" style="width:20%;">Divisi</th>
                                    <th data-options="u_group" style="width:20%;">Group</th>
                                    <th data-options="u_date_create" style="width:15%;">Register Date</th>
                                    <th data-options="u_date_expired" style="width:15%;">Expire Date</th>
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
            url: base_url + "rbac/json_uac"
        });
    } else {
        $("#mlist").sapTable({
            url: base_url + "rbac/json_uac",
            cSearch: {
                'username': 'Username',
                'divisi': 'Divisi',
                'u_group': 'Group',
                'u_date_create': 'Date Registration',
                'u_date_expired': 'Date Expired'
            },
            formatters: {
                "aksi": function () {
                    var buton = "<a href='" + base_url + "rbac/store_uac/" + rows.id + "' class='btn btn-default btn-xs'>Edit</a>";
                    buton += " <a href='" + base_url + "rbac/delete_uac/" + rows.id + "' onclick=\"return confirm('Are you sure you want to delete this Data (" + rows.username + ") ?');\" class='btn btn-default btn-xs'>Delete</a>";
                    return buton;
                }
            }
        });
    }

</script>
