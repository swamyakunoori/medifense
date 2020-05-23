<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Add Comapny</a></li>
</ul>

<?php
$data = json_decode($company);
?>
<form id="add-company" name="add-company" class="add-company">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <select name="hId" id="hId" class="form-control">
                <option value="<?= $data->hId ?>"><?= $data->hName ?></option>
                <?php
                    foreach($hospitals as $row):
                        if($row->hStatus == 1){
                        ?>
                        <option value="<?= $row->hId ?>"><?= $row->hName ?></option>
                        <?php
                        }
                    endforeach;
                ?>
                </select>
            </div>
            <div class="form-group">
                <input id="cName" name="cName" value="<?= $data->cName ?>" type="text" class="form-control" placeholder="Company Name" require>
            </div>
            <div class="form-group">
                <input id="cMobile" name="cMobile" value="<?= $data->cMobile ?>" type="text" class="form-control" placeholder="Mobile Number" require>
            </div>
            <div class="form-group">
                <input id="cUsername" name="cUsername" value="<?= $data->cUsername ?>" type="text" class="form-control" placeholder="User Name" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="cNoEmp" name="cNoEmp" type="number" value="<?= $data->cNoEmp ?>" class="form-control" placeholder="No of Employees" require>
            </div>
            <div class="form-group res-mg-t-15">
                <textarea id="cAddress" name="cAddress" placeholder="Company Address" require><?= $data->cAddress ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
                <input type="hidden" id="cId" name="cId" value="<?= $data->cId?>">
                <button name="cadd" id="cadd" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
</form>


</div>
</div>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
      
<script>
$('#add-company').on('submit',function(e){
    e.preventDefault();
   var formData = new FormData($(this)[0]);
         $.ajax({
            async: true,
            url:'<?=base_url()?>super/cedit',
            dataType: 'json',
            method:"post",
            data:formData,
            success: function(response){
                if(response.status == '200'){
                    alert(response.message);
                    window.location.href = "call";
                }
                else if(response.status == '500'){
                    alert(response.message);
                }
            },
            error: function(response){
                alert(response);
            },
            cache: false,
    		contentType: false,
    		processData: false
        });
});
</script>