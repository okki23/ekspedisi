<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Vendor Order Form
                </header>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" action="<?php echo base_url('transaksi/' . $this->router->fetch_class() . '/pro_store'); ?>" enctype="multipart/form-data">
                            <div class="form-group" id="remote">
                                <label> Vendor Name</label>
                                <br>
                                <input type="hidden" name="val_pic_vendor" value="<?php echo $list->id_pic_vendor; ?>" id="val_pic_vendor">
                                <input type="hidden" name="key" value="<?php echo $list->payment_type; ?>" id="key">
                                <input type="hidden" name="date_created" value="<?php echo date('y-m-d H:i:s'); ?>" id="date_created">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">

                                <input type="text" name="vendor_name" id="vendor_name" value="<?php echo $list->vendor_name; ?>" class="form-control typeahead">
                            </div>

                            <div class="form-group">
                                <label> Vendor Code</label>
                                <input type="text" name="vendor_code" readonly="readonly" id="vendor_code" value="<?php echo $list->vendor_code; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="">--</option>
                                    <option value="cash" <?php
                                    if ($list->payment_type == 'cash') {
                                        echo "selected=selected";
                                    }
                                    ?> > Cash</option>
                                    <option value="kredit" <?php
                                    if ($list->payment_type == 'kredit') {
                                        echo "selected=selected";
                                    }
                                    ?> >Kredit</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="color:red;"> Vendor PIC</label>
                                <input type="hidden" value="" name="val_cust_pic" id="val_cust_pic">
                                <select name="id_pic_vendor" id="id_pic_vendor" class="form-control">
                                    <option value="">--</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Office Phone</label>
                                <input type="text" name="vendor_phone" id="vendor_phone" value="<?php echo $list->vendor_phone; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Date Pickup Order</label>
                                <input type="text" name="date_pickup_order" value="<?php echo $list->date_pickup_order; ?>" class="form-control datepicker" id="date_pickup_order">
                            </div>

                            <div class="form-group">
                                <label> Type Service</label>
                                <select name="type_service" class="form-control">
                                    <option value="">--</option>
                                    <option value="ftl" <?php
                                    if ($list->type_service == 'ftl') {
                                        echo "selected=selected";
                                    }
                                    ?> >FTL</option>
                                    <option value="ltl" <?php
                                    if ($list->type_service == 'ltl') {
                                        echo "selected=selected";
                                    }
                                    ?>  >LTL</option>
                                </select>
                            </div>
                            <!--
                            <div class="form-group">
                                <label> Tonase</label>
                                <input type="text" name="tonase" id="tonase" value="<?php echo $list->tonase; ?>" class="form-control">
                            </div>
                            -->
                            <div class="form-group">
                                <label> Delivery Type</label>
                                <select name="delivery_type" class="form-control">
                                    <option value="">--</option>
                                    <option value="regular" <?php
                                    if ($list->delivery_type == 'regular') {
                                        echo "selected=selected";
                                    }
                                    ?> >Regular</option>
                                    <option value="express" <?php
                                    if ($list->delivery_type == 'express') {
                                        echo "selected=selected";
                                    }
                                    ?> >Express</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Traffic Name</label>
                                <select name="id_traffic_name" class="form-control" id="id_traffic_name">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    foreach ($list_traffic as $listopt) {
                                        if ($listopt->id_position == $list->id_traffic_name) {
                                            echo "<option value=" . $listopt->id . " selected=selected>" . $listopt->employee_name . "</option>";
                                        } else {
                                            echo "<option value=" . $listopt->id . ">" . $listopt->employee_name . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label style="color: red;"> Krani</label>
                                <select name="id_krani" class="form-control" id="id_krani">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($list_krani as $listkr) {
                                        if ($listkr->id_position == $list->id_traffic_name) {
                                            echo "<option value=" . $listkr->id . " selected=selected>" . $listkr->employee_name . "</option>";
                                        } else {
                                            echo "<option value=" . $listkr->id . ">" . $listkr->employee_name . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> No. CN</label>
                                <input type="text" name="no_cn" value="<?php echo $list->no_cn; ?>" id="no_cn" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> No.BA</label>
                                <input type="text" name="no_ba" value="<?php echo $list->no_ba; ?>" id="no_ba" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Purchase Order Status</label>
                                <select name="purchase_order_status" class="form-control">
                                    <option value="">--</option>
                                    <option value="open" <?php
                                    if ($list->purchase_order_status == 'open') {
                                        echo "selected=selected";
                                    }
                                    ?> >Open</option>
                                    <option value="close" <?php
                                    if ($list->purchase_order_status == 'close') {
                                        echo "selected=selected";
                                    }
                                    ?> >Close</option>
                                </select>
                            </div>

                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label> Purchase Order Code</label>
                            <input type="text" name="purchase_order_code" id="purchase_order_code" value="<?php echo $list->purchase_order_code; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Vendor Address</label>
                            <input type="text" name="vendor_address" id="vendor_address" value="<?php echo $list->vendor_address; ?>" class="form-control">
                        </div>
                        <div id="seleksi">
                            <div class="form-group">
                                <label> Vendor TOP</label>
                                <input type="text" name="vendor_top" id="vendor_top" value="<?php echo $list->vendor_top; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label> PIC Phone</label>
                            <input type="text" name="pic_vendor_phone" id="pic_vendor_phone" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Date Order</label>
                            <input type="text" name="date_order" value="<?php echo $list->date_order; ?>" class="form-control datepicker" id="date_order">
                        </div>

                        <div class="form-group">
                            <label> Estimation Date Arrival</label>
                            <input type="text" name="estimation_date_arrival"  value="<?php echo $list->estimation_date_arrival; ?>" class="form-control datepicker" id="estimation_date_arrival">
                        </div>
                        <!--
                         <div class="form-group">
                             <label> Cubication</label>
                             <input type="text" name="cubication" id="cubication" value="<?php echo $list->cubication; ?>" class="form-control" >
                         </div>
                        -->
                        <div class="form-group">
                            <label> Delivery Point</label>
                            <input type="text" name="val_devpoint" value="<?php echo $list->delivery_point; ?>" id="val_devpoint">
                            <select name="delivery_point" id="delivery_point" class="form-control">
                                <option value="">--</option>
                                <option value="single_drop"  
                                <?php
                                if($list->delivery_point == 'single_drop'){
                                    echo "selected=selected";
                                }
                                ?>
                                > Single Drop </option>
                                
                                <option value="multi_drop" 
                                <?php
                                if($list->delivery_point == 'multi_drop'){
                                    echo "selected=selected";
                                }
                                ?>
                                > Multi Drop </option>
                                 
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Order Create By</label>
                            <input type="text" name="order_create" id="order_create" readonly="readonly" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Traffic Phone</label>
                            <input type="text" name="traffic_phone" id="traffic_phone" value="<?php echo $list->traffic_phone; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label style="color: red;"> No Vehicle</label>
                            <select name="no_vehicle" class="form-control" id="no_vehicle">
                                <option value="">--</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label> Special Instruction</label>
                            <textarea name="special_instruction" class="form-control"> <?php echo $list->special_instruction; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label> Upload CN</label>
                            <input type="file" name="fupload_cn" id="fupload_cn" class="form-control">
                            <h4> <label class="label label-default">  <a href=<?php echo base_url('upload_files') . "/" . $list->upload_cn; ?>  target='_blank'> <?php echo $list->upload_cn; ?> </a>  </label> </h4>
                            <input type="hidden" name="upload_cn" value="<?php echo $list->upload_cn; ?>" id="upload_cn">
                        </div>

                        <div class="form-group">
                            <label> Upload BA</label>
                            <input type="file" name="fupload_ba" id="fupload_ba" class="form-control">
                            <h4> <label class="label label-default">  <a href=<?php echo base_url('upload_files') . "/" . $list->upload_ba; ?>  target='_blank'> <?php echo $list->upload_ba; ?> </a>  </label> </h4>
                            <input type="hidden" name="upload_ba" value="<?php echo $list->upload_ba; ?>" id="upload_ba">
                        </div>


                    </div>

                    <div class="col-md-12">
                        <!--button modal-->

                        <a class="btn btn-success" data-toggle="modal" href="#myModal"> Add SO To Do List </a>
                        <!-- isi modal single drop -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Form Add Quotation SO </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6"> 
                                                <input type="hidden" name="idsofix" id="idsofix" value="">
                                                <div class="form-group">
                                                    <label> Origin </label>
                                                    <select name="origin" id="origin" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Province </label>
                                                    <select name="province" id="province" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> District </label>
                                                    <select name="district" id="district" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Vehicle </label>
                                                    <select name="vehicle" id="vehicle" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> District Info </label>
                                                    <input type="text"  readonly="readonly" class="form-control" id="district_info" name="district_info">
                                                </div>

                                                <div class="form-group">
                                                    <label> Cubication </label>
                                                    <input type="text"  class="form-control" id="cubication" name="cubication">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label> Tonase </label>
                                                    <input type="text" class="form-control" id="tonase" name="tonase">
                                                </div>

                                                <div class="form-group">
                                                    <label> Charge Option </label>
                                                    <select name="charge_option" id="charge_option" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                        <option value="standart"> Standart </option>
                                                        <option value="free"> Free </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Address </label>
                                                    <input type="text" name="address" class="form-control" id="address"  >
                                                </div>

                                                <div class="form-group">
                                                    <label> Driver </label>
                                                    <select  name="driver_vendors" class="form-control" id="driver_vendors" > 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>

                                                </div>


                                                <div class="form-group">
                                                    <label> No.Pol Vehicle </label>
                                                    <select  name="nopol_vehichle" class="form-control"  id="nopol_vehichle" > 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Lead Time </label>

                                                    <input type="text" class="form-control" readonly="readonly" id="lead_time" name="lead_time" >  
                                                </div>


                                                <div class="form-group">
                                                    <label> Price </label>
                                                    <input type="text" class="form-control"   readonly="readonly" id="price" name="price" >
                                                </div>


                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <button type="button" id="calculate" class="btn btn-block btn-success">Calculate</button>
                                        </div>


                                        <button type="button" id="savemodal" class="btn btn-primary">Save</button>
                                        <button type="button" id="cancelmodal" class="btn btn-primary">Cancel</button>


                                    </div>



                                </div>
                            </div>
                        </div>
                        <!-- isi modal single drop -->


                        <!-- isi modal multi drop -->

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Form Add Quotation SO Multidrop </h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idsosub" class="form-control" id="idsosub">
                                        <input type="hidden" name="soparent" id="soparent" class="form-control">


                                        <div class="col-md-12">
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label> Origin </label>
                                                    <input type="text" readonly="readonly" name="origin_sub" id="origin_sub" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Province </label>
                                                    <select name="province_sub" id="province_sub" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> District </label>
                                                    <select name="district_sub" id="district_sub" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Vehicle </label>
                                                    <select name="vehicle_sub" id="vehicle_sub" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> District Info </label>
                                                    <input type="text" readonly="readonly" class="form-control" id="district_info_sub" name="district_info_sub">
                                                </div>

                                                <div class="form-group">
                                                    <label> Cubication </label>
                                                    <input type="text"  class="form-control" id="cubication_sub" name="cubication_sub">
                                                </div>
                                            </div>

                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label> Tonase </label>
                                                    <input type="text" class="form-control" id="tonase_sub" name="tonase_sub">
                                                </div>

                                                <div class="form-group">
                                                    <label> Charge Option </label>
                                                    <select name="charge_option_sub" id="charge_option_sub" class="form-control"> 
                                                        <option value=""> --Pilih-- </option>
                                                        <option value="standart"> Standart </option>
                                                        <option value="free"> Free </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Address </label>
                                                    <input type="text" name="address_sub" class="form-control" id="address_sub"  >
                                                </div>
                                                <!--
                                                 <div class="form-group">
                                                    <label> Driver </label>
                                                    <select  name="driver_vendors_sub" class="form-control" id="driver_vendors_sub" > 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>

                                                </div>


                                                <div class="form-group">
                                                    <label> No.Pol Vehicle </label>
                                                    <select  name="nopol_vehichle_sub" class="form-control"  id="nopol_vehichle_sub" > 
                                                        <option value=""> --Pilih-- </option>
                                                    </select>
                                                </div>
                                                -->

                                                <div class="form-group">
                                                    <label> Lead Time </label>


                                                    <input type="text" class="form-control" readonly="readonly" id="lead_time_sub" name="lead_time_sub" >  
                                                </div>


                                                <div class="form-group">
                                                    <label> Price </label>
                                                    <input type="text" class="form-control"   readonly="readonly" id="price_sub" name="price_sub" >
                                                </div>


                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <table id="multi_po" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Origin </th>
                                                    <th> Vehicle </th>
                                                    <th> Cubication </th>
                                                    <th> Tonase </th>
                                                    <th> Province </th>
                                                    <th> District </th>
                                                    <th> Charge Option </th>
                                                    <th> District Info </th>
                                                    <th> Price </th>
                                                    <th> Lead Time </th>
                                                    <th> Address </th>
                                                    <th> Opsi </th>                                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>

                                        </table>



                                        <div class="form-group">

                                            <button type="button" id="calculate_sub" class="btn btn-block btn-success">Calculate Multidrop</button>
                                        </div>


                                        <button type="button" id="savemodal_sub" class="btn btn-primary">Save</button>
                                        <button type="button" id="cancelmodal_sub" class="btn btn-primary">Cancel</button>


                                    </div>



                                </div>
                            </div>
                        </div>

                        <!-- isi modal multi drop -->

                        <table id="example" class="table"> 
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Origin </th>
                                    <th> Vehicle </th>
                                    <th> Cubication </th>
                                    <th> Tonase </th>
                                    <th> Province </th>
                                    <th> District </th>
                                    <th> Charge Option </th>
                                    <th> District Info </th>
                                    <th> Main Price </th>
                                    <th> Multidrop Price </th>
                                    <th> Grand Total Price </th>
                                    <th> Lead Time </th>
                                    <th> Address </th>
                                    <th> Opsi </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                    <!--additional price-->
                    <div class="col-lg-12">
                        <table class="table">
                            <tr align="center" style="font-weight: bold;">
                                <td> Over Tonase (Kg)</td>
                                <td> Price Over Tonase (Rp)</td>
                                <td> Overnight (Day)</td>
                                <td> Price Overnight (Rp)</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="over_tonase" id="over_tonase" value="<?php echo $list->over_tonase; ?>"  class="form-control" > </td>
                                <td><input type="text" name="price_over_tonase" id="price_over_tonase" value="<?php echo $list->price_over_tonase; ?>"   class="form-control" ></td>
                                <td><input type="text" name="overnight" id="overnight" value="<?php echo $list->overnight; ?>"    class="form-control" ></td>
                                <td> <input type="text" name="price_overnight" id="price_overnight" value="<?php echo $list->price_overnight; ?>"    class="form-control" ></td>
                            </tr>
                        </table>
                    </div>
                    <!--additional price-->



                    <!--amount-->
                    <div class="form-group">
                        <label> Amount Sales</label>
                        <input type="text" name="amount_sales"   id="amount_sales" value="<?php echo $list->amount_sales; ?>"   class="form-control" >
                    </div>
                    <div class="form-group">
                        <label> Overnight Plus</label>
                        <input type="text" name="overnight_plus"   id="overnight_plus" value="<?php echo $list->overnight_plus; ?>"  class="form-control" >
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Total Sales</label>
                            <input type="text" name="netto_sales" readonly="readonly" value="<?php echo $list->netto_sales; ?>"  id="netto_sales"   class="form-control" >
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Kalkulasi Total Sales</label>
                            <br>
                            <button type="button" class="btn btn-primary" id="calculate_total_sales"> Calculate </button>
                        </div>
                    </div>

                    <!--amount-->

                    <!--tax-->
                    <div class="col-lg-12">
                        <table class="table">
                            <tr align="center" style="font-weight: bold;">
                                <td> <input type="checkbox" name="chppn" id="chppn"> PPN   </td>
                                <td> <input type="checkbox" name="chpph" id="chpph"> PPH (23) </td>
                            </tr> 
                        </table>

                        <div id="buat_ppn"> 
                            <table class="table">
                                <tr align="center" style="font-weight: bold;">
                                    <td>  Persentase PPN </td>
                                    <td>  Jumlah PPN </td>
                                </tr> 
                                <tr align="center" style="font-weight: bold;">
                                    <td>  
                                        <select name="ppn" id="ppn" class="form-control">
                                            <option value="">--</option>
                                            <option value="1" <?php
                                            if ($list->ppn == '1') {
                                                echo "selected=selected";
                                            }
                                            ?> >1%</option>
                                            <option value="10"<?php
                                            if ($list->ppn == '10') {
                                                echo "selected=selected";
                                            }
                                            ?>>10%</option>
                                        </select>
                                    </td>
                                    <td> <input type="text" readonly="readonly" name="ppn_val" id="ppn_val" value="<?php echo $list->ppn_val; ?>"  class="form-control" >  </td>
                                </tr> 
                            </table>
                        </div>

                        <div id="buat_pph">
                            <table class="table">
                                <tr align="center" style="font-weight: bold;">
                                    <td>  Persentase PPH </td>
                                    <td>  Jumlah PPH </td>
                                </tr> 
                                <tr align="center" style="font-weight: bold;">
                                    <td> 
                                        <select name="pph" id="pph" class="form-control">
                                            <option value="">--</option>
                                            <option value="2"  <?php
                                            if ($list->pph == '2') {
                                                echo "selected=selected";
                                            }
                                            ?>>2%</option>
                                            <option value="4"  <?php
                                            if ($list->pph == '4') {
                                                echo "selected=selected";
                                            }
                                            ?>>4%</option>
                                        </select>
                                    </td>
                                    <td> <input type="text" readonly="readonly" name="pph_val" id="pph_val" value="<?php echo $list->pph_val; ?>" class="form-control" > </td>
                                </tr> 
                            </table>
                        </div>
                        <!--tax-->


                        <!--dp-->
                        <div class="form-group">
                            <label> Amount DP Date </label>
                            <input type="text" id="amount_dp_date" name="amount_dp_date" value="<?php echo $list->amount_dp_date; ?>"   class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Amount DP Payment</label>
                            <input type="text" name="amount_dp"  id="amount_dp" value="<?php echo $list->amount_dp; ?>" class="form-control" >
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Amount DP Debt</label>
                                <input type="text" readonly="readonly" id="total_amount_debt" value="<?php echo $list->amount_dp_debt; ?>"  name="amount_dp_debt"   class="form-control" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Kalkulasi Amount Debt</label>
                                <br>
                                <button type="button" name="calculate_amount_debt" id="calculate_amount_debt" class="btn btn-primary"> Calculate </button>
                            </div>
                        </div>

                        <!--dp-->

                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-success"> Pick Purhcase Order </button>
                        <a href="<?php echo base_url('transaksi/vendor_order'); ?>" class="btn btn-warning" > Cancel </a>

                        <br>
                        &nbsp;
                    </div>

                    </form>


                    <div>
                        </section>
                    </div>

                </div>
            </section>

            <script type="text/javascript">

                $('#date_order').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('#date_pickup_order').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('#estimation_date_arrival').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('#amount_dp_date').datepicker({
                    format: 'yyyy-mm-dd'
                });
                var val_devpoint = $("#val_devpoint").val();
                console.log(val_devpoint);
                var vencode = $("#vendor_code").val();
                get_origin_sub(vencode);
                get_vehicle_sub(vencode);
                get_province_sub(vencode);
                get_district_sub(vencode);
                get_nopol_vehichle_sub(vencode)
                get_driver_vendors_sub(vencode);
                get_list_po_fix(vencode);
                get_nopol_vehichle(vencode)
                get_driver_vendors(vencode);
                get_origin(vencode);
                get_vehicle(vencode);
                get_province(vencode);
                get_district(vencode);
                function get_origin_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_origin/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#origin_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_vehicle_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_vehicle/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#vehicle_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_province_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_province/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#province_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_district_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_district/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#district_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_nopol_vehichle_sub(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_nopol_vehichle/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#nopol_vehichle_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_driver_vendors_sub(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_driver_vendors/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#driver_vendors_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_multidrop(data) {
                    $.get("<?php echo base_url('transaksi/vendor_order/get_edit_po_fix/'); ?>" + data, function (resp) {
                        var row = JSON.parse(resp);
                        get_list_po_fix_multi(row.id);
                        $("#soparent").val(row.id);
                        $("#origin_sub").val(row.origin);
                        console.log(resp);
                    });
                    var vencode = $("#customer_code").val();
                    $("#savemodal_sub").hide();
                    $("#myModal2").modal('show');
                }

                function get_edit_po_fix(query) {
                    $('#myModal').modal('show');
                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_edit_po_fix/'); ?>" + query,
                        type: "GET",
                        success: function (list) {
                            var obj = JSON.parse(list);
                            $("#idsofix").val(obj.id);
                            $("#origin").val(obj.origin);
                            $("#province").val(obj.province);
                            $("#district").val(obj.district);
                            $("#vehicle").val(obj.vehicle);
                            $("#district_info").val(obj.district_info);
                            $("#cubication").val(obj.cubication);
                            $("#tonase").val(obj.tonase);
                            $("#charge_option").val(obj.charge_option);
                            $("#address").val(obj.address);
                            $("#driver_vendors").val(obj.driver_vendors);
                            $("#nopol_vehichle").val(obj.nopol_vehicle);
                            $("#lead_time").val(obj.lead_time);
                            $("#price").val(obj.price);

                            console.log(list);
                        }
                    });

                }

                function get_delete_po_fix(query) {
                    var vencode = $("#vendor_code").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_delete_po_fix/'); ?>",
                        type: "POST",
                        data: {query: query},
                        success: function (list) {
                            get_list_po_fix(vencode);
                            console.log(list);
                            $("#origin").val('');
                            $("idsofix").val('');
                            $("#province").val('');
                            $("#district").val('');
                            $("#vehicle").val('');
                            $("#district_info").val('');
                            $("#cubication").val('');
                            $("#tonase").val('');
                            $("#charge_option").val('');
                            $("#address").val('');
                            $("#driver_vendors").val('');
                            $("#nopol_vehichle").val('');
                            $("#resleadtime").html('');
                            $("#lead_time").val('');
                            $("#price").val('');
                        }
                    });
                }

                function get_delete_po_fix_multi(query) {
                    var vencode = $("#vendor_code").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_delete_po_fix_multi/'); ?>" + query,
                        type: "GET",

                        success: function (list) {
                            get_list_po_fix(vencode);
                            get_list_po_fix_multi(query);
                            console.log(list);
                            //$("#idsosub").val('');
                            //$("#soparent").val('');
                            //$("#origin_sub").val('');
                            $("#province_sub").val('');
                            $("#district_sub").val('');
                            $("#vehicle_sub").val('');
                            $("#district_info_sub").val('');
                            $("#cubication_sub").val('');
                            $("#tonase_sub").val('');
                            $("#charge_option_sub").val('');
                            $("#address_sub").val('');
                            //$("#resleadtime").html('');
                            $("#lead_time_sub").val('');
                            $("#price_sub").val('');
                        }
                    });
                }


                function get_list_po_fix_multi(idprimarypo) {

                    $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix_multi/'); ?>" + idprimarypo, function (data) {
                        var items = [];
                        $('#multi_po tbody').empty();
                        var iSum = 0;
                        var no = 0;
                        $.each(data.data, function (key, val) {
                            no++;
                            iSum = iSum + parseInt(val.price);
                            console.log(val);
                            items.push("<tr>");
                            items.push("<td>" + no + "</td>");
                            items.push("<td>" + val.origin + "</td>");
                            items.push("<td>" + val.vehicle + "</td>");
                            items.push("<td>" + val.cubication + "</td>");
                            items.push("<td>" + val.tonase + "</td>");
                            items.push("<td>" + val.province + "</td>");
                            items.push("<td>" + val.district + "</td>");
                            items.push("<td>" + val.charge_option + "</td>");
                            items.push("<td>" + val.district_info + "</td>");
                            items.push("<td>" + val.price + "</td>");
                            items.push("<td>" + val.lead_time + "</td>");
                            items.push("<td>" + val.address + "</td>");
                            items.push("<td>  <a href='javascript:void(0)' onclick='get_edit_po_fix_multi(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                              <a href='javascript:void(0)' onclick='get_delete_po_fix_multi(" + val.id + ");'> Delete </a> </td>");
                        });
                        $("<tbody/>", {html: items.join("")}).appendTo("#multi_po");
                        $("#amount_sales_sub").val(iSum);
                    });

                }


                function get_edit_po_fix_multi(query) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_edit_po_fix_multi/'); ?>" + query,
                        type: "GET",
                        success: function (list) {
                            var obj = JSON.parse(list);

                            $("#idsosub").val(obj.id);
                            $("#soparent").val(obj.id_primary_po);
                            $("#origin_sub").val(obj.origin);
                            $("#province_sub").val(obj.province);
                            $("#district_sub").val(obj.district);
                            $("#vehicle_sub").val(obj.vehicle);
                            $("#district_info_sub").val(obj.district_info);
                            $("#cubication_sub").val(obj.cubication);
                            $("#tonase_sub").val(obj.tonase);
                            $("#charge_option_sub").val(obj.charge_option);
                            $("#address_sub").val(obj.address);
                            //$("#driver_vendors_sub").val(obj.driver_vendors);
                            //$("#nopol_vehicle_sub").val(obj.nopol_vehicle_sub);
                            $("#lead_time_sub").val(obj.lead_time);
                            $("#price_sub").val(obj.price);

                            console.log(list);
                        }
                    });
                }

                function get_nopol_vehichle(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_nopol_vehichle/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#nopol_vehichle").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_driver_vendors(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_driver_vendors/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#driver_vendors").html(response);
                        },
                        dataType: "html"
                    });
                }




                function get_origin(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_origin/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#origin").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_vehicle(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_vehicle/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#vehicle").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_province(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_province/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#province").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_district(vencode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_district/'); ?>" + vencode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#district").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_list_po_fix(codecust) {
//$('#example tbody').empty();
                    $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix/'); ?>" + codecust, function (data) {
                        $('#example tbody').empty();
                        var items = [];
                        var iSum = 0;
                        var no = 0;
                        $.each(data.data, function (key, val) {
                            no++;
                            iSum = iSum + parseInt(val.hasil);
                            //console.log(val);
                            items.push("<tr>");
                            items.push("<td>" + no + "</td>");
                            items.push("<td>" + val.origin + "</td>");
                            items.push("<td>" + val.vehicle + "</td>");
                            items.push("<td>" + val.cubication + "</td>");
                            items.push("<td>" + val.tonase + "</td>");
                            items.push("<td>" + val.province + "</td>");
                            items.push("<td>" + val.district + "</td>");
                            items.push("<td>" + val.charge_option + "</td>");
                            items.push("<td>" + val.district_info + "</td>");
                            items.push("<td>" + val.price + "</td>");
                            items.push("<td>" + val.totalsub + "</td>");
                            items.push("<td>" + val.hasil + "</td>");
                            items.push("<td>" + val.lead_time + "</td>");
                            items.push("<td>" + val.address + "</td>");
                            if (val_devpoint == 'single_drop') {
                                items.push("<td>  \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                            } else if(val_devpoint == '') {
                                items.push("<td>  \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                            }else{
                                items.push("<td> <a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                            } 
                            items.push("</tr>");

                        });
                        $("<tbody/>", {html: items.join("")}).appendTo("#example");
                        $("#amount_sales").val(iSum);

                    });
                    //console.log(iSum);
                }


                $(document).ready(function (e) {
                    $("#myModal").modal({
                        show: false,
                        backdrop: 'static'
                    });

                    $("#myModal2").modal({
                        show: false,
                        backdrop: 'static'
                    });

                    $("#delivery_point").on("change", function () {
                        //console.log($("#val_devpoint").val());
                        var valdev = $("#delivery_point").val();
                        var vencode = $("#vendor_code").val();
                        $("#val_devpoint").val($("#delivery_point").val());
                        console.log(valdev);
                        if (valdev == 'single_drop') {
                            //$('#example tbody').empty();
                            $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix/'); ?>" + vencode, function (data) {
                                $('#example tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;
                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.origin + "</td>");
                                    items.push("<td>" + val.vehicle + "</td>");
                                    items.push("<td>" + val.cubication + "</td>");
                                    items.push("<td>" + val.tonase + "</td>");
                                    items.push("<td>" + val.province + "</td>");
                                    items.push("<td>" + val.district + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.district_info + "</td>");
                                    items.push("<td>" + val.price + "</td>");
                                    items.push("<td>" + val.totalsub + "</td>");
                                    items.push("<td>" + val.hasil + "</td>");
                                    items.push("<td>" + val.lead_time + "</td>");
                                    items.push("<td>" + val.address + "</td>");
                                    items.push("<td>  \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#example");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        } else if(valdev == '') {
                            //$('#example tbody').empty();
                            $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix/'); ?>" + vencode, function (data) {
                                $('#example tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;
                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.origin + "</td>");
                                    items.push("<td>" + val.vehicle + "</td>");
                                    items.push("<td>" + val.cubication + "</td>");
                                    items.push("<td>" + val.tonase + "</td>");
                                    items.push("<td>" + val.province + "</td>");
                                    items.push("<td>" + val.district + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.district_info + "</td>");
                                    items.push("<td>" + val.price + "</td>");
                                    items.push("<td>" + val.totalsub + "</td>");
                                    items.push("<td>" + val.hasil + "</td>");
                                    items.push("<td>" + val.lead_time + "</td>");
                                    items.push("<td>" + val.address + "</td>");
                                    items.push("<td>   \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");

                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#example");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        }else{
                        //$('#example tbody').empty();
                            $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix/'); ?>" + vencode, function (data) {
                                $('#example tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;
                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.origin + "</td>");
                                    items.push("<td>" + val.vehicle + "</td>");
                                    items.push("<td>" + val.cubication + "</td>");
                                    items.push("<td>" + val.tonase + "</td>");
                                    items.push("<td>" + val.province + "</td>");
                                    items.push("<td>" + val.district + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.district_info + "</td>");
                                    items.push("<td>" + val.price + "</td>");
                                    items.push("<td>" + val.totalsub + "</td>");
                                    items.push("<td>" + val.hasil + "</td>");
                                    items.push("<td>" + val.lead_time + "</td>");
                                    items.push("<td>" + val.address + "</td>");
                                    items.push("<td> <a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");

                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#example");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        }
                    });

                    $("#savemodal").hide();
                    //console.log($("#ppn_val").val());
                    //console.log($("#pph_val").val());
                    $("#buat_ppn").hide();
                    $("#buat_pph").hide();

                    if ($("#ppn_val").val() != '') {
                        $("#buat_ppn").show();
                        $("#chppn").prop("checked", true);
                    }
                    if ($("#pph_val").val() != '') {
                        $("#buat_pph").show();
                        $("#chpph").prop("checked", true);
                    }

                    $("#fupload_ba").on("change", function () {
                        $("#upload_ba").val($(this).val());
                    });

                    $("#fupload_cn").on("change", function () {
                        $("#upload_cn").val($(this).val());
                    });
                    var val_pic_vendor = $("#val_pic_vendor").val();
                    var vencode = $("#vendor_code").val();




                    function get_nopol_vehichle(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_nopol_vehichle/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#nopol_vehichle").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_driver_vendors(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_driver_vendors/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#driver_vendors").html(response);
                            },
                            dataType: "html"
                        });
                    }




                    function get_origin(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_origin/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#origin").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_vehicle(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_vehicle/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#vehicle").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_province(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_province/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#province").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_district(vencode) {

                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_district/'); ?>" + vencode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#district").html(response);
                            },
                            dataType: "html"
                        });
                    }


                    //console.log(val_pic_vendor);
                    //alert(val_pic_vendor);
                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_id_pic_vendor/'); ?>" + vencode + "",
                        type: "GET",
                        success: function (response) {
                            console.log(response);
                            $("#id_pic_vendor").html(response);
                            //$("#val_cust_pic").val(response);
                            //alert(response);
                        },
                        dataType: "html"
                    });

                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_no_vehicle/'); ?>" + vencode + "",
                        type: "GET",
                        success: function (response) {
                            console.log(response);
                            $("#no_vehicle").html(response);
                            $("#val_cust_pic").val(response);
                            //alert(response);
                        },
                        dataType: "html"
                    });



                    $.get('<?php echo base_url('transaksi/vendor_order/get_val_pic_phone/') ?>' + val_pic_vendor, function (data) {
                        var konten = JSON.parse(data);
                        $("#pic_vendor_phone").val(konten.vendor_pic_phone);
                        //console.log(konten.vendor_pic_phone);
                    });

                    $("#id_pic_vendor").on("change", function () {
                        var datax = $(this).val();
                        $.get('<?php echo base_url('transaksi/vendor_order/get_val_pic_phone/') ?>' + datax, function (data) {
                            var konten = JSON.parse(data);
                            $("#pic_vendor_phone").val(konten.vendor_pic_phone);
                            //console.log(konten.vendor_pic_phone);
                        });
                    });


                    //alert(vencode);
                    $.ajax({
                        url: "<?php echo base_url('transaksi/vendor_order/get_id_pic_vendor/'); ?>" + vencode + "",

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

                    $("#id_traffic_name").on("change", function () {
                        var data = $("#id_traffic_name").val();
                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_traffic_phone/'); ?>" + data,
                            type: "GET",
                            //data:{data:data},
                            //datatype:"json",
                            success: function (data) {
                                var isi = JSON.parse(data);
                                console.log(isi.employee_phone);
                                $("#traffic_phone").val(isi.employee_phone);
                            }
                        });
                    });

                    $("#payment_type").change(function () {
                        if ($(this).val() == 'cash' || $(this).val() == '') {
                            $("#seleksi").hide();
                        } else {
                            $("#seleksi").show();
                        }
                    });

                    function get_list_po_fix(codecust) {
                        //$('#example tbody').empty();
                        $.getJSON("<?php echo base_url('transaksi/vendor_order/get_list_po_fix/'); ?>" + codecust, function (data) {
                            $('#example tbody').empty();
                            var items = [];
                            var iSum = 0;
                            var no = 0;
                            $.each(data.data, function (key, val) {
                                no++;
                                iSum = iSum + parseInt(val.hasil);
                                //console.log(val);
                                items.push("<tr>");
                                items.push("<td>" + no + "</td>");
                                items.push("<td>" + val.origin + "</td>");
                                items.push("<td>" + val.vehicle + "</td>");
                                items.push("<td>" + val.cubication + "</td>");
                                items.push("<td>" + val.tonase + "</td>");
                                items.push("<td>" + val.province + "</td>");
                                items.push("<td>" + val.district + "</td>");
                                items.push("<td>" + val.charge_option + "</td>");
                                items.push("<td>" + val.district_info + "</td>");
                                items.push("<td>" + val.price + "</td>");
                                items.push("<td>" + val.totalsub + "</td>");
                                items.push("<td>" + val.hasil + "</td>");
                                items.push("<td>" + val.lead_time + "</td>");
                                items.push("<td>" + val.address + "</td>");
                                if (val_devpoint == 'single_drop') {
                                    items.push("<td>  \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                                } else if(val_devpoint == 'single_drop'){
                                    items.push("<td>   \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                                }else{
                                    items.push("<td> <a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_edit_po_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                             <a href='javascript:void(0)' onclick='get_delete_po_fix(" + val.id + ");'> Delete </a> </td>");
                                }
                                items.push("</tr>");

                            });
                            $("<tbody/>", {html: items.join("")}).appendTo("#example");
                            $("#amount_sales").val(iSum);

                        });
                        //console.log(iSum);
                    }

                    //ambil data ke server 
                    var getdata = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        remote: {
                            url: '<?php echo base_url('transaksi/vendor_order/get_vendor_name_json?query=%QUERY'); ?>',
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
                        var code = $('#vendor_code').val(datum.noso);
                        $('#vendor_name').val(datum.vendor_name);
                        $('#vendor_code').val(datum.vendor_code);
                        $('#vendor_address').val(datum.vendor_address);
                        $('#vendor_top').val(datum.top);

                        $('#vendor_phone').val(datum.vendor_phone);
                        get_list_po_fix(datum.vendor_code);
                        get_nopol_vehichle(datum.vendor_code)
                        get_driver_vendors(datum.vendor_code);
                        get_origin(datum.vendor_code);
                        get_vehicle(datum.vendor_code);
                        get_province(datum.vendor_code);
                        get_district(datum.vendor_code);


                        get_origin_sub(datum.vendor_code);
                        get_vehicle_sub(datum.vendor_code);
                        get_province_sub(datum.vendor_code);
                        get_district_sub(datum.vendor_code);
                        get_nopol_vehichle_sub(datum.vendor_code)
                        get_driver_vendors_sub(datum.vendor_code);
                        //get so code
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('transaksi/vendor_order/get_po_code'); ?>",
                            dataType: "json",
                            data: {code: datum.vendor_code},
                            success: function (result) {
                                console.log(result);
                                $('#purchase_order_code').val(result);
                            },
                            async: false

                        });
                        //get so code
                        //get pic 
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('transaksi/vendor_order/get_pic_phone/'); ?>" + datum.vendor_code,
                            //dataType: "json",
                            //data: {code: datum.vendor_code},
                            success: function (result) {
                                console.log(result);
                                //$('#pic_phone').val(result);
                            },
                            async: false

                        });


                        //$('#vendor_id').val(datum.id);

                    });

                    $("#pph").change(function () {
                        var isi = parseInt($(this).val());
                        var total = parseInt($("#netto_sales").val());

                        var out = total * isi / 100;
                        $("#pph_val").val(out);

                        //console.log(isi);
                    });

                    $("#ppn").change(function () {
                        var isi = parseInt($(this).val());
                        var total = parseInt($("#netto_sales").val());

                        if (isi == '1') {
                            var out = total * (isi / 100);
                            $("#ppn_val").val(out * (1 / 100));
                        } else {
                            var out = total * isi / 100;
                            $("#ppn_val").val(out);
                        }

                        //console.log(out);
                    });

                    $("#district").on("change", function () {
                        var district = $(this).val();
                        var origin = $("#origin").val();
                        if (district != '' && origin == '') {
                            var konten = '';
                        } else if (district == '' && origin != '') {
                            var konten = '';
                        } else if (district == '' && origin == '') {
                            var konten = '';
                        } else {
                            if (district == origin) {
                                var konten = 'Dalam Kota';
                            } else {
                                var konten = 'Luar Kota';
                            }
                        }
                        $("#district_info").val(konten);
                        //console.log(konten);
                    });

                    $("#district_sub").on("change", function () {
                        var district_sub = $(this).val();
                        var origin_sub = $("#origin_sub").val();
                        if (district_sub != '' && origin_sub == '') {
                            var konten = '';
                        } else if (district_sub == '' && origin_sub != '') {
                            var konten = '';
                        } else if (district_sub == '' && origin_sub == '') {
                            var konten = '';
                        } else {
                            if (district_sub == origin_sub) {
                                var konten = 'Dalam Kota';
                            } else {
                                var konten = 'Luar Kota';
                            }
                        }
                        $("#district_info_sub").val(konten);
                        //console.log(konten);
                    });

                    $("#origin").on("change", function () {
                        var district = $("#district").val();
                        var origin = $(this).val();
                        if (district != '' && origin == '') {
                            var konten = '';
                        } else if (district == '' && origin != '') {
                            var konten = '';
                        } else if (district == '' && origin == '') {
                            var konten = '';
                        } else {
                            if (district == origin) {
                                var konten = 'Dalam Kota';
                            } else {
                                var konten = 'Luar Kota';
                            }
                        }
                        $("#district_info").val(konten);
                        //console.log(konten);
                    });

                    $("#calculate_sub").on("click", function () {
                        var origin_sub = $("#origin_sub").val();
                        var district_sub = $("#district_sub").val();
                        var vehicle_sub = $("#vehicle_sub").val();
                        var charge_option_sub = $("#charge_option_sub").val();

                        if (charge_option_sub == 'free') {
                            $("#price_sub").val(0);
                            $("#lead_time_sub").val(0 + ' Days');
                        } else {
                            $.ajax({
                                url: "<?php echo base_url('transaksi/vendor_order/calculating_qpo_multi'); ?>",
                                type: "POST",
                                data: {origin_sub: origin_sub, district_sub: district_sub, vehicle_sub: vehicle_sub},
                                success: function (data) {
                                    var obj = JSON.parse(data);
                                    //$("#resleadtime").html(obj.lead_time);
                                    $("#lead_time_sub").val(obj.lead_time);
                                    $("#price_sub").val(obj.price);
                                    console.log(data);
                                }
                            })
                        }
                        $("#savemodal_sub").show();
                    });

                    $("#calculate_total_sales").on("click", function () {
                        var amount_sales = $("#amount_sales").val();
                        var overnight_plus = $("#overnight_plus").val();
                        var operate = parseInt(amount_sales) + parseInt(overnight_plus);
                        $("#netto_sales").val(operate);
                    });

                    $("#calculate_amount_debt").on("click", function () {
                        var amount_dp = parseInt($("#amount_dp").val());
                        var netto_sales = parseInt($("#netto_sales").val());
                        var operate = netto_sales - amount_dp;
                        $("#total_amount_debt").val(operate);
                        /* 
                         $("#amount_dp").keyup(function () {
                         var am_dp = $(this).val();
                         var am_sales = $("#amount_sales").val();
                         var hasil = parseInt(am_sales) - parseInt(am_dp);
                         $("#amount_sales").val(hasil);
                         $("#netto_sales").val(hasil);
                         });
                         */
                        //total_amount_debt
                    });

                    //ambil data ke server 

                    $("#vendor_name").on("focusout", function () {
                        var isi = $('#vendor_code').val();
                        get_list_po_fix(isi);
                        $("#remote").css("margin-bottom", "10px");
                        //get si pic
                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_id_pic_vendor/'); ?>" + isi + "",
                            type: "GET",
                            success: function (response) {
                                console.log(response);
                                $("#id_pic_vendor").html(response);
                                $("#val_cust_pic").val(response);
                                //alert(response);
                            },
                            dataType: "html"
                        });

                        //get si vehicle
                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/get_no_vehicle/'); ?>" + isi + "",
                            type: "GET",
                            success: function (response) {
                                console.log(response);
                                $("#no_vehicle").html(response);
                                $("#val_cust_pic").val(response);
                                //alert(response);
                            },
                            dataType: "html"
                        });

                        //get nomernya 

                        return false;
                        //alert(isi);
                    });

                    $("#calculate_amount").on("click", function () {
                        var amount_sales = $("#amount_sales").val();
                        var overnight_plus = $("#overnight_plus").val();
                        var hasilpro = parseInt(amount_sales) + parseInt(overnight_plus);
                        console.log(hasilpro);
                    });

                    $("#calculate").on("click", function () {
                        var origin = $("#origin").val();
                        var district = $("#district").val();
                        var vehicle = $("#vehicle").val();
                        var charge_option = $("#charge_option").val();

                        if (charge_option == 'free') {
                            $("#price").val(0);
                            $("#lead_time").val(0 + ' Days');
                        } else {
                            $.ajax({
                                url: "<?php echo base_url('transaksi/vendor_order/calculating_qpo'); ?>",
                                type: "POST",
                                data: {origin: origin, district: district, vehicle: vehicle},
                                success: function (data) {
                                    var obj = JSON.parse(data);
                                    //$("#resleadtime").html(obj.lead_time);
                                    $("#lead_time").val(obj.lead_time);
                                    $("#price").val(obj.price);
                                    console.log(data);
                                }
                            })
                        }
                        $("#savemodal").show();
                    });

                    $("#cancelmodal").on("click", function () {
                        $('#myModal').modal('hide');
                        $("#savemodal").hide();
                        $("#origin").val('');
                        $("idsofix").val('');
                        $("#province").val('');
                        $("#district").val('');
                        $("#vehicle").val('');
                        $("#district_info").val('');
                        $("#cubication").val('');
                        $("#tonase").val('');
                        $("#charge_option").val('');
                        $("#address").val('');
                        $("#driver_vendors").val('');
                        $("#nopol_vehichle").val('');
                        $("#resleadtime").html('');
                        $("#lead_time").val('');
                        $("#price").val('');
                    });

                    $("#savemodal").on("click", function () {
                        var idsofix = $("#idsofix").val();
                        var origin = $("#origin").val();
                        var province = $("#province").val();
                        var district = $("#district").val();
                        var vehicle = $("#vehicle").val();
                        var district_info = $("#district_info").val();
                        var cubication = $("#cubication").val();
                        var tonase = $("#tonase").val();
                        var charge_option = $("#charge_option").val();
                        var address = $("#address").val();
                        var driver_vendors = $("#driver_vendors").val();
                        var nopol_vehicle = $("#nopol_vehichle").val();
                        var lead_time = $("#lead_time").val();
                        var price = $("#price").val();
                        var vencode = $("#vendor_code").val();
                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/save_qc_of_po'); ?>",
                            type: "POST",
                            data: {idsofix: idsofix,
                                origin: origin,
                                province: province,
                                district: district,
                                vehicle: vehicle,
                                district_info: district_info,
                                cubication: cubication,
                                tonase: tonase,
                                charge_option: charge_option,
                                address: address,
                                driver_vendors: driver_vendors,
                                nopol_vehicle: nopol_vehicle,
                                lead_time: lead_time,
                                price: price,
                                ven_code: vencode
                            },
                            success: function (data) {
                                console.log(data);
                                get_list_po_fix(vencode);
                                $('#myModal').modal('hide');
                                $("#idsofix").val('');
                                $("#origin").val('');
                                $("#province").val('');
                                $("#district").val('');
                                $("#vehicle").val('');
                                $("#district_info").val('');
                                $("#cubication").val('');
                                $("#tonase").val('');
                                $("#charge_option").val('');
                                $("#address").val('');
                                $("#driver_vendors").val('');
                                $("#nopol_vehichle").val('');
                                $("#resleadtime").html('');
                                $("#lead_time").val('');
                                $("#price").val('');
                            }

                        });
                    });

                    $("#savemodal_sub").on("click", function () {
                        var idsosub = $("#idsosub").val();
                        var soparent = $("#soparent").val();
                        var origin_sub = $("#origin_sub").val();
                        var province_sub = $("#province_sub").val();
                        var district_sub = $("#district_sub").val();
                        var vehicle_sub = $("#vehicle_sub").val();
                        var district_info_sub = $("#district_info_sub").val();
                        var cubication_sub = $("#cubication_sub").val();
                        var tonase_sub = $("#tonase_sub").val();
                        var charge_option_sub = $("#charge_option_sub").val();
                        var address_sub = $("#address_sub").val();
                        //var driver_vendors_sub = $("#driver_vendors_sub").val();
                        //var nopol_vehichle_sub = $("#nopol_vehichle_sub").val();
                        var lead_time_sub = $("#lead_time_sub").val();
                        var price_sub = $("#price_sub").val();
                        var vencodez = $("#vendor_code").val();
                        $.ajax({
                            url: "<?php echo base_url('transaksi/vendor_order/save_qc_of_po_multi'); ?>",
                            type: "POST",
                            data: {idsosub: idsosub,
                                soparent: soparent,
                                origin_sub: origin_sub,
                                province_sub: province_sub,
                                district_sub: district_sub,
                                vehicle_sub: vehicle_sub,
                                district_info_sub: district_info_sub,
                                cubication_sub: cubication_sub,
                                tonase_sub: tonase_sub,
                                charge_option_sub: charge_option_sub,
                                address_sub: address_sub,
                                //driver_vendors_sub: driver_vendors_sub,
                                //nopol_vehichle_sub: nopol_vehichle_sub,
                                lead_time_sub: lead_time_sub,
                                price_sub: price_sub,
                                ven_code: vencode
                            },
                            success: function (data) {
                                console.log(data);
                                get_list_po_fix(vencodez);
                                get_list_po_fix_multi(soparent);
                                //$('#myModal2').modal('hide');
                                $("#idsosub").val('');
                                //$("#soparent").val('');
                                //$("#origin_sub").val('');
                                $("#province_sub").val('');
                                $("#district_sub").val('');
                                $("#vehicle_sub").val('');
                                $("#district_info_sub").val('');
                                $("#cubication_sub").val('');
                                $("#tonase_sub").val('');
                                $("#charge_option_sub").val('');
                                $("#address_sub").val('');
                                //$("#driver_vendors_sub").val('');
                                //$("#nopol_vehichle_sub").val('');
                                //$("#resleadtime").html('');
                                $("#lead_time_sub").val('');
                                $("#price_sub").val('');
                            }

                        });
                    });


                    $("#cancelmodal_sub").on("click", function () {
                        $('#myModal2').modal('hide');
                        //$("#savemodal_sub").hide();
                        $("#idsosub").val('');
                        $("#soparent").val('');
                        $("#origin_sub").val('');
                        $("#province_sub").val('');
                        $("#district_sub").val('');
                        $("#vehicle_sub").val('');
                        $("#district_info_sub").val('');
                        $("#cubication_sub").val('');
                        $("#tonase_sub").val('');
                        $("#charge_option_sub").val('');
                        $("#address_sub").val('');
                        //$("#driver_vendors_sub").val('');
                        //$("#nopol_vehichle_sub").val('');
                        //$("#resleadtime").html('');
                        $("#lead_time_sub").val('');
                        $("#price_sub").val('');

                    });

                });



            </script>
