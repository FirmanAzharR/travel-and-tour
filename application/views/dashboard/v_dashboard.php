<!-- Begin Page Content -->
<div class="container-fluid">
   <h1 class="h3 mb-2 text-gray-800">Statistik Data Booking</h1>
   <p class="mb-4">
      Statistik data penjualan bulan ini
   </p>
   <div class="row">
      <div class="col-xl-8 col-lg-7">
         <!-- Area Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Trend Booking Bulan Agustus</h6>
            </div>
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
               </div>
            </div>
         </div>
      </div>
      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Total Penjualan Bulan Agustus</h6>
            </div>
            <div class="card-body">
               <div class="chart-pie">
                  <canvas id="myPieChart"></canvas>
               </div>
            </div>
         </div>
      </div>
      <hr>
   </div>
   <hr/>
   <h3>Menu Data Booking</h3>
   <br>
   <div class="row">
      <!-- Travel Wisata Jogja Card -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-bottom-primary shadow h-100 py-2 clickable-card-dashboard" data-url="booking-travel-wisata">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Data Booking
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Travel Wisata Jogja</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-mountain fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Travel Bandara Card -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-bottom-success shadow h-100 py-2 clickable-card-dashboard" data-url="booking-travel-bandara">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Data Booking
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Travel Bandara</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-plane-departure fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Rental Mobil Card -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-bottom-warning shadow h-100 py-2 clickable-card-dashboard" data-url="booking-rental-mobil">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Data Booking
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rental Mobil</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-car fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Carter Bus Card -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-bottom-danger shadow h-100 py-2 clickable-card-dashboard" data-url="booking-carter-bus">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Data Booking
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Carter Bus</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-bus fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <hr>

        <!-- Content Section -->
        <div id="content-area">
            <p>Silakan pilih salah satu menu di atas.</p>
        </div>

</div>
<!-- /.container-fluid -->

<style>
.clickable-card-dashboard {
   cursor: pointer;
   transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
.clickable-card-dashboard:hover {
   transform: translateY(-5px);
   box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>

<!-- Add Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Container -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trend Booking Bulan Agustus <?= date('Y') ?></h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 400px;">
                    <canvas id="bookingTrendChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize Chart
    var ctx = document.getElementById('bookingTrendChart').getContext('2d');
    
    // Generate array of days in August
    var currentYear = new Date().getFullYear();
    var daysInAugust = new Date(currentYear, 7, 0).getDate();
    var augustDays = [];
    for (var i = 1; i <= daysInAugust; i++) {
        augustDays.push(i + ' Ags');
    }

    var bookingChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: augustDays,
            datasets: [{
                label: 'Jumlah Booking',
                data: [],
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverRadius: 5,
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Tanggal'
                    },
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Jumlah Booking'
                    },
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1
                    },
                    grid: {
                        color: 'rgb(234, 236, 244)',
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineColor: 'rgb(234, 236, 244)',
                        zeroLineBorderDash: [2]
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgb(255,255,255)',
                    bodyColor: '#858796',
                    titleMarginBottom: 10,
                    titleColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(context) {
                            return 'Jumlah Booking: ' + context.parsed.y;
                        },
                        title: function(context) {
                            return 'Tanggal ' + (context[0].dataIndex + 1) + ' Agustus';
                        }
                    }
                }
            }
        }
    });

    // Load data via AJAX
    function loadBookingData() {
        $.ajax({
            url: '<?= site_url('dashboard/get_monthly_booking_data') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Ensure we have data for all days, filling with 0 if no bookings
                var dailyData = Array(daysInAugust).fill(0);
                response.forEach(function(count, index) {
                    if (index < daysInAugust) {
                        dailyData[index] = count;
                    }
                });
                bookingChart.data.datasets[0].data = dailyData;
                bookingChart.update();
            },
            error: function(xhr, status, error) {
                console.error('Error loading booking data:', error);
            }
        });
    }

    // Initial load
    loadBookingData();

    // Refresh data every 5 minutes
    setInterval(loadBookingData, 300000);
});
</script>