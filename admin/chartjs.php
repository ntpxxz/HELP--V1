<div class="card-body">
    <h5 class="card-title">Reports <span>/Today</span></h5>
    <?php
    include_once('..\config\function.php');
    $fetchdata = new DB_CON();
    $sql = $fetchdata->fetchdata_jobs();
    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    $Success = 0;
    $Failed = 0;
    $Progress = 0;

    foreach ($data as $row) {
        if ($row['job_status'] == 'Repair Completed') {
            $Success++;
        } elseif ($row['job_status'] == 'Repair Failed') {
            $Failed++;
        } elseif ($row['job_status'] == 'Progress') {
            $Progress++;
        }
    }
    ?>
    <!-- Doughnut Chart -->
    <canvas id="myChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 516px;" width="516" height="400"></canvas>
    <script>
        var Success = <?php echo $Success; ?>;
        var Failed = <?php echo $Failed; ?>;
        var Progress = <?php echo $Progress; ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Success', 'Failed', 'Progress'],
                datasets: [{
                    label: 'Job Status',
                    data: [Success, Failed, Progress],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 205, 86, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    <!-- End Doughnut Chart -->
</div>
</div>
</div>
</div>