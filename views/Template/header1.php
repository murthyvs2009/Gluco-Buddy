<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gluco Buddy</title>
    <?php $favUrl = BASEURL . "assets/images/newResizedFav.png";?>
    <link rel="icon" type="image/x-icon"  href="<?php echo $favUrl; ?>">

    <?php $manifestUrl = BASEURL . "manifest.json"; ?>
    <link rel="manifest" href="<?php echo $manifestUrl; ?>">
    <script src="<?= base_url('assets/main.js') ?>" defer></script>


    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-wqjDgLFtfsqJR3Gc0Cy4qFQ1PCBwl9xqLXv1vylXqI2DBPYojdo8B4Zi0JO4HIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>assets/css/custom.css" />

    <style>
        html, body {
    overflow-x: hidden;
}
        body {
        font-family: Arial, Helvetica, sans-serif;
        padding: 0px !important;
          margin: 0; 
        }
        #installButton {
            display: none; /* Hidden by default */
        
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; 
        }
        button.installAppBtn:hover {
        color: #ffffff!important;
        }
        .installAppBtn{
            width: 163px;
            font-weight:bold; 
            padding-left:8px;
            padding-right:5px;
            margin-left:20px;
            margin-right:20px; 
            float:right;

        }
</style>

<!-- Full jQuery (not the slim version) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper.js (needed by Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</head>
<body>


<nav class="navbar navbar-expand-lg  sticky-top navbar-light" style="background-color:#E5E4E2!important;">
<a class="navbar-brand" href="https://glucobuddy.cyberbee.in/"><img src="<?php echo BASEURL; ?>assets/images/glucobuddy.png" style="max-width: 250px;" /></a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" style="text-align:right;" id="navbarNavDropdown">
    <ul class="navbar-nav nav">
      <li class="nav-item">
        <a class="nav-link" href="ManageDiabetes">Knowledge Base</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AboutGB">About Glucobuddy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ContactUs">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Share">Share</a>
      </li>
  
    </ul>

    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
 <button class="nav-link btn btn-outline-danger installAppBtn" id="installButton"  >
Install App   <img src="<?php echo BASEURL; ?>assets/finger-pointing.gif" style="max-width:40px;" alt="Finger Pointing"> </button>
</li>

<br/>
      <li class="nav-item">
        <a class="nav-link" href="Signup"><i class="fa-solid fa-user-plus"></i>Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
 
    </ul>


  </div>
</nav>

<script>
let deferredPrompt;

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



<?php if ($this->session->flashdata('contactForm')){?>
<div style="color:green; margin:0px auto;">
<?= $this->session->flashdata('contactForm'); ?>
</div>
<?php } ?>