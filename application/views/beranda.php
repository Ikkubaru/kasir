<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="row">
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h4>Penjualan Hari Ini</h4>
                     <h2 class="dashboard-total-products">Rp. <?= number_format($today); ?></h2>
                     <div class="side-box">
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h4>Penjualan Bulan Ini</h4>
                     <h2 class="dashboard-total-products">Rp. <?= number_format($month); ?></h2>
                     <div class="side-box">
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h4>Transaksi Hari Ini</h4>
                     <h2 class="dashboard-total-products"><?= $transaksi ?> Penjualan</h2>
                     <div class="side-box">
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h4>Produk</h4>
                     <h2 class="dashboard-total-products"><?= $produk ?></h2>
                     <div class="side-box">
                     </div>
                  </div>
               </div>
</div>
<div class="row">
   <div class="col-lg-6 col-md-6">
      <div class="card dashboard-product">
         <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<script>
var xValues = ["<?= $month_5;?>", "<?= $month_4;?>", "<?= $month_3;?>", "<?= $month_2;?>","<?= $month_1;?>","<?= $month_now;?>"];
var yValues = [<?= $month5;?>,<?= $month4;?>,<?= $month3;?>,<?= $month2;?>,<?= $month1;?>,<?= $month;?>];
var barColors = ["red", "green","blue","orange","brown","aqua"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Data Penjualan 5 Bulan Terakhir"
    }
  }
});
</script>
            <div class="side-box">
         </div>
      </div>
   </div>
</div>