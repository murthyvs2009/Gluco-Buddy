<style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

    
        .form-container {
            max-width: 500px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            padding: 20px;
        }

        .btn-container {
            text-align: right;
        }
    </style>
</head>
<body>
<section>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="form-container card shadow-2-strong">
                    <div class="card-body p-3 text-left">
                       <center> <h3 class="mb-2">Contact Us</h3></center>


                        <form action="ContactUs/contactUsSubmission" method="post">

                        <?php echo validation_errors(); ?>
                        <?php echo $this->session->userdata('validaion_errors');?>
                            <div class="form-group mb-3">
                            <?php echo form_error('cuEmail'); ?>
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="cuEmail" value="<?php echo ($this->session->userdata('cuEmail')) ? $this->session->userdata('cuEmail') : ''; ?>" placeholder="Your Email Address">
                            </div>

                            <div class="form-group mb-3">
                            <?php echo form_error('cuPhone'); ?>
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" aria-describedby="phoneHelp" name="cuPhone" value="<?php echo ($this->session->userdata('cuPhone')) ? $this->session->userdata('cuPhone') : ''; ?>" placeholder="Your Phone Number">
                            </div>

                            <div class="form-group mb-3">
                            <?php echo form_error('cuMessage'); ?>
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" style="height:100px;" aria-describedby="messageHelp" value="<?php echo ($this->session->userdata('cuMessage')) ? $this->session->userdata('cuMessage') : ''; ?>" name="cuMessage" placeholder="Your Message"></textarea>
                            </div>
                            <br/>

                      

                            <div class="btn-container">
                                <input type="submit" class="btn btn-primary" value="Send Mail" name="cuSubmit">
                            </div>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>