<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Assessment List</h4>
                    <div class="add-product">
                        <a href="aadd">Add Assessment</a>
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
                                        <th data-field="qName">Question</th>
                                        <th data-field="qAnswer">Answer</th>
                                        <th data-field="qStatus">Status</th>
                                        <th data-field="createdAt">Date</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 0;
                                        foreach($assessments as $row):
                                            $i = $i+1;
                                    ?>
                                    <tr>
                                        <td><?php echo $row->qName; ?></td>
                                        <td>
                                    <?php 
                                        $ans = explode("@",$row->qAnswer);
                                        foreach($ans as $a):
                                            echo $a."<br>";
                                        endforeach;
                                    ?>
                                        </td>
                                        <td>
                                    <?php 
                                    if($row->qStatus == 1){
                                    ?>
                                    <button data-toggle="tooltip" title="De Active" class="ps-setting qactive" value='{"qId" :<?= $row->qId ?>,"qStatus" : <?= $row->qStatus ?> }'>De Active</button><?php
                                    }
                                    else if($row->qStatus == 0){
                                    ?>
                                    <button data-toggle="tooltip" title="Active" class="pd-setting qactive" value='{"qId" :<?= $row->qId ?>,"qStatus" : <?= $row->qStatus ?> }'>Active</button><?php
                                    }
                                    ?>
                                        </td>
                                        <td><?php echo date('d-m-y', strtotime($row->createdAt));?></td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed qedit" value='<?= json_encode($row) ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed qactive" value='{"qId" :<?= $row->qId ?>,"qStatus" : 2 }'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
    
    // $(document).on("click",".qedit",function(e){
    //     var data=$(this).val();
    //     $.redirect("qedit", {"assessment":data}, "POST");
    // });

    $(document).on("click",".qactive",function(e){
        var data=$(this);
        var qdata = JSON.parse(data.val());
        var qId = qdata.qId;
        var qStatus = qdata.qStatus;
        $.redirect("<?=base_url()?>super/qactive", {"qId":qId,"qStatus":qStatus}, "POST");
    });

});
</script>