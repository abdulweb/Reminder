Add health worker Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">New Health Worker</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="healthWorker.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"name="full_name" class="form-control" placeholder="Full Name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="username" class="form-control" placeholder="Email Address" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" maxlength="11" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="text" name="hospital_name" class="form-control" placeholder="Hospital Name"> -->
                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required="required" name="hospital_name">
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
                            <div class="col-sm-12">
                                <button type="submit" name="add_health_worker" class="btn btn-raised g-bg-cyan">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Add Health worker Modal -->

<!-- Add vaccine Modal -->
<div class="modal fade" id="vaccineModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">New Vaccine</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="vaccine.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"name="vaccine_name" class="form-control" placeholder="Vaccine Name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="child_age" class="form-control" placeholder="child Age (in weeks)" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <button type="submit" name="add_vaccine" class="btn btn-raised g-bg-cyan">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Vaccine Modal -->

<!-- Add Health Facility -->
<div class="modal fade" id="healthFacilityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">New Facility <small>(Hospital)</small></h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="healthFacility.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"name="hf_name" class="form-control" placeholder="Health Facility Name" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <button type="submit" name="add_hf" class="btn btn-raised g-bg-cyan">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Health Worker Modal -->

<!-- Add vaccine Update Modal -->
<div class="modal fade" id="updateVaccineModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Update Vaccine</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="vaccine.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="vaccine_name" name="vaccine_name" class="form-control" placeholder="Vaccine Name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="child_age" name="child_age" class="form-control" placeholder="child Age (in weeks)" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <input type="hidden" name="vaccineID" id="vaccineID">
                                <button type="submit" name="update_vaccine" class="btn btn-raised g-bg-cyan">
                                    Update
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Vaccine Update Modal -->

<!-- Update Health Facility -->
<div class="modal fade" id="updateHFModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateHFModal">Update Health Facility <small>(Hospital)</small></h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="healthFacility.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id ="hf_name" name="hf_name" class="form-control" placeholder="Health Facility Name" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <input type="hidden" id="hfID" name="hfID">
                                <button type="submit" name="update_hf" class="btn btn-raised g-bg-cyan">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Health Worker Modal -->

<!-- Update health worker Modal -->
<div class="modal fade" id="updateHWModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Update Health Worker</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="healthWorker.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Full Name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="username" name="username" class="form-control" placeholder="Email Address" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number" maxlength="11" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">                               
                                <div class="form-group">
                                    <!-- <div class="form-line"> -->
                                        <!-- <input type="text" id="hospital_name" name="hospital_name" class="form-control" placeholder="Hospital Name" required="required"> -->

                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required="required" name="hospital_name">
                                                <option id="hospital_name"></option>
                                                <option value="" id="hospital_name">-- Select Hospital Name --</option>
                                                <?php $results =$object->getAllHospital(); foreach ($results as $value) {
                                                    ?>
                                                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!--  -->
                                    <!-- </div> -->
                                </div>                               
                            </div>
                            <div class="col-sm-12">
                                <input type="hidden" name="hwID" id="hwID">
                                 <input type="hidden" name="userID" id="userID">
                                <button type="submit" name="update_health_worker" class="btn btn-raised g-bg-cyan">
                                    Update
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Update Health worker Modal-->

<!-- Add childUpdateVacinneModal Modal -->
<div class="modal fade" id="childUpdateVacinneModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="childUpdateVacinneModalLabel">Update Child Vaccine Histroy</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="vaccine.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <?php $caregiverID; ?>
                                    <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required="required" name="childrenID">
                                                <option id="child_name"></option>
                                                <option value="" id="child_name">-- Select Child Name --</option>
                                                <?php $results =$object->getChildrenForParent($caregiverID); foreach ($results as $value) {
                                                    ?>
                                                    <option value="<?=$value['id']?>"><?=$value['first_name']. " ". $value['laste_name']." ". $value['middle_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required="required" name="vaccineID">
                                                <option id="vaccine_name"></option>
                                                <option value="" id="vaccine_name">-- Select Vaccine Name --</option>
                                                <?php $results =$object->getVaccine(); foreach ($results as $value) {
                                                    ?>
                                                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <button type="submit" name="add_vaccine" class="btn btn-raised g-bg-cyan">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of childUpdateVacinneModal Modal -->

<!-- Add viewVaccineHistoryModal Modal -->
<div class="modal fade" id="viewVaccineHistoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viewVaccineHistoryModalLabel">Update Child Vaccine Histroy</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="vaccine.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>S/no</th>
                                            <th>Vaccine Name</th>
                                            <th>Date Collected</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><p id="vaccineName"></p></td>
                                             
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of viewVaccineHistoryModal Modal -->

<!-- Add UpdateChildModal Modal -->
<div class="modal fade" id="UpdateChildModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viewVaccineHistoryModalLabel">Update Child Record</h4>
            </div>
            <div class="modal-body"> 
                <div class="body">
                    <form action="children.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="child_first_name" name="child_first_name" class="form-control" placeholder="First Name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="child_last_name" name="child_last_name" class="form-control" disabled="disabled">
                                    </div>
                                </div>
                            </div>

                            <!-- second row -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="child_middle_name" name="child_middle_name" class="form-control" placeholder="Middle Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" placeholder="Date of Birth" id="child_dob" name="child_dob" class="datepicker form-control" required="required">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <input type="hidden" name="child_id" id="child_id">
                                <button type="submit" name="update_child_record" class="btn btn-raised g-bg-cyan" style="cursor: pointer;">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block btn-raised waves-effect" data-dismiss="modal"><i class="material-icon">cancel</i>CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End of UpdateChildModal Modal