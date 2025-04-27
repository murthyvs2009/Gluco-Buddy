<canvas id="glucoseBarChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch("<?= base_url('report/get_glucose_data') ?>")
    .then(response => response.json())
    .then(data => {
        let labels = data.map(entry => entry.date);
        let fpgData = data.map(entry => entry.FPG);
        let ppgData = data.map(entry => entry.PPG);
        let hba1cData = data.map(entry => entry.HbA1c);

        new Chart(document.getElementById("glucoseBarChart"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    { label: "FPG", data: fpgData, backgroundColor: "blue" },
                    { label: "PPG", data: ppgData, backgroundColor: "green" },
                    { label: "HbA1c", data: hba1cData, backgroundColor: "red" }
                ]
            }
        });
    });
</script>
