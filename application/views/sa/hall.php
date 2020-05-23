<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Hospital List</h4>
                    <div class="add-product">
                        <a href="hadd">Add Hospital</a>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="hName">Name</th>
                                        <th data-field="hUsername">User Name</th>
                                        <th data-field="hMobile">Mobile</th>
                                        <th data-field="hStatus">Status</th>
                                        <th data-field="hAddress">Address</th>
                                        <th data-field="createdAt">Date</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 0;
                                        foreach($hospitals as $row):
                                            $i = $i+1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row->hName; ?></td>
                                        <td><?php echo $row->hUsername; ?></td>
                                        <td><?php echo $row->hMobile; ?></td>
                                        <td>
                                    <?php 
                                    if($row->hStatus == 1){
                                    ?>
                                        <button data-toggle="tooltip" title="De Active" class="ps-setting hactive" value='{"hId" :<?= $row->hId ?>,"hStatus" :<?= $row->hStatus ?>}'>De Active</button>
                                    <?php
                                    }
                                    else if($row->hStatus == 0){
                                    ?>
                                        <button data-toggle="tooltip" title="Active" class="pd-setting hactive" value='{"hId" :<?= $row->hId ?>,"hStatus" :<?= $row->hStatus ?>}'>Active</button>
                                    <?php
                                    }
                                    ?>
                                        </td>
                                        <td><?php echo $row->hAddress; ?></td>
                                        <td><?php echo date('d-m-y', strtotime($row->createdAt));?></td>
                                        <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed hedit" value='<?= json_encode($row) ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed hactive" value='{"hId" :<?= $row->hId ?>,"hStatus" : 2 }'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/new/jquery.redirect.js"></script>

<script>
jQuery(function($){
    
    $(document).on("click",".hedit",function(e){
        var data=$(this).val();
        $.redirect("hedit", {"hospital":data}, "POST");
    });

    $(document).on("click",".hactive",function(e){
        var data=$(this);
        var hdata = JSON.parse(data.val());
        var hId = hdata.hId;
        var hStatus = hdata.hStatus;
        $.redirect("<?=base_url()?>super/hactive", {"hId":hId,"hStatus":hStatus}, "POST");
    });

});
</script>