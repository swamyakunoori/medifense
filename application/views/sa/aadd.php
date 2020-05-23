<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Add Assessment</a></li>
</ul>

<form id="add-assessment" name="add-assessment" class="add-assessment">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="qName" name="qName" type="text" class="form-control" placeholder="Quetion" require>
            </div>
            <div class="form-group">
                <input id="qAnswer" name="qAnswer" type="text" class="form-control" placeholder="Answer" require>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
                <button name="aadd" id="aadd" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
$('#add-assessment').on('submit',function(e){
    e.preventDefault();
   var formData = new FormData($(this)[0]);
         $.ajax({
            async: true,
            url:'<?=base_url()?>super/aadd',
            dataType: 'json',
            method:"post",
            data:formData,
            success: function(response){
                if(response.status == '200'){
                    alert(response.message);
                    window.location.href = "aall";
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