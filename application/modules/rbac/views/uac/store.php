
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    User Account's Access Registration Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" id="frmaccount" action="<?php echo base_url($this->router->fetch_class() . '/process_store_uac'); ?>">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="hidden" name="id" id="id" class="form-control input-divisi" value="<?php echo $list['id']; ?>">
                            <input type="text" name="username" id="username" class="form-control input-divisi" value="<?php echo $list['username']; ?>" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" id="password" class="form-control input-divisi" value="<?php echo $list['password']; ?>" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Divisi</label>
                            <select name="id_divisi" id="id_divisi" class='form-control'>
                                <option value=''>- Choose Divisi -</option>
                                <?php
                                foreach ($json_div as $jdiv) {
                                    if (isset($list['id_divisi']) == $jdiv['id']) {
                                        echo "<option value='{$jdiv[id]}' selected>{$jdiv['divisi']}</option>";
                                    } else {
                                        echo "<option value='{$jdiv[id]}'>{$jdiv['divisi']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Group</label>
                            <select name="u_group" id="u_group" class='form-control'>
                                <option value=''>- Choose Group -</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date Expired</label>
                            <input type="text" name="u_date_expired" id="u_date_expired" class="form-control datepicker" value="<?php echo $list['u_date_expired']; ?>" placeholder="Date Expired">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="u_status" id="u_status" class="form-control input-divisi">
                                <option value="">- Choose Status -</option>
                                <option value="A" <?php echo $selected = $list['u_status'] == "A" ? "Selected" : "" ?>>Aktif</option>
                                <option value="D" <?php echo $selected = $list['u_status'] == "D" ? "Selected" : "" ?>>Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Access Permission</label>
                            <table class="table tree table-condensed table-hover table-striped" id="tbltree">
                                <thead>
                                    <tr>
                                        <th rowspan="2">MENU</th>
                                        <th colspan="6">AKSES</th>
                                        <th rowspan="2">DATA PARSIAL</th>
                                    </tr>
                                    <tr>
                                        <th>CREATE</th>
                                        <th>READ</th>
                                        <th>UPDATE</th>
                                        <th>DELETE</th>
                                        <th>APPROVE</th>
                                        <th>REJECT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($json_tree as $menu_tree) {
                                        $no++;

                                        echo '<tr class="treegrid-' . $menu_tree['id'] . '">
                                <td><input type="checkbox" name="checkall_' . $menu_tree['id'] . '" id="checkall_' . $menu_tree['id'] . '" class="css-checkbox cparent" /> <label for="checkall_' . $menu_tree['id'] . '" name="checkall_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green">' . $menu_tree['u_menu'] . '</label></td>
                                <td align="center"><input type="checkbox" name="createdt_' . $menu_tree['id'] . '" id="createdt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="createdt_' . $menu_tree['id'] . '" name="createdt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center"><input type="checkbox" name="readdt_' . $menu_tree['id'] . '" id="readdt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="readdt_' . $menu_tree['id'] . '" name="readdt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center"><input type="checkbox" name="updatedt_' . $menu_tree['id'] . '" id="updatedt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="updatedt_' . $menu_tree['id'] . '" name="updatedt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center"><input type="checkbox" name="deletedt_' . $menu_tree['id'] . '" id="deletedt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="deletedt_' . $menu_tree['id'] . '" name="deletedt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center"><input type="checkbox" name="approvedt_' . $menu_tree['id'] . '" id="approvedt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="approvedt_' . $menu_tree['id'] . '" name="approvedt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center"><input type="checkbox" name="rejectdt_' . $menu_tree['id'] . '" id="rejectdt_' . $menu_tree['id'] . '" class="css-checkbox" /><label for="rejectdt_' . $menu_tree['id'] . '" name="rejectdt_' . $menu_tree['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                <td align="center">
                                <select name="parsialdt_' . $menu_tree['id'] . '" id="parsialdt_' . $menu_tree['id'] . '" class="form-control input-sm dtparsial">
                                    <option value="">- Pilih Data -</option>
                                    <option value="divisi">Divisi</option>
                                    <option value="group">Group</option>
                                    <option value="account">Account</option>
                                    <option value="all">All</option>
                                </select>
                                </td>
                            </tr>';


                                        $where_children = array('id_menu_parent' => $menu_tree['id'], 'u_status' => 'A');
                                        $mchildren = $this->Menu_m->get_rows_by($where_children)->result_array();

                                        if (is_array($mchildren)) {
                                            foreach ($mchildren as $dtchildren) {
                                                echo '<tr class="treegrid-' . $dtchildren['id'] . ' treegrid-parent-' . $dtchildren['id_menu_parent'] . '">
                                    <td><input type="checkbox" name="checkall_' . $dtchildren['id'] . '" id="checkall_' . $dtchildren['id'] . '" class="css-checkbox cparent" /> <label for="checkall_' . $dtchildren['id'] . '" name="checkall_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green">' . $dtchildren['u_menu'] . '</label></td>
                                    <td align="center"><input type="checkbox" name="createdt_' . $dtchildren['id'] . '" id="createdt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="createdt_' . $dtchildren['id'] . '" name="createdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center"><input type="checkbox" name="readdt_' . $dtchildren['id'] . '" id="readdt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="readdt_' . $dtchildren['id'] . '" name="readdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center"><input type="checkbox" name="updatedt_' . $dtchildren['id'] . '" id="updatedt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="updatedt_' . $dtchildren['id'] . '" name="updatedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center"><input type="checkbox" name="deletedt_' . $dtchildren['id'] . '" id="deletedt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="deletedt_' . $dtchildren['id'] . '" name="deletedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center"><input type="checkbox" name="approvedt_' . $dtchildren['id'] . '" id="approvedt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="approvedt_' . $dtchildren['id'] . '" name="approvedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center"><input type="checkbox" name="rejectdt_' . $dtchildren['id'] . '" id="rejectdt_' . $dtchildren['id'] . '" class="css-checkbox" /><label for="rejectdt_' . $dtchildren['id'] . '" name="rejectdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                    <td align="center">
                                    <select name="parsialdt_' . $dtchildren['id'] . '" id="parsialdt_' . $dtchildren['id'] . '" class="form-control input-sm dtparsial">
                                        <option value="">- Pilih Data -</option>
                                        <option value="divisi">Divisi</option>
                                        <option value="group">Group</option>
                                        <option value="account">Account</option>
                                        <option value="all">All</option>
                                    </select>
                                    </td>
                                </tr>';

                                                //$nchildren = $this->acl_model->get_menu_childer($dtchildren['id']);
                                                $where_children_ = array('id_menu_parent' => $dtchildren['id'], 'u_status' => 'A');
                                                $nchildren = $this->Menu_m->get_rows_by($where_children_)->result_array();

                                                if (is_array($nchildren)) {
                                                    foreach ($nchildren as $dtnchildren) {
                                                        echo '<tr class="treegrid-' . $dtnchildren['id'] . ' treegrid-parent-' . $dtnchildren['id_menu_parent'] . '">
                                            <td><input type="checkbox" name="checkall_' . $dtnchildren['id'] . '" id="checkall_' . $dtnchildren['id'] . '" class="css-checkbox cparent" /> <label for="checkall_' . $dtnchildren['id'] . '" name="checkall_' . $dtnchildren['id'] . '_lbl" class="css-label dark-check-green">' . $dtnchildren['u_menu'] . '</label></td>
                                            <td align="center"><input type="checkbox" name="createdt_' . $dtnchildren['id'] . '" id="createdt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="createdt_' . $dtchildren['id'] . '" name="createdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center"><input type="checkbox" name="readdt_' . $dtnchildren['id'] . '" id="readdt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="readdt_' . $dtchildren['id'] . '" name="readdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center"><input type="checkbox" name="updatedt_' . $dtnchildren['id'] . '" id="updatedt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="updatedt_' . $dtchildren['id'] . '" name="updatedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center"><input type="checkbox" name="deletedt_' . $dtnchildren['id'] . '" id="deletedt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="deletedt_' . $dtchildren['id'] . '" name="deletedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center"><input type="checkbox" name="approvedt_' . $dtnchildren['id'] . '" id="approvedt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="approvedt_' . $dtchildren['id'] . '" name="approvedt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center"><input type="checkbox" name="rejectdt_' . $dtnchildren['id'] . '" id="rejectdt_' . $dtnchildren['id'] . '" class="css-checkbox" /><label for="rejectdt_' . $dtchildren['id'] . '" name="rejectdt_' . $dtchildren['id'] . '_lbl" class="css-label dark-check-green"></label></td>
                                            <td align="center">
                                            <select name="parsialdt_' . $dtnchildren['id'] . '" id="parsialdt_' . $dtnchildren['id'] . '" class="form-control input-sm dtparsial">
                                                <option value="">- Pilih Data -</option>
                                                <option value="divisi">Divisi</option>
                                                <option value="group">Group</option>
                                                <option value="account">Account</option>
                                                <option value="all">All</option>
                                            </select>
                                            </td>
                                        </tr>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <hr/>
                        <div class="btn-group">
                            <button type="button" class="btn btn-shadow btn-success" id="submit_divisi">Save</button>
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url($this->router->fetch_class() . "/call_uac"); ?>">Cancel</a>
                        </div>

                    </form>

                </div>
            </section>
        </div>

    </div>
</section>

<textarea id="dtaccess" style="display: none;"><?= $list['access_account']; ?></textarea>

<script type="text/javascript">

    var base_url = "<?= base_url(); ?>";

    $(function () {
        var access_divisi = $("#dtaccess").text();
        //console.log(access_divisi);
        if (access_divisi != "") {
            var adivisi = $.parseJSON(access_divisi);
            if (adivisi != null) {
                $.each(adivisi, function (index, item) {
                    $("#" + item.id).prop('checked', item.checked);
                });
            } else {
                $(".css-checkbox").prop('checked', false);
            }
        }

        var id_divisi = $("#id_divisi").val();
        var id_group = "<?=$list['id_group'];?>";
        if (id_divisi != "") {
            $.post(base_url + "rbac/get_group_by_divisi", {id_divisi: id_divisi}, function (data, textStatus) {
                $.each(data, function (index, item) {
                    //alert(id_group + " = " + item.id);
                    if(id_group == item.id){
                        $("#u_group").append("<option value='" + item.id + "' selected>" + item.u_group + "</option>");
                    }else{
                        $("#u_group").append("<option value='" + item.id + "'>" + item.u_group + "</option>");
                    }
                });
            }, "json");
        }

    });

    $('.tree').treegrid();

    $(".cparent").change(function () {
        var dataAttr = $(this);
        var idAttr = dataAttr.attr('id');
        var lastChar = idAttr.split("_");

        if ($("#" + idAttr).is(':checked')) {
            $("#createdt_" + lastChar[1]).prop('checked', true);
            $("#readdt_" + lastChar[1]).prop('checked', true);
            $("#updatedt_" + lastChar[1]).prop('checked', true);
            $("#deletedt_" + lastChar[1]).prop('checked', true);
            $("#approvedt_" + lastChar[1]).prop('checked', true);
            $("#rejectdt_" + lastChar[1]).prop('checked', true);
        } else {
            $("#createdt_" + lastChar[1]).prop('checked', false);
            $("#readdt_" + lastChar[1]).prop('checked', false);
            $("#updatedt_" + lastChar[1]).prop('checked', false);
            $("#deletedt_" + lastChar[1]).prop('checked', false);
            $("#approvedt_" + lastChar[1]).prop('checked', false);
            $("#rejectdt_" + lastChar[1]).prop('checked', false);
        }
    })
    
    /*
    $("#submit_divisi").click(function () {
        var dt = $(".input-divisi").serializeArray();

        var data = new Object();
        $(".css-checkbox").each(function (index, item) {
            data[this.id] = {id: this.id, checked: this.checked};
        });
        var dtcheckbox = JSON.stringify(data);

        var post = {dtinput: dt, dtcheck: dtcheckbox}

        $.ajax({
            type: "post",
            url: $("#frmdivisi").attr("action"),
            data: post,
            dataType: "json",
            success: function (hsl) {
                if (hsl.success == true) {
                    alert("Data success Saved !");
                    window.location = hsl.wUrl;
                    //console.log(hsl.data);
                } else {
                    alert("Error !");
                }
            }
        })

        return false;
    })
    */

    $("#id_divisi").change(function () {
        var idDivisi = $(this).val();

        var dt = {id_divisi: idDivisi}
        $.ajax({
            type: "post",
            url: base_url + "rbac/get_group_by_divisi",
            data: dt,
            dataType: "json",
            success: function (hsl) {
                $("#u_group").empty();
                $("#u_group").append("<option value=''>- Choose Group -</option>");
                $.each(hsl, function (index, item) {
                    $("#u_group").append("<option value='" + item.id + "'>" + item.u_group + "</option>");
                });
            }
        });
        return false;
    })

    $("#u_group").change(function () {
        var ugroup = $(this).val();

        if (ugroup != "") {
            var dt = {id: ugroup};
            $.ajax({
                type: "post",
                url: base_url + "rbac/get_access_group",
                data: dt,
                dataType: "json",
                success: function (hsl) {
                    var access_group = $.parseJSON(hsl.access_group);

                    if (access_group != null) {
                        $.each(access_group, function (index, item) {
                            if (item.checked == true) {
                                $("#" + item.id).removeAttr('disabled');
                                $("#" + item.id).prop('checked', item.checked);
                            } else {
                                $("#" + item.id).attr('disabled', true);
                                $("#" + item.id).prop('checked', item.checked);
                            }
                        });
                    } else {
                        $(".css-checkbox").prop('checked', false);
                        $(".css-checkbox").attr("disabled", true);
                    }
                }
            });
        } else {
            $(".css-checkbox").prop('checked', false);
        }
    })

    $("#submit_divisi").click(function () {

        var id = $("#id").val();

        var usernm = $("#username").val();
        var passw = $("#password").val();
        var id_divisi = $("#id_divisi").val();
        var id_group = $("#u_group").val();
        var u_date_expired = $("#u_date_expired").val();
        var u_status = $("#u_status").val();

        // merubah data checkbox menjadi object javascript
        var data = new Object();
        $(".css-checkbox").each(function (index, item) {
            data[this.id] = {id: this.id, checked: this.checked};
        });

        // merubah data object checkbox menjadi string
        var dtcheckbox = JSON.stringify(data);

        // parsial data dijadikan object
        var parsial = new Object();
        $(".dtparsial").each(function (index, item) {
            parsial[this.id] = {id: this.id, value: this.value};
        });
        // merubah data parsial menjadi string
        var dtparsial = JSON.stringify(parsial);

        var dt = {username: usernm,
            password: passw,
            id_divisi: id_divisi,
            id_group: id_group,
            u_date_expired: u_date_expired,
            u_status: u_status,
            access_account: dtcheckbox,
            access_data: dtparsial,
            id: id
        }

        var urlDest = base_url + "rbac/process_store_uac";

        $.ajax({
            type: "post",
            url: urlDest,
            data: dt,
            dataType: "json",
            success: function (hsl) {
                if (hsl.success == true) {
                    alert("Data success added !");
                    window.location = hsl.wUrl;
                } else {
                    console.log(hsl.dataHsl);
                }
            }
        })
        return false;
    })

    $('#u_date_expired').datepicker({
        format: 'yyyy-mm-dd'
    });

</script>