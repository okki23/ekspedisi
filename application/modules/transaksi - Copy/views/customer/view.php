

<section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Customer
                </header>
                <div class="panel-body">
                    <div class="col-md-4 col-xs-12">
                        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo base_url("master/" . $this->router->fetch_class() . "/store"); ?>';"   ><i class="fa fa-plus-square"></i> Tambah Data </button>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <?php
                        $dataSearch = array(
                            "url" => base_url('master/' . $this->router->fetch_class() . '/index'),
                            "data_filter" => array(
                                "customer_code" => "Code",
                                "customer_name" => "Name",
                                "top" => "TOP"
                            )
                        );
                        echo search_box($dataSearch);
                        ?>
                    </div>
                    <div class="flip-scroll">
                        <table class="display table table-bordered table-striped table-responsive cf" id="example">
                            <thead class="cf">
                                <tr>
                                    <th style="width:20%;">Customer Code</th>
                                    <th style="width:20%;">Customer Name</th>
                                    <th style="width:20%;">TOP</th>
                                    <th style="width:20%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($customers as $customer) {
                                    echo "
                                        <tr>
                                            <td>$customer->customer_code</td>
                                            <td>$customer->customer_name</td>
                                            <td>$customer->top</td>
                                            <td>" .
                                    $this->button_lib->render(array('anchor' => 'upd', 'url' => 'master/' . $this->router->fetch_class() . '/store/' . $customer->id, 'text' => 'Edit'))
                                    . " " .
                                    $this->button_lib->render(array('anchor' => 'del', 'url' => 'master/' . $this->router->fetch_class() . '/delete/' . $customer->id, 'text' => 'Delete'))
                                    . "
                                            </td>
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
                                'url' => base_url('master/' . $this->router->fetch_class() . '/index/')
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
