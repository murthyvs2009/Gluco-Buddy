<!DOCTYPE html>
<head>
<title>Gluco Buddy</title>
    <?php $favUrl = BASEURL . "assets/images/newResizedFav.png";?>
    <link rel="icon" type="image/x-icon"  href="<?php echo $favUrl; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php $manifestUrl = BASEURL . "manifest.json"; ?>
<link rel="manifest" href="<?php echo $manifestUrl; ?>">
<script src="<?= base_url('assets/main.js') ?>" defer></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
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

</head>
<body>