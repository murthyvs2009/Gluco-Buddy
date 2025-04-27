<div class="content">
        <div class="container" style="position: sticky; top: 0;">
            <ul class="nav nav-tabs" role="tablist" style="position: sticky; top: 0;">
                <li class="nav-item">
                    <a class="nav-link" style="width: 130px;" href="#weekly" data-toggle="tab">Week</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#monthly" style="width: 110px;" data-toggle="tab">Month</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#yearly" style="width: 110px;" data-toggle="tab">Year</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#report" style="width: 160px;" data-toggle="tab">Generate Report</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="weekly">
                    <br />
                    <div class="BackNAhead row align-items-center backAheadContainer">
                        <div class="col-md-2 col-12 leftBtn" style="float: left;">
                            <br />
                            <?php $leftArrowUrl = BASEURL . "assets/images/leftArrowBtn.png"; ?>
                            <?php $action = BASEURL . "Main"; ?>
                            <form action="<?php echo $action; ?>" style="margin: 0!important;" method="POST">
                                <input type="hidden" name="leftArrowBtn" value="1">
                                <button type="submit" class="btn btn-link">
                                    <img src="<?php echo $leftArrowUrl; ?>" class="leftArrowBtn" alt="Left Arrow" name="leftArrow">
                                </button>
                            </form>
                        </div>

                        <div class="col-md-5 col-12 BackNAheadMiddle">
                            <?php echo $this->session->userdata('startDate'); ?> to <?php echo $this->session->userdata('endDate'); ?>
                        </div>

                        <div class="col-md-2 col-12 rightBtn">
                            <?php $rightArrowUrl = BASEURL . "assets/images/rightArrowBtn.png"; ?>
                            <?php $action = BASEURL . "Main"; ?>
                            <form action="<?php echo $action; ?>" method="POST">
                                <input type="hidden" name="rightArrowBtn" value="1">
                                <button type="submit" class="btn btn-link">
                                    <img src="<?php echo $rightArrowUrl; ?>" class="rightArrowBtn" alt="Right Arrow" name="rightArrow">
                                </button>
                            </form>
                        </div>

                        <div class="col-md-3 col-12">
                            <button class="btn btn-primary filterBtn" type="button" data-toggle="collapse" data-target="#columnFormWeekly">
                                Filter
                            </button>
                        </div>
                    </div>

                    <style>
                        .form-container-weekly {
                            width: 150px;
                            padding: 20px;
                            border: 1px solid #ddd;
                            border-radius: 10px;
                            margin: 20px 50px 50px 0 auto;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                    </style>

                    <div class="collapse filterCollapse" id="columnFormWeekly">
                        <div class="form-container-weekly" style="width: 160px;">
                            <form>
                                <!-- Checkbox inputs for column selection -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxFpgWeekly" data-column="Fpg">
                                    <label class="form-check-label" for="checkboxFpgWeekly">Fpg</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxPpgWeekly" data-column="Ppg">
                                    <label class="form-check-label" for="checkboxPpgWeekly">Ppg</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxStepsWeekly" data-column="Steps">
                                    <label class="form-check-label" for="checkboxStepsWeekly">Steps</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxHba1cWeekly" data-column="Hba1c">
                                    <label class="form-check-label" for="checkboxHba1cWeekly">Hba1c</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxRandomWeekly" data-column="Rando">
                                    <label class="form-check-label" for="checkboxRandomWeekly">Random</label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br /><br />
                    <?php
                    if ($this->session->flashdata('deleteDataSucc')) {
                        echo alertBox($this->session->flashdata('deleteDataSucc'));
                    }

                    if ($this->session->flashdata('editDataSucc')) {
                        echo successBox($this->session->flashdata('editDataSucc'));
                    }
                    ?>
                    <?php if ($this->session->userdata('selectedWeek') && $this->session->userdata('selectedYear')) { ?>
                        <div class="table-responsive" id="myGlucoTableWeekly">
                            <table class="table table-bordered">
                                <thead>
                                    <!-- Table header row -->
                                    <tr>
                                        <th>Date</th>
                                        <th class="Fpg">FPG</th>
                                        <th class="Ppg">PPG</th>
                                        <th class="Steps">Steps</th>
                                        <th class="Hba1c">HBA1C</th>
                                        <th class="Random">Random</th>
                                        <th style="margin:0!important; width:80px;"><i class="bi bi-pencil fa-2x"></i></th>
                                        <th style="margin:0!important; width:80px;"><i class="bi bi-trash fa-2x"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table body content -->
                                    <?php
                                    $ownerId = $this->session->userdata('myId');

                                    foreach ($weekDates as $datew) {
                                        if (is_string($datew)) {
                                            $dateDBw = date("Y-m-d", strtotime($datew));
                                            if ($this->MainModel->hasRecordWithType($ownerId, $dateDBw)) {
                                                $Fpgw = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBw, 'FPG');
                                                $Ppgw = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBw, 'PPG');
                                                $Stepsw = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBw, 'Steps');
                                                $Randomw = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBw, 'Rando');
                                                $Hba1cw = $this->MainModel->getValueBydateTypeAndOwner($ownerId, $dateDBw, 'Hba1c');
                                    ?>
                                                <tr>
                                                    <td><?php echo date("Y-m-d", strtotime($datew)); ?><br></td>
                                                    <td class="Fpg"><?php echo $Fpgw . '<br>'; ?></td>
                                                    <td class="Ppg"><?php echo $Ppgw . '<br>'; ?></td>
                                                    <td class="Steps"><?php echo $Stepsw . '<br>'; ?></td>
                                                    <td class="Hba1c"><?php echo $Hba1cw . '<br>'; ?></td>
                                                    <td class="Random"><?php echo $Randomw . '<br>'; ?></td>

                                                    <td>
                                                        <a href="EditRecord?date=<?php echo $dateDBw; ?>&fpg=<?php echo $Fpgw; ?>&ppg=<?php echo $Ppgw; ?>&steps=<?php echo $Stepsw; ?>&random=<?php echo $Randomw; ?>&hba1c=<?php echo $Hba1cw; ?>" class="btn btn-primary">
                                                            <i class="bi bi-pencil fa-2x"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="DeleteRecord?deleteDate=<?php echo $dateDBw; ?>" class="btn btn-danger"> <i class="bi bi-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <script>
                        // JavaScript code for column filtering
                        document.querySelectorAll('input[name="columnSelectorWeekly"]').forEach(function(checkbox) {
                            checkbox.addEventListener('change', function() {
                                var selectedColumns = Array.from(document.querySelectorAll('input[name="columnSelectorWeekly"]:checked')).map(function(checkbox) {
                                    return checkbox.getAttribute('data-column');
                                });
                                showSelectedColumns(selectedColumns, '#myGlucoTableWeekly');
                            });
                        });

                        function showSelectedColumns(selectedColumns, tableId) {
                            // Get all cells in the table with the specified column classes
                            var cells = document.querySelectorAll(tableId + ' td, ' + tableId + ' th');

                            // Show all cells initially
                            cells.forEach(function(cell) {
                                cell.style.display = '';
                            });

                            // Hide cells for columns that are not selected
                            cells.forEach(function(cell) {
                                var columnClass = cell.classList[0];
                                if (columnClass && !selectedColumns.includes(columnClass)) {
                                    cell.style.display = 'none';
                                }
                            });
                        }
                    </script>

                </div>





                <div class="tab-pane fade show active" id="monthly">
                <br />
                    <div class="BackNAhead row align-items-center backAheadContainer">
                        <div class="col-md-2 col-12 leftBtn" style="float: left;">
                            <br />
                            <?php $leftArrowUrl = BASEURL . "assets/images/leftArrowBtn.png"; ?>
                            <?php $action = BASEURL . "Main"; ?>
                            <form action="<?php echo $action; ?>" style="margin: 0!important;" method="POST">
                                <input type="hidden" name="leftArrowBtn" value="1">
                                <button type="submit" class="btn btn-link">
                                    <img src="<?php echo $leftArrowUrl; ?>" class="leftArrowBtn" alt="Left Arrow" name="leftArrowMonth">
                                </button>
                            </form>
                        </div>

                        <div class="col-md-5 col-12 BackNAheadMiddle">
                            <?php echo $this->session->userdata('startDateMonth'); ?> to <?php echo $this->session->userdata('endDateMonth'); ?>
                        </div>

                        <div class="col-md-2 col-12 rightBtn">
                            <?php $rightArrowUrl = BASEURL . "assets/images/rightArrowBtn.png"; ?>
                            <?php $action = BASEURL . "Main"; ?>
                            <form action="<?php echo $action; ?>" method="POST">
                                <input type="hidden" name="rightArrowBtn" value="1">
                                <button type="submit" class="btn btn-link">
                                    <img src="<?php echo $rightArrowUrl; ?>" class="rightArrowBtn" alt="Right Arrow" name="rightArrowMonth">
                                </button>
                            </form>
                        </div>

                        <div class="col-md-3 col-12">
                            <button class="btn btn-primary filterBtn" type="button" data-toggle="collapse" data-target="#columnFormWeekly">
                                Filter
                            </button>
                        </div>
                    </div>

                    <style>
                        .form-container-weekly {
                            width: 150px;
                            padding: 20px;
                            border: 1px solid #ddd;
                            border-radius: 10px;
                            margin: 20px 50px 50px 0 auto;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                    </style>

                    <div class="collapse filterCollapse" id="columnFormWeekly">
                        <div class="form-container-weekly" style="width: 160px;">
                            <form>
                                <!-- Checkbox inputs for column selection -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxFpgWeekly" data-column="Fpg">
                                    <label class="form-check-label" for="checkboxFpgWeekly">Fpg</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxPpgWeekly" data-column="Ppg">
                                    <label class="form-check-label" for="checkboxPpgWeekly">Ppg</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxStepsWeekly" data-column="Steps">
                                    <label class="form-check-label" for="checkboxStepsWeekly">Steps</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxHba1cWeekly" data-column="Hba1c">
                                    <label class="form-check-label" for="checkboxHba1cWeekly">Hba1c</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="columnSelectorWeekly" id="checkboxRandomWeekly" data-column="Rando">
                                    <label class="form-check-label" for="checkboxRandomWeekly">Random</label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br /><br />
                    <?php
                    if ($this->session->flashdata('deleteDataSucc')) {
                        echo alertBox($this->session->flashdata('deleteDataSucc'));
                    }

                    if ($this->session->flashdata('editDataSucc')) {
                        echo successBox($this->session->flashdata('editDataSucc'));
                    }
                    ?>
                    <?php if ($this->session->userdata('selectedMonth') && $this->session->userdata('selectedMonthYear')) { ?>
                        <div class="table-responsive" id="myGlucoTableMonthly">
                            <table class="table table-bordered">
                                <thead>
                                    <!-- Table header row -->
                                    <tr>
                                        <th>Date</th>
                                        <th class="Fpg">FPG</th>
                                        <th class="Ppg">PPG</th>
                                        <th class="Steps">Steps</th>
                                        <th class="Hba1c">HBA1C</th>
                                        <th class="Random">Random</th>
                                        <th style="margin:0!important; width:80px;"><i class="bi bi-pencil fa-2x"></i></th>
                                        <th style="margin:0!important; width:80px;"><i class="bi bi-trash fa-2x"></i></th>
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
                                                <tr>
                                                    <td><?php echo date("Y-m-d", strtotime($datem)); ?><br></td>
                                                    <td class="Fpg"><?php echo $Fpgm . '<br>'; ?></td>
                                                    <td class="Ppg"><?php echo $Ppgm . '<br>'; ?></td>
                                                    <td class="Steps"><?php echo $Stepsm . '<br>'; ?></td>
                                                    <td class="Hba1c"><?php echo $Hba1cm . '<br>'; ?></td>
                                                    <td class="Random"><?php echo $Randomm . '<br>'; ?></td>

                                                    <td>
                                                        <a href="EditRecord?date=<?php echo $dateDBm; ?>&fpg=<?php echo $Fpgm; ?>&ppg=<?php echo $Ppgm; ?>&steps=<?php echo $Stepsm; ?>&random=<?php echo $Randomm; ?>&hba1c=<?php echo $Hba1cm; ?>" class="btn btn-primary">
                                                            <i class="bi bi-pencil fa-2x"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="DeleteRecord?deleteDate=<?php echo $dateDBm; ?>" class="btn btn-danger"> <i class="bi bi-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <script>
                        // JavaScript code for column filtering
                        document.querySelectorAll('input[name="myGlucoTableMonthly"]').forEach(function(checkbox) {
                            checkbox.addEventListener('change', function() {
                                var selectedColumns = Array.from(document.querySelectorAll('input[name="myGlucoTableMonthly"]:checked')).map(function(checkbox) {
                                    return checkbox.getAttribute('data-column');
                                });
                                showSelectedColumns(selectedColumns, '#myGlucoTableMonthly');
                            });
                        });

                        function showSelectedColumns(selectedColumns, tableId) {
                            // Get all cells in the table with the specified column classes
                            var cells = document.querySelectorAll(tableId + ' td, ' + tableId + ' th');

                            // Show all cells initially
                            cells.forEach(function(cell) {
                                cell.style.display = '';
                            });

                            // Hide cells for columns that are not selected
                            cells.forEach(function(cell) {
                                var columnClass = cell.classList[0];
                                if (columnClass && !selectedColumns.includes(columnClass)) {
                                    cell.style.display = 'none';
                                }
                            });
                        }
                    </script>
                </div>

                <div class="tab-pane fade" id="yearly">
                    <p>Content for Yearly Record goes here.</p>
                </div>

                <div class="tab-pane fade" id="report">
                    <p>Content for Generate Report goes here.</p>
                </div>
            </div>
        </div>
    </div>