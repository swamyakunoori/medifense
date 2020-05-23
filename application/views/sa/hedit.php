<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Edit Hospital</a></li>
</ul>

<?php
$data = json_decode($hospital);
?>
<form id="add-hospital" name="add-hospital" class="add-hospital">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="hName" name="hName" value="<?= $data->hName?>" type="text" class="form-control" placeholder="Hospital Name" require>
            </div>
            <div class="form-group">
                <input id="hMobile" name="hMobile" value="<?= $data->hMobile?>" type="text" class="form-control" placeholder="Mobile Number" require>
            </div>
            <div class="form-group">
                <input id="hUsername" name="hUsername" value="<?= $data->hUsername?>" type="text" class="form-control" placeholder="User Name" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group res-mg-t-15">
                <textarea id="hAddress" name="hAddress" placeholder="Hospital Address" require><?= $data->hAddress?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
                <input type="hidden" id="hId" name="hId" value="<?= $data->hId?>">
                <button name="hadd" id="hadd" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
$('#add-hospital').on('submit',function(e){
    e.preventDefault();
   var formData = new FormData($(this)[0]);
         $.ajax({
            async: true,
            url:'<?=base_url()?>super/hedit',
            dataType: 'json',
            method:"post",
            data:formData,
            success: function(response){
                if(response.status == '200'){
                    alert(response.message);
                    window.location.href = "hall";
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