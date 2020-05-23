
<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-content-section">
<div class="product-payment-inner-st">
<ul id="myTabedu1" class="tab-review-design">
<li class="active"><a href="#description">Update Employee</a></li>
</ul>

<?php
$data = json_decode($employees);
?>
<form id="add-employee" name="add-employee" class="add-employee">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group">
                <input id="eName" name="eName" value="<?= $data->eName ?>" type="text" class="form-control" placeholder="Employee Name" require>
            </div>
            <div class="form-group">
                <input id="empId" name="empId" value="<?= $data->empId ?>" type="text" class="form-control" placeholder="Employee Id" readonly>
            </div>
            <div class="form-group">
                <input id="eMobile" name="eMobile" value="<?= $data->eMobile ?>" type="text" class="form-control" placeholder="Mobile Number" require>
            </div>
            <div class="form-group">
                <input id="eDesignation" name="eDesignation" value="<?= $data->eDesignation ?>" type="text" class="form-control" placeholder="Employee Designation" require>
            </div>
            <div class="form-group">
                <select name="cId" id="cId" class="form-control" readonly>
                <option value="<?= $data->cId ?>"><?= $data->cName ?></option>
                </select>
            </div>
            <div class="form-group">
                <select name="hId" id="hId" class="form-control" readonly>
                <option value="<?= $data->hId ?>"><?= $data->hName ?></option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group res-mg-t-15">
                <textarea id="eAddress" name="eAddress" placeholder="Address" require><?= $data->eAddress ?></textarea>
            </div>
            <div class="form-group">
                <input id="eAge" name="eAge" value="<?= $data->eAge ?>" type="number" class="form-control" placeholder="Age">
            </div>
            <div class="form-group">
            <span>Gender&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eGender =="Male"){
            ?>
                <input id="eGender" name="eGender" value="Male" type="radio"  checked>Male
                <input id="eGender" name="eGender" value="FeMale" type="radio"  >Female
            <?php
            }
                else if($data->eGender =="FeMale"){
            ?>
                <input id="eGender" name="eGender" value="Male" type="radio" >Male
                <input id="eGender" name="eGender" value="FeMale" type="radio"  checked>FeMale
            <?php
            }
            ?>
            </div>
            <div class="form-group">
                <input id="eCoronaZone" name="eCoronaZone" value="<?= $data->eCoronaZone ?>" type="text" class="form-control" placeholder="Corona Zone" require>
            </div>
            <div class="form-group">
            <span>Corona Status&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eCoronaStatus =="+Ve"){
            ?>
                <input id="eCoronaStatus" name="eCoronaStatus" value="+Ve" type="radio"  checked>+Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="-Ve" type="radio" >-Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="On Treatment" type="radio" >On Treatment
            <?php
            }
                else if($data->eCoronaStatus =="-Ve"){
            ?>
                <input id="eCoronaStatus" name="eCoronaStatus" value="+Ve" type="radio" >+Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="-Ve" type="radio"  checked>-Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="On Treatment" type="radio" >On Treatment
            <?php
            }
            else if($data->eCoronaStatus =="On Treatment"){
            ?>
                <input id="eCoronaStatus" name="eCoronaStatus" value="+Ve" type="radio" >+Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="-Ve" type="radio" >-Ve
                <input id="eCoronaStatus" name="eCoronaStatus" value="On Treatment" type="radio"  checked>On Treatment
            <?php
            }
            ?>
            </div>
            <div class="form-group">
                <input id="eDisease" name="eDisease" value="<?= $data->eDisease ?>" type="text" class="form-control" placeholder="Disease" require>
            </div>
            <div class="form-group">
            <span>Take Medicines&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eMedicines =="Yes"){
            ?>
                <input id="eMedicines" name="eMedicines" value="Yes" type="radio"  checked>Yes
                <input id="eMedicines" name="eMedicines" value="No" type="radio" >No
            <?php
            }
                else if($data->eMedicines =="No"){
            ?>
                <input id="eMedicines" name="eMedicines" value="Yes" type="radio" >Yes
                <input id="eMedicines" name="eMedicines" value="No" type="radio"  checked>No
            <?php
            }
            ?>
            </div>
            <div class="form-group">
                <input id="eHealthCondition" name="eHealthCondition" value="<?= $data->eHealthCondition ?>" type="text" class="form-control" placeholder="Health Condition" require>
            </div>
            <div class="form-group">
            <span>Last 2 Months Traveling?&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eTravel =="Yes"){
            ?>
                <input id="eTravel" name="eTravel" value="Yes" type="radio"  checked>Yes
                <input id="eTravel" name="eTravel" value="No" type="radio" >No
            <?php
            }
                else if($data->eTravel =="No"){
            ?>
                <input id="eTravel" name="eTravel" value="Yes" type="radio" >Yes
                <input id="eTravel" name="eTravel" value="No" type="radio"  checked>No
            <?php
            }
            ?>
            </div>
            <div class="form-group">
            <span>Travel Mode&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->travelMode =="Own"){
            ?>
                <input id="travelMode" name="travelMode" value="Own" type="radio"  checked>Own
                <input id="travelMode" name="travelMode" value="Public" type="radio" >Public
                <input id="travelMode" name="travelMode" value="Private" type="radio" >Private
            <?php
            }
                else if($data->travelMode =="Public"){
            ?>
                <input id="travelMode" name="travelMode" value="Own" type="radio"  >Own
                <input id="travelMode" name="travelMode" value="Public" type="radio" checked>Public
                <input id="travelMode" name="travelMode" value="Private" type="radio" >Private
            <?php
            }
            else if($data->travelMode =="Private"){
            ?>
                <input id="travelMode" name="travelMode" value="Own" type="radio"  >Own
                <input id="travelMode" name="travelMode" value="Public" type="radio" >Public
                <input id="travelMode" name="travelMode" value="Private" type="radio"checked>Private
            <?php
            }
            ?>
            </div>
            <div class="form-group">
            <span>Smoking&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eSmoking =="Yes"){
            ?>
                <input id="eSmoking" name="eSmoking" value="Yes" type="radio"  checked>Yes
                <input id="eSmoking" name="eSmoking" value="No" type="radio" >No
            <?php
            }
                else if($data->eSmoking =="No"){
            ?>
                <input id="eSmoking" name="eSmoking" value="Yes" type="radio" >Yes
                <input id="eSmoking" name="eSmoking" value="No" type="radio"  checked>No
            <?php
            }
            ?>
            </div>
            <div class="form-group">
            <span>Driniking&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->eDrinking =="Yes"){
            ?>
                <input id="eDrinking" name="eDrinking" value="Yes" type="radio"  checked>Yes
                <input id="eDrinking" name="eDrinking" value="No" type="radio" >No
            <?php
            }
                else if($data->eDrinking =="No"){
            ?>
                <input id="eDrinking" name="eDrinking" value="Yes" type="radio" >Yes
                <input id="eDrinking" name="eDrinking" value="No" type="radio"  checked>No
            <?php
            }
            ?>
            </div>
            <div class="form-group">
            <span>Pregnant&nbsp;&nbsp;&nbsp;</span>
            <?php
                if($data->ePregnant =="Yes"){
            ?>
                <input id="ePregnant" name="ePregnant" value="Yes" type="radio"  checked>Yes
                <input id="ePregnant" name="ePregnant" value="No" type="radio" >No
            <?php
            }
                else if($data->ePregnant =="No"){
            ?>
                <input id="ePregnant" name="ePregnant" value="Yes" type="radio" >Yes
                <input id="ePregnant" name="ePregnant" value="No" type="radio"  checked>No
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="payment-adress">
                <input type="hidden" id="eId" name="eId" value="<?= $data->eId?>">
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
            url:'<?=base_url()?>super/eedit',
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
                alert("response");
            },
            cache: false,
    		contentType: false,
    		processData: false
        });
});
</script>