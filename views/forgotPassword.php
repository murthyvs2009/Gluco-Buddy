<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
    overflow: hidden; /* Prevent overall page scrolling */
}

.vh-80 {
    height: 100vh; /* Full viewport height */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* Prevent vertical scrolling */
    padding-top: 10px; /* Space at the top */
    padding-bottom: 10px; /* Space at the bottom */
}

.container {
    max-height: 100%;
    overflow: hidden; /* Prevent container scrolling */
}

.card {
    overflow: hidden;
    border-radius: 1rem;
    max-width: 380px; /* Set a maximum width for the card */
    margin: 0 auto;
}

.card-body {
    overflow-y: hidden; /* Prevent vertical scrolling within the card */
}

.GBLogo {
    max-width: 280px;
    display: block;
    margin: 0 auto; /* Center the logo */
}
.form-text-help {
    font-size: 13px;
}

.form-label {
    font-weight: bold;
}

.errorshow {
    color: red;
    font-size: 13px;
}
</style>
<?php
if ($this->session->flashdata('fpInfo')) {
    echo $this->session->flashdata('fpInfo');
}
?>



<section class="vh-80">
    <div class="container" style="margin-top:10px;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-3 text-left">
                        <?php
                        $iconUrl = BASEURL . "assets/images/glucobuddy.png";
                        ?>
                         <img src="<?php echo $iconUrl; ?>" class="GBLogo">
                    
                        <hr class="my-4">


                        <h3 class="mb-5" style="text-align:center;">Forgot Password?</h3>
                        <?php echo validation_errors(); ?>
                                    
                        <?php
                    if ($this->session->flashdata('validation_errors')) {
                        echo '<div class="alert alert-danger">' . $this->session->flashdata('validation_errors') . '</div>';
                    }

                    if ($this->session->userdata("emailDoesNotExistFP")) {
                        echo '<text style="color:red; font-size:18px;" >';
                        echo $this->session->userdata("emailDoesNotExistFP");
                        echo '</text>';
                        $this->session->unset_userdata("emailDoesNotExistFP");
            

                    }
                    ?>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="fpEmail" class="form-label">Registered Email Address</label>
                            <input type="email" class="form-control" value="<?php echo ($this->session->userdata('fpEmail')) ? $this->session->userdata('fpEmail') : ''; ?>" name="fpEmail" aria-describedby="useremailHelp">
                        </div>
                        <button type="submit" style="float:right;" class="btn btn-primary">Send Mail</button>
                    </form>
                        <br/>
                        <br/>
                        <hr class="my-4">
                        <a href="Signup">Create New Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
