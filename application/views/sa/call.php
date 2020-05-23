<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Company List</h4>
                    <div class="add-product">
                        <a href="cadd">Add Company</a>
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
                                        <th data-field="cName">Name</th>
                                        <th data-field="cUsername">User Name</th>
                                        <th data-field="cMobile">Mobile</th>
                                        <th data-field="cNoEmp">No of Emploees</th>
                                        <th data-field="cStatus">Status</th>
                                        <th data-field="cAddress">Address</th>
                                        <th data-field="createdAt">Date</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 0;
                                        foreach($companies as $row):
                                            $i = $i+1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row->hName; ?></td>
                                        <td><?php echo $row->cName; ?></td>
                                        <td><?php echo $row->cUsername; ?></td>
                                        <td><?php echo $row->cMobile; ?></td>
                                        <td><?php echo $row->cNoEmp; ?></td>
                                        <td>
                                    <?php 
                                    if($row->cStatus == 1){
                                    ?>
                                        <button data-toggle="tooltip" title="De Active" class="ps-setting cactive" value='{"cId" :<?= $row->cId ?>,"cStatus" : <?= $row->cStatus ?> }'>De Active</button><?php
                                    }
                                    else if($row->cStatus == 0){
                                    ?>
                                        <button data-toggle="tooltip" title="Active" class="pd-setting cactive" value='{"cId" :<?= $row->cId ?>,"cStatus" : <?= $row->cStatus ?> }'>Active</button><?php
                                    }
                                    ?>
                                        </td>
                                        <td><?php echo $row->cAddress; ?></td>
                                        <td><?php echo date('d-m-y', strtotime($row->createdAt));?></td>
                                        <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed cedit" value='<?= json_encode($row) ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed cactive" value='{"cId" :<?= $row->cId ?>,"cStatus" : 2 }'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
    
    $(document).on("click",".cedit",function(e){
        var data=$(this).val();
        $.redirect("cedit", {"company":data}, "POST");
    });

    $(document).on("click",".cactive",function(e){
        var data=$(this);
        var cdata = JSON.parse(data.val());
        var cId = cdata.cId;
        var cStatus = cdata.cStatus;
        $.redirect("<?=base_url()?>super/cactive", {"cId":cId,"cStatus":cStatus}, "POST");
    });

});
</script>