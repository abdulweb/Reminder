<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Vaccine</h2>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item active"><a>Vaccine</a></li>
                </ul>
            </div>
            <?php
                if(isset($_POST['add_vaccine']))
                {
                    $vaccine_name = $_POST['vaccine_name'];
                    $child_age = $_POST['child_age'];
                   $object->insertVaccine($vaccine_name,$child_age);
                }
                if(isset($_POST['update_vaccine']))
                {
                    $vaccine_name = $_POST['vaccine_name'];
                    $child_age = $_POST['child_age'];
                    $id = $_POST['vaccineID'];
                   $object->updateVaccine($vaccine_name,$child_age,$id);
                }
                if (isset($_POST['delete_vaccine'])) {
                    $id = $_POST['id'];
                    print_r($object->deleteVaccine($id));
                }
            ?>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Vaccine</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="button" class="btn btn-raised btn-info waves-effect" data-toggle="modal" data-target="#vaccineModal">
                                    <i class="material-icons" style="margin-top: -8px">add</i>New Vaccine
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Name</th>
                                    <th> Minimum Age of Child</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $object->getVaccine();
                                    if(!empty($results))
                                    {
                                        $counter=1;
                                        foreach($results as $value) 
                                        { 
                                ?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$value['name']?></td>
                                                <td><?=$value['child_age']?></td>
                                                <td>
                                                    

                                                    <!--  -->
                                                        <div class="demo-single-button-dropdowns">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn bg-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" data-toggle="modal"
                                                                    data-target="#updateVaccineModal"
                                                                    onclick=
                                                                    "preload_vaccine_modal('<?=$value['name']?>','<?=$value['child_age']?>','<?=$value['id']?>')">Edit Record
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form method="post" action="vaccine.php">
                                                                        <input type="hidden" name="id" value="<?=$value['id']?>">
                                                                        <button type="submit" onclick="return confirm('Ready to Delete Vaccine Record?')" name = "delete_vaccine" class="btn btn-link">Delete Record</button>
                                                                    </form>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                            </td>
                                            </tr>
                                  <?php $counter ++;
                              }
                              } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include ('inc/modal.php'); ?>
<?php include ('inc/script.php'); ?>
<?php include ('inc/footer.php'); ?>