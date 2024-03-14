<div class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        Copyright © <?php echo date('Y') ?> PASAR MANADO
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="<?= base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="<?= base_url() ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="<?= base_url() ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="<?= base_url() ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="<?= base_url() ?>assets/libs/js/dashboard-ecommerce.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {

        "decimal": "",
        "emptyTable": "Tidak Ada Data Yang Ditemukan",
        "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 to 0 of 0 Data",
        "infoFiltered": "(Di Filter Dari _MAX_ total data)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Menampilkan _MENU_ Data ",
        "loadingRecords": "Mohon Tunggu...",
        "processing": "Memproses...",
        "search": "Cari:",
        "zeroRecords": "Data Tidak Ditemukan",
        "paginate": {
          "first": "Awal",
          "last": "Akhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        },
        "aria": {
          "sortAscending": ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
        }

      }
    });
  });
</script>

<script type="text/javascript">
  function PrintDiv() {
    var divToPrint = document.getElementById('divToPrint');
    var popupWin = window.open('', '_blank', 'width=auto,height=auto');

    popupWin.document.open();
    popupWin.document.write(
      '<html><link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css"> <body onload="window.print()">' + divToPrint.innerHTML + '</html>'

    );
    popupWin.document.close();
  }
</script>
<script>
  var array_1_values = <?php echo json_encode($lunss); ?> //these are the values of the first line
  var array_2_values = <?php echo json_encode($tunggak); ?> //these are the values of the second line

  var array_labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Des']; //these are the labels that will appear at the bottom of the chart
  // alert(array_1_values);
  var data_chart1 = {
    labels: [],
    series: [
      [],
      []
    ]
  };
  for (var i = 0; i < array_1_values.length; i += 1) {
    data_chart1.series[0].push(array_1_values[i])
    data_chart1.series[1].push(array_2_values[i])
    data_chart1.labels.push(array_labels[i])
  }
  var options = {
    seriesBarDistance: 10,
    axisX: {
      showGrid: true,
    },
  };

  var responsiveOptions = [
    ['screen and (max-width: 640px)', {
      seriesBarDistance: 10,
      axisX: {
        labelInterpolationFnc: function(value) {
          return value[0];
        }
      }
    }]
  ];

  new Chartist.Bar('.ct-chart', data_chart1, options, responsiveOptions);
</script>
<script>
  $(document).ready(function() {
    $("#pedagang").change(function() {
      let pedagang = $("#pedagang").val();
      $.ajax({
        method: "GET",
        url: "<?= base_url('retribusilunas/cari') ?>",
        data: {
          id_pedagang: pedagang
        },
        success: function(data) {

          let j = JSON.parse(data);

          $('#alamat').val(j['pedagang'][0].alamat);
          $('#no_lapak').val(j['pedagang'][0].no_lapak);
          $('#sektor').val(j['pedagang'][0].sektor);
        },
        error: function(data) {
          alert('Error');
        }
      })
    })
  });
</script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      width: '100%',
      "language": {
        "noResults": function() {
          return "Nama Pedagang Tidak Ada!";
        }
      },
    });
  });
</script>
</body>

</html>