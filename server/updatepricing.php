<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();

$host_id = $_SESSION['host_id'];



if ($_REQUEST['property_id'] != "") {
    $Objnew->property_id = $_REQUEST['property_id'];
    $R = $Objnew->selectpricingdet();
    $row_res = mysqli_fetch_assoc($R);

    $extra_people = $row_res['extra_people'];
    $property_price = $row_res['property_price'];
    $monthly_discount = $row_res['monthly_discount'];
    $weekly_discount = $row_res['weekly_discount'];
    $cancellation = $row_res['cancellation'];
    $cleaning_fee = $row_res['cleaning_fee'];
    $security_deposit = $row_res['security_deposit'];
}
?>


<input type="hidden" class="form-control" name="property_id" id="property_id"  value="<?php echo $_REQUEST['property_id']; ?>"/>
<div class="modal-body">
    <div class="col-md-4">
        <div>
            <h2 class="top-zero">Price Per Night</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="property_price" id="property_price" placeholder="Price Per Night" value="<?php echo $property_price; ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Extra People</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Extra People" value="<?php echo $extra_people; ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Cleaning Fee</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Cleaning Fee" value="<?php echo $cleaning_fee; ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h2 class="top-zero">Price Per Week</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="weekly_discount" id="weekly_discount" placeholder="Price Per Week" value="<?php echo $weekly_discount; ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Cancellation</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select name="cancellation" class="form-control" id="cancellation">
                            <option value="">Select</option>
                            <option value="Yes"<?php if($cancellation=='Yes'){ echo "selected";} ?>>Yes</option>
                            <option value="No"<?php if($cancellation=='No'){ echo "selected";} ?>>No</option>
                        </select> 

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h2 class="top-zero">Price Per Month</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="monthly_discount" id="monthly_discount" placeholder="Price Per Month" value="<?php echo $monthly_discount; ?>"/>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="top-zero">Security Deposit</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="security_deposit" id="security_deposit" placeholder="Security Deposit" value="<?php echo $security_deposit; ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div><br/>
<div class="modal-footer">
    <div class="col-sm-12">
        <button type="submit" name="AA"   id="submit" class="btn btn-green isThemeBtn clickable pull-right" style="margin-left: 10px;"><span class="glyphicon glyphicon-check"></span> Update</button>
    </div>
</div>
<div class="clearfix"></div>
