<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modular Print All SO </h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/customer_order/get_print_all_so_fields')?>" method="POST" enctype="multipart/form-data">
                <table border='0' cellpadding='6' cellspacing='0'> 
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.id" readonly="readonly" checked="checked" > ID </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.sales_order_code" readonly="readonly" checked="checked" > Sales Order Code </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="b.customer_name"   > Customer Name </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.origin"   > 
                         <input type="hidden" name="origin" value="a.origin"   > Origin </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.province"   > Province </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.district"    > District </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.island_single"   > Island </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.charge_option"  > Charge Option </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.address"   > Address </td>
                </tr>
                <tr style='font-weight:bold;' > 
                    <td> <input type="checkbox" name="params[]" value="a.price"  > Price </td>
                </tr>
 
                </table>
                    <br>
                    <input type="submit" id="printmod" name="post" value="Print" class="btn btn-primary"> 
                </form>
            </div>




        </div>



    </div>
</div>

<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Customer Order
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <!--<button type="button" class="btn btn-default" id="cekprint"> Cek Print </button>-->
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url("transaksi/" . $this->router->fetch_class() . "/store"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                        <a href = '<?php echo base_url("transaksi/" . $this->router->fetch_class() . "/print_all_so"); ?>' target="_blank" class="btn btn-danger"  ><i class="fa fa-print"></i> Print All SO </a>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <?php
                        $dataSearch = array(
                            "url" => base_url('transaksi/' . $this->router->fetch_class() . '/index'),
                            "data_filter" => array(
                                "customer_name" => "Customer Name"
                                
                            )
                        );
                        echo search_box($dataSearch);
                        ?>
                    </div>
                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="example">
                            <thead class="cf">
                                <tr>

<!--<th style="width:20%;">SO Number</th>-->
                                    <th style="width:20%;">Customer Name</th>
                                    <th style="width:20%;">Summary SO Open</th>
                                    <th style="width:20%;">Summary SO Close</th>
<!--<th style="width:20%;">Type Service</th>-->
                                    <th style="width:20%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (count($customer_order) > 0) {

                                    foreach ($customer_order as $row) {

                                        $so_open = $this->customer_order_m->get_so_open($row->customer_code);
                                        $so_close = $this->customer_order_m->get_so_close($row->customer_code);
                                        echo "
                                        <tr>
                                             
                                            <td>" . $row->customer_name . "</td>
                                            <td>" . $so_open->so_open . "</td>
                                            <td>" . $so_close->so_close . "</td>
                                            <td>" .
                                        $this->button_lib->render(array('anchor' => 'upd', 'url' => 'transaksi/' . $this->router->fetch_class() . '/store/' . $row->id, 'text' => 'Edit'))
                                        . " " . $this->button_lib->render(array('anchor' => 'del', 'url' => 'transaksi/' . $this->router->fetch_class() . '/delete/' . $row->id, 'text' => 'Delete'))
                                        . " " . $this->button_lib->render(array('anchor' => 'file', 'url' => 'transaksi/' . $this->router->fetch_class() . '/print_so_by_id/' . $row->id, 'text' => 'Print SO Transaction'))
                                        . " " . $this->button_lib->render(array('anchor' => 'file', 'url' => 'transaksi/' . $this->router->fetch_class() . '/print_so_final/' . $row->id, 'text' => 'Print SO Final'))
                                        . "</td> 
                                        </tr>
                                        ";
                                    }
                                } else {
                                    echo "
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    ";
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
    $(document).ready(function () {
        $("#printmod").on("click",function(){
           alert('print success!');
           $("#myModal").modal('hide');
        });
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
