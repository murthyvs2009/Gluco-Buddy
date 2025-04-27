<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
    <link rel="stylesheet" href="path_to_your_styles.css"> <!-- Replace with your actual stylesheet path -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        .card {
            overflow-x: hidden;
            border-radius: 1rem;
            max-width: 100%;
        }

        .form-group input,
        .form-group input[type="date"] {
            max-width: 300px;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-container {
            width: 100%;
            max-width: 130px;
        }

        .d-flex {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
    </style>
<br/>
<br/>
<section class="vh-5">
    <div class="d-flex">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="width: 100%; max-width: 400px;">
                <div class="card-body p-3 text-left">
                <div style="margin: 0 auto; display: flex; align-items: center; height: 70px;">
        <h3 class="mb-5" style="font-size: 35px; margin: 0; flex-grow: 1; ">
            Add Record
            <a href="https://glucobuddy.cyberbee.in/WeeklyRecord" style="text-decoration: none; position: absolute; right: 10px;">
                <i class="fa-regular fa-circle-xmark fa-xs" style="color: #dc3545;"></i>
            </a>
        </h3>
    </div>
   

                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('validation_errors'); ?>

                    <form id="recordForm" action="<?php echo site_url('AddRecord'); ?>" method="post">
                        <?php $myId = $this->session->userdata('myId'); ?>
                        <?php $todaysDate = date('Y-m-d'); ?>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Record Date</label>
                                    <input type="date" class="date form-control" id="datepicker" aria-describedby="dateHelp" name="arDate" placeholder="Enter Date" value="<?php echo $todaysDate; ?>" onchange="fetchRecordData(this.value)">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>FPG Value</label>
                                    <input type="tel" class="form-control" id="fpgValue" name="arFPGValue" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>PPG Value</label>
                                    <input type="tel" class="form-control" id="ppgValue" name="arPPGValue" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>Hba1c Value</label>
                                    <input type="tel" class="form-control" id="hba1cValue" name="arHBA1CValue" placeholder="Value">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Random Value</label>
                                    <input type="tel" class="form-control" id="randomValue" name="arRandoValue" placeholder="Value">
                                </div>

                                <div class="form-group">
                                    <label>Steps Value</label>
                                    <input type="tel" class="form-control" id="stepsValue" name="arStepsValue" placeholder="Value">
                                </div>
                            </div>
                        </div>

                        <div style="text-align:right; margin-right: 10px;">
                            <input type="submit" class="btn btn-primary" name="addRecordSubmit" style="max-width: 100px;" value="Add Data">
                        </div>

                        <br/>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Automatically fetch data for today's date when the page loads
        fetchRecordData(document.getElementById('datepicker').value);
    });

    function fetchRecordData(date) {
        if (date) {
            fetch('<?php echo site_url('AddRecord/getRecordDataByDate'); ?>/' + date)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('fpgValue').value = data.fpg || '';
                    document.getElementById('ppgValue').value = data.ppg || '';
                    document.getElementById('hba1cValue').value = data.hba1c || '';
                    document.getElementById('randomValue').value = data.random || '';
                    document.getElementById('stepsValue').value = data.steps || '';
                });
        }
    }
</script>
