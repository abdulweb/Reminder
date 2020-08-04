<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2> View Caregiver</h2>
            <small class="text-muted">Children records are link to the caregivers</small>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="caregiver.php">Caregiver</a></li>
                     <li class="breadcrumb-item active"><a>View Caregiver</a></li>
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
                    // echo $caregiver_lastName.$caregiver_firstName.$caregiver_phoneNo.$dob.$child_firstName;
                    // lets twick something here
                        // print_r($_POST['vaccine']);
                    // 
                   $object->insertCaregiverAndChild($caregiver_phoneNo,$caregiver_lastName,$caregiver_firstName,$child_firstName,$child_middleName,$dob,$vaccine);
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
                        <!-- <form action="add-caregiver.php" method="post"> -->
                            <?php
                                if (empty($_GET['id'])) {
                                    header('location:caregiver.php');
                                }
                                else
                                {
                                    $getID = $_GET['id'];

                                    $results = $object->getOneCaregiver($getID);
                                    foreach ($results as $key => $value) {       
                                    
                            ?>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <button class="btn btn-raised btn-info">Add new child</button>
                                <a href="#" type="button" class="btn btn-raised btn-success" data-toggle="modal" data-target="#childUpdateVacinneModal" onclick = "preload_add_child_and_vaccine_modal('<?=$getID?>')">Update child vaccine Record</a>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?=$value['first_name']?>" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?=$value['other_name']?>" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?=$value['phone_no']?>" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Child Info -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Children Information</small> </h2>                      
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Child Unique Code</th>
                                            <th>Full Name</th>
                                            <th>Date of Birth</th>
                                            <th>Current Age</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $responds = $object->getChildrenForParent($getID);
                                            if (!empty($responds)) {
                                                foreach ($responds as $key => $respond) {
                                                 ?>
                                        <tr>
                                            <td><?=++$key?></td>
                                            <td><?=$object->uniqueCodeChild($respond['first_name'].$respond['other_name'],$respond['id'])?></td>
                                            <td><?=$respond['first_name']. " ". $respond['last_name']." ". $respond['middle_name']?>
                                            </td>
                                            <td><?=$respond['dob']?>
                                            <td><?php print_r($object->currentAge($respond['dob']))?>
                                            <td><?=$respond['created_at']?></td>
                                            <td>
                                                <!-- Get children vaccine taken -->
                                                <?php
                                                    $childrenVaccineRespond = $object->childrenVaccineRespond($respond['id']);
                                                ?>
                                                 
                                                <a href="#" title="View Vaccine Histroy"><i class="material-icons" data-toggle="modal"
                                                data-target="#viewVaccineHistoryModal"
                                                onclick=
                                                "preload_child_vaccine_history_modal('<?php $childrenVaccineRespond?>')">visibility</i></a>

                                                   <a href="#" title="Edit Child" style="margin-left: 10px; color: seagreen;"><i class="material-icons">edit</i></a>

                                                   <a href="#" title="Delete" onclick="return confirm('Ready to Delete?')" style="margin-left: 10px; color: rgb(253,58,100);"><i class="material-icons">cancel</i></a>
                                            </td>
                                        </tr>
                                        <?php
                                              }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- vaccination info -->
        
    <!-- </form> -->
    </div>
</section>


<?php include ('inc/modal.php'); ?>
<?php include ('inc/script.php'); ?>
<?php include ('inc/footer.php'); ?>
<script>
      // $('input[name="caregiver_lastName"]').keyup(function(){
    
// });
    $('#caregiver_lastName').change(function() {
    $('#child_lastName').val($(this).val());
});
</script>