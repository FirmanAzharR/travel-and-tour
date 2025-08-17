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

<script>
    
</script>