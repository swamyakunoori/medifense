<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Add Employee</a></li>
</ul>


<form id="add-employee" name="add-employee" class="add-employee">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <select name="cId" id="cId" class="form-control">
                <option value="none" selected="" disabled="">Select Comapny</option>
                <?php
                    foreach($companies as $row):
                        if($row->cStatus == 1){
                        ?>
                        <option value="<?php echo $row->cId; ?>"><?php echo $row->cName; ?></option>
                        <?php
                        }
                    endforeach;
                ?>
                </select>
            </div>
            <div class="form-group">
                <input id="eName" name="eName" type="text" class="form-control" placeholder="Employee Name">
            </div>
            <div class="form-group">
                <input id="eMobile" name="eMobile" type="text" class="form-control" placeholder="Mobile Number">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="empId" name="empId" type="text" class="form-control" placeholder="Employee Id">
            </div>
            <div class="form-group">
                <input id="eDesignation" name="eDesignation" type="text" class="form-control" placeholder="Employee Designation">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
                <button name="eadd" id="eadd" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
$('#add-employee').on('submit',function(e){
    e.preventDefault();
   var formData = new FormData($(this)[0]);
         $.ajax({
            async: true,
            url:'<?=base_url()?>super/eadd',
            dataType: 'json',
            method:"post",
            data:formData,
            success: function(response){
                if(response.status == '200'){
                    alert(response.message);
                    window.location.href = "eall";
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