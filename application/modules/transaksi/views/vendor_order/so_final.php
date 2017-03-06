
<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Print Preview Customer Order (Sales Order)
                </header>
                <div class="panel-body">
                    <a href="<?php echo base_url('transaksi/customer_order/so_final_pdf/'.$idprint); ?>" target="_blank" class="btn btn-primary"> Print </a>
                    <br>
                    &nbsp;
                    <table class="table" border="0">
                        <tr>
                            <td colspan="2" style="width:20%;"> <img src="<?php echo base_url('upload_files/gmss_icon.png'); ?>" width="100" height="100"> </td>
                            <td colspan="6" style="width:80%;"> <img src="<?php echo base_url('upload_files/logo.png'); ?>"  style="width: 80%; height: 80%;" > </td>
                        </tr>
                    </table>
                    <br>
                    
                    <h5 align="center"> No.CO : <?php echo $list_a->sales_order_code; ?>  </h5>
                     
                    <br>
                    <table class="table" border="0">
                        <tr>
                            <td style="width:20%;">Customer Name</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->customer_name; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Payment Type </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo strtoupper($list_a->payment_type); ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Customer Code</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->customer_code; ?>  </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;"> TOP </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->customer_top; ?> Hari </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Customer Phone</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->customer_phone; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Delivery Type</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo strtoupper($list_a->delivery_type); ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Customer Address</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->customer_address; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Traffic Name </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->traffic_name; ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Customer PIC</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->pic_name; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Date Pickup Order </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->date_pickup_order; ?> </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">Customer PIC Phone</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->pic_customer_phone; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Estimation Date Arrival </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->estimation_date_arrival; ?>  </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> </td>
                            <td style="width:2%;">  </td>
                            <td style="width:20%;">  </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Order Create By </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->order_create; ?> <br> (089610595064 / Dummy)  </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> </td>
                            <td style="width:2%;">  </td>
                            <td style="width:20%;">  </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;">Special Instruction </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;">  <?php echo $list_a->special_instruction; ?>  </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table" border="0" style="width: 100%;">
                        <tr>
                            <td > Customer Order Code </td>
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
                            $row_price = 0;
                            foreach ($list_b as $row) {

                                $ceksochild = $this->customer_order_m->cek_child_so($row->sales_order_code);
                                $list_child = $this->customer_order_m->list_child_so($row->sales_order_code);
                                //var_dump($list_child);

                                echo "<tr>";
                                echo "<td>" . $row->sales_order_code . "</td>";
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
                                    $child_price = 0;
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
                                         
                                        $child_price = $child_price + $row_child->price;
                                        
                                    }
                                    
                                }

                                
                                $row_price = $row_price + $row->price + $child_price;
                                 
                                $jumlah = $row_price;
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="8"> TOTAL </td>
                            <td> <?php echo "Rp. ". number_format($jumlah); ?>  </td>
                        </tr>
                    </table>
                    <br>

                    <table class="table" border="0">
                        <tr>
                            <td style="width:20%;"> Customer Over Weight </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> <?php echo $list_a->customer_over_weight; ?> (KG) </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> Customer Over Weight Price </td>
                            <td style="width:2%;"> : </td>
                            <td colspan="6" style="width:74%;"> Rp . <?php echo $list_a->customer_orver_price_weight; ?> </td>
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
                            <td style="width:20%;"> <?php echo "Rp. ". number_format($list_a->ppn_val); ?>  (<?php echo $list_a->ppn; ?>%)   </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">DP Date</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo $list_a->amount_dp_date; ?> </td>

                            <td colspan="2" style="width:2%;"> &nbsp; </td>

                            <td style="width:20%;"> PPH </td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> <?php echo "Rp. ". number_format($list_a->pph_val); ?>  (<?php echo $list_a->pph; ?>%)   </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">DP Payment</td>
                            <td style="width:2%;"> : </td>
                            <td style="width:20%;"> Rp. <?php echo number_format($list_a->amount_dp_debt); ?> </td>

                            <td colspan="2" style="width:2%;"> </td>

                            <td style="width:20%;">     </td>
                            <td style="width:2%;">     </td>
                            <td style="width:20%;">    </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"> <b>Total Debt</b></td>
                            <td style="width:2%;"><b> : </b></td>
                            <td style="width:20%;" colspan="6"> <b>Rp. <?php echo number_format($list_a->amount_sales - $list_a->amount_dp_debt); ?> </b></td>

                            

                         
                        </tr>
                        <tr>
                            <td colspan="7"> <b><i> Terbilang : "<?php echo terbilang($list_a->amount_sales - $list_a->amount_dp_debt); ?>"</i></b></td>
                           
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $("#myModal").modal({
            show: false,
            backdrop: 'static'
        });
        $("#cekprint").on("click", function () {
            $("#myModal").modal('show');
        });
    });


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



</script>
