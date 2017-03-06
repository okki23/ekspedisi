<table class="table table-bordered table-striped table-responsive" id="pcontent">
    <thead>
        <tr>
            <th data-options="menu_parent">Menu Parent</th>
            <th data-options="u_menu">Menu</th>
            <th data-options="u_menu_desc">Description</th>
            <th data-options="u_menu_index">Index</th>
            <th data-options="option"></th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<div style="clear: both;margin-bottom: 10px;"></div>

<script type="text/javascript">

    $(document).ready(function () {

        //load isi tabel pic pertama kali saat vendor code sudah terisi
        if ($("#pcontent").hasClass("sapTable")) {
            $("#pcontent").refresh_sapTable({
                url: "<?php echo base_url('rbac/parent_mlist_json'); ?>"
            });
            return false;
        } else {
            $("#pcontent").sapTable({
                url: "<?php echo base_url('rbac/parent_mlist_json'); ?>",
                cSearch: {
                    'menu_parent': 'Menu Parent',
                    'u_menu': 'Menu',
                    'u_menu_desc': 'Description',
                    'u_menu_index': 'Index'
                },
                formatters: {
                    "option": function () {
                        //console.log(rows.menu_parent);
                        return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='selectData( " + rows.id + ",\"" + rows.menu_parent + "\");return false;'>Select</a>"
                    }
                }
            });
        }

    })

    function selectData(id, menuparent) {
        //alert(menuparent);
        $("#id_menu_parent").val(id);
        $("#menu_parent").val(menuparent);
        $(".modal").modal('hide');
    }

</script>