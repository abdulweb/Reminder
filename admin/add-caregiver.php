<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add Caregiver</h2>
            <small class="text-muted">kindly take your time to enter the input</small>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="caregiver.php">Caregiver</a></li>
                     <li class="breadcrumb-item active"><a>Add Caregiver</a></li>
                </ul>
            </div>
        </div>
        <div>
            <?php 
                if(isset($_POST['add_cargiver']))
                {
                    $caregiver_lastName = $_POST['caregiver_lastName'];
                    $caregiver_firstName = $_POST['caregiver_firstName'];
                    $caregiver_phoneNo = $_POST['caregiver_phoneNo'];
                    $child_firstName = $_POST['child_firstName'];
                    $child_middleName = $_POST['child_middleName'];
                    $dob = $_POST['dob'];
                    $vaccine = $_POST['vaccine'];
                    $hf_name = $_POST['hf_name'];
                    // echo $caregiver_lastName.$caregiver_firstName.$caregiver_phoneNo.$dob.$child_firstName;
                    // lets twick something here
                        // print_r($_POST['vaccine']);
                    // 
                   $object->insertCaregiverAndChild($caregiver_phoneNo,$caregiver_lastName,$caregiver_firstName,$child_firstName,$child_middleName,$dob,$vaccine,$hf_name);
                }

            ?>
        </div>
        <!-- Caregiver Info -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Caregiver Information <small></small> </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="add-caregiver.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="caregiver_lastName" name="caregiver_lastName" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="caregiver_firstName" class="form-control" placeholder="other Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="caregiver_phoneNo" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Child Info -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Child Information</small> </h2>                      
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="child_firstName" class="form-control" placeholder="Child First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="child_middleName" class="form-control" placeholder="Child Middle Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="dob" class="datepicker form-control" placeholder="Date of Birth" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="child_lastName" class="form-control" placeholder="Last Name." disabled="disabled">
                                    </div>
                                </div>                               
                            </div>
                            <!-- health facilty name -->
                            <div class="col-lg-12 col-md-12 col-sm-12">                               
                                <div class="form-group">
                                    <div class="form-line">
                                        
                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required="required" name="hf_name">
                                                <option value="">-- Select Hospital Name --</option>
                                                <?php $results =$object->getAllHospital(); foreach ($results as $value) {
                                                    ?>
                                                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- vaccination info -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Vaccine Information<small>Kindly check vaccine given to the above child</small></h2>                      
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form">
                                        <?php
                                            $results = $object->getVaccine();
                                            if (!empty($results) || count($results)) {
                                                foreach ($results as $value) {
                                                    echo '<input type="checkbox" 
                                                    name="vaccine[]"
                                                    id='.$value['id'].'
                                                    value = '.$value['id'].' 
                                                    class="filled-in chk-col-green">
                                                    <label for='.$value['id'].'>'.$value['name'].'</label>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" name="add_cargiver" class="btn btn-raised btn-block g-bg-cyan">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>


<?php include ('inc/footer.php'); ?>
<script>
      // $('input[name="caregiver_lastName"]').keyup(function(){
    
// });
    $('#caregiver_lastName').change(function() {
    $('#child_lastName').val($(this).val());
});
</script>