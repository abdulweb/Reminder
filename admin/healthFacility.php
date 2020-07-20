<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Health Facility</h2>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="healthWorker.php">Health Worker</a></li>
                     <li class="breadcrumb-item active"><a>Health Facility</a></li>
                </ul>
            </div>
            <?php
                if(isset($_POST['add_hf']))
                {
                    $hf_name = $_POST['hf_name'];
                   $object->insertHealthFacility($hf_name); 
                }
                if(isset($_POST['update_hf']))
                {
                    $hf_name = $_POST['hf_name'];
                    $id = $_POST['hfID'];
                   $object->updateHealthFacility($hf_name,$id);
                }
                if (isset($_POST['delete_HF'])) {
                    $id = $_POST['id'];
                    $object->deleteHealthFacility($id);
                }
            ?>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Health Facility</h2>
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
                                <button type="button" class="btn btn-raised btn-info waves-effect" data-toggle="modal" data-target="#healthFacilityModal">
                                    <i class="material-icons" style="margin-top: -8px">add</i>New Health Facility
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
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $object->getHealthFacility();
                                    if(!empty($results))
                                    {
                                        $counter=1;
                                        foreach($results as $value) 
                                        { 
                                ?>
                                            <tr>
                                                <td><?=$counter?></td>
                                                <td id="name<?php echo $value['id'] ?>"><?=strtoupper($value['name'])?></td>
                                                <td><?=$value['created_at']?></td>
                                                <td>
                                                    <div class="demo-single-button-dropdowns">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn bg-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" data-toggle="modal"
                                                                    data-target="#updateHFModal"
                                                                    onclick=
                                                                    "preload_HF_modal('<?=$value['name']?>','<?=$value['id']?>')">Edit Record
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form method="post" action="healthFacility.php">
                                                                        <input type="hidden" name="id" value="<?=$value['id']?>">
                                                                        <button type="submit" onclick="return confirm('Ready to Delete?')" name = "delete_HF" class="btn btn-link">Delete Record</button>
                                                                    </form>
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
                   deleteSd:'deleteSd',
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

<?php include ('inc/script.php'); ?>
<?php include ('inc/modal.php'); ?>
<?php include ('inc/footer.php'); ?>