
<html>
    <head>

    <title>Gluco Buddy</title>

    
    <?php $manifestUrl = BASEURL . "manifest.json"; ?>
    <link rel="manifest" href="<?php echo $manifestUrl; ?>">
    <script src="<?= base_url('assets/main.js') ?>" defer></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
   

    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f9fc;
            color: #333;
        }


        a {
            text-decoration: none;
        }

        #installButton {        
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; 
        }

        #installButton:hover {
            background-color: #e2e6ea;
            transform: scale(1.05);
        }

        hr {
            border: 0;
            clear: both;
            display: block;
            width: 96%;               
            background: #000000;
            height: 1px;
        }

    
        .btn-container {
            
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap; 
        }

        .btn-container .col {
            text-align: center;
        }

        .img-container {
            text-align: center;
            margin: 20px ;
        }

       

        .img-container img {
             width: 100%; 
            height: auto;
        }
        
        .landingPageUl{
            margin-left:20px;
        }
        @media only screen and (min-width: 768px) {
            .landingPageOuter{
            max-width:768px;
            margin:0px auto;
            }
            .desktop{
                display:block;
            }
            .mobile{
                display:none;
                
            }
            .homeh2{
                font-size:35px!important;
                font-weight:bold;
            }
            .homeh3{
                font-size:25px!important;
                font-weight:bold;
            }

        }

        @media only screen and (max-width: 768px) {
            .landingPageOuter{
                width:100%!important;
            }
            .desktop{
                display:none;
            }
            .mobile{
                display:block;
            
            }
            .homeh2{
                font-size:21px!important;
                font-weight:bold;
            }
            .homeh3{
                font-size:18px!important;
                font-weight:bold;
            }
        }
        .btnMbl{
            width:100%!important;
            margin-bottom:20px;

        }
    </style>


<?php
$iconUrl = BASEURL . "assets/images/glucobuddy.png";
?>

<div class="landingPageOuter">



<div class="img-container">
    <img src="<?php echo $iconUrl; ?>" alt="Gluco Buddy Logo"  style="width:100%;" >
</div>

<hr size="10">



<div class="homeh2">Make Gluco Buddy Your Diabetes Companion</div>
<div class="homeh3">Type 2 Diabetes is reversible!</div>
<ul class="landingPageUl">
    
    <li><strong>Track Your Glucose & Steps:</strong> Easily monitor your health metrics.</li>
    <li><strong>Generate Reports:</strong> Get clear insights into your diabetic condition.</li>
    <li><strong>Learn & Empower:</strong> Access tips to manage and reverse type 2 diabetes.</li>
  
</ul>
<i>Stay on top of your health with Gluco Buddy!</i> 🌟
<div class="container mt-5 desktop">
    <div class="row justify-content-between">
        <div class="col-12 col-md-3 mb-3 d-flex justify-content-center">
            <a href="Login" class="btn btn-primary">Login</a>
        </div>
        <div class="col-12 col-md-3 mb-3 d-flex justify-content-center">
            <a href="Signup" class="btn btn-success">Register</a>
        </div>
        <div class="col-12 col-md-3 mb-3 d-flex justify-content-center">
            <button id="installButton" class="btn btn-outline-primary" style="margin:0px auto; width:100%;">Install App</button>
        </div>
    </div>
</div>

<div class="container mt-5 mobile">
    <div class="row justify-content-between">
        <a href="Login" class="btn btn-primary btnMbl">Login</a>
        <a href="Signup" class="btn btn-success btnMbl">Register</a>
        <button id="installButtonMobile" class="btn btn-outline-primary" style="margin:0px auto; width:100%;">Install App</button>
    </div>
</div>



<script>
let deferredPrompt;

// Check if the app is installed
function isAppInstalled() {
    return (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true);
}

// Show or hide buttons based on install state
function updateInstallButtons() {
    const installButtons = [
        document.getElementById('installButton'),
        document.getElementById('installButtonMobile')
    ];

    if (isAppInstalled()) {
        installButtons.forEach(button => {
            if (button) button.style.display = 'none';
        });
    } else {
        installButtons.forEach(button => {
            if (button) button.style.display = 'none'; // Hidden until `beforeinstallprompt` fires
        });
    }
}

// Listen for the beforeinstallprompt event
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();  // Stop default mini-infobar
    deferredPrompt = e;

    const installButtons = [
        document.getElementById('installButton'),
        document.getElementById('installButtonMobile')
    ];

    // Show install buttons only when prompt is available
    installButtons.forEach(button => {
        if (button) {
            button.style.display = 'block';
            button.onclick = () => {
                button.style.display = 'none';  // Hide after click
                deferredPrompt.prompt();        // Show native install prompt

                deferredPrompt.userChoice.then(choiceResult => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    } else {
                        console.log('User dismissed the install prompt');
                    }
                    deferredPrompt = null;
                });
            };
        }
    });
});

// Hide buttons when app is installed
window.addEventListener('appinstalled', () => {
    console.log('PWA was installed');
    const installButtons = [
        document.getElementById('installButton'),
        document.getElementById('installButtonMobile')
    ];
    installButtons.forEach(button => {
        if (button) button.style.display = 'none';
    });
});

// Run check on load and when tab visibility changes
window.addEventListener('load', updateInstallButtons);
document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'visible') {
        updateInstallButtons();
    }
});
</script>



</body>
</html>