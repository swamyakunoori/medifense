<div class="courses-area">
    <div class="container-fluid">
        <div class="row mg-b-15">
            
            <?php foreach($employees as $row): ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="courses-inner res-mg-b-30">
                    <div class="courses-title">
                        <a href="#"><img src="<?php echo base_url(); ?>upload/<?= $row->eImage ?>" alt=""></a>
                        <h2 class="text-center"><?php echo $row->eName; ?></h2>
                    </div>
                    <div class="course-des">
                        <p><b>Employee Id</b> <?= $row->empId ?></p>
                        <p><b>Mobile</b> <?= $row->eMobile ?></p>
                        <p><b>Designation</b><?= $row->eDesignation ?></p>
                        <p><b>Company</b> <?= $row->cName ?></p>
                        <p><b>Under Hospital</b> <?= $row->hName ?></p>
                        <p><b>Date of Registration</b> <?= $row->createdAt ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="courses-inner res-mg-b-30">
                    <div class="course-des">
                        <p><b>Address</b> <?= $row->eAddress ?></p>
                        <p><b>Age</b></span> <?= $row->eAge ?></p>
                        <p><b>Gender</b> <?= $row->eGender ?></p>
                        <p><b>Corona Zone</b> <?= $row->eCoronaZone ?></p>
                        <p><b>Corona Status</b> <?= $row->eCoronaStatus ?></p>
                        <p><b>Disease</b> <?= $row->eDisease ?></p>
                        <p><b>Medicine</b> <?= $row->eMedicines ?></p>
                        <p><b>Health Condition</b> <?= $row->eHealthCondition ?></p>
                        <p><b>Travel Last 2 Months</b> <?= $row->eTravel ?></p>
                        <p><b>Mode of Travel</b> <?= $row->travelMode ?></p>
                        <p><b>Smoking</b> <?= $row->eSmoking ?></p>
                        <p><b>Drinking</b> <?= $row->eDrinking ?></p>
                        <p><b>Pregnant</b> <?= $row->ePregnant ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed eedit" value='<?= json_encode($row) ?>'>Update</button>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/new/jquery.redirect.js"></script>

<script>
jQuery(function($){
    
    $(document).on("click",".eedit",function(e){
        var data=$(this).val();
        $.redirect("eedit", {"employee":data}, "POST");
    });

});
</script>