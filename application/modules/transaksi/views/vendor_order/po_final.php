
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Print Preview Vendor Order (Purchase Order)
                    <?php
                    //var_dump($list_a);
                    ?>
                </header>
                <div class="panel-body">
                    <a href="<?php echo base_url('transaksi/vendor_order/so_final_pdf/'.$idprint); ?>" target="_blank" class="btn btn-primary"> Print </a>
                    <br>
                    &nbsp;
                    <table class="table" border="0">
                        <tr>
                            <td colspan="2" style="width:20%;"> <img src="<?php echo base_url('upload_files/gmss_icon.png'); ?>" width="100" height="100"> </td>
                            <td colspan="6" style="width:80%;"> <img src="<?php echo base_url('upload_files/logo.png'); ?>"  style="width: 80%; height: 80%;" > </td>
                        </tr>
                    </table>
                    <br>
                    
                    <h5 align="center"> No.CO : <?php echo $list_a->vendor_order_index; ?>  </h5>
                     
                    <br>
                    <table class="table" border="0">
                        <tr>
                            <td style="width:20%;">Vendor Name</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_name; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Payment Type </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo strtoupper($list_a->payment_type); ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Vendor Code</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_code; ?>  </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;"> TOP </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_top; ?> Hari </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Vendor Phone</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_phone; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Delivery Type</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo strtoupper($list_a->delivery_type); ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Vendor Address</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_address; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Traffic Name </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->traffic_name; ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Vendor PIC</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->pic_name; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Date Pickup Order </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->date_pickup_order; ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Vendor PIC Phone</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->pic_vendor_phone; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Estimation Date Arrival </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->estimation_date_arrival; ?>  </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Driver </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->vendor_driver_name; ?>  </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Order Create By </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->order_create; ?> <br> (089610595064 / Dummy)  </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Vehicle No</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->vendor_vehicle_no; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Special Instruction </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->special_instruction; ?>  </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table" border="0" style="width: 100%;">
                        <tr>
                            <td > Vendor Order Code </td>
                            <td> Date Order </td>
                            <td> Type Service </td>
                            <td> Charge Option </td>
                            <td> Service Mode </td>
                            <td> Origin </td>
                            <td> Province </td>
                            <td> District </td>
                            <td> Price </td>
                        </tr>

                        <tr>
                            <?php
                            $jumlah = 0;
                            $jumlah_price_parent = 0;
                            $row_price = 0;
                            $jumlah_price_sub = 0;
                            foreach ($list_b as $row) {
                                /*
                                $ceksochild = $this->vendor_order_m->cek_child_so($row->vendor_order_code);
                                $list_child = $this->vendor_order_m->list_child_so($row->vendor_order_code);                               
                                 */
                                
                               
                                    if($row->type_service == 'ftl'){
                                        $ceksochild = $this->vendor_order_m->cek_child_po($row->vendor_order_code);
                                        $list_child = $this->vendor_order_m->list_child_po($row->vendor_order_code);
                                    }else{
                                        $ceksochild = 0;
                                        
                                    }
                                
                                //var_dump($list_child);
                                 
                                
                                echo "<tr>";
                                echo "<td>" . $row->vendor_order_code . "</td>";
                                echo "<td>" . $row->date_order . "</td>";
                                echo "<td>" . strtoupper($row->type_service) . "</td>";
                                echo "<td>" . ucwords($row->charge_option) . "</td>";
                                echo "<td>" . $row->service_mode . "</td>";
                                echo "<td>" . $row->origin . "</td>";
                                echo "<td>" . $row->province . "</td>";
                                echo "<td>" . $row->district . "</td>";
                                echo "<td style='text_align:right;'> Rp. " . number_format($row->price) . "</td>";
                                echo "</tr>";
                                
                                if ($ceksochild > 0) {
                                    $jumlah_price_sub = 0;
                                    foreach ($list_child as $row_child) {
                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> </td>";
                                        echo "<td> </td>";
                                        echo "<td> Multidrop </td>";
                                        echo "<td> </td>";
                                        echo "<td>" . $row_child->origin . "</td>";
                                        echo "<td>" . $row_child->province . "</td>";
                                        echo "<td>" . $row_child->district . "</td>";
                                        echo "<td style='text_align:right;'> Rp. " . number_format($row_child->price) . "</td>";
                                        echo "</tr>";
                                         
                                        $jumlah_price_sub += $row_child->price;
                                        //var_dump($jumlah_price_sub);
                                    }
                                    
                                }

                                
                                //$row_price = $row_price + $row->price + $jumlah_price_sub;
                                 
                                $jumlah_price_parent += $row->price ;
                            }
                            $jumlahx = $jumlah_price_parent + $jumlah_price_sub;
                            ?>
                        </tr>
                        <tr>
                            <td colspan="8"> TOTAL </td>
                            <td> <?php echo "Rp. ". number_format($jumlahx); ?>  </td>
                        </tr>
                    </table>
                    <br>

                    <table class="table" border="0">
                        <tr>
                            <td style="width:20%;"> Vendor Over Weight </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> <?php echo $list_a->vendor_over_weight; ?> (KG) </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Vendor Over Weight Price </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> Rp . <?php echo $list_a->vendor_orver_price_weight; ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Overnight </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> <?php echo $list_a->overnight; ?> (Night/Days)</td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Overnight Price </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> Rp. <?php echo $list_a->price_overnight; ?> </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table" border="0">
                        <tr>
                            <td style="width:20%;">Amount Sales</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> Rp. <?php echo number_format($list_a->amount_sales); ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;"> PPN </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> 
                            <?php
                            if($list_a->ppn_val != '' || $list_a->ppn_val != NULL){
                            ?>
                            <td style="width:20%;"> <?php echo "Rp. ". number_format($list_a->ppn_val); ?>  (<?php echo $list_a->ppn; ?>%)   </td>
                            <?php
                            }else{
                            ?>
                            <td style="width:20%;"> <?php echo "Rp. 0 (0%)  "; ?></td>
                            <?php
                            }
                            ?>   
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">DP Date</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->amount_dp_date; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;"> PPH </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> 
                             <?php
                            if($list_a->pph_val != '' || $list_a->pph_val != NULL){                          
                            ?>
                            
                            <td style="width:20%;"> <?php echo "Rp. ". number_format($list_a->pph_val); ?>  (<?php echo $list_a->pph; ?>%)   </td>
                            
                            <?php 
                            }else{
                            ?>
                            
                            <td style="width:20%;"> <?php echo "Rp. 0 (0%)"; ?></td>
                            
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">DP Payment</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> Rp. <?php echo number_format($list_a->amount_dp); ?> </td>

                            <td colspan="2" style="width:2%;"> </td>

                            <td style="width:20%;">     </td>
                            <td style="width:2%;">     </td>
                            <td style="width:20%;">    </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> <b>Total Debt</b></td>
                            <td style="width:2%;"><b> : </b></td>
                            <td style="width:20%;" colspan="6"> <b>Rp. <?php echo number_format($list_a->amount_sales - $list_a->amount_dp); ?> </b></td>

                            

                         
                        </tr>
                        <tr>
                            <td colspan="7"> <b><i> Terbilang : "<?php echo terbilang($list_a->amount_sales - $list_a->amount_dp); ?>"</i></b></td>
                           
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>
 