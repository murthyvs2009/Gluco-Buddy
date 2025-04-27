<!DOCTYPE html>
<html lang="en">
<head>
<title>Gluco Buddy</title>
    <?php $favUrl = BASEURL . "assets/images/newResizedFav.png";?>
    <link rel="icon" type="image/x-icon"  href="<?php echo $favUrl; ?>">

    <?php $manifestUrl = BASEURL . "manifest.json"; ?>
    <link rel="manifest" href="<?php echo $manifestUrl; ?>">
    <script src="<?= base_url('assets/main.js') ?>" defer></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


        <!-- jQuery (Make sure jQuery is before Bootstrap JS) -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Popper.js (required for Bootstrap JS) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

        <!-- Bootstrap JavaScript (after jQuery and Popper.js) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <style>
        body {
          font-family: Arial, sans-serif; 
          margin: 0; 
          padding: 0;"
        }
        .head3OuterDiv{
            max-width:1200px;
            margin:0px auto;
            margin-bottom:50px!important;
        

        }
        .container{
            /*width:1200px;*/
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


</head>
<body>

<div class="head3OuterDivx sticky-top">

<nav class="navbar navbar-expand-lg  sticky-top navbar-light" style=" width:100% !important; background-color:#E5E4E2!important;">
  <a class="navbar-brand" href="<?php echo BASEURL; ?>WeeklyRecord"><img src="<?php echo BASEURL; ?>assets/images/glucobuddy.png" style="max-width: 250px;" /></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" style="text-align:right;" id="navbarNavDropdown">
    <ul class="navbar-nav nav">
    
        <?php $changePasswordUrl=BASEURL."ChangePassword"?>
        <?php $weeklyRecordUrl=BASEURL."WeeklyRecord"?>
        <?php $monthlyRecordUrl=BASEURL."MonthlyRecord"?>
        <?php $yearlyRecordUrl=BASEURL."YearlyRecord"?>
        <?php $generateReportUrl=BASEURL."GenerateReport"?>
        <?php $addRecordUrl=BASEURL."AddRecord"?>
        <?php $UsersUrl=BASEURL."Users"?>
        <?php $ManageDiabetesUrl=BASEURL."ManageDiabetes"?>
        <?php $AboutGBUrl=BASEURL."AboutGB"?>
        <?php $ContactUsUrl=BASEURL."ContactUs"?>
        <?php $ShareUrl=BASEURL."Share"?>
      

        <li class="nav-item">
        <a class="nav-link" href="<?php echo $ManageDiabetesUrl;?>">Knowledge Base</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $AboutGBUrl;?>">About Glucobuddy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $ContactUsUrl;?>">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $ShareUrl;?>">Share</a>
      </li>
    

  
    </ul>


    <ul class="navbar-nav ml-auto">

    <?php
    if($this->session->userdata('myId')=='mNcybYL7'){
        $var='';
        $var.='<li class="nav-item">';
        $var.='<a class="nav-link" href="'.$UsersUrl.'">Users</a>';
        $var.='</li>';
        echo $var;
    }
    
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $changePasswordUrl;?>">Change Password</a>
      </li>


    <li class="nav-item">
        <a class="nav-link" href="<?php echo $generateReportUrl;?>">Generate Report</a>
      </li>
   

    <li class="nav-item">
    <button class="nav-link btn btn-outline-danger  installAppBtn" id="installButton" style="margin:0px auto; width:100%; "  >Install App   <img src="<?php echo BASEURL; ?>assets/finger-pointing.gif" style="max-width:40px;" alt="Finger Pointing"> </button>
</li>


<br/>
     
      
      <li class="nav-item">
        <a class="nav-link" href="Logout"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a>
      </li>
    </ul>


  
</nav>


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

</div>
<?php if ($this->session->flashdata('contactForm')){?>
<div style="color:green; margin:0px auto;">
<?php $contactFormSuccess=$this->session->flashdata('contactForm'); ?>
<?php echo "<center>"; ?>
<?php echo $contactFormSuccess; ?>
<?php echo "</center>"; ?>
</div>
<?php } ?>
<div class="container">

