<style>

.GBLogo {
    max-width: 300px;
    display: block;
    margin: 0 auto; 
}
</style>

<section class="vh-100" style="margin:20px;" >
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5" >
        <div class="card  card123 shadow-2-strong">
          <div class="card-body p-3 text-left">

          <?php
        $iconUrl = BASEURL . "assets/images/glucobuddy.png";
        ?>
          <img src="<?php echo $iconUrl; ?>" class="GBLogo">
          <hr class="my-4">
           <center><h3 class="mb-5">Sign Up</h3></center>
           <?php echo validation_errors(); ?>
           <?php echo $this->session->flashdata('validation_errors'); ?>
                    <form action="Signup/signupAddRec" method="post">

                    <div class="mb-3">
                    <label for="uEmail" class="form-label">Email Address </label>
                    <input type="email" class="form-control" aria-describedby="useremailHelp" value="<?php echo ($this->session->userdata('UserSignupEmail')) ? $this->session->userdata('UserSignupEmail') : ''; ?>" name="uEmail">
                    <?php echo form_error('uEmail', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="mb-3">
                    <label for="uName" class="form-label">Name </label>
                    <input type="text" class="form-control" aria-describedby="useremailHelp" value="<?php echo ($this->session->userdata('UserSignupName')) ? $this->session->userdata('UserSignupName') : ''; ?>" name="uName">
                    <?php echo form_error('uName', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="mb-3">
                    <label for="uPhone" class="form-label">Phone Number </label>
                    <input type="number" class="form-control" aria-describedby="useremailHelp" value="<?php echo ($this->session->userdata('UserSignupPhone')) ? $this->session->userdata('UserSignupPhone') : ''; ?>" name="uPhone">
                    <?php echo form_error('uPhone', '<div class="text-danger">', '</div>'); ?>
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
                        <span style="font-size:12px;">Please enter the captcha below to confirm your human identity.</span>
                        <label for="captcha" class="form-label">Captcha Image:</label>
                        <?php echo $captchaImg; ?>
                        <input type="number" class="form-control" aria-describedby="useremailHelp" placeholder="Enter Above Captcha"  name="uCaptcha">
                        <?php echo form_error('uCaptcha', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <input type="submit" class="btn btn-primary" name="signInSubmit" style="float:right; margin-top:10px" value="Sign Up">
                    <br/>

                    </form>
            <hr class="my-4">

            <a href="Login">Login</a> |<a href="<?php echo BASEURL; ?>ForgotPassword">Forgot Password?</a>|<a href="ContactUs">Contact Us</a> <br/><button class="nav-link btn btn-outline-danger  installAppBtn" id="installButton" style="margin:0px auto; width:100%; "  >Install App   <img src="<?php echo BASEURL; ?>assets/finger-pointing.gif" style="max-width:40px;" alt="Finger Pointing"> </button>
   

         
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