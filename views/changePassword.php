<style>
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
}

section {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: flex-start; /* Align to the top */
    padding-top: 40px; /* Adjust top margin as needed */
    min-height: 100vh; /* Ensures full screen height */
}

.card {
    border-radius: 1rem;
    max-width: 400px;
    width: 100%;
}

</style>
<br/>
<br/>
<section>
    <div class="card shadow-2-strong">
        <div class="card-body p-3 text-left">
            <center>
                <h2 class="mb-5" style="font-size: 30px;">Change Password</h2>
            </center>
            <?php
            if($this->session->userdata('myStatus')== '0'){
            ?>
            <div style="color:blue; max-width:400px; text-align:center; font-size:18px;"> For security reasons, you must change your machine-generated password. You will be logged out after the change; please log in with your new password. </div>
            <?php
        }
        ?>
            <?php echo validation_errors(); ?>
            <form action="" method="post">
                <div class="form-group">
                    <br/>
                    <br/>
                    <?php
                            if ($oldPassNotMatchPassInDB = $this->session->userdata("oldPassNotMatchPassInDB")) {
                                echo '<text style="color:red; font-size:18px;" >';
                                echo $oldPassNotMatchPassInDB;
                                echo '</text>';
                                $this->session->unset_userdata("oldPassNotMatchPassInDB");
                            }
                            ?>   
                            <br/>
                    <label for="cpOldPassword">Old Password</label>
                    <input type="password" class="form-control" name="cpOldPassword" placeholder="Old Password">
                </div>

                <div class="form-group">
                    <label for="cpNewPassword">New Password</label>
                    <input type="password" class="form-control" name="cpNewPassword" placeholder="New Password">
                </div>

                <div class="form-group">
                    <label for="cpCfNewPassword">Confirm New Password</label>
                    <input type="password" class="form-control" name="cpCfNewPassword" placeholder="Confirm Password">
                </div>

                <div class="btn-container">
                    <input type="submit" style="float:right;" class="btn btn-primary" name="cpSubmit">
                </div>
            </form>
        </div>
    </div>
</section>
