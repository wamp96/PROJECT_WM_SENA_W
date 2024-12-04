<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CSS-->
  <?php require_once('../app/Views/assets/css/css.php') ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--Title-->
  <title><?= $title ?></title>
</head>

<body>
  <!--Preload -->
  <?php require_once('../app/Views/preload/preload.php') ?>
  <!--End Preload -->
  <?php require_once('../app/Views/nav/navbar.php') ?>
  <!--Container-->

  <div class="wrapper">
    <?php require_once('../app/Views/navSlider/navSlider.php') ?>
    <div class="main body2">

      <h3 class="title text-center my-4"><?= $title ?></h3>

      <div class="container mt-5">
        <div class="row">
          <!-- Primer gráfico: Elementos Asignados -->
          <div class="col-12 col-md-6">
            <h3 class="text-center">Assigned Elements</h3>
            <div class="card shadow-sm p-3 mb-5 rounded" style="background-color: #fff5; backdrop-filter: blur(7px);">
              <div class="card-body">
                <div class="chart-container" style="position: relative; height:50vh; width:100%;">
                  <canvas id="userAssignmentsChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Segundo gráfico: Elementos por Marca -->
          <div class="col-12 col-md-6">
            <h3 class="text-center">Elements by Brand</h3>
            <div class="card shadow-sm p-3 mb-5 rounded" style="background-color: #fff5; backdrop-filter: blur(7px);">
              <div class="card-body">
                <div class="chart-container" style="position: relative; height:50vh; width:100%;">
                  <canvas id="elementsByBrandChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4"> <!-- Gaps entre las columnas -->
        <?php for ($j = 0; $j < count($userModules); $j++): ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
            <div class="card text-white mb-3" style="background-color: #fff5; backdrop-filter: blur(7px); text-align: center; width: 100%; max-width: 18em; padding: 10px;">
              <i class="bi bi-dashboard <?= $userModules[$j]['Modules_icon'] ?>" style="font-size: 5em; text-align: center;"></i>
              <div class="card-body">
                <h5 class="card-title"><?= $userModules[$j]['Modules_name'] ?></h5>
                <p class="card-text"><?= $userModules[$j]['Modules_description'] ?></p>
                <div class="btn-group mx-auto w-100" role="group" aria-label="Basic mixed styles example">
                  <a href="<?= $userModules[$j]['Modules_route'] ?>/show" class="btn">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Datos para "Elementos Asignados"
    const userAssignments = <?= json_encode($user_assignments) ?>;
    const labelsAssigned = userAssignments.map(item => item.User_nombre);
    const dataAssigned = userAssignments.map(item => item.Total_Productos_Asignados);

    // Configuración para el gráfico de "Elementos Asignados"
    const ctxAssigned = document.getElementById('userAssignmentsChart').getContext('2d');
    new Chart(ctxAssigned, {
      type: 'bar',
      data: {
        labels: labelsAssigned,
        datasets: [{
          label: 'Productos Asignados',
          data: dataAssigned,
          backgroundColor: 'rgba(75, 192, 192, 0.5)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              color: 'rgba(0, 0, 0, 0.8)',
              font: {
                size: 14
              }
            }
          }
        },
        scales: {
          x: {
            ticks: {
              color: 'rgba(0, 0, 0, 0.8)'
            },
            grid: {
              color: 'rgba(200, 200, 200, 0.5)',
              borderColor: 'rgba(150, 150, 150, 0.5)'
            }
          },
          y: {
            ticks: {
              beginAtZero: true,
              color: 'rgba(0, 0, 0, 0.8)'
            },
            grid: {
              color: 'rgba(200, 200, 200, 0.5)',
              borderColor: 'rgba(150, 150, 150, 0.5)'
            }
          }
        }
      }
    });

    // Datos para "Elementos por Marca"
    const elementsByBrand = <?= json_encode($elements_by_brand) ?>;
    const labelsBrand = elementsByBrand.map(item => item.Brand_nombre);
    const dataBrand = elementsByBrand.map(item => item.Total_Elements);

    console.log(elementsByBrand)

    // Configuración para el gráfico de "Elementos por Marca"
    const ctxBrand = document.getElementById('elementsByBrandChart').getContext('2d');
    new Chart(ctxBrand, {
      type: 'pie', // Gráfico de pastel
      data: {
        labels: labelsBrand,
        datasets: [{
          label: 'Elementos por Marca',
          data: dataBrand,
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'right',
            labels: {
              color: 'rgba(0, 0, 0, 0.8)',
              font: {
                size: 14
              }
            }
          }
        }
      }
    });
  </script>

  <!--JS-->
  <?php require_once('../app/Views/assets/js/js.php') ?>
  <?php require_once('../app/Views/assets/js/dataTable.php') ?>
  <!--JS Controller-->
  <script src="../controllers/dashboard/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>