<section class="wrapper">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <section class="panel">
                <header class="panel-heading">
                    Sales Order Form
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('transaksi/' . $this->router->fetch_class() . '/pro_store'); ?>">
                        <!--collapse start-->
                        <div class="panel-group m-bot20" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <ul>
                                                <li style="text-decoration:underline;">Sales Order Data</li>
                                            </ul>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-6">

                                            <div class="form-group" id="remote">
                                                <label> Customer Name</label>
                                                <br>
                                                <input type="hidden" name="val_pic_customer" value="<?php echo $list->id_pic_customer; ?>" id="val_pic_customer">
                                                <input type="hidden" name="key" value="<?php echo $list->payment_type; ?>" id="key">
                                                <input type="hidden" name="date_created" value="<?php echo date('y-m-d H:i:s'); ?>" id="date_created">
                                                <input type="hidden" name="id" class="form-control" value="<?php echo $list->id; ?>">

                                                <input type="text" name="customer_name" id="customer_name" value="<?php echo $list->customer_name; ?>" class="form-control typeahead">
                                            </div>

                                            <div class="form-group">
                                                <label> Customer Code</label>
                                                <input type="text" name="customer_code" readonly="readonly" id="customer_code" value="<?php echo $list->customer_code; ?>" class="form-control">
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
                                                <label style="color:red;"> Customer PIC</label>
                                                <input type="hidden" value="" name="val_cust_pic" id="val_cust_pic">
                                                <select name="id_pic_customer" id="id_pic_customer" class="form-control">
                                                    <option value="">--</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label> Office Phone</label>
                                                <input type="text" name="customer_phone" id="customer_phone" value="<?php echo $list->customer_phone; ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label> Date Pickup Order</label>
                                                <input type="text" name="date_pickup_order" value="<?php echo $list->date_pickup_order; ?>" class="form-control datepicker" id="date_pickup_order">
                                            </div>

                                            

                                            <!--<div class="form-group">
                                                <label> Tonase</label>
                                                <input type="text" name="tonase" id="tonase" value="<?php echo $list->tonase; ?>" class="form-control">
                                            </div>-->

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
                                                            echo "<option value=" . $listopt->id_position . " selected=selected>" . $listopt->employee_name . "</option>";
                                                        } else {
                                                            echo "<option value=" . $listopt->id_position . ">" . $listopt->employee_name . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            

                                        </div>

                                        <div class="col-md-6"> 


                                            <div class="form-group">
                                                <label> Customer Address</label>
                                                <input type="text" name="customer_address" id="customer_address" value="<?php echo $list->customer_address; ?>" class="form-control">
                                            </div>
                                            <div id="seleksi">
                                                <div class="form-group">
                                                    <label> Customer TOP</label>
                                                    <input type="text" name="customer_top" id="customer_top" value="<?php echo $list->customer_top; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label> PIC Phone</label>
                                                <input type="text" name="pic_customer_phone" id="pic_customer_phone" value="" class="form-control">
                                            </div>

                                            

                                            <div class="form-group">
                                                <label> Estimation Date Arrival</label>
                                                <input type="text" name="estimation_date_arrival"  value="<?php echo $list->estimation_date_arrival; ?>" class="form-control datepicker" id="estimation_date_arrival">
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
                                                <label> Special Instruction</label>
                                                <textarea name="special_instruction" class="form-control"> <?php echo $list->special_instruction; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <ul>
                                                <li style="text-decoration:underline;"> Sales Order Transaction</li>
                                            </ul>

                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        
                                            
                                        
                                        <div class="col-md-12">
                                            <!--button modal-->
                                            <div class="col-md-6">
                                                 <button type="button" id="news" class="btn btn-success">  Add Quotation of SO </button>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Delivery Point</label>
                                                    <input type="hidden" name="valdevpoint" id="valdevpoint" value="<?php echo $list->delivery_point; ?>">
                                                    <select name="delivery_point" id="delivery_point" class="form-control">
                                                        <option value="">--</option>
                                                        <option value="single_drop" 
                                                        <?php
                                                        if ($list->delivery_point == 'single_drop') {
                                                            echo "selected=selected";
                                                        }
                                                        ?> >Single Drop</option>
                                                        <option value="multi_drop" 
                                                        <?php
                                                        if ($list->delivery_point == 'multi_drop') {
                                                            echo "selected=selected";
                                                        }
                                                        ?>  >Multi Drop</option>
                                                    </select>
                                                </div>
                                            </div>
                                           

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
                                                                        <label> Sales Order Code</label>
                                                                        <input type="text" name="sales_order_code" id="sales_order_code" value="<?php echo $list->sales_order_code; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> Sales Order Status</label>
                                                                        <select name="sales_order_status" class="form-control" id="sales_order_status">
                                                                            <option value="">--</option>
                                                                            <option value="open" >Open</option>
                                                                            <option value="close">Close</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> Date Order</label>
                                                                        <input type="text" name="date_order" class="form-control datepicker" id="date_order">
                                                                    </div>
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

                                                                    <input type="hidden" name="island_single" id="island_single">

                                                                    <div class="form-group">
                                                                        <label> District </label>
                                                                        <select name="district" id="district" class="form-control"> 
                                                                            <option value=""> --Pilih-- </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> District Info </label>
                                                                        <input type="text" class="form-control" readonly="readonly"  id="district_info" name="district_info">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> Type Service</label>
                                                                        <select name="type_service" class="form-control" id="type_service">
                                                                            <option value="">--</option>
                                                                            <option value="ftl" >FTL</option>
                                                                            <option value="ltl" >LTL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div id="list_ftl">
                                                                        <div class="form-group">
                                                                            <label> Vehicle </label>
                                                                            <select name="vehicle" id="vehicle" class="form-control"> 
                                                                                <option value=""> --Pilih-- </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> Cubication </label>
                                                                            <input type="text"  class="form-control" id="cubication" name="cubication">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> Tonase </label>
                                                                            <input type="text" class="form-control" id="tonase" name="tonase">
                                                                        </div>
                                                                    </div>

                                                                    <div id="list_ltl">
                                                                        <div class="form-group">
                                                                            <label> Satuan </label>
                                                                            <select name="sc" id="sc" class="form-control"> 
                                                                                <option value=""> --Pilih-- </option>
                                                                                <option value="cn"> CN </option>
                                                                                <option value="kg"> KG </option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label> Type of Moda </label>
                                                                            <select name="moda" id="moda" class="form-control"> 
                                                                                <option value=""> --Pilih-- </option>
                                                                                <option value="land"> Land </option>
                                                                                <option value="sea"> Sea </option>
                                                                                <option value="air"> Air </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>




                                                                </div>

                                                                <div class="col-md-6"> 

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
                                                            <input type="hidden" name="province_params" id="province_params" class="form-control">
                                                            <input type="hidden" name="district_params" id="district_params" class="form-control"> 
                                                            <input type="hidden" name="island_params" id="island_params" class="form-control">
                                                            <input type="hidden" name="vehicle_params" id="vehicle_params" class="form-control">
                                                            <input type="hidden" readonly="readonly" name="origin_sub" id="origin_sub" class="form-control">

                                                            <div class="col-md-12">
                                                                <h4 align="center"> Parent Data</h4>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <table class="table">
                                                                        <tr> 
                                                                            <td> Origin </td>
                                                                            <td> : </td>
                                                                            <td> <p id="origin_subx"></p> </td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td> Province  </td>
                                                                            <td> : </td>
                                                                            <td> <p id="province_paramsx"></p> </td>
                                                                        </tr>
                                                                        
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <table class="table">
                                                                        <tr> 
                                                                            <td> District  </td>
                                                                            <td> : </td>
                                                                            <td> <p id="district_paramsx"></p> </td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td> Island  </td>
                                                                            <td> : </td>
                                                                            <td> <p id="island_paramsx"></p> </td>
                                                                        </tr>
                                                                        
                                                                    </table>
                                                                    </div>
                                                                    
                                                                          <br>
                                                                    <hr>
                                                                    <!--<button type="button" class="btn btn-primary" id="cekdata">cek </button>-->
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-6"> 
                                                                   
                                                                    
                                                                  

                                                                    <div class="form-group">
                                                                        <label> Province </label>
                                                                        <select name="province_sub" id="province_sub" class="form-control"> 
                                                                            <option value=""> --Pilih-- </option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="island_multi" id="island_multi">

                                                                    <div class="form-group">
                                                                        <label> District </label>
                                                                        <select name="district_sub" id="district_sub" class="form-control"> 
                                                                            <option value=""> --Pilih-- </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> Charge Option </label>
                                                                        <select name="charge_option_sub" id="charge_option_sub" class="form-control"> 
                                                                            <option value=""> --Pilih-- </option>
                                                                            <option value="standart"> Standart </option>
                                                                            <option value="free"> Free </option>
                                                                        </select>
                                                                    </div>  

                                                                    <!-- <div class="form-group">
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
                                                                    </div> -->
                                                                    
                                                                       <!--
                                                                    <div class="form-group">
                                                                        <label> Lead Time </label>


                                                                        <input type="text" class="form-control" readonly="readonly" id="lead_time_sub" name="lead_time_sub" >  
                                                                    </div>
                                                                    -->

                                                                    


                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label> Address </label>
                                                                        <input type="text" name="address_sub" class="form-control" id="address_sub"  >
                                                                    </div>

                                                                 

                                                                    <div class="form-group">
                                                                        <label> Multidrop Price </label>
                                                                        <input type="text" class="form-control"   readonly="readonly" id="price_sub" name="price_sub" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <hr>
                                                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                                                <thead>
                                                                    <tr>
                                                                        <th> No. </th>
                                                                      
                                                                        <th> Province </th>
                                                                        <th> District </th>
                                                                        <th> Island </th>
                                                                        <th> Address </th>
                                                                        <th> Charge Option </th>
                                                                        <th> Price </th>
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

                                            <table id="sofix" class="table "> 
                                                <thead>
                                                    <tr>
                                                        <th> No. </th>
                                                        <th> Sales Order Code </th>
                                                        <th> Date Order </th>
                                                        <th> Type Service </th>
                                                        <th> Charge Option </th>
                                                        <th> SO Status </th>
                                                        <th> Opsi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

                                            <ul>
                                                <li style="text-decoration:underline;"> Additional Price</li>
                                            </ul>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-lg-12">
                                            <table class="table">
                                                <tr align="center" style="font-weight: bold;">
                                                    <td> Customer Over Weight (Kg)</td>
                                                    <td> Customer Over Price Weight (Rp)</td>
                                                    <td> Overnight (Day)</td>
                                                    <td> Price Overnight (Rp)</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="customer_over_weight" id="customer_over_weight" value="<?php echo $list->customer_over_weight; ?>"   class="form-control" > </td>
                                                    <td><input type="text" name="customer_orver_price_weight" id="customer_orver_price_weight"  value="<?php echo $list->customer_orver_price_weight; ?>" class="form-control" ></td>
                                                    <td><input type="text" name="overnight" id="overnight" value="<?php echo $list->overnight; ?>"  class="form-control" ></td>
                                                    <td><input type="text" name="price_overnight" id="price_overnight" value="<?php echo $list->price_overnight; ?>"   class="form-control" ></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--additional price-->



                                        <!--amount-->
                                        <div class="form-group">
                                            <label> Amount Sales</label>
                                            <input type="text" name="amount_sales" readonly="readonly" id="amount_sales" value="<?php echo $list->amount_sales; ?>" class="form-control" >
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label> Overnight Plus</label>
                                            <input type="text" name="overnight_plus" value="<?php echo $list->overnight_plus; ?>"  id="overnight_plus" class="form-control" >
                                        </div>-->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label> Total Sales</label>
                                                <input type="text" name="netto_sales" readonly="readonly" id="netto_sales" value="<?php echo $list->netto_sales; ?>" class="form-control" >
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
                                                        <td> <input type="text" readonly="readonly" name="ppn_val" id="ppn_val" value="<?php echo $list->ppn_val; ?>" class="form-control" >  </td>
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
                                                <input type="text" id="amount_dp_date" name="amount_dp_date" value="<?php echo $list->amount_dp_date; ?>"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label> Amount DP Payment</label>
                                                <input type="text" name="amount_dp" value="<?php echo $list->amount_dp; ?>" id="amount_dp" class="form-control" >
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Amount DP Debt</label>
                                                    <input type="text" readonly="readonly" id="total_amount_debt" name="amount_dp_debt" value="<?php echo $list->amount_dp_debt; ?>" class="form-control" >
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--collapse end-->
                        <div align="center">
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-success"> Pick Sales Order </button>
                            <a href="<?php echo base_url('transaksi/sales_order'); ?>" class="btn btn-warning" > Cancel </a>

                        </div>

                    </form>


                    <!-- isi modal detail -->

                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Detail Data </h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr> 
                                            <td> Sales Order Code </td>
                                            <td> : </td>
                                            <td> <p id="nomorso_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Origin  </td>
                                            <td> : </td>
                                            <td> <p id="origin_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Vehicle  </td>
                                            <td> : </td>
                                            <td> <p id="vehicle_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Cubication  </td>
                                            <td> : </td>
                                            <td> <p id="cubication_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Tonase  </td>
                                            <td> : </td>
                                            <td> <p id="tonase_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Province  </td>
                                            <td> : </td>
                                            <td> <p id="province_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> District  </td>
                                            <td> : </td>
                                            <td> <p id="district_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> District Info  </td>
                                            <td> : </td> 
                                            <td> <p id="district_info_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Charge Option </td>
                                            <td> : </td>
                                            <td> <p id="charge_option_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Main Price </td>
                                            <td> : </td>
                                            <td> <p id="main_price_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Multidrop Price </td>
                                            <td> : </td>
                                            <td> <p id="multidrop_price_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Grand Total Price </td>
                                            <td> : </td>
                                            <td> <p id="grand_total_price_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Lead Time </td>
                                            <td> : </td>
                                            <td> <p id="lead_time_detail"></p> </td>
                                        </tr>
                                        <tr> 
                                            <td> Address </td>
                                            <td> : </td>
                                            <td> <p id="address_detail"></p> </td>
                                        </tr>
                                    </table>

                                </div>



                            </div>
                        </div>
                    </div>

                    <!-- isi modal detail -->






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

                $("#province").on("change", function () {
                    //console.log($(this).val());
                    var datapos = $("#province").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_island_single') ?>",
                        type: "POST",
                        data: {data: datapos},
                        success: function (dataku) {
                            var obj = JSON.parse(dataku);
                            //console.log(dataku);
                            $("#island_single").val(obj.island);
                        }
                    });
                    //$("#island_single").val();
                });

                $("#province_sub").on("change", function () {
                    //console.log($(this).val());
                    var datapos = $("#province_sub").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_island_single') ?>",
                        type: "POST",
                        data: {data: datapos},
                        success: function (dataku) {
                            var obj = JSON.parse(dataku);
                            //console.log(dataku);
                            $("#island_multi").val(obj.island);
                        }
                    });
                    //$("#island_single").val();
                });



                function get_so_trans(code) {
                    console.log(code);
                }

                $("#type_service").on("change", function () {
                    var ts = $("#type_service").val();
                    if (ts == '') {
                        $("#list_ftl").hide();
                        $("#list_ltl").hide();
                    } else if (ts == 'ftl') {
                        $("#list_ftl").show();
                        $("#list_ltl").hide();
                    } else if (ts == 'ltl') {
                        $("#list_ftl").hide();
                        $("#list_ltl").show();

                    }
                });


                $("#calculate_sub").on("click", function () {
                    var origin_sub = $("#origin_sub").val();
                    //var district_sub = $("#district_sub").val();
                    //var vehicle_sub = $("#vehicle_sub").val();
                    var charge_option_sub = $("#charge_option_sub").val();
                    var custcode = $("#customer_code").val();
                    
                      
                        var provincesub = $("#province_sub").val(); //province dropbaru
                        var districtsub = $("#district_sub").val();  //district or kota dropbaru;
                        var provinceparams = $("#province_params").val(); //province asal
                        var districtparams = $("#district_params").val(); // district or kota dropbaru
                        var island_params = $("#island_params").val(); // pulau asal
                        var island_multi = $("#island_multi").val(); // pulau dropbaru
                        //var vehicle_sub = $("#vehicle_sub").val();
                        var vehicle_params = $("#vehicle_params").val();
                        var satuan_params = $("#satuan_params").val();
                        var moda_params = $("#moda_params").val();
                         
                        
                    if (charge_option_sub == 'free') {
                        $("#price_sub").val(0);
                        //$("#lead_time_sub").val(0 + ' Days');
                    } else {
                        /*$.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/calculating_qso_multi'); ?>",
                            type: "POST",
                            data: {origin_sub: origin_sub, district_sub: district_sub, vehicle_sub: vehicle_sub},
                            success: function (data) {
                                var obj = JSON.parse(data);
                                //$("#resleadtime").html(obj.lead_time);
                                $("#lead_time_sub").val(obj.lead_time);
                                $("#price_sub").val(obj.price);
                                console.log(data);
                            }
                        });
                        */
                           
                           //var output = "Provinsi Pertama : " +provinceparams+ " | Distrik/Kota Pertama : " +districtparams+ " | Pulau Pertama : " +island_params+ " | Provinsi Kedua : " +provincesub+ " | Distrik or Kota Kedua : " +districtsub+ " | Pulau Kedua : " +island_multi; 
                        //console.log(output);

                        if (island_params == 'Java' && island_multi == 'Java') {
                            //console.log('Java Same Island');
                            if (districtparams == districtsub) {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjsc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjsc){
                                        console.log(valmdjsc);
                                        var obj = JSON.parse(valmdjsc)
                                        $("#price_sub").val(obj.mdjsc);
                                    }
                                });
                                //mdjsc
                                //console.log('Java Same City')
                            } else {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjdc){
                                        console.log(valmdjdc);
                                        var obj = JSON.parse(valmdjdc)
                                        $("#price_sub").val(obj.mdjdc);
                                    }
                                });
                                }
                                //mdjdc
                                //console.log('Java Diff City')
                        } else if (island_params == 'Sumatera' && island_multi == 'Sumatera') {
                            //console.log('Sumatera Same Island');
                            if (districtparams == districtsub) {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdssc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdssc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdssc);
                                        $("#price_sub").val(obj.valmdssc);
                                    }
                                });
                                //mdssc
                                //console.log('Sumatera Same City')
                            } else {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdsdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdsdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdsdc);
                                        $("#price_sub").val(obj.valmdsdc);
                                    }
                                });
                                //mdsdc
                                //console.log('Sumatera Diff City')
                            }
                        } else if (island_params == 'Sumatera' && island_multi == 'Java') {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdjdc);
                                        $("#price_sub").val(obj.valmdjdc);
                                    }
                                });
                            //console.log('Java Diff City');
                            //mdjdc
                        } else if (island_params == 'Java' && island_multi == 'Sumatera') {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdsdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdsdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdsdc)
                                        $("#price_sub").val(obj.valmdsdc);
                                    }
                                });
                            //console.log('Sumatera Diff City');
                            //mdsdc
                        }
                        
                        
                        
                    }
                    $("#savemodal_sub").show();
                });

                function get_detail_so_fix(data) {
                    //alert(data);
                    $("#myModal3").modal('show');
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_detail_so_fix/') ?>" + data,
                        type: "GET",
                        success: function (konten) {
                            //console.log(konten);
                            var obj = JSON.parse(konten);
                            //console.log(obj.sales_order_code);
                            $("#nomorso_detail").html(obj.sales_order_code);
                            $("#origin_detail").html(obj.origin);
                            $("#vehicle_detail").html(obj.vehicle);
                            $("#cubication_detail").html(obj.cubication);
                            $("#tonase_detail").html(obj.tonase);
                            $("#province_detail").html(obj.province);
                            $("#district_detail").html(obj.district);
                            $("#district_info_detail").html(obj.district_info);
                            $("#charge_option_detail").html(obj.charge_option);
                            $("#main_price_detail").html(obj.price);
                            $("#multidrop_price_detail").html(obj.totalsub);
                            $("#grand_total_price_detail").html(obj.hasil);
                            $("#lead_time_detail").html(obj.lead_time);
                            $("#address_detail").html(obj.address);


                        }
                    });


                }
                function get_origin_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_origin/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#origin_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_vehicle_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_vehicle/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#vehicle_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_province_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_province/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#province_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_district_sub(custcode) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_district/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#district_sub").html(response);
                        },
                        dataType: "html"
                    });
                }

                function get_multidrop(data) {
                    $.get("<?php echo base_url('transaksi/sales_order/get_edit_so_fix/'); ?>" + data, function (resp) {
                        var row = JSON.parse(resp);
                        get_list_so_fix_multi(row.id);
                        $("#soparent").val(row.id);
                        $("#origin_sub").val(row.origin);
                        $("#province_params").val(row.province);
                        $("#district_params").val(row.district);
                        $("#island_params").val(row.island_single);
                        $("#vehicle_params").val(row.vehicle);
                        $("#origin_subx").html(row.origin);
                        $("#province_paramsx").html(row.province);
                        $("#district_paramsx").html(row.district);
                        $("#island_paramsx").html(row.island_single);
                        $("#vehicle_paramsx").html(row.vehicle);
                        $("#satuan_params").html('');
                        $("#moda_params").html('');
                        console.log(resp);
                    });
                    var custcode = $("#customer_code").val();

                    get_origin_sub(custcode);
                    get_vehicle_sub(custcode);
                    get_province_sub(custcode);
                    get_district_sub(custcode);

                    $("#myModal2").modal('show');
                }
                function get_edit_so_fix(query) {
                    $('#myModal').modal('show');
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_edit_so_fix/'); ?>" + query,
                        type: "GET",
                        success: function (list) {
                            var obj = JSON.parse(list);
                            $("#idsofix").val(obj.id);
                            $("#origin").val(obj.origin);
                            $("#sales_order_code").val(obj.sales_order_code);
                            $("#sales_order_status").val(obj.sales_order_status);
                            $("#date_order").val(obj.date_order);
                            $("#province").val(obj.province);
                            $("#island_single").val(obj.island_single);
                            $("#district").val(obj.district);
                            $("#vehicle").val(obj.vehicle);
                            $("#type_service").val(obj.type_service);
                            $("#sc").val(obj.sc);
                            $("#moda").val(obj.moda);
                            $("#district_info").val(obj.district_info);
                            $("#cubication").val(obj.cubication);
                            $("#tonase").val(obj.tonase);
                            $("#charge_option").val(obj.charge_option);
                            $("#address").val(obj.address);
                            $("#lead_time").val(obj.lead_time);
                            $("#price").val(obj.price);

                            console.log(list);

                            var tsrv = obj.type_service;
                            //console.log()
                            if (tsrv == 'ftl') {
                                $("#list_ftl").show();
                                $("#list_ltl").hide();
                            } else if (tsrv == '') {
                                $("#list_ftl").hide();
                                $("#list_ltl").hide();
                            } else if (tsrv == 'ltl') {
                                $("#list_ftl").hide();
                                $("#list_ltl").show();
                            }
                        }
                    });

                }

                function get_delete_so_fix(query) {
                    var custcode = $("#customer_code").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_delete_so_fix/'); ?>",
                        type: "POST",
                        data: {query: query},
                        success: function (list) {
                            get_list_so_fix(custcode);
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
                            $("#resleadtime").html('');
                            $("#lead_time").val('');
                            $("#price").val('');
                        }
                    });
                }

                function get_delete_so_fix_multi(query) {
                    var custcode = $("#customer_code").val();
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_delete_so_fix_multi/'); ?>" + query,
                        type: "GET",

                        success: function (list) {
                            get_list_so_fix(custcode);
                            get_list_so_fix_multi(query);
                            console.log(list);
                            //$("#idsosub").val('');
                            //$("#soparent").val('');
                            //$("#origin_sub").val('');
                            $("#province_sub").val('');
                            $("#district_sub").val('');
                            //$("#vehicle_sub").val('');
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

                function get_edit_so_fix_multi(query) {

                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_edit_so_fix_multi/'); ?>" + query,
                        type: "GET",
                        success: function (list) {
                            var obj = JSON.parse(list);

                            $("#idsosub").val(obj.id);
                            $("#soparent").val(obj.id_primary_so);
                            $("#origin_sub").val(obj.origin);
                            $("#province_sub").val(obj.province);
                            $("#island_multi").val(obj.island_multi);
                            $("#district_sub").val(obj.district);
                            //$("#vehicle_sub").val(obj.vehicle);
                            $("#district_info_sub").val(obj.district_info);
                            $("#cubication_sub").val(obj.cubication);
                            $("#tonase_sub").val(obj.tonase);
                            $("#charge_option_sub").val(obj.charge_option);
                            $("#address_sub").val(obj.address);
                            $("#lead_time_sub").val(obj.lead_time);
                            $("#price_sub").val(obj.price);

                            console.log(list);
                        }
                    });
                }

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
                function get_list_so_fix_multi(idprimaryso) {

                    $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix_multi/'); ?>" + idprimaryso, function (data) {
                        var items = [];
                        $('#example tbody').empty();
                        var iSum = 0;
                        var no = 0;
                        $.each(data.data, function (key, val) {
                            no++;
                            iSum = iSum + parseInt(val.price);
                            console.log(val);
                            items.push("<tr>");
                            items.push("<td>" + no + "</td>");
                            
                            items.push("<td>" + val.province + "</td>");
                            items.push("<td>" + val.district + "</td>");
                            items.push("<td>" + val.island_multi + "</td>");
                            items.push("<td>" + val.address + "</td>");
                            items.push("<td>" + val.charge_option + "</td>");
                            items.push("<td>" + val.price + "</td>");
                  
                            items.push("<td>  <a href='javascript:void(0)' onclick='get_edit_so_fix_multi(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                              <a href='javascript:void(0)' onclick='get_delete_so_fix_multi(" + val.id + ");'> Delete </a> </td>");
                        });
                        $("<tbody/>", {html: items.join("")}).appendTo("#example");
                        $("#amount_sales_sub").val(iSum);
                    });

                }

                function get_list_so_fix(codecust) {
                    var devpoint = $("#delivery_point").val();
                    $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix/'); ?>" + codecust, function (data) {
                        $('#sofix tbody').empty();
                        var items = [];
                        var iSum = 0;
                        var no = 0;
                        $.each(data.data, function (key, val) {
                            no++;
                            iSum = iSum + parseInt(val.hasil);
                            //console.log(val);
                            items.push("<tr>");
                            items.push("<td>" + no + "</td>");
                            items.push("<td>" + val.sales_order_code + "</td>");
                            items.push("<td>" + val.date_order + "</td>");
                            items.push("<td>" + val.type_service + "</td>");
                            items.push("<td>" + val.charge_option + "</td>");
                            items.push("<td>" + val.sales_order_status + "</td>");
                            if (devpoint == 'single_drop') {
                                items.push("<td> <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                            } else if (devpoint == '') {
                                items.push("<td> <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                            } else {
                                items.push("<td> <a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                            }
                            items.push("</tr>");

                        });
                        $("<tbody/>", {html: items.join("")}).appendTo("#sofix");
                        $("#amount_sales").val(iSum);

                    });
                    //console.log(iSum);
                }


                $(document).ready(function () {

                    /*$("#cekdata").on("click", function () {
                        var custcode = $("#customer_code").val();
                        var vehicle_sub = $("#vehicle_sub").val();
                        var provincesub = $("#province_sub").val(); //province dropbaru
                        var districtsub = $("#district_sub").val();  //district or kota dropbaru;
                        var provinceparams = $("#province_params").val(); //province asal
                        var districtparams = $("#district_params").val(); // district or kota dropbaru
                        var island_params = $("#island_params").val(); // pulau asal
                        var island_multi = $("#island_multi").val(); // pulau dropbaru
                        var vehicle_sub = $("#vehicle_sub").val();
                        var vehicle_params = $("#vehicle_params").val();
                        var satuan_params = $("#satuan_params").val();
                        var moda_params = $("#moda_params").val();
                         
                        //var output = "Provinsi Pertama : " +provinceparams+ " | Distrik/Kota Pertama : " +districtparams+ " | Pulau Pertama : " +island_params+ " | Provinsi Kedua : " +provincesub+ " | Distrik or Kota Kedua : " +districtsub+ " | Pulau Kedua : " +island_multi; 
                        //console.log(output);

                        if (island_params == 'Java' && island_multi == 'Java') {
                            //console.log('Java Same Island');
                            if (districtparams == districtsub) {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjsc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjsc){
                                        console.log(valmdjsc);
                                        var obj = JSON.parse(valmdjsc)
                                        $("#price_sub").val(obj.mdjsc);
                                    }
                                });
                                //mdjsc
                                //console.log('Java Same City')
                            } else {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjdc){
                                        console.log(valmdjdc);
                                        var obj = JSON.parse(valmdjdc)
                                        $("#price_sub").val(obj.mdjdc);
                                    }
                                });
                                }
                                //mdjdc
                                //console.log('Java Diff City')
                        } else if (island_params == 'Sumatera' && island_multi == 'Sumatera') {
                            //console.log('Sumatera Same Island');
                            if (districtparams == districtsub) {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdssc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdssc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdssc);
                                        $("#price_sub").val(obj.valmdssc);
                                    }
                                });
                                //mdssc
                                //console.log('Sumatera Same City')
                            } else {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdsdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdsdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdsdc);
                                        $("#price_sub").val(obj.valmdsdc);
                                    }
                                });
                                //mdsdc
                                //console.log('Sumatera Diff City')
                            }
                        } else if (island_params == 'Sumatera' && island_multi == 'Java') {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdjdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdjdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdjdc);
                                        $("#price_sub").val(obj.valmdjdc);
                                    }
                                });
                            //console.log('Java Diff City');
                            //mdjdc
                        } else if (island_params == 'Java' && island_multi == 'Sumatera') {
                                $.ajax({
                                    url:"<?php echo base_url('transaksi/sales_order/get_mdsdc');?>",
                                    type:"POST",
                                    data:{custcode:custcode,vehicle_params:vehicle_params,island_multi:island_multi,districtsub:districtsub},
                                    success:function(valmdsdc){
                                        //console.log(valmdjsc);
                                        var obj = JSON.parse(valmdsdc)
                                        $("#price_sub").val(obj.valmdsdc);
                                    }
                                });
                            //console.log('Sumatera Diff City');
                            //mdsdc
                        }

                    });*/
                    $("#list_ftl").hide();
                    $("#list_ltl").hide();
                    $("#news").on("click", function () {
                        $('#myModal').modal('show');
                        var custcode = $("#customer_code").val();

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('transaksi/sales_order/get_so_code'); ?>",
                            dataType: "json",
                            data: {code: custcode},
                            success: function (result) {
                                console.log(result);
                                $('#sales_order_code').val(result);
                                //get_list_so_fix(datum.customer_code);
                                //get_list_tmp(datum.customer_code);
                            },
                            async: false

                        });


                        get_so_trans(custcode);
                    });



                    $("#myModal").modal({
                        show: false,
                        backdrop: 'static'
                    });
                    $("#myModal2").modal({
                        show: false,
                        backdrop: 'static'
                    });
                    $("#myModal3").modal({
                        show: false,
                        backdrop: 'static'
                    });
                    var devpoint = $("#valdevpoint").val();
                    $("#cancelmodal").show();
                    $("#savemodal").hide();
                    $("#savemodal_sub").hide();
                    $("#buat_ppn").hide();
                    $("#buat_pph").hide();

                    if ($("#ppn").val() != '') {
                        $("#buat_ppn").show();
                        $("#chppn").prop("checked", true);
                    }
                    if ($("#pph").val() != '') {
                        $("#buat_pph").show();
                        $("#chpph").prop("checked", true);
                    }


                    $("#chppn").change(function () {
                        if (this.checked) {
                            $("#buat_ppn").show();
                            //console.log('checked');
                        } else {
                            $("#buat_ppn").hide();
                            //console.log('nocheckced');
                        }
                    });

                    $("#chpph").change(function () {
                        if (this.checked) {
                            $("#buat_pph").show();
                            //console.log('checked');
                        } else {
                            $("#buat_pph").hide();
                            //console.log('nocheckced');
                        }
                    });

                    $("#delivery_point").on("change", function () {
                        $("#valdevpoint").val($(this).val());
                        var codecust = $("#customer_code").val();
                        var valdevchange = $("#delivery_point").val();
                        if (valdevchange == 'single_drop') {
                            $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix/'); ?>" + codecust, function (data) {
                                $('#sofix tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;

                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.sales_order_code + "</td>");
                                    items.push("<td>" + val.date_order + "</td>");
                                    items.push("<td>" + val.type_service + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.sales_order_status + "</td>");
                                    items.push("<td><a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#sofix");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        } else if (valdevchange == '') {
                            $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix/'); ?>" + codecust, function (data) {
                                $('#sofix tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;

                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.sales_order_code + "</td>");
                                    items.push("<td>" + val.date_order + "</td>");
                                    items.push("<td>" + val.type_service + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.sales_order_status + "</td>");

                                    items.push("<td><a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#sofix");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        } else {
                            $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix/'); ?>" + codecust, function (data) {
                                $('#sofix tbody').empty();
                                var items = [];
                                var iSum = 0;
                                var no = 0;

                                $.each(data.data, function (key, val) {
                                    no++;
                                    iSum = iSum + parseInt(val.hasil);
                                    //console.log(val);
                                    items.push("<tr>");
                                    items.push("<td>" + no + "</td>");
                                    items.push("<td>" + val.sales_order_code + "</td>");
                                    items.push("<td>" + val.date_order + "</td>");
                                    items.push("<td>" + val.type_service + "</td>");
                                    items.push("<td>" + val.charge_option + "</td>");
                                    items.push("<td>" + val.sales_order_status + "</td>");

                                    items.push("<td><a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                    <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                    items.push("</tr>");

                                });
                                $("<tbody/>", {html: items.join("")}).appendTo("#sofix");
                                $("#amount_sales").val(iSum);

                            });
                            //console.log(iSum);
                        }
                    });

                    var val_pic_customer = $("#val_pic_customer").val();
                    var custcode = $("#customer_code").val();

                    get_list_so_fix(custcode);
                    get_origin(custcode);
                    get_district(custcode);
                    get_province(custcode);
                    get_vehicle(custcode);


                    $("#cancelmodal").on("click", function () {
                        $('#myModal').modal('hide');
                        $("#savemodal").hide();
                        $("#origin").val('');
                        $("idsofix").val('');
                        $("#province").val('');
                        $("#island_single").val('');
                        $("#district").val('');
                        $("#vehicle").val('');
                        $("#type_service").val('');
                        $("#sc").val('');
                        $("#moda").val('');
                        $("#district_info").val('');
                        $("#cubication").val('');
                        $("#tonase").val('');
                        $("#charge_option").val('');
                        $("#address").val('');
                        $("#resleadtime").html('');
                        $("#lead_time").val('');
                        $("#price").val('');
                    });

                    $("#savemodal").on("click", function () {
                        var idsofix = $("#idsofix").val();
                        var origin = $("#origin").val();
                        var sales_order_code = $("#sales_order_code").val();
                        var sales_order_status = $("#sales_order_status").val();
                        var date_order = $("#date_order").val();
                        var province = $("#province").val();
                        var district = $("#district").val();
                        var vehicle = $("#vehicle").val();
                        var island_single = $("#island_single").val();
                        var type_service = $("#type_service").val();
                        var sc = $("#sc").val();
                        var moda = $("#moda").val();
                        var district_info = $("#district_info").val();
                        var cubication = $("#cubication").val();
                        var tonase = $("#tonase").val();
                        var charge_option = $("#charge_option").val();
                        var address = $("#address").val();
                        var lead_time = $("#lead_time").val();
                        var price = $("#price").val();
                        var custcode = $("#customer_code").val();

                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/save_qc_of_so'); ?>",
                            type: "POST",
                            data: {idsofix: idsofix,
                                origin: origin,
                                province: province,
                                island_single: island_single,
                                sales_order_code: sales_order_code,
                                sales_order_status: sales_order_status,
                                date_order: date_order,
                                district: district,
                                vehicle: vehicle,
                                type_service: type_service,
                                sc: sc,
                                moda: moda,
                                district_info: district_info,
                                cubication: cubication,
                                tonase: tonase,
                                charge_option: charge_option,
                                address: address,
                                lead_time: lead_time,
                                price: price,
                                cust_code: custcode
                            },
                            success: function (data) {
                                console.log(data);
                                get_list_so_fix(custcode);
                                $('#myModal').modal('hide');
                                $("#idsofix").val('');
                                $("#origin").val('');
                                $("#sales_order_code").val('');
                                $("#sales_order_status").val('');
                                $("#date_order").val('');
                                $("#province").val('');
                                $("#island_single").val('');
                                $("#district").val('');
                                $("#vehicle").val('');
                                $("#type_service").val('');
                                $("#sc").val('');
                                $("#moda").val('');
                                $("#district_info").val('');
                                $("#cubication").val('');
                                $("#tonase").val('');
                                $("#charge_option").val('');
                                $("#address").val('');
                                $("#resleadtime").html('');
                                $("#lead_time").val('');
                                $("#price").val('');
                            }

                        });
                    });

                    $("#savemodal_sub").on("click", function () {
                        var idsosub = $("#idsosub").val();
                        var custcode = $("#customer_code").val();
                        var soparent = $("#soparent").val();
                        var origin_sub = $("#origin_sub").val();
                        var province_sub = $("#province_sub").val();
                        var district_sub = $("#district_sub").val();
                        //var vehicle_sub = $("#vehicle_sub").val();
                        //var district_info_sub = $("#district_info_sub").val();
                        //var cubication_sub = $("#cubication_sub").val();
                        //var tonase_sub = $("#tonase_sub").val();
                        var charge_option_sub = $("#charge_option_sub").val();
                        var address_sub = $("#address_sub").val();
                        //var lead_time_sub = $("#lead_time_sub").val();
                        var price_sub = $("#price_sub").val();
                         
                        var origin_sub = $("#origin_sub").val();
                        //var district_sub = $("#district_sub").val();
                        //var vehicle_sub = $("#vehicle_sub").val();
                        //var charge_option_sub = $("#charge_option_sub").val();
                        //var custcode = $("#customer_code").val();
                     
                        //var provincesub = $("#province_sub").val(); //province dropbaru
                        //var districtsub = $("#district_sub").val();  //district or kota dropbaru;
                        var provinceparams = $("#province_params").val(); //province asal
                        var districtparams = $("#district_params").val(); // district or kota dropbaru
                        var island_params = $("#island_params").val(); // pulau asal
                        var island_multi = $("#island_multi").val(); // pulau dropbaru
                        //var vehicle_sub = $("#vehicle_sub").val();
                        var vehicle_params = $("#vehicle_params").val();
                        var satuan_params = $("#satuan_params").val();
                        var moda_params = $("#moda_params").val();
                        
                        

                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/save_qc_of_so_multi'); ?>",
                            type: "POST",
                            data: {idsosub: idsosub,
                                soparent: soparent,
                                origin_sub: origin_sub,
                                province_sub: province_sub,
                                district_sub: district_sub,
                                //vehicle_params: vehicle_params,
                                //district_info_sub: district_info_sub,
                                //cubication_sub: cubication_sub,
                                //tonase_sub: tonase_sub,
                                island_multi:island_multi,
                                charge_option_sub: charge_option_sub,
                                address_sub: address_sub,
                                //lead_time_sub: lead_time_sub,
                                price_sub: price_sub,
                                cust_code: custcode
                            },
                            success: function (data) {
                                console.log(data);
                                get_list_so_fix(custcode);
                                get_list_so_fix_multi(soparent);
                                //$('#myModal2').modal('hide');
                                $("#idsosub").val('');
                                //$("#soparent").val('');
                                //$("#origin_sub").val('');
                                $("#province_sub").val('');
                                $("#district_sub").val('');
                                //$("#vehicle_sub").val('');
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
                    });


                    $("#cancelmodal_sub").on("click", function () {
                        $('#myModal2').modal('hide');
                        $("#savemodal_sub").hide();
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
                        //$("#resleadtime").html('');
                        $("#lead_time_sub").val('');
                        $("#price_sub").val('');

                    });

                    function get_origin(custcode) {
                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/get_origin/'); ?>" + custcode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#origin").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_vehicle(custcode) {
                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/get_vehicle/'); ?>" + custcode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#vehicle").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_province(custcode) {
                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/get_province/'); ?>" + custcode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#province").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    function get_district(custcode) {
                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/get_district/'); ?>" + custcode + "",

                            success: function (response) {
                                //console.log(response);
                                $("#district").html(response);
                            },
                            dataType: "html"
                        });
                    }

                    //alert(val_pic_customer);
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_id_pic_customer/'); ?>" + custcode + "",
                        type: "GET",
                        success: function (response) {
                            console.log(response);
                            $("#id_pic_customer").html(response);
                            //$("#val_cust_pic").val(response);
                            //alert(response);
                        },
                        dataType: "html"
                    });


                    $.get('<?php echo base_url('transaksi/sales_order/get_val_pic_phone/') ?>' + val_pic_customer, function (data) {
                        var konten = JSON.parse(data);
                        $("#pic_customer_phone").val(konten.customer_pic_phone);
                        //console.log(konten.customer_pic_phone);
                    });

                    $("#id_pic_customer").on("change", function () {
                        var datax = $(this).val();
                        $.get('<?php echo base_url('transaksi/sales_order/get_val_pic_phone/') ?>' + datax, function (data) {
                            var konten = JSON.parse(data);
                            $("#pic_customer_phone").val(konten.customer_pic_phone);
                            //console.log(konten.customer_pic_phone);
                        });
                    });


                    //alert(custcode);
                    $.ajax({
                        url: "<?php echo base_url('transaksi/sales_order/get_id_pic_customer/'); ?>" + custcode + "",

                        success: function (response) {
                            //console.log(response);
                            $("#pic_customer").html(response);
                        },
                        dataType: "html"
                    });


                    $("#customer_name").on("keyup", function () {
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
                            url: "<?php echo base_url('transaksi/sales_order/get_traffic_phone/'); ?>" + data,
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


                    //ambil data ke server 
                    var getdata = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        remote: {
                            url: '<?php echo base_url('transaksi/sales_order/get_customer_name_json?query=%QUERY'); ?>',
                            wildcard: '%QUERY'
                        }
                    });

                    $('#remote .typeahead').typeahead(null, {
                        name: 'customer_name',
                        display: 'customer_name',
                        source: getdata
                    });

                    $('#remote .typeahead').bind('typeahead:selected', function (obj, datum, name) {

                        var code = $('#customer_code').val(datum.noso);
                        get_list_so_fix(datum.customer_code);
                        $('#customer_name').val(datum.customer_name);
                        $('#customer_code').val(datum.customer_code);
                        $('#customer_address').val(datum.office_address);
                        $('#customer_top').val(datum.top);
                        $('#customer_phone').val(datum.office_phone);
                        //get so code

                        //get so code
                        //get pic 
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('transaksi/sales_order/get_pic_phone/'); ?>" + datum.customer_code,
                            //dataType: "json",
                            //data: {code: datum.customer_code},
                            success: function (result) {
                                console.log(result);
                                //$('#pic_phone').val(result);
                            },
                            async: false

                        });


                        //$('#customer_id').val(datum.id);

                    });

                    function get_list_so_fix(codecust) {

                        $.getJSON("<?php echo base_url('transaksi/sales_order/get_list_so_fix/'); ?>" + codecust, function (data) {
                            $('#sofix tbody').empty();
                            var items = [];
                            var iSum = 0;
                            var no = 0;

                            $.each(data.data, function (key, val) {
                                no++;
                                iSum = iSum + parseInt(val.hasil);
                                //console.log(val);
                                items.push("<tr>");
                                items.push("<td>" + no + "</td>");
                                items.push("<td>" + val.sales_order_code + "</td>");
                                items.push("<td>" + val.date_order + "</td>");
                                items.push("<td>" + val.type_service + "</td>");
                                items.push("<td>" + val.charge_option + "</td>");
                                items.push("<td>" + val.sales_order_status + "</td>");

                                if (devpoint == 'single_drop') {
                                    items.push("<td> <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                } else if (devpoint == '') {
                                    items.push("<td> <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                } else {
                                    items.push("<td> <a href='javascript:void(0)' id='get_multidrop' onclick='get_multidrop(" + val.id + ");'> Multidrop </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_edit_so_fix(" + val.id + ");'> Edit </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_detail_so_fix(" + val.id + ");'> Detail </a> &nbsp; | &nbsp; \n\
                                                <a href='javascript:void(0)' onclick='get_delete_so_fix(" + val.id + ");'> Delete </a> </td>");
                                }

                                items.push("</tr>");

                            });
                            $("<tbody/>", {html: items.join("")}).appendTo("#sofix");
                            $("#amount_sales").val(iSum);

                        });
                        //console.log(iSum);
                    }


                    //ambil data ke server 

                    $("#customer_name").on("focusout", function () {
                        var isi = $('#customer_code').val();
                        get_origin(isi);
                        get_district(isi);
                        get_province(isi);
                        get_vehicle(isi);
                        $("#remote").css("margin-bottom", "10px");
                        //get si pic
                        $.ajax({
                            url: "<?php echo base_url('transaksi/sales_order/get_id_pic_customer/'); ?>" + isi + "",
                            type: "GET",
                            success: function (response) {
                                console.log(response);
                                $("#id_pic_customer").html(response);
                                $("#val_cust_pic").val(response);
                                //alert(response);
                            },
                            dataType: "html"
                        });

                        //get nomernya 
                        //

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
                                url: "<?php echo base_url('transaksi/sales_order/calculating_qso'); ?>",
                                type: "POST",
                                data: {origin: origin, district: district, vehicle: vehicle},
                                success: function (data) {
                                    var obj = JSON.parse(data);
                                    $("#resleadtime").html(obj.lead_time);
                                    $("#lead_time").val(obj.lead_time);
                                    $("#price").val(obj.price);
                                    console.log(data);
                                }
                            })
                        }
                        $("#savemodal").show();
                    });

                });



            </script>
