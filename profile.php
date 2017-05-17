<?php
ob_start();
include 'profile.inc.php';
?>

<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="col-md-12">
            <div class="page-title pull-left">
                <h2 class="entry-title">Profile</h2>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 padnoneright">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="edit" style="padding-top: 0px;">

                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Edit Profile</strong></div>
                            <form class="form-horizontal" role="form" id="updatehostprofile" action="" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="clearfix"></div><br/>
                                    <div class="col-md-9">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">First Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="<?php echo $firstname; ?>"/>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div><br/>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Last Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo $last_name; ?>"/>
                                                    This is only shared once you have a confirmed booking with another Adventist BNB user.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">I Am <span class="fa fa-lock text-danger"></span></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male"<?php
                                                        if ($gender == 'Male') {
                                                            echo "SELECTED";
                                                        }
                                                        ?>>Male</option>
                                                        <option value="Female"<?php
                                                        if ($gender == 'Female') {
                                                            echo "SELECTED";
                                                        }
                                                        ?> >Female</option>
                                                        <option value="Other"<?php
                                                        if ($gender == 'Other') {
                                                            echo "SELECTED";
                                                        }
                                                        ?> >Other</option>
                                                    </select>
                                                    We use this data for analysis and never share it with other users.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Date of Birth</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="datepicker form-control" placeholder="Date of Birth" name="dob" id="dob" value="<?php echo $dob; ?>"/>
                                                    This is only shared once you have a confirmed booking with another Adventist BNB user.
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Email Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Email Address" name="email" id="email" value="<?php echo $email; ?>"/>
                                                    We won’t share your private email address with other Adventist BNB users.
                                                    <br/><span class="text-danger"><?php echo $error_msg['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Phone Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="<?php echo $phone_number; ?>"/>
                                                    This is only shared once you have a confirmed booking with another Adventist BNB user. This is how we can all get in touch.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Alternate Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="AlternatePhone Number" name="alternate_number" id="alternate_number" value="<?php echo $alternate_number; ?>"/>
                                                    This is only shared once you have a confirmed booking with another Adventist BNB user. This is how we can all get in touch.
                                                </div>
                                            </div>

                                            <div class="clearfix"></div><br/>


                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Where You Live</label>
                                                <div class="col-sm-10"> 
                                                    <textarea class="form-control" rows="3" name="whereyoulive" id="whereyoulive" placeholder="e.g. Paris, NY, Chicago"><?php echo $whereyoulive; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Describe Yourself</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Describe Yourself"><?php echo $description; ?></textarea>
                                                    <p>Adventist BNB is built on relationships. Help other people get to know you.</p>
                                                    <p>Tell them about the things you like: What are 5 things you can’t live without? Share your favorite travel destinations, books, movies, shows, music, food.</p>
                                                    <p>Tell them what it’s like to have you as a guest or host: What’s your style of traveling? Of Adventist BNB hosting?</p>
                                                    <p>Tell them about you: Do you have a life motto?</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div  class="col-md-3 text-center">
                                        <?php if ($image != "") { ?>

                                            <img src="uploads/<?php echo $image; ?>" width="200" height="200" style="margin-top: 5px;"/><br/>
                                        <?php } else { ?>
                                            <img src="images/user_pic.png" width="200" height="200" style="margin-top: 5px;"/><br/>
                                        <?php } ?>
                                        <div class="clearfix"></div><br/>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="file" name="logo_image" style="display: inline;"/>
                                                <div class="text-danger" style="margin-top: 5px;">Please upload 70 X 80 px image.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="clearfix"></div>
                                <div  class="panel-footer">
                                    <div class="text-center">
                                        <button type="submit" name="ta_btn" class="btn btn-green"><span class="fa fa-save"></span> Save</button>
                                    </div>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br/>
</div>
<div class="clearfix"></div><br/>
</section>
<div class="clearfix"></div>



<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>