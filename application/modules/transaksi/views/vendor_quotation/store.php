 
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Vendor Quotation Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('transaksi/' . $this->router->fetch_class() . '/pro_store'); ?>">

                        <div class="col-md-6">

                            <div class="form-group" id="remote">
                                <label>Vendor Name</label>
                                <br>
                                <input type="hidden" name="key" value="<?php echo $list->payment_type; ?>" id="key">
                                <input type="hidden" name="date_created" value="<?php echo date('y-m-d H:i:s'); ?>" id="date_created">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">

                                <input type="text" name="vendor_name" class="typeahead form-control" value="<?php echo $list->vendor_name; ?>" id="vendor_name" >
                            </div>

                            <div class="form-group">
                                <label>Vendor Code</label>
                                <input type="text" readonly="readonly" name="vendor_code" id="vendor_code" value="<?php echo $list->vendor_code; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Type Payment</label>
                                <select name="payment_type" class="form-control" id="payment_type">
                                    <option value="">--Pilih--</option>
                                    <option value="cash" <?php
                                    if ($list->payment_type == 'cash') {
                                        echo "selected=selected";
                                    }
                                    ?> >Cash</option>
                                    <option value="kredit" <?php
                                    if ($list->payment_type == 'kredit') {
                                        echo "selected=selected";
                                    }
                                    ?> >Kredit</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Quotation Code</label>

                                <input type="text" name="quotation_code" id="quotation_code" class="form-control" value="<?php echo $quotation_code; ?>">
                            </div>

                            <div class="form-group">
                                <label>PIC Vendor</label>
                                <select name="id_pic_vendor" id="pic_vendor" class="form-control"> 
                                    <option value=""> --Pilih-- </option>

                                </select>
                            </div>
                            <div id="seleksi">
                                <div class="form-group">
                                    <label>TOP</label>
                                    <select name="top" id="top" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="15" <?php
                                        if ($list->top == '15') {
                                            echo "selected=selected";
                                        }
                                        ?> >15 Hari</option>
                                        <option value="30" <?php
                                        if ($list->top == '30') {
                                            echo "selected=selected";
                                        }
                                        ?> >30 Hari</option>
                                        <option value="45" <?php
                                        if ($list->top == '45') {
                                            echo "selected=selected";
                                        }
                                        ?> >45 Hari</option>
                                        <option value="90" <?php
                                        if ($list->top == '90') {
                                            echo "selected=selected";
                                        }
                                        ?> >90 Hari</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Type Service</label>
                                <select name="type_service" id="type_service" class="form-control"> 
                                    <option value=""> --Pilih-- </option>
                                    <option value="ftl" <?php
                                    if ($list->type_service == 'ftl') {
                                        echo "selected=selected";
                                    }
                                    ?> > FTL </option>
                                    <option value="ltl" <?php
                                    if ($list->type_service == 'ltl') {
                                        echo "selected=selected";
                                    }
                                    ?>> LTL </option>
                                </select>
                            </div>

                        </div>

                        <hr/>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-shadow btn-success">Save</button>
                            <a class="btn btn-shadow btn-danger" href="<?php echo base_url('transaksi/' . $this->router->fetch_class()); ?>">Cancel</a>
                        </div>

                    </form>

                    <hr>
                    <div class="col-md-12 col-xs-12">
                        <div class="panel panel-primary" style="border: 1px solid #000;">
                            <div class="panel-heading">Detail Of Quotation</div>
                            <div class="panel-body">

                                <form  name="frmGroupUser" id="frmGroupUser" method="post"  enctype="multipart/form-data">
                                    <input type="hidden" name="isi" id="isi" value="<?php echo $list->vendor_code; ?>">    
                                    <div class="form-group">
                                        <label>Excel File</label>
                                        <input type="file" name="excel_file" id="excel_file" class="form-control" >
                                        <input type="hidden" name="exel_name" id="exel_name">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="myButton" data-loading-text="Loading..." class="btn btn-primary btn-sm">Upload</button> 
                                        <button type="button" class="btn btn-warning btn-sm" id="cancel-form">Cancel</button>
                                        <a href="<?php echo base_url('assets/template_sample_vendor.xlsx'); ?>" class="btn btn-success btn-sm">[Download Template]</a>
                                    </div>
                                </form>
                                <button type="button" id="saveTriger" class="btn btn-warning btn-sm" id="cancel-form">Save Selected</button>
                                <button type="button" id="delTriger" class="btn btn-danger btn-sm" >Delete Selected</button>
                                <div class="panel-body">

                                    <div class="col-md-12 table-responsive">
                                        <table  class="table table-bordered table-striped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="select_id" id="select_id"></th>
                                                    <th>Quotation Code</th>
                                                    <th>Origin</th>
                                                    <th>Province</th>
                                                    <th>Destination City</th>
                                                    <th>Category Destination</th>
                                                    <th>Island</th>
                                                    <th>Lead Time</th>
                                                    <th>UOM</th>
                                                    <th>Trip Mode</th>
                                                    <th>Service Mode</th>
                                                    <th>Customer</th>
                                                    <th>Type Truck</th>
                                                    <th>TOP</th>
                                                    <th>Price</th>
                                                    <th>Multidrop Java Same City</th>
                                                    <th>Multidrop Java Diff City</th>
                                                    <th>Multidrop Sumatera Same City</th>
                                                    <th>Multidrop Sumatera Diff City</th>
                                                    <th>Over Tonase Java</th>
                                                    <th>Over Tonase Sumatera</th>
                                                    <th>Overnight Java</th>
                                                    <th>Overnight Sumatera</th>
                                                    <th>Date Effective</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <b style="color:red;"> * SEBELUM DI MELAKUKAN PENYIMPANAN/PERUBAHAN DATA,PASTIKAN OPSI ATAU ISIAN SUDAH BENAR</b>
                    <hr/>
                    <!--<b> Result : <p id="res"> </p> </b>-->

                </div>
            </section>
        </div>

    </div>
</section>

<script>
    $(document).ready(function (e) {

        var vencode = $("#vendor_code").val();

        $("#select_id").on('click', function () { // bulk checked
            var status = this.checked;
            $(".ceklist").each(function () {
                $(this).prop("checked", status);
            });
        });

        $.getJSON("<?php echo base_url('transaksi/vendor_quotation/get_temp_qc/'); ?>"+vencode, function (data) {
             $("tbody").empty();
            var items = [];
            var iSum = 0;
            $.each(data.data, function (key, val) {
                iSum = iSum + parseInt(val.top);
                //console.log(val);
                items.push("<tr>");
                items.push("<td><input type='checkbox' name='select_id' id='select_id' class='ceklist' value='" + val.id + "'>  </td>");
                items.push("<td>" + val.vendor_code + "</td>");
                items.push("<td>" + val.origin + "</td>");
                items.push("<td>" + val.province + "</td>");
                items.push("<td>" + val.destination_city + "</td>");
                items.push("<td>" + val.category_destination + "</td>");
                items.push("<td>" + val.island + "</td>");
                items.push("<td>" + val.lead_time + "</td>");
                items.push("<td>" + val.uom + "</td>");
                items.push("<td>" + val.trip_mode + "</td>");
                items.push("<td>" + val.service_mode + "</td>");
                items.push("<td>" + val.vendor + "</td>");
                items.push("<td>" + val.type_truck + "</td>");
                items.push("<td>" + val.top + "</td>");
                items.push("<td>" + val.price + "</td>");
                items.push("<td>" + val.mdjsc + "</td>");
                items.push("<td>" + val.mdjdc + "</td>");
                items.push("<td>" + val.mdssc + "</td>");
                items.push("<td>" + val.mdsdc + "</td>");
                items.push("<td>" + val.ot_java + "</td>");
                items.push("<td>" + val.ot_sumatera + "</td>");
                items.push("<td>" + val.on_java + "</td>");
                items.push("<td>" + val.on_sumatera + "</td>");
                items.push("<td>" + val.date_effective + "</td>");
            });
            $("<tbody/>", {html: items.join("")}).appendTo("table");
            $("#res").html(iSum);
        });

        function get_list_tmp(codevendor) {
            $("tbody").empty();
            $.getJSON("<?php echo base_url('transaksi/vendor_quotation/get_temp_qc/'); ?>"+codevendor, function (data) {
                $("tbody").empty();
                var items = [];
                var iSum = 0;
                $.each(data.data, function (key, val) {
                    iSum = iSum + parseInt(val.top);
                    //console.log(val);
                    items.push("<tr>");
                    items.push("<td><input type='checkbox' name='select_id' id='select_id' class='ceklist' value='" + val.id + "'>  </td>");
                    items.push("<td>" + val.vendor_code + "</td>");
                    items.push("<td>" + val.origin + "</td>");
                    items.push("<td>" + val.province + "</td>");
                    items.push("<td>" + val.destination_city + "</td>");
                    items.push("<td>" + val.category_destination + "</td>");
                    items.push("<td>" + val.island + "</td>");
                    items.push("<td>" + val.lead_time + "</td>");
                    items.push("<td>" + val.uom + "</td>");
                    items.push("<td>" + val.trip_mode + "</td>");
                    items.push("<td>" + val.service_mode + "</td>");
                    items.push("<td>" + val.vendor + "</td>");
                    items.push("<td>" + val.type_truck + "</td>");
                    items.push("<td>" + val.top + "</td>");
                    items.push("<td>" + val.price + "</td>");
                    items.push("<td>" + val.mdjsc + "</td>");
                    items.push("<td>" + val.mdjdc + "</td>");
                    items.push("<td>" + val.mdssc + "</td>");
                    items.push("<td>" + val.mdsdc + "</td>");
                    items.push("<td>" + val.ot_java + "</td>");
                    items.push("<td>" + val.ot_sumatera + "</td>");
                    items.push("<td>" + val.on_java + "</td>");
                    items.push("<td>" + val.on_sumatera + "</td>");
                    items.push("<td>" + val.date_effective + "</td>");
                });
                $("<tbody/>", {html: items.join("")}).appendTo("table");
                $("#res").html(iSum);
            });
            //console.log(iSum);
        }

        $('#saveTriger').on("click", function (event) {
            var codevendors = $("#vendor_code").val();
            // triggering delete one by one
            if ($('.ceklist:checked').length > 0) {  // at-least one checkbox checked
                var ids = [];
                $('.ceklist').each(function () {
                    if ($(this).is(':checked')) {
                        ids.push($(this).val());
                    }
                });
                var ids_string = ids.toString();  // array to string conversion
                //var file_name = $("#exel_name").val();
                //console.log(ids);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('transaksi/vendor_quotation/datatable_bulk_save'); ?>",
                    data: {data_ids: ids,codevendors:codevendors},
                    success: function (result) {
                        get_list_tmp(codevendors);
                        //able.draw(); // redrawing datatable
                        alert('Data has been saved!');
                    },
                    async: false
                });
            }
        });
        
        
        $('#delTriger').on("click", function (event) {
        var codevendors = $("#vendor_code").val();
        // triggering delete one by one
        if ($('.ceklist:checked').length > 0) {  // at-least one checkbox checked
            var ids = [];
            $('.ceklist').each(function () {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            var ids_string = ids.toString();  // array to string conversion
            //var file_name = $("#exel_name").val();
            //console.log(ids);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('transaksi/vendor_quotation/datatable_bulk_delete'); ?>",
                data: {data_ids: ids,codevendors:codevendors},
                success: function (result) {
                    get_list_tmp(codevendors);
                    //able.draw(); // redrawing datatable
                   alert('Data has been deleted!');
                },
                async: false
            });
        }
        });

        $("#frmGroupUser").on("submit", function (event) {
            var $btn = $("#myButton").button('loading');
            var codevendor = $("#vendor_code").val();
            event.preventDefault();
            var formData = new FormData(this);
            //console.log(formData);
            $.ajax({
                url: "<?php echo base_url('transaksi/vendor_quotation/upload_quotation'); ?>",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                //dataType : "json",
                success: function (e) {
                    alert('Import successfully');
                    console.log('success');
                    $("#myButton").html('Import successfully');
                    get_list_tmp(codevendor);
                    //$btn.button('reset')
                    //table.ajax.reload();
                },
                error: function (e) {
                    console.log('Import failed!');
                    var $btn = $("#myButton").button('loading');
                    alert('fail');
                }
            });
        });


        //alert(vencode);
        $.ajax({
            url: "<?php echo base_url('transaksi/vendor_quotation/get_id_pic_vendor/'); ?>" + vencode + "",
            type: "GET",
            success: function (response) {
                //console.log(response);
                $("#pic_vendor").html(response);
            },
            dataType: "html"
        });

        $("#vendor_name").on("keyup", function () {
            //alert("oke");
            $("#remote").css("margin-bottom", "50px");
        });

        $("#seleksi").hide();
        var key = $("#key").val();
        if (key == 'kredit') {
            $("#seleksi").show();
        }

        $("#payment_type").change(function () {
            if ($(this).val() == 'cash' || $(this).val() == '') {
                $("#seleksi").hide();
            } else {
                $("#seleksi").show();
            }
        });


        //ambil data ke server 
        var getdata = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '<?php echo base_url('transaksi/vendor_quotation/get_vendor_name_json?query=%QUERY'); ?>',
                wildcard: '%QUERY'
            }
        });

        $('#remote .typeahead').typeahead(null, {
            name: 'vendor_name',
            display: 'vendor_name',
            source: getdata
        });

        $('#remote .typeahead').bind('typeahead:selected', function (obj, datum, name) {
            console.log(datum);
            $('#vendor_name').val(datum.vendor_name);
            $('#isi').val(datum.vendor_code);
            $('#vendor_code').val(datum.vendor_code);
            $('#vendor_id').val(datum.id);


        });


        //ambil data ke server 


        $("#vendor_name").on("focusout", function () {
            var isi = $('#vendor_code').val();
            get_list_tmp(isi);
            $("#remote").css("margin-bottom", "10px");
            $.ajax({
                url: "<?php echo base_url('transaksi/vendor_quotation/get_id_pic_vendor/'); ?>" + isi + "",
                type: "GET",
                success: function (response) {
                    //console.log(response);
                    $("#pic_vendor").html(response);
                },
                dataType: "html"
            });
            return false;
            //alert(isi);
        });
        
        
         document.getElementById('excel_file').onchange = function () {
        $("#exel_name").val(this.value);
    };

    });
</script>


