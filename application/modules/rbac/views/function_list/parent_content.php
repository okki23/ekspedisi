<table class="table table-bordered table-striped table-responsive" id="pcontent">
    <thead>
        <tr>
            <th data-options="nama_object">Object</th>
            <th data-options="parent_function">Menu</th>
            <th data-options="u_function_name">Function Name</th>
            <th data-options="u_module">Module</th>
            <th data-options="u_function">Function</th>
            <th data-options="u_params">Parameter</th>
            <th data-options="u_status">Status</th>
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
                url: "<?php echo base_url('rbac/parent_content_json'); ?>"
            });
            return false;
        } else {
            $("#pcontent").sapTable({
                url: "<?php echo base_url('rbac/parent_content_json'); ?>",
                cSearch: {
                    'nama_object': 'Object',
                    'parent_function': 'Parent Function',
                    'u_function_name': 'Function Name',
                    'u_module': 'Module',
                    'u_function': 'Function',
                    'u_params': 'Parameter'
                },
                formatters: {
                    "option": function () {
                        return "<a href='javascript:void(0)' class='btn btn-warning btn-xs' onclick='selectData( " + rows.id + ");return false;'>Select</a>"
                    }
                }
            });
        }
        
    })
    
    function selectData(id){
        //alert(id);
        $("#parent_id").val(id);
        $(".modal").modal('hide');
    }

</script>