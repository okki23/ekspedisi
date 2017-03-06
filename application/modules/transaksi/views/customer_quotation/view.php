<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Customer Quotation
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url("transaksi/" . $this->router->fetch_class() . "/store"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <?php
                        $dataSearch = array(
                            "url" => base_url('transaksi/' . $this->router->fetch_class() . '/index'),
                            "data_filter" => array(
                                "a.quotation_code" => "Quotation Code",
                                "b.customer_name" => "Customer Name",
                                "a.type_service" => "Type Service",
                                "a.date_create" => "Date Create"                              
                                )
                        );
                        echo search_box($dataSearch);
                        ?>
                    </div>
                     
                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="example">
                            <thead class="cf">
                                <tr>
                                    
                                    <th style="width:20%;">Quotation Code</th>
                                    <th style="width:20%;">Customer Name</th>
                                    <th style="width:20%;">Type Service</th>
                                    <th style="width:20%;">Date Created</th>
                                    <th style="width:20%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                if(count($customer_quotations) < 1){
                                    echo "<tr>
                                          <td> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> </td>
                                          </tr>";
                                }else{
                                    foreach ($customer_quotations as $cust_quot) {
                                    
                                    echo "
                                        <tr>
                                             
                                            <td>$cust_quot->quotation_code</td>
                                            <td>$cust_quot->customer_name</td>
                                            <td>".strtoupper($cust_quot->type_service)."</td>
                                            <td>$cust_quot->date_created</td>
                                            <td>" .
                                    $this->button_lib->render(array('anchor' => 'upd', 'url' => 'transaksi/' . $this->router->fetch_class() . '/store/' . $cust_quot->id, 'text' => 'Edit'))
                                    . " " .
                                    $this->button_lib->render(array('anchor' => 'del', 'url' => 'transaksi/' . $this->router->fetch_class() . '/delete/' . $cust_quot->id, 'text' => 'Delete'))
                                    . " ". $this->button_lib->render(array('anchor' => 'download', 'url' => 'transaksi/' . $this->router->fetch_class() . '/get_excel_quotation/' . $cust_quot->id, 'text' => 'Download Quotation'))."</td>
                                        </tr>
                                    ";
                                }
                                }
                                
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="col-md-12 col-xs-12">
                        <div align="center">
                            <?php
                            $data = array(
                                'total_rows' => $total_rows,
                                'limit' => 10,
                                'segment' => 4,
                                'url' => base_url('transaksi/' . $this->router->fetch_class() . '/index/')
                            );
                            $config = create_paging(1, $data);
                            $this->pagination->initialize($config);
                            echo $this->pagination->create_links();
                            ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<script type="text/javascript">
   
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
                //console.log(param);
                $('.search').attr("id", "pubdate");
                $('#pubdate').datepicker({format: 'yyyy-mm-dd'});
            } else {
                //console.log(param);
                $('.search').removeAttr('id','pubdate');
                //$('.search').removeAttr("id", "pubdate");
            }
        } else {
            $('.search').prop("disabled", false);
        }
    });



</script>
