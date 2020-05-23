<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Employees List</h4>
                    <div class="add-product">
                        <a href="eadd">Add Employee</a>
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
                                        <th data-field="hName">Hospital</th>
                                        <th data-field="cName">Company</th>
                                        <th data-field="empId">Employee Id</th>
                                        <th data-field="eName">Name</th>
                                        <th data-field="eMobile">Mobile</th>
                                        <th data-field="eDesignation">Designation</th>
                                        <th data-field="eStatus">Status</th>
                                        <th data-field="createdAt">Date</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 0;
                                        foreach($employees as $row):
                                            $i = $i+1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row->hName; ?></td>
                                        <td><?php echo $row->cName; ?></td>
                                        <td><?php echo $row->empId; ?></td>
                                        <td><?php echo $row->eName; ?></td>
                                        <td><?php echo $row->eMobile; ?></td>
                                        <td><?php echo $row->eDesignation; ?></td>
                                        <td>
                                    <?php 
                                    if($row->eStatus == 1){
                                    ?>
                                        <button data-toggle="tooltip" title="De Active" class="ps-setting eactive" value='{"eId" :<?= $row->eId ?>,"eStatus" : <?= $row->eStatus ?> }'>De Active</button>
                                    <?php
                                    }
                                    else if($row->eStatus == 0){
                                    ?>
                                        <button data-toggle="tooltip" title="Active" class="pd-setting eactive" value='{"eId" :<?= $row->eId ?>,"eStatus" : <?= $row->eStatus ?> }'>Active</button>
                                    <?php
                                    }
                                    ?>
                                        </td>
                                        <td><?php echo date('d-m-y', strtotime($row->createdAt));?></td>
                                        <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed eview" value='{"eId" :<?= $row->eId ?>}'><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed eactive" value='{"eId" :<?= $row->eId ?>,"eStatus" : 2 }'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

    $(document).on("click",".eview",function(e){
        var data=$(this);
        var edata = JSON.parse(data.val());
        var eId = edata.eId;
        $.redirect("eview", {"eId":eId}, "POST");
    });

    $(document).on("click",".eactive",function(e){
        var data=$(this);
        var edata = JSON.parse(data.val());
        var eId = edata.eId;
        var eStatus = edata.eStatus;
        $.redirect("<?=base_url()?>super/eactive", {"eId":eId,"eStatus":eStatus}, "POST");
    });

});
</script>