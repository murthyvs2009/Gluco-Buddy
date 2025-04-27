<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
    overflow-x: hidden;
}

.card {
    overflow-x: hidden;
    border-radius: 1rem;
    max-width: 100%;
}

.form-group input,
.form-group input[type="date"] {
    max-width: 400px;
    width: 100%;
    box-sizing: border-box; /* Ensure padding and borders are included in the element's total width */
}

.btn-container {
    width: 100%;
    max-width: 130px;
}

.d-flex {
    display: flex;
    justify-content: center;
    align-items: flex-start;
}
</style>
<br/>
<br/>
<section class="vh-5">
    <div class="d-flex">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="width: 100%; max-width: 400px;">
                <div class="card-body p-3 text-left">
                <div style="margin: 0 auto; display: flex; align-items: center; height: 70px;">
        <h3 class="mb-5" style="font-size: 35px; margin: 0; flex-grow: 1; ">
            Edit Record
            <a href="https://glucobuddy.cyberbee.in/WeeklyRecord" style="text-decoration: none; position: absolute; right: 10px;">
                <i class="fa-regular fa-circle-xmark fa-xs" style="color: #dc3545;"></i>
            </a>
        </h3>
    </div>

                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('validation_errors'); ?>

                    <form action="<?php echo site_url('EditRecord'); ?>" method="post">
                        <?php $myId = $this->session->userdata('myId'); ?>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>FPG Value</label>
                                    <?php $valueFpg = $this->MainModel->getValueByDateOwnerType($this->session->userdata('editDate'), $myId, 'FPG'); ?>
                                    <input type="tel" class="form-control" name="erFPGValue" value="<?php echo $valueFpg; ?>" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>PPG Value</label>
                                    <?php $valuePpg = $this->MainModel->getValueByDateOwnerType($this->session->userdata('editDate'), $myId, 'PPG'); ?>
                                    <input type="tel" class="form-control" name="erPPGValue" value="<?php echo $valuePpg; ?>" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>Hba1c Value</label>
                                    <?php $valueHba1c = $this->MainModel->getValueByDateOwnerType($this->session->userdata('editDate'), $myId, 'HBA1c'); ?>
                                    <input type="tel" class="form-control" name="erHBA1CValue" value="<?php echo $valueHba1c; ?>" placeholder="Value">
                                </div>


                                <div style="text-align:right; margin-right: 10px;">
                                    <input type="submit" class="btn btn-primary" name="editRecordSubmit" style="max-width: 100px;" value="Edit Data">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Random Value</label>
                                    <?php $valueRandom = $this->MainModel->getValueByDateOwnerType($this->session->userdata('editDate'), $myId, 'Rando'); ?>
                                    <input type="tel" class="form-control" name="erRandoValue" value="<?php echo $valueRandom; ?>" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>Steps Value</label>
                                    <?php $valueSteps = $this->MainModel->getValueByDateOwnerType($this->session->userdata('editDate'), $myId, 'Steps'); ?>
                                    <input type="tel" class="form-control" name="erStepsValue" value="<?php echo $valueSteps; ?>" placeholder="Value">
                                </div>

                                <br/>
                                <br/>
                                <br/>
                                
                                <?php $deleteDate = $this->session->userdata('editDate'); ?>
                        <a href="DeleteRecord?deleteDate=<?php echo $deleteDate; ?>" class="btn btn-danger" style=" float:right; margin-top:10px;">
                            Delete
                        </a>
                        
                            </div>
                        </div>


                      
                        <br/>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

