<br>
                    
                    <h5 align="center"> No.CO : <?php echo $list_a->customer_order_index; ?>  </h5>
                     
                    <br>
<div style="margin-left:auto; margin-right: auto;">
    <table class="table" border="0" style="width: 100%;">
        <tr>
            <td colspan="2" style="width:20%;"> <img src="<?php echo base_url('upload_files/gmss_icon.png'); ?>" style="width:100%; height: 100%;"> </td>
            <td colspan="6" style="width:80%;"> <img src="<?php echo base_url('upload_files/logo.png'); ?>"  style="width: 100%; height: 100%;" > </td>
        </tr>
    </table>
    <table class="table" border="0" cellpadding="2" style="width: 100%;">
        <tr>
            <td style="width:20%;">Customer Name</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->customer_name; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Payment Type </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo strtoupper($list_a->payment_type); ?> </td>
        </tr>
        <tr>
            <td style="width:20%;">Customer Code</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->customer_code; ?>  </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;"> TOP </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->customer_top; ?> Hari </td>
        </tr>
        <tr>
            <td style="width:20%;">Customer Phone</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->customer_phone; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Delivery Type</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo strtoupper($list_a->delivery_type); ?> </td>
        </tr>
        <tr>
            <td style="width:20%;">Customer Address</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->customer_address; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Traffic Name </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->traffic_name; ?> </td>
        </tr>
        <tr>
            <td style="width:20%;">Customer PIC</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->pic_name; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Date Pickup Order </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->date_pickup_order; ?> </td>
        </tr>
        <tr>
            <td style="width:20%;">Customer PIC Phone</td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;"> <?php echo $list_a->pic_customer_phone; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Estimation Date Arrival </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;">  <?php echo $list_a->estimation_date_arrival; ?>  </td>
        </tr>
        <tr>
            <td style="width:20%;"> </td>
            <td style="width:2%;">  </td>
            <td style="width:26%;">  </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Order Create By </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;">  <?php echo $list_a->order_create; ?> <br>(089610595064 / Dummy)  </td>
        </tr>
        <tr>
            <td style="width:20%;"> </td>
            <td style="width:2%;">  </td>
            <td style="width:26%;">  </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;">Special Instruction </td>
            <td style="width:2%;"> : </td>
            <td style="width:26%;">  <?php echo $list_a->special_instruction; ?>  </td>
        </tr>
    </table>
    <br>

    <br>
    <table class="table" border="1" cellpadding="3" style="width: 100%;"> 
        <tr align="center">
            <td style="width: 20%;"> Customer Order Code </td>
            <td style="width: 10%;"> Date Order </td>
            <td style="width: 7%;"> Type Service </td>
            <td style="width: 10%;"> Charge Option </td>
            <td style="width: 8%;"> Service Mode </td>
            <td style="width: 10%;"> Origin </td>
            <td style="width: 10%;"> Province </td>
            <td style="width: 10%;"> District </td>
            <td style="width: 17%;"> Price </td>
        </tr>
        <?php
        $jumlah = 0;
        $row_price = 0;
         $child_price = 0;
        foreach ($list_b as $row) {
            /*
                                $ceksochild = $this->customer_order_m->cek_child_so($row->sales_order_code);
                                $list_child = $this->customer_order_m->list_child_so($row->sales_order_code);
                                 */
                                if($row->type_service == 'ftl'){
                                    $ceksochild = $this->customer_order_m->cek_child_so($row->sales_order_code);
                                    $list_child = $this->customer_order_m->list_child_so($row->sales_order_code);
                                }else{
                                     $ceksochild = 0;
                                }
            echo "<tr align='center'>
                 <td style='text-align:center;'>" . $row->sales_order_code . "</td>
                 <td style='text-align:center;'>" . $row->date_order . "</td>
                 <td style='text-align:center;'>" . strtoupper($row->type_service) . "</td>
                 <td style='text-align:center;'>" . ucwords($row->charge_option) . "</td>
                 <td style='text-align:center;'>" . $row->service_mode . "</td>
                 <td style='text-align:center;'>" . $row->origin . "</td>
                 <td style='text-align:center;'>" . $row->province . "</td>
                 <td style='text-align:center;'>" . $row->district . "</td>
                 <td style='text-align:right;'> Rp. " . number_format($row->price) . "</td>
                 </tr>";
            if ($ceksochild > 0) {
                $child_price = 0;
                foreach ($list_child as $row_child) {
                    echo "<tr>";
                    echo "<td> </td>";
                    echo "<td> </td>";
                    echo "<td> </td>";
                    echo "<td> Multidrop</td>";
                    echo "<td> </td>";
                    echo "<td>" . $row_child->origin . "</td>";
                    echo "<td>" . $row_child->province . "</td>";
                    echo "<td>" . $row_child->district . "</td>";
                    echo "<td style='text_align:left;'> Rp. " . number_format($row_child->price) . "</td>";
                    echo "</tr>";

                    $child_price = $child_price + $row_child->price;
                }
            }
            $row_price = $row_price + $row->price + $child_price;

            $jumlah = $row_price;
        }
        ?><tr>
            <td colspan="8" align="center"> TOTAL </td>
            <td> <?php echo "Rp. " . number_format($jumlah); ?>  </td>
        </tr>

    </table>
    <br>
    <br>
    <table class="table" border="1" cellpadding="2">
        <tr>
            <td style="width:30%;"> Customer Over Weight </td>
            <td style="width:2%;"> : </td>
            <td colspan="6" style="width:68%;"> <?php echo $list_a->customer_over_weight; ?> (KG) </td>
        </tr>
        <tr>
            <td style="width:30%;"> Customer Over Weight Price </td>
            <td style="width:2%;"> : </td>
            <td colspan="6" style="width:68%;"> Rp . <?php echo $list_a->customer_orver_price_weight; ?> </td>
        </tr>
        <tr>
            <td style="width:30%;"> Overnight </td>
            <td style="width:2%;"> : </td>
            <td colspan="6" style="width:68%;"> <?php echo $list_a->overnight; ?> (Night/Days)</td>
        </tr>
        <tr>
            <td style="width:30%;"> Overnight Price </td>
            <td style="width:2%;"> : </td>
            <td colspan="6" style="width:68%;"> Rp. <?php echo $list_a->price_overnight; ?> </td>
        </tr>
    </table>
    <br>
    <br>
    <table class="table" border="1" cellpadding="2">
        <tr>
            <td style="width:20%;">Amount Sales</td>
            <td style="width:2%;"> : </td>
            <td style="width:27%;"> Rp. <?php echo number_format($list_a->amount_sales); ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;"> PPN </td>
            <td style="width:2%;"> : </td>
            <td style="width:27%;"> <?php echo "Rp. " . number_format($list_a->ppn_val); ?>  (<?php echo $list_a->ppn; ?>%)  </td>
        </tr>
        <tr>
            <td style="width:20%;">DP Date</td>
            <td style="width:2%;"> : </td>
            <td style="width:27%;"> <?php echo $list_a->amount_dp_date; ?> </td>

            <td colspan="2" style="width:2%;"> &nbsp; </td>

            <td style="width:20%;"> PPH </td>
            <td style="width:2%;"> : </td>
            <td style="width:27%;"> <?php echo "Rp. " . number_format($list_a->pph_val); ?>  (<?php echo $list_a->pph; ?>%)  </td>
        </tr>
        <tr>
            <td style="width:20%;">DP Payment</td>
            <td style="width:2%;"> : </td>
            <td style="width:27%;"> Rp. <?php echo number_format($list_a->amount_dp); ?> </td>

            <td colspan="2" style="width:2%;"> </td>

            <td style="width:20%;">   </td>
            <td style="width:2%;">   </td>
            <td style="width:27%;">    </td>
        </tr>
         <tr>
                            <td style="width:20%;"> <b>Total Debt</b></td>
                            <td style="width:2%;"><b> : </b></td>
                            <td style="width:78%;" colspan="6"> <b>Rp. <?php echo number_format($list_a->amount_sales - $list_a->amount_dp); ?> </b></td>

                            

                         
                        </tr>
                        <tr>
                            <td colspan="7" style="width:100%;"> <b><i> Terbilang : "<?php echo terbilang($list_a->amount_sales - $list_a->amount_dp); ?>"</i></b></td>
                           
                        </tr>
    </table>
</div>