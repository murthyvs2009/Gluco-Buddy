
<style>
    * {
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
        padding-bottom: 50px;
    }

    .table-responsive {
        overflow-x: auto;
        height: auto;
        min-width: 250px;
        max-width: 700px;
        margin: 0 auto;
        display: block;
    }

    .no-borders td,
    .no-borders th {
        border: none;
    }

    .table {
        width: 100%;
        border-collapse: collapse; /* Remove gaps between cells */
    }

    .table td {
        padding: 0; /* Remove padding from cells */
        margin: 0; /* Remove margin from cells */
        text-align: center; /* Center-align content inside cells */
    }

    .icon-button {
        display: inline-block;
        width: 40px;
        height: 40px;
        border: 2px solid #007bff;
        border-radius: 5px;
        background-color: #fff;
        color: #007bff;
        font-size: 20px;
        text-align: center;
        line-height: 36px; /* Align icon vertically */
        transition: background-color 0.3s, color 0.3s;
        cursor: pointer;
        padding: 0;
        margin: 0;
    }

    .icon-button:hover {
        background-color: #007bff;
        color: #fff;
    }

    @media (max-width: 600px) {
        .table {
            width: 100%; /* Ensure table uses full width */
        }

        .icon-button {
            width: 35px; /* Smaller button size on mobile */
            height: 35px;
            font-size: 18px; /* Adjust font size */
        }
    }

    @media screen and (max-width: 768px) {
        .container {
            width: 350px !important;
        }

        html, body {
            overflow-x: hidden;
        }

        .middlePart {
            font-size: 5px;
        }

        .tablepress {
            font-size: 10px;
        }

        .table-responsive {
            display: block;
            margin: 0 !important;
        }
    }

    .container {
        margin-top: 20px; /* Add margin to top of the container */
    }

    .date-section {
        font-size: 12px; /* Adjust font size */
    }

    .flex-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .responsive-container {
        width: 100%;
    }

    .filterBtn {
        cursor: pointer;
    }
</style>


<div class="monthly" style="width:100%;">
    <ul class="nav nav-tabs justify-content-center" style="width: 100%; font-size: 11px; max-width: 400px; margin: auto;">
        <li class="nav-item">
            <a class="nav-link" href="WeeklyRecord">Weekly Record</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="MonthlyRecord">Monthly Record</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="YearlyRecord">Yearly Record</a>
        </li>
    </ul>

 
 
    <div class="container table-responsive" style="max-width: 400px;">
        <table class="table no-borders">
            <tbody>
                <tr class="align-items-center">
                    <td>
                        <?php $action = BASEURL . "MonthlyRecord"; ?>
                        <form action="<?php echo $action; ?>" method="POST" style="margin: 0; padding: 0;">
                            <input type="hidden" name="leftArrowBtn" <?php if (isset($oldestDate) && $startDate < $oldestDate) echo 'disabled'; ?> value="1">
                            <button type="submit" class="icon-button">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </form>
                    </td>

                    <td class="text-center date-section">
                        <p class="h6">
                            <?php
                            $startDate = $this->session->userdata('startDate');
                            $endDate = $this->session->userdata('endDate');
                            $startDate = date('M-d', strtotime($startDate));
                            $endDate = date('M-d', strtotime($endDate));
                            ?>
                            <span><?php echo $startDate . ' to ' . $endDate; ?></span>
                        </p>
                    </td>

                    <td>
                        <?php $action = BASEURL . "MonthlyRecord"; ?>
                        <form action="<?php echo $action; ?>" method="POST" style="margin: 0; padding: 0;">
                            <input type="hidden" name="rightArrowBtn" <?php if (isset($oldestDate) && $endDate > $newestDate) echo 'disabled'; ?> value="1">
                            <button type="submit" class="icon-button">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </td>

                    <td>
                        <i class="filterBtn icon-button" type="button" data-toggle="collapse" data-target="#columnFormMonthly" alt="filterBtn" name="filterBtn">
                            <i class="fa-solid fa-filter"></i>
                        </i>
                    </td>

                    <td style="float:right;">
                        <a href="AddRecord" class="icon-button">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <style>
        .form-container-monthly{
            width: 150px;
            margin-right:20%;
            float:right;
            margin-bottom:10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px 50px 50px 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>


 
<div class="collapse filterCollapse" id="columnFormMonthly">
        <div class="form-container-monthly" style="width: 160px;">
                <form>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="columnSelectorMonthly" id="checkboxFpgMonthly" data-column="Fpg">
                        <label class="form-check-label" for="checkboxFpgMonthly">FPG</label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="columnSelectorMonthly" id="checkboxPpgMonthly" data-column="Ppg">
                    <label class="form-check-label" for="checkboxPpgMonthly">PPG</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="columnSelectorMonthly" id="checkboxStepsMonthly" data-column="Steps">
                    <label class="form-check-label" for="checkboxStepsMonthly">Steps</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="columnSelectorMonthly" id="checkboxHba1cMonthly" data-column="Hba1c">
                    <label class="form-check-label" for="checkboxHba1cMonthly">Hba1c</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="columnSelectorMonthly" id="checkboxRandomMonthly" data-column="Rando">
                    <label class="form-check-label" for="checkboxRandomMonthly">Random</label>
                </div>
                </form>
            </div>
        </div>


        <?php
                    if ($this->session->flashdata('deleteDataSucc')) {
                        echo alertBox($this->session->flashdata('deleteDataSucc'));
                    }

                    if ($this->session->flashdata('editDataSucc')) {
                        echo successBox($this->session->flashdata('editDataSucc'));
                    }
        ?>

         <?php if ($this->session->userdata('selectedWeek') && $this->session->userdata('selectedYear')) { ?>

<div class="table-responsive" style="min-width:50px; max-width: 400px;margin: 0 auto;display:block; " id="myGlucoTableMonthly" >
    <table class="table table-bordered table-sm" >
        <thead class="thead-light">
            <!-- Table header row -->
            <tr>
                <th style=" text-align:center;" >Date</th>
                <th class="Fpg" style="  text-align:center; width:10px;">FPG</th>
                <th  style=" text-align:center;" class="Ppg">PPG</th>
                <th style=" text-align:center;" class="Rando">Rand</th>
                <th style=" text-align:center;" class="Hba1c">A1C</th>
                <th style=" text-align:center;" class="Steps">Steps</th>
               
            </tr>
        </thead>
        <tbody>
            <!-- Table body content -->
            <?php
            $ownerId = $this->session->userdata('myId');
            
            foreach ($monthDates as $datem) {
                
                if (is_string($datem)) {
                    $dateDBm = date("Y-m-d", strtotime($datem));
                    if ($this->MainModel->hasRecordWithType($ownerId, $dateDBm)) {
                        $Fpgm = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBm, 'FPG');
                        $Ppgm = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBm, 'PPG');
                        $Stepsm = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBm, 'Steps');
                        $Randomm = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBm, 'Rando');
                        $Hba1cm = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBm, 'Hba1c');
                        ?>
                        <tr >
                      
                            <td><a href="EditRecord?date=<?php echo $dateDBm; ?>&fpg=<?php echo $Fpgm; ?>&ppg=<?php echo $Ppgm; ?>&steps=<?php echo $Stepsm; ?>&random=<?php echo $Randomm; ?>&hba1c=<?php echo $Hba1cm; ?>" target="_blank"><?php echo date("d-m-Y", strtotime($datem)); ?></a></td>
                            <td class="Fpg"><?php echo $Fpgm; ?></td>
                            <td class="Ppg"><?php echo $Ppgm; ?></td>
                            <td class="Rando"><?php echo $Randomm; ?></td>
                            <td class="Hba1c" ><?php echo $Hba1cm; ?></td>
                            <td class="Steps"><?php echo $Stepsm; ?></td>



                        
                        </tr>
                            
                   
                        <?php
                    }
                }
            }
            
            ?>
               <tr style="height: 60px;"></tr>
        
        <tr>
     
            <td>Averages </td>
            <td class="Fpg"> <?php if(isset($FpgAverage)){echo  round($FpgAverage,1);} ?> </td>
            <td class="Ppg"> <?php if(isset($PpgAverage)){echo  round($PpgAverage,1);} ?> </td>
            <td class="Rando"> <?php if(isset($RandomAverage)){echo  round($RandomAverage,1);} ?> </td>
            <td class="Hba1c"> <?php if(isset($Hba1cAverage)){echo  round($Hba1cAverage,1);} ?> </td>
            <td class="Steps"> <?php if(isset($StepsAverage)){echo  round($StepsAverage,1);} ?> </td>
            

        </tr>
        </tbody>
    </table>
</div>
    </div>
</div>
<?php } ?>

    <script>
        // JavaScript code for column filtering
        document.querySelectorAll('input[name="columnSelectorMonthly"]').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var selectedColumns = Array.from(document.querySelectorAll('input[name="columnSelectorMonthly"]:checked')).map(function (checkbox) {
                    return checkbox.getAttribute('data-column');
                });
                showSelectedColumns(selectedColumns, '#myGlucoTableMonthly');
            });
        });

        function showSelectedColumns(selectedColumns, tableId) {
            // Get all cells in the table with the specified column classes
            var cells = document.querySelectorAll(tableId + ' td, ' + tableId + ' th');

            // Show all cells initially
            cells.forEach(function (cell) {
                cell.style.display = '';
            });

            // Hide cells for columns that are not selected
            cells.forEach(function (cell) {
                var columnClass = cell.classList[0];
                if (columnClass && !selectedColumns.includes(columnClass)) {
                    cell.style.display = 'none';
                }
            });
        }
    </script>
</div>

