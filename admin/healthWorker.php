<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Health Worker</h2>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item" id="breadcrumb-ite"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item active"><a>Health Worker</a></li>
                </ul>
            </div>
            <?php
                if(isset($_POST['add_health_worker']))
                {
                    $full_name = $_POST['full_name'];
                    $username = $_POST['username'];
                    $phone = $_POST['phone'];
                    $hospital_name = $_POST['hospital_name'];
                   $object->insertHealthWorker($full_name,$username,$phone,$hospital_name);
                }
                if(isset($_POST['update_health_worker']))
                {
                    $update_userID = $_POST['userID'];
                    $hwID = $_POST['hwID'];
                    $hospital_name = $_POST['hospital_name'];
                    $phone = $_POST['phone'];
                    $full_name = $_POST['full_name'];
                   $object->updateHealthWorker($update_userID,$hwID, $hospital_name,$phone,$full_name);
                }
            ?>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Health Workers</h2>
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
                                <button type="button" class="btn btn-raised g-bg-cyan waves-effect" data-toggle="modal" data-target="#largeModal">
                                    <i class="material-icons" style="margin-top: -8px">add</i>New Health Worker
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Unique Code</th>
                                    <th>Name</th>
                                    <th>Phone No</th>
                                    <th>Hopital Name</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $object->getHealthWorker();
                                    if(!empty($results))
                                    {
                                        $counter=1;
                                        foreach($results as $value) 
                                        { 
                                ?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td><?=$object->uniqueCodeHW($value['full_name'],$value['id'])?></td>
                                                <td><?=$value['full_name']?></td>
                                                <td><?=$value['phone_no']?></td>
                                                <td><?=$object->gethospitalName($value['hospital_id'])?></td>
                                                <?php $getUSer = $object->getOneUser($value['id']);$created_date=''; foreach ($getUSer as $getOneUSer) {
                                                       $userName = $getOneUSer['username'];
                                                       $userID = $getOneUSer['id'];
                                                       $created_date = $getOneUSer['created_at'];
                                                   } ?>
                                                <td><?=$created_date?></td>
                                                <td>

                                                    <div class="demo-single-button-dropdowns">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn bg-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" data-toggle="modal"
                                                                    data-target="#updateHWModal"
                                                                    onclick=
                                                                    "preload_HW_modal('<?=$value['full_name']?>','<?=$object->gethospitalName($value['hospital_id'])?>','<?=$value['phone_no']?>','<?=$userName?>','<?=$value['id']?>','<?=$userID?>')">Edit Record
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                        <button type="submit" class="btn btn-link cancel-button "id="<?=$value['id']?>">Delete Record</button>
                                                            </ul>
                                                        </div>
                                                    </div>
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

<script>
    $(document).ready(function(){

    $('.cancel-button').on('click',function(){        
        swal({
            title: "Are you sure?",
            text: "To Delete This Record!",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: "Delete",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        })
        .then((isConfirm) => {
            if (isConfirm) {
                // alert('hey');
                var id=this.id;
                $.ajax({
                  type:'post',
                  url:'function.php',
                  data:{
                   deleteHW:'deleteHW',
                   id:id,
                  },
                  success: function(inputValue){
                    if (inputValue=="success") 
                    {
                        swal("Deleted!", "Your Record has been deleted.", "success");
                    setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 1000); 
                    }
                    else{swal("Error", inputValue, "error");}
                    
                    }
                });
                
            } 
            // else {
            //     swal("Cancelled", "Your Record is safe", "error");
            // }
        });

    });   

});
</script>