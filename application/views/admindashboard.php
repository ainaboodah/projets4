<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">DashBoard</h1>

        <small class="text-muted">Bienvenue Dans Le DasbBoard</small>
    </div>

    <div class="row my-4">
        <div class="col-lg-7 col-12">
            <div class="custom-block custom-block-balance">
                <small>Montant Total De Chiffre D'affaire</small>
                <h2 class="mt-2 mb-3"><?php echo $revenue; ?></h2>
            </div>

            <div class="custom-block bg-white">
                <h5 class="mb-4">Historique De Transaction Non-Payés Et Payés</h5>
                <!--ETO NY ATAO LE nonPAYE REHETRA ANATINA CHART-->
                <div id="chart"></div>
            </div>

            <div class="custom-block custom-block-exchange">
                <h5 class="mb-4">Chiffre D'affaire Par Type De Voiture</h5>

                <select id="car-type-select" class="form-control mb-4">
                    <!--MAKA ANY AM BASE NY TYPE DE VOITURE REHETRA FA EXEMPLE FTSN REO-->
                    <option value="" selected disabled>Selectionner le type de voiture</option>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="truck">Truck</option>

                </select>
                <button type="submit" class="btn btn-primary">Afficher</button>
            </div>
            <div class="custom-block custom-block-exchange">
                <h5 class="mb-4">Nombre De Voiture Traité Par Jour</h5>
                <form action="<?php echo site_url('admin/display_car_counts'); ?>" method="post">
                    <div class="form-group">
                        <label for="start_date">Date de Début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Date de Fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Afficher</button>
                </form>
            </div>
        </div>
    </div>
</main>
</script>

<script type="text/javascript">
    var options = {
      series: [{
      name: 'Payés',
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
      name: 'Non Payés',
      data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }],
      chart: {
      type: 'bar',
      height: 350
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '$ (thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>