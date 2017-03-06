
<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Customer Quotation Form 
                </header>
                <div class="panel-body">
                    <form method="post" action="<?php echo base_url('transaksi/' . $this->router->fetch_class() . '/pro_store'); ?>">
                        <input type="hidden" name="key" value="<?php echo $list->payment_type; ?>" id="key">
                        <input type="hidden" name="date_created" value="<?php echo date('y-m-d H:i:s'); ?>" id="date_created">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">
                        <input type="hidden" name="id_pic_customer" id="id_pic_customer" class="form-control" value="<?php echo $list->id_pic_customer; ?>">
                        <div class="col-md-6">

                            <div class="form-group" id="remote">
                                <label>Customer Name</label>
                                <br>
                                <input type="text" name="customer_name" id="customer_name" value="<?php echo $list->customer_name; ?>"  class="form-control typeahead">
                            </div>
                            <div class="form-group">
                                <label>Customer Code</label>
                                <input type="text" readonly="readonly" name="customer_code" id="customer_code" value="<?php echo $list->customer_code; ?>"  class="form-control">
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
                                <input type="text" name="quotation_code" class="form-control" readonly="readonly" value="<?php echo $quotation_code; ?>">
                            </div>

                            <div class="form-group">
                                <label style="color: red;">PIC Customer * </label>
                                <select name="id_pic_customer" id="pic_customer" class="form-control"> 
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
                                    <input type="hidden" name="isi" id="isi" value="<?php echo $list->customer_code; ?>">    
                                    <div class="form-group">
                                        <label>Excel File</label>
                                        <input type="file" name="excel_file" id="excel_file" class="form-control" >
                                        <input type="hidden" name="exel_name" id="exel_name">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="myButton" data-loading-text="Loading..." class="btn btn-primary btn-sm">Upload</button> 
                                        <button type="button" class="btn btn-warning btn-sm" id="cancel-form">Cancel</button>
                                        <a href="<?php echo base_url('assets/template_sample_customer.xlsx'); ?>" class="btn btn-success btn-sm">[Download Template]</a>
                                    </div>
                                </form>
                                <button type="button" id="saveTriger" class="btn btn-warning btn-sm" >Save Selected</button>
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

<script type="text/javascript">
    var codecust = $("#customer_code").val();

    $("#select_id").on('click', function () { // bulk checked
        var status = this.checked;
        $(".ceklist").each(function () {
            $(this).prop("checked", status);
        });
    });



    $.getJSON("<?php echo base_url('transaksi/customer_quotation/get_temp_qc/'); ?>" + codecust, function (data) {
        $("<tbody>").empty();
        var items = [];
        var iSum = 0;
        $.each(data.data, function (key, val) {
            iSum = iSum + parseInt(val.top);
            //console.log(val);
            items.push("<tr>");
            items.push("<td><input type='checkbox' name='select_id' id='select_id' class='ceklist' value='" + val.id + "'>  </td>");
            items.push("<td>" + val.customer_code + "</td>");
            items.push("<td>" + val.origin + "</td>");
            items.push("<td>" + val.province + "</td>");
            items.push("<td>" + val.destination_city + "</td>");
            items.push("<td>" + val.category_destination + "</td>");
            items.push("<td>" + val.island + "</td>");
            items.push("<td>" + val.lead_time + "</td>");
            items.push("<td>" + val.uom + "</td>");
            items.push("<td>" + val.trip_mode + "</td>");
            items.push("<td>" + val.service_mode + "</td>");
            items.push("<td>" + val.customer + "</td>");
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

    function get_list_tmp(codecustomer) {
       
        $.getJSON("<?php echo base_url('transaksi/customer_quotation/get_temp_qc/'); ?>" + codecustomer, function (data) {
            $('tbody').empty();
            var items = [];
            var iSum = 0;
            $.each(data.data, function (key, val) {
                iSum = iSum + parseInt(val.top);
                //console.log(val);
                items.push("<tr>");
                items.push("<td><input type='checkbox' name='select_id' id='select_id' class='ceklist' value='" + val.id + "'>  </td>");
                items.push("<td>" + val.customer_code + "</td>");
                items.push("<td>" + val.origin + "</td>");
                items.push("<td>" + val.province + "</td>");
                items.push("<td>" + val.destination_city + "</td>");
                items.push("<td>" + val.category_destination + "</td>");
                items.push("<td>" + val.island + "</td>");
                items.push("<td>" + val.lead_time + "</td>");
                items.push("<td>" + val.uom + "</td>");
                items.push("<td>" + val.trip_mode + "</td>");
                items.push("<td>" + val.service_mode + "</td>");
                items.push("<td>" + val.customer + "</td>");
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
        var codecustomers = $("#customer_code").val();
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
                url: "<?php echo base_url('transaksi/customer_quotation/datatable_bulk_save'); ?>",
                data: {data_ids: ids,codecustomers:codecustomers},
                success: function (result) {
                   get_list_tmp(codecustomers);
                    //able.draw(); // redrawing datatable
                   alert('Data has been saved!');
                },
                async: false
            });
        }
    });
    
    $('#delTriger').on("click", function (event) {
        var codecustomers = $("#customer_code").val();
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
                url: "<?php echo base_url('transaksi/customer_quotation/datatable_bulk_delete'); ?>",
                data: {data_ids: ids,codecustomers:codecustomers},
                success: function (result) {
                    get_list_tmp(codecustomers);
                    //able.draw(); // redrawing datatable
                   alert('Data has been deleted!');
                },
                async: false
            });
        }
    });

    $("#frmGroupUser").on("submit", function (event) {
        var $btn = $("#myButton").button('loading');
        var codecustomer = $("#customer_code").val();
        event.preventDefault();
        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            url: "<?php echo base_url('transaksi/customer_quotation/upload_quotation'); ?>",
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
                get_list_tmp(codecustomer);
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
    $(document).ready(function () {
     
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
                url: '<?php echo base_url('transaksi/customer_quotation/get_customer_name_json?query=%QUERY'); ?>',
                wildcard: '%QUERY'
            }
        });
        $('#remote .typeahead').typeahead(null, {
            name: 'customer_name',
            display: 'customer_name',
            source: getdata
        });
        $('#remote .typeahead').bind('typeahead:selected', function (obj, datum, name) {
            console.log(datum);
            $('#customer_name').val(datum.customer_name);
            $('#customer_code').val(datum.customer_code);
            $('#isi').val(datum.customer_code);
        });
        
        $("#remote").keyup(function(){
             $("#remote").css("margin-bottom", "50px");
        })

        //ambil data ke server 
        $("#customer_name").on("focusout", function () {
            var isi = $('#customer_code').val();

            $("#remote").css("margin-bottom", "10px");
            $.ajax({
                url: "<?php echo base_url('transaksi/customer_quotation/get_id_pic_customer/'); ?>" + isi + "",
                type: "GET",
                success: function (response) {
                    //console.log(response);
                    $("#pic_customer").html(response);
                    get_list_tmp(isi);
                },
                dataType: "html"
            });
            return false;
            //alert(isi);
          });
 
        $.ajax({
            url: "<?php echo base_url('transaksi/customer_quotation/get_id_pic_customer/'); ?>" + codecust + "",
            type: "GET",
            success: function (response) {
                //console.log(response);
                $("#pic_customer").html(response);
            },
            dataType: "html"
        });
        return false;
        /*
         var custcode = $("#customer_code").val();
         var idpic = $("#id_pic_customer").val();
         $.ajax({
         url:"<?php echo base_url('transaksi/customer_quotation/get_id_pic_customer/'); ?>" + custcode + "",
         type:"GET",
         success: function(response){
         //console.log(response);
         $("#pic_customer").html(response);
         },
         dataType:"html"
         });
         return false;
         }
         );
         */

    });
    document.getElementById('excel_file').onchange = function () {
        $("#exel_name").val(this.value);
    };
    //alert('ok');


</script>
