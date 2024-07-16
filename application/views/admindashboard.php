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
                <div id="chart"></div>
            </div>

            <div class="custom-block custom-block-exchange">
                <h5 class="mb-4">Chiffre D'affaire Par Type De Voiture</h5>
                <form action="<?php echo site_url('admin/detail_ch_voiture'); ?>" method="post">
                    <select id="car-type-select" name="cartype" class="form-control mb-4" required>
                        <option value="" selected disabled>Selectionner le type de voiture</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type->value; ?>"><?php echo $type->value; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Afficher</button>
                </form>
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
    var rendezvousData = <?php echo json_encode($rendezvous_data); ?>;
    var payesData = [];
    var nonPayesData = [];
    var categories = [];

    rendezvousData.forEach(function(item) {
        categories.push(item.date);
        payesData.push(item.payes);
        nonPayesData.push(item.non_payes);
    });

    var options = {
        series: [{
            name: 'Payés',
            data: payesData
        }, {
            name: 'Non Payés',
            data: nonPayesData
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
            categories: categories,
            title: {
                text: 'Dates'
            }
        },
        yaxis: {
            title: {
                text: 'Nombre de rendez-vous'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " rendez-vous"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>