

<style>

.GBLogo {
    max-width: 300px;
    display: block;
    margin: 0 auto; 
}
</style>

<br/>
<br/>
<section class="vh-100" style="margin:20px;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card card123 shadow-2-strong" >
                    <div class="card-body p-3 text-left">
                        <?php
                        $iconUrl = BASEURL . "assets/images/glucobuddy.png";
                        ?>
                        <img src="<?php echo $iconUrl; ?>" class="GBLogo">
                        <hr/>

                        <?php if ($this->session->flashdata('signup_successPT1')){?>
                        <div style="color:green; margin:0px auto;">
                        <?= $this->session->flashdata('signup_successPT1'); ?>
                        </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('signup_successPT2')){?>
                        <div style="color:blue; margin:0px auto;">
                        <?= $this->session->flashdata('signup_successPT2'); ?>
                        </div>
                        <?php } ?>


                        <?php if ($this->session->flashdata('forgotPwd_success')){?>
                        <div style="color:blue; margin:0px auto; ">
                        <?= $this->session->flashdata('forgotPwd_success'); ?>
                        </div>
                        <?php } ?>
   
   
                         
                       <h3 class="mb-5" style="text-align:center; margin-top:10px; margin-bottom:15px !important;">Log In</h3>

                        <?php echo validation_errors(); ?>
                        <?php
                        
                    if ($scucessfullPasswordReset = $this->session->userdata("scucessfullPasswordReset")) {
                        echo '<text style="color:blue; font-size:18px;" >';
                        echo $scucessfullPasswordReset;
                        echo '</text>';
                        $this->session->unset_userdata("scucessfullPasswordReset");
                        }
            
                            ?>
                            <br/>
                        <?php echo $this->session->flashdata('validation_errors'); ?>
                        <form action="<?php echo site_url('Login/loginSubmission'); ?>" method="post">

                            <div class="mb-3">
                        
                            <br/>
                                <label for="logInEmail" class="form-label">Registered Email Address</label>
                                <input type="text" name="logInEmail" class="form-control" value="<?php echo ($this->session->userdata('logInEmail')) ? $this->session->userdata('logInEmail') : ''; ?>">
                                </div>

                            <div class="mb-3">
                                <?php

                                    if ($incorrectPassword = $this->session->userdata("incorrectPassword")) {
                                        echo '<text style="color:red; font-size:18px;" >';
                                        echo $incorrectPassword;
                                        echo '</text>';
                                        $this->session->unset_userdata("incorrectPassword");
                                    }
                                ?>
                                <br/>
                                <label for="logInPassword" class="form-label">Password</label>
                                <input type="password" name="logInPassword" class="form-control" value="<?php echo ($this->session->userdata('logInPassword')) ? $this->session->userdata('logInPassword') : ''; ?>">
                                </div>
                            <br/>

                            <div class="mb-3">
                            <?php
                            if ($incorrectCaptcha = $this->session->userdata("incorrectCaptcha")) {
                                echo '<text style="color:red; font-size:18px;" >';
                                echo $incorrectCaptcha;
                                echo '</text>';
                                $this->session->unset_userdata("incorrectCaptcha");
                            }
                            ?>   
                            <br/>
                                <h6>Please enter the captcha below to confirm your human identity.</h6>
                                <label for="captcha" class="form-label">Captcha Image:</label>
                                <?php echo $captchaImg; ?>
                                <input type="number" class="form-control" aria-describedby="useremailHelp" placeholder="Enter Above Captcha" name="logInCaptcha" >
                            </div>

                            <input type="submit" class="btn btn-primary" name="logInSubmit" style="float:right; margin-top:10px" value="Log In">
                            <br/>
                            <br/>
                        </form>
                        <hr class="my-4">

                     <div style="text-align:center;"> <a href="Signup">Create New Account</a> | <a href="<?php echo BASEURL; ?>ForgotPassword">Forgot Password?</a><br/><a href="ContactUs">Contact Us</a> <br/><button class="nav-link btn btn-outline-danger  installAppBtn" id="installButton" style="margin:0px auto; width:100%;"  >Install App   <img src="<?php echo BASEURL; ?>assets/finger-pointing.gif" style="max-width:40px;" alt="Finger Pointing"> </button>

                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
// Check if the app is already installed
window.addEventListener('load', () => {
    if (isAppInstalled()) {
        // If the app is already installed, hide the install buttons
        const installButtons = [document.getElementById('installButton'), document.getElementById('installButtonMobile')];
        installButtons.forEach(button => {
            if (button) {
                button.style.display = 'none'; // Hide install button if app is installed
            }
        });
    }
});

// Unified event listener for beforeinstallprompt
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault(); // Prevent the default install prompt
    deferredPrompt = e; // Save the event for later use

    // Show the install button for both desktop and mobile, only if app is not installed
    const installButtons = [document.getElementById('installButton'), document.getElementById('installButtonMobile')];
    installButtons.forEach(button => {
        if (button && !isAppInstalled()) {
            button.style.display = 'block'; // Show install button if app is not installed
            button.addEventListener('click', () => {
                button.style.display = 'none'; // Hide button after click
                deferredPrompt.prompt(); // Show install prompt
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    } else {
                        console.log('User dismissed the install prompt');
                    }
                    deferredPrompt = null;
                });
            });
        }
    });
});

// Event listener when the app is installed
window.addEventListener('appinstalled', () => {
    console.log('PWA was installed');
    // Hide install buttons after app is installed
    const installButtons = [document.getElementById('installButton'), document.getElementById('installButtonMobile')];
    installButtons.forEach(button => {
        if (button) {
            button.style.display = 'none'; // Hide install button after app is installed
        }
    });
});

// Function to check if the app is installed
function isAppInstalled() {
    return window.matchMedia('(display-mode: standalone)').matches || navigator.standalone;
}
</script>