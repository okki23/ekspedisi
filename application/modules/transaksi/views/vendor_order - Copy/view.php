

<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Vendor Order  
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url("transaksi/" . $this->router->fetch_class() . "/store"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <?php
                        $dataSearch = array(
                            "url" => base_url('/' . $this->router->fetch_class() . '/index'),
                            "data_filter" => array(
                                "vendor_order_name" => "Name",
                                "place_of_birth" => "Place of Birth",
                                "date_of_birth" => "Date of Birth",
                                "last_education" => "Last Education"
                                )
                        );
                        echo search_box($dataSearch);
                        ?>
                    </div>
                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="example">
                            <thead class="cf">
                                <tr style="text-align:center;">
                                    <th style="width:12%;">PO Number</th>
                                    <th style="width:15%;">Vendor Name</th>
                                    <th style="width:10%;">Type Service</th>
                                    <th style="width:10%;">Date Created</th>
                                    <th style="width:15%;">Krani Name </th>
                                    <th style="width:10%;">PO Status</th>
                                    <th style="width:15%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                <?php
                                if(count($list) > 0){
                                    foreach($list as $row){
                                        echo "
                                        <tr>
                                            <td>".$row->purchase_order_code."</td>
                                            <td>".$row->vendor_name."</td>
                                            <td>".$row->type_service."</td>
                                            <td>".$row->date_order."</td>
                                            <td>".ucwords($row->employee_name)."</td>
                                            <td>".ucwords($row->purchase_order_status)."</td>
                                            <td>".
                                    $this->button_lib->render(array('anchor' => 'upd', 'url' => 'transaksi/' . $this->router->fetch_class() . '/store/' . $row->id, 'text' => 'Edit'))
                                    . " " .
                                    $this->button_lib->render(array('anchor' => 'del', 'url' => 'transaksi/' . $this->router->fetch_class() . '/delete/' . $row->id, 'text' => 'Delete'))
                                    . " ".
                                    $this->button_lib->render(array('anchor' => 'file', 'url' => 'upload_files/'.$row->upload_cn, 'text' => 'View CN'))
                                    ." ".
                                    $this->button_lib->render(array('anchor' => 'file', 'url' => 'upload_files/'.$row->upload_ba, 'text' => 'View BA'))."</td>
                                        </tr>
                                        ";
                                    }
                                    
                                }else{
                                    echo "
                                        <tr>
                                            <td>-</td>
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
                                'url' => base_url('/' . $this->router->fetch_class() . '/index/')
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
