<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Children</h2>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item active"><a>Children</a></li>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Children</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <a href="add-caregiver.php" class="btn btn-raised btn-info waves-effect">
                                    <i class="material-icons" style="margin-top: -8px">add</i>Add New Child
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <?php
                                    if (isset($_POST['update_child_record'])) {
                                         $child_first_name = $_POST['child_first_name'];
                                         $child_middle_name = $_POST['child_middle_name'];
                                         $child_dob = $_POST['child_dob'];
                                         $child_id = $_POST['child_id'];
                                       $object->updateChildRecord($child_first_name,$child_middle_name, $child_dob, $child_id);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Children Unique Code</th>
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $results = $object->getAllChildren();
                                        if (!empty($results)) {
                                            foreach ($results as $key => $result) {    
                                        ?>
                                            
                                            <tr>
                                               <td><?=++$key?></td>
                                               <td><?=$object->uniqueCodeCaregiver($result['first_name'].$result['other_name'],$result['id'])?></td>
                                               <td><?=$result['first_name']. " ".$result['last_name']." ". $result['middle_name']?></td>
                                               <td><?=$result['dob']?></td>
                                               <td><?=$result['created_at']?></td>
                                               <td>
                                                   <a href="childVaccinationHistory.php?id=<?php echo htmlentities($result['id']);?>" class="btn btn-round" title="view"><i class="material-icons">visibility</i></a>

                                                   <button class="btn btn-round" style="color: seagreen; cursor: pointer;" title="Edit" data-toggle="modal"data-target="#UpdateChildModal" onclick="preload_edit_child_modal('<?=$result['first_name']?>','<?=$result['last_name']?>','<?=$result['middle_name']?>','<?=$result['dob']?>','<?=$result['id']?>')">
                                                    <i class="material-icons">edit</i>
                                                    </button>

                                                   <button class="btn btn-round cancel-button" title="Delete" id="<?=$result['id']?>" style="margin-left: 10px; color: rgb(253,58,100); cursor: pointer;"><i class="material-icons" >cancel</i></button>

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
</section>



<?php include ('inc/script.php'); ?>
<?php include ('inc/modal.php'); ?>
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
                    closeModal: false,
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
                var id=this.id;
                $.ajax({
                  type:'post',
                  url:'function.php',
                  data:{
                   deleteChild:'deleteChild',
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
                    else{swal("Error", "Your Record is safe Please try again", "error");}
                    
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