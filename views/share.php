
<style>
   

        h2 {
            color: #007bff;
        }

        h3 {
            color: #17a2b8;
        }

.mt-45{
    font-size:18px;
    font-weight:bold;
    color: #007bff;
}

.st4{
    font-size:21px;
    font-weight:bold;
    color: #17a2b8;
    text-align:center;
    padding-right:10px;
    padding-left:10px;
    text-align:center;
    max-width:400px;
    margin:0px auto;
}


.card123{
    padding-bottom:20px;
    padding-top:0px;
    padding-right:5px;
    padding-left:5px;

}

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .share-buttons a {
            padding: 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            height: 48px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .share-buttons a i {
            margin-right: 8px;
        }
        .share-buttons a.facebook { background-color: #3b5998; }
        .share-buttons a.twitter { background-color: #1DA1F2; }
        .share-buttons a.linkedin { background-color: #0077B5; }
        .share-buttons a.whatsapp { background-color: #25D366; }
        .share-buttons a:hover {
            opacity: 0.8;
        }
        @media (max-width: 600px) {
            .share-buttons {
                flex-direction: column;
                align-items: center;
            }
            .share-buttons a {
                width: 100%;
                max-width: 300px;
                margin-bottom: 0px;
            }
            .container44{ max-width:300px;
            margin:0px auto!important;}
        }

        .copy-button {
            margin-top: 10px;
            font-size: 0.8em;
        }
    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container44">
            <div class="row">
                <div class="col-md-12">
           


                        <h2 class="mt-4" style="text-align:center;">Do you like this App? Consider Sharing it.</h2>
                        <p style="text-align:center;">
                        We are trying to spread the good word that "Type 2 Diabetes is reversible!"
                        and help everyone who would like to live healthily. Consider sharing this app with your friends via the following ways.
                        </p>
                        <div class="share-buttons">
                        <?php
                        $appUrl = urlencode('http://glucobuddy.cyberbee.in/');
                        $shareText = urlencode('Check out this "app Gluco Buddy"!');
                        $imageUrl = urlencode('http://glucobuddy.cyberbee.in/assets/images/gbad3.png');
                        $imageUrl2 = 'http://glucobuddy.cyberbee.in/assets/images/gbad3.png';
                        $brouchre = 'http://glucobuddy.cyberbee.in/assets/brouchre.pdf';
                        $pdficon = 'http://glucobuddy.cyberbee.in/assets/images/pdfIcon.png';
                        ?>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $appUrl; ?>" class="facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                        </a><br/>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo $appUrl; ?>&text=<?php echo $shareText; ?>" class="twitter" target="_blank">
                        <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <br/>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $appUrl; ?>" class="linkedin" target="_blank">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                        <br/>
                        <a href="https://api.whatsapp.com/send?text=<?php echo $shareText; ?>%20<?php echo $appUrl; ?>" class="whatsapp" target="_blank">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
            
                        </div>




                </div>
            </div>

            <div class="row card  card123">
                <div class="col-md-12">
                    <h3 class="mt-4  st4">You can Share image/ poster in your social Media (instagram, whatsapp, facebook etc)</h3>
                    <div style="text-align:center; width:100%">
                    <img src="<?php echo $imageUrl2; ?>" style="margin:0px auto; max-height:350px;"/>
                        <h2 class="mt-45">Image URL</h2>
                        <textarea id="copyText1" style=" height:80px; width:250px;"><?php echo $imageUrl2; ?></textarea><br/>
                        <button class="btn btn-primary copy-button" onclick="copyToClipboard('copyText1')">Copy to Clipboard</button>
                    </div>
                </div>
            </div>

            <div class="row card  card123">
                <div class="col-md-12">
                    <h3 class="mt-4 st4">If you would like to print brochures and share them on paper, here is the link to the PDF file.</h3>
                    <div style="text-align:center; width:100%">
                    <a href="<?php echo $brouchre; ?>" target="_blank"><img src="<?php echo $pdficon; ?>" style="margin:0px auto; max-height:100px;"/></a>
                        
                        <h2 class="mt-45">PDF URL</h2>
                        <textarea id="copyText2" style=" height:80px; width:250px;"><?php echo $brouchre; ?></textarea><br/>
                        <button class="btn btn-primary copy-button" onclick="copyToClipboard('copyText2')">Copy to Clipboard</button>
                    </div>
                </div>
            </div>
 
            <script>
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId);
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the textarea
            document.execCommand("copy");

            // Alert the copied text (optional)
            alert("Copied the text: " + copyText.value);
        }
    </script>

            <br/><br/><br/><br/><br/><br/>
</div>


<div style="display:none;">
<div style="display: flex; align-items: center; gap: 20px; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; margin-top: 100px; border-radius: 8px;">
    <div style="flex: 1;">
        <img src="https://cyberbee.in/wp-content/uploads/2024/06/myself.jpg" alt="Murthy S Vemuri" style="width: 100px; height: auto; border-radius: 50%;" decoding="async">
    </div>
    <div style="flex: 3;">
        <h2 style="font-size: 1.2em;">Murthy S Vemuri</h2>
        <p style="font-size: 0.9em;">Hello! I’m a 14-year-old ambitious young programmer living in Gandhinagar. Since the age of 10, I have been passionate about learning and creating awesome and useful web applications. I have acquired skills in several programming languages, including HTML, CSS, PHP, and CodeIgniter. Stay connected with Cyberbee to explore and utilize these applications.</p>
        <p style="font-size: 0.9em;">Connect with me in many other ways: <a href="https://github.com/murthyvs2009">GitHub</a>, <a href="https://www.instagram.com/vemurimurthys/?igsh=ZzI3bzRvbDY2cDA2">Instagram</a>.</p>
    </div>
</div>
</div>