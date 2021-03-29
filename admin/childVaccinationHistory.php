<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>
<?php
    if (empty($_GET['id'])) {
        header('location:caregiver.php');
    }
    else
    {
        $getID = $_GET['id'];

        $results = $object->getOneChild($getID);
        foreach ($results as $key => $value) {       
        
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2> View Caregiver</h2>
            <small class="text-muted">Children records are link to the caregivers</small>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="caregiver.php">Caregiver</a></li>
                     <li class="breadcrumb-item active"><a><?=$value['first_name']. " ". $value['last_name']. " ". $value['middle_name']?></a></li>
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
                    
                   $object->insertCaregiverAndChild($caregiver_phoneNo,$caregiver_lastName,$caregiver_firstName,$child_firstName,$child_middleName,$dob,$vaccine);
                }
                
            ?>
        </div>
        <!-- Caregiver Info -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><?=$value['first_name']. " ". $value['last_name']. " ". $value['middle_name']?> Information <small></small> </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <!-- <form action="add-caregiver.php" method="post"> -->
                            
                        <!-- <div class="row clearfix">
                        
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Child Info -->
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h2>Vaccination Information</small> </h2>                      
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Vaccination Name</th>
                                            <th>Date Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $responds = $object->childrenVaccineRespond($getID);
                                            if (!empty($responds)) {
                                                foreach ($responds as $key => $respond) {
                                                 ?>
                                        <tr>
                                            <td><?=++$key?></td>
                                            <td>
                                                <?=$object->getVaccineNameById($respond['vaccine_id'])?>
                                                
                                                    
                                                </td>
                                            <td><?=$respond['created_at']?></td>
                                            
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
            <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="text-dark">Update Vaccine Info</small> </h4>
                        </div>
                        <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form">
                                                <?php
                                                    $results = $object->getVaccine();
                                                    $compare = $object->vaccineCheck($results, $responds);
                                                    if (!empty($compare) || count($compare)) {
                                                        foreach ($compare as $value) {
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
        </div>
        <!-- vaccination info -->
        
    <!-- </form> -->
    </div>
</section>
<?php
        }
    }
?>


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