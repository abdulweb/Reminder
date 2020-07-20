<?php include ('inc/header.php'); ?>
<?php include ('inc/topbar.php'); ?>
<?php include ('inc/sidebar.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Caregiver</h2>
            <div class="body">
                <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item active"><a>Caregiver</a></li>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Caregiver</h2>
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
                                    <i class="material-icons" style="margin-top: -8px">add</i>New Caregiver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Immunization Code</th>
                                    <th>Last Name</th>
                                    <th>Other Name</th>
                                    <th>Phone Number</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                            <tr>
                                               
                                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include ('inc/modal.php'); ?>
<?php include ('inc/footer.php'); ?>