<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Add Comapny</a></li>
</ul>


<form id="add-company" name="add-company" class="add-company">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <select name="hId" id="hId" class="form-control">
                <option value="none" selected="" disabled="">Select Hospital</option>
                <?php
                    foreach($hospitals as $row):
                        if($row->hStatus == 1){
                        ?>
                        <option value="<?php echo $row->hId; ?>"><?php echo $row->hName; ?></option>
                        <?php
                        }
                    endforeach;
                ?>
                </select>
            </div>
            <div class="form-group">
                <input id="cName" name="cName" type="text" class="form-control" placeholder="Company Name" require>
            </div>
            <div class="form-group">
                <input id="cMobile" name="cMobile" type="text" class="form-control" placeholder="Mobile Number" require>
            </div>
            <div class="form-group">
                <input id="cUsername" name="cUsername" value="<?= $cUsername ?>" type="text" class="form-control" placeholder="User Name" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="cNoEmp" name="cNoEmp" type="number" class="form-control" placeholder="No of Employees" require>
            </div>
            <div class="form-group res-mg-t-15">
                <textarea id="cAddress" name="cAddress" placeholder="Company Address" require></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
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
            url:'<?=base_url()?>super/cadd',
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