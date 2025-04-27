

<style>

    @media screen and (max-width: 768px) {
        .generateTables{
            float:left!important;
            max-width:350px;
            overflow:auto;
            overflow-x: hidden!important;
        }
    }

</style>




<br/>

<br/>

<br/>

<section class="vh-5">
    <div class="row d-flex justify-content-center align-items-center h-100" style="">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 " >
      <div class="card shadow-2-strong" style="width:350px;  border-radius: 1rem; <?php if($hideForm==1){echo "display:none;";}?>">
          <div class="card-body p-3 text-left">

          <h1 class="mb-5"><center>Generate Report</center></h1>

          <?php echo validation_errors();?>
           <?php echo $this->session->flashdata('validation_errors'); ?>
           <form action="<?php echo site_url('GenerateReport'); ?>" method="post">

                <?php
                $todaysDate=date('Y-m-d');
                ?>
                <div class="mb-3">
                    <small> Please enter the dates in mm/dd/yyyy </small>
                    <br/>
                <label for="date" class="form-label">Start Date</label>
                <br/>
                <input type="date" class="date form-control"  id="datepicker" aria-describedby="dateHelp" name="grStartDate"  value="<?php echo $todaysDate;?>" placeholder="Enter Date">
                </div>

                <div class="mb-3">
                <label for="date" class="form-label">End Date</label>
                <br/>
                <input type="date" class="date form-control"  id="datepicker" aria-describedby="dateHelp" name="grEndDate"  value="<?php echo $todaysDate;?>" placeholder="Enter Date">
                </div>


                <br/>

                <input type="submit" style="max-width:150px; float:right;" name="grSubmit" class="btn btn-primary btn-container" value="Generate Report"/>

                <br/>
                </form>

         

          </div>
        </div>
      </div>
  </div>
</section>






<style>
    html, body {
            margin: 0 auto;
            overflow-x: hidden;
            padding-bottom:50px;

        }
        .generateTables {
            max-width: 600px;
            margin: 20px auto;
            display: block;
           
        }

       
    </style>
<h2><center>All records within the selected date range </center>  </h2>
    <div class="table-responsive generateTables" id="myGlucoTableWeekly">
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th style=" text-align:center; max-width:10px;">Date</th>
                    <th style=" text-align:center;" class="Fpg">FPG</th>
                    <th style=" text-align:center;" class="Ppg">PPG</th>
                    <th style=" text-align:center;" class="Rando">Rand</th>
                    <th style=" text-align:center;" class="Hba1c">A1C</th>
                    <th style=" text-align:center;" class="Steps">Steps</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $ownerId = $this->session->userdata('myId');
                $reportRecordDates = [];

                if (isset($reportData['ReportRecord']) && is_array($reportData['ReportRecord'])) {
                    foreach ($reportData['ReportRecord'] as $ReportRecordData) {
                        $reportRecordDate = $ReportRecordData->date_main;
                        $reportRecordDateArr = explode(" ", $reportRecordDate);
                        $uniqueDates = array_values(array_unique($reportRecordDateArr));
                        $reportRecordDates = array_merge($reportRecordDates, $uniqueDates);
                    }
                    $reportRecordDates = array_values(array_unique($reportRecordDates));
                 
             
                    usort($reportRecordDates, function($a, $b) {
                        return strtotime($a) - strtotime($b);
                    });
                    

                 
                   // usort($reportRecordDates, 'compareByTimeStamp');

                    foreach ($reportRecordDates as $uniqueDate) {
                        $Fpg = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $uniqueDate, 'FPG');
                        if ($Fpg) {
                            $this->session->set_userdata('Fpg', $Fpg);
                        }
                        $Ppg = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $uniqueDate, 'PPG');
                        if ($Ppg) {
                            $this->session->set_userdata('Ppg', $Ppg);
                        }
                        $Random = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $uniqueDate, 'Rando');
                        if ($Random) {
                            $this->session->set_userdata('Rando', $Random);
                        }
                        $Hba1c = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $uniqueDate, 'Hba1c');
                        if ($Hba1c) {
                            $this->session->set_userdata('Hba1c', $Hba1c);
                        }
                        $Steps = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $uniqueDate, 'Steps');
                        if ($Steps) {
                            $this->session->set_userdata('Steps', $Steps);
                        }
                        ?>
                        <tr>
                     
                            <td><?php echo date("d-m-Y", strtotime($uniqueDate)); ?></td>
                            <td class="Fpg"><?php echo $Fpg; ?></td>
                            <td class="Ppg"><?php echo $Ppg; ?></td>
                            <td class="Rando"><?php echo $Random; ?></td>
                            <td class="Hba1c"><?php echo $Hba1c; ?></td>
                            <td class="Steps"><?php echo $Steps; ?></td>
                        </tr>
                    <?php
                    }

                }
           

            ?>
              
                          
                          
            </tbody>
        </table>
    </div>



    <br/>
    <br/>
    <h2><center>Glucose metrics within the selected date range </center>  </h2>
    <div class="table-responsive generateTables" id="myGlucoTableWeekly" style="clear: both;">
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th  style=" text-align:center;">Gluco Metrics</th>
                    <th style=" text-align:center;" class="Fpg">FPG</th>
                    <th style=" text-align:center;" class="Ppg">PPG</th>
                    <th style=" text-align:center;" class="Rando">Rand</th>
                    <th style=" text-align:center;" class="Hba1c">A1C</th>
                    <th style=" text-align:center;" class="Steps">Steps</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Averages</td>
                    <td class="Fpg"><?php if(isset($data['FpgAverage'])){echo $data['FpgAverage'];} ?></td>
                    <td class="Ppg"><?php if(isset($data['PpgAverage'])){echo $data['PpgAverage'];} ?></td>
                    <td class="Rando"><?php if(isset($data['RandomAverage'])){echo $data['RandomAverage'];} ?></td>
                    <td class="Hba1c"><?php if(isset($data['Hba1cAverage'])){echo $data['Hba1cAverage'];} ?></td>
                    <td class="Steps"><?php if(isset($data['StepsAverage'])){echo $data['StepsAverage'];} ?></td>
                </tr>
                <tr>
                    <td>Highest</td>
                    <td class="Fpg"><?php if(isset($data['highestValueFpg'])){ print_r($data['highestValueFpg']->value);}?></td>
                    <td class="Ppg"><?php if(isset($data['highestValuePpg'])){ print_r($data['highestValuePpg']->value);}?></td>
                    <td class="Rando"><?php if(isset($data['highestValueRandom'])){ print_r($data['highestValueRandom']->value);}?></td>
                    <td class="Hba1c"><?php if(isset($data['highestValueHba1c'])){ print_r($data['highestValueHba1c']->value);}?></td>
                    <td class="Steps"><?php if(isset($data['highestValueSteps'])){print_r($data['highestValueSteps']->value);}?></td>
                </tr>
                <tr>
                    <td>Lowest</td>
                    <td class="Fpg"><?php if(isset($data['lowestValueFpg'])){ print_r($data['lowestValueFpg']->value);}?></td>
                    <td class="Ppg"><?php if(isset($data['lowestValuePpg'])){ print_r($data['lowestValuePpg']->value);}?></td>
                    <td class="Rando"><?php if(isset($data['lowestValueRandom'])){ print_r($data['lowestValueRandom']->value);}?></td>
                    <td class="Hba1c"><?php if(isset($data['lowestValueHba1c'])){ print_r($data['lowestValueHba1c']->value);}?></td>
                    <td class="Steps"><?php if(isset($data['lowestValueSteps'])){print_r($data['lowestValueSteps']->value);}?></td>
                </tr>
                <tr>
                    <td>Normal</td>
                    <td class="Fpg">130 -140 mg/dl</td>
                    <td class="Ppg">140-180 md/dl</td>
                    <td class="Rando"> 140-180 md/dl</td>
                    <td class="Hba1c">6.5%-7%</td>
                    <td class="Steps">at least 10,000 steps a day</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <?php

                    $fpg = $this->session->userdata('Fpg');
                    $ppg = $this->session->userdata('Ppg');
                    $rando = $this->session->userdata('Rando');
                    $hba1c = $this->session->userdata('Hba1c');
                    $steps = $this->session->userdata('Steps');

        



                    $fpgColor = ($fpg < 130) ? 'green' : (($fpg >= 130 && $fpg <= 140) ? 'green' : 'red');

                    if($fpg < 1)
                    {
                        $fpgColor = 'gray';
                        $fpgText  ='N/A'; 
                    }
                    else
                    {
                        $fpgText = ($fpg < 130) ? "Low FPG" : (($fpg >= 130 && $fpg <= 140) ? "Normal FPG" : "High FPG");
                    }

                    

                    $ppgColor = ($ppg < 140) ? 'red' : (($ppg >= 140 && $ppg <= 180) ? 'green' : 'red');
                    if($ppg < 1)
                    {
                        $ppgColor = 'gray';
                        $ppgText  ='N/A'; 
                    }
                    else
                    {
                        $ppgText = ($ppg < 140) ? "Low PPG" : (($ppg >= 140 && $ppg <= 180) ? "Normal PPG" : "High PPG");
                    }
           

                    $randoColor = ($rando < 140) ? 'red' : (($rando >= 140 && $rando <= 180) ? 'green' : 'red');
                    
                    if($rando < 1)
                    {
                        $randoColor = 'gray';
                        $randoText ='N/A'; 
                    }
                    else
                    {
                        $randoText =  ($rando < 140) ? "Low Random" : (($rando >= 140 && $rando <= 180) ? "Normal Random" : "High Random");
                    }

                    $hba1cColor = ($hba1c < 6.5) ? 'red' : (($hba1c >= 6.5 && $hba1c <= 7) ? 'green' : 'red');
                    if($hba1c < 1)
                    {
                        $hba1cColor = 'gray';
                        $hba1cText ='N/A'; 
                    }
                    else
                    {
                        $hba1cText = ($hba1c < 6.5) ? "Low HbA1c" : (($hba1c >= 6.5 && $hba1c <= 7) ? "Normal HbA1c" : "High HbA1c");
                    }
    

                    $stepsColor = ($steps < 10000) ? 'red' : 'green';
                    if($steps < 1)
                    {
                        $stepsColor = 'gray';
                        $stepsText ='N/A'; 
                    }
                    else
                    {
                        $stepsText = ($steps < 10000) ? "Low Steps" : "High Steps";
                    }
    

                    
                    ?>

                    <td class="Fpg" style="color: <?php echo $fpgColor; ?>">
                        <?php echo $fpgText; ?>
                    </td>

                    <td class="Ppg" style="color: <?php echo $ppgColor; ?>">
                        <?php echo $ppgText; ?>
                    </td>

                    <td class="Rando" style="color: <?php echo $randoColor; ?>">
                        <?php echo $randoText; ?>
                    </td>

                    <td class="Hba1c" style="color: <?php echo $hba1cColor; ?>">
                        <?php echo $hba1cText; ?>
                    </td>

                    <td class="Steps" style="color: <?php echo $stepsColor; ?>">
                        <?php echo $stepsText; ?>
                    </td>



</tr>
            </tbody>
        </table>
    
                </div>

                <br/>
                <br/>
    <div id="landscapeMessage" style="display: none; text-align: center; padding: 10px; color:red; border-radius: 5px; font-size: 16px;">
    For better visibility of the graphs, please switch your phone to landscape mode.
</div>

<script>
// Detect orientation change and show/hide message
function checkOrientation() {
    var message = document.getElementById('landscapeMessage');
    if (window.innerHeight > window.innerWidth) {
        // Portrait mode, show message
        message.style.display = 'block';
    } else {
        // Landscape mode, hide message
        message.style.display = 'none';
    }
}

// Call checkOrientation when page loads and when window is resized
window.onload = checkOrientation;
window.onresize = checkOrientation;
</script>






    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest"></script>

<div style="width: 600px; margin: auto;">
    <canvas id="fpgChart"></canvas>
</div>

<script>
// Passing PHP data to JavaScript using echo and json_encode
const labelsFpg = <?php echo json_encode($fpgData['labels']); ?>;
const dataValuesFpg = <?php echo json_encode($fpgData['values']); ?>;

// Chart.js code to create the chart
const ctxFpg = document.getElementById('fpgChart').getContext('2d');
const fpgChart = new Chart(ctxFpg, {
    type: 'line', // You can change to bar, pie, etc.
    data: {
        labels: labelsFpg, // Using the labels from PHP
        datasets: [{
            label: 'FPG Values Over Time',
            data: dataValuesFpg, // Using data from PHP
            borderColor: 'rgb(255, 159, 64)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false,
                min: 100,  // Set minimum Y-axis value
                max: 300,  // Set maximum Y-axis value
                ticks: {
                    stepSize: 20  // Corrected typo: "stepSize" instead of "setpSize"
                }
            }
        }
    }
});
</script>



<br/>
<br/>



<div style="width: 600px; margin: auto;">
    <canvas id="ppgChart"></canvas>
</div>

<script>
// Passing PHP data to JavaScript using echo and json_encode
const labelsPpg = <?php echo json_encode($ppgData['labels']); ?>;
const dataValuesPpg = <?php echo json_encode($ppgData['values']); ?>;

// Chart.js code to create the chart
const ctxPpg = document.getElementById('ppgChart').getContext('2d');
const ppgChart = new Chart(ctxPpg, {
    type: 'line', // You can change to bar, pie, etc.
    data: {
        labels: labelsPpg, // Using the labels from PHP
        datasets: [{
            label: 'PPG Values Over Time',
            data: dataValuesPpg, // Using data from PHP
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false,
                min: 120,  // Set minimum Y-axis value
                max: 320,  // Set maximum Y-axis value
                ticks: {
                    stepSize: 20  // Corrected typo: "stepSize" instead of "setpSize"
                }
            }
        }
    }
});
</script>



<br/>
<br/>



<div style="width: 600px; margin: auto;">
    <canvas id="randomChart"></canvas>
</div>

<script>
// Passing PHP data to JavaScript using echo and json_encode
const labelsRandom = <?php echo json_encode($randomData['labels']); ?>;
const dataValuesRandom = <?php echo json_encode($randomData['values']); ?>;

// Chart.js code to create the chart
const ctxRandom = document.getElementById('randomChart').getContext('2d');
const randomChart = new Chart(ctxRandom, {
    type: 'line', // You can change to bar, pie, etc.
    data: {
        labels: labelsRandom, // Using the labels from PHP
        datasets: [{
            label: 'Random Values Over Time',
            data: dataValuesRandom, // Using data from PHP
            borderColor: 'rgb(0,0,0)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false,
                min: 120,  // Set minimum Y-axis value
                max: 320,  // Set maximum Y-axis value
                ticks: {
                    stepSize: 20  // Corrected typo: "stepSize" instead of "setpSize"
                }
            }
        }
    }
});
</script>



