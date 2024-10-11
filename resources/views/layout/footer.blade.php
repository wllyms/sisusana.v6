  </div>
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-between ">
        <div class="copyright">
          Created By Tim IT | Distributed by
          <a href="https://rsbhayangkarabanjarmasin.co.id/wp/">RS Bhayangkara</a>
        </div>
      </div>
    </footer>
  </div>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{asset('assets')}}/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="../assets/js/plugin/jsvectormap/world.js"></script>

<!-- Google Maps Plugin -->
<script src="../assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="../assets/js/kaiadmin.min.js"></script>

<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo2.js"></script>

{{-- sweetalert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




{{-- JS Sweet Start --}}

@if (session('success'))
<script type="text/javascript">
    $(function() {
        Swal.fire({
            title: "Disimpan!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    });
</script>
@endif

{{-- sweetalert tambah dan edit --}}
<script type="text/javascript">
  $(function() {
      // Konfirmasi sebelum menyimpan
      $(document).on('click', '#tambah', function(e) {
          e.preventDefault();
          var form = $('#form-tambah-grup');
  
          Swal.fire({
              title: "Konfirmasi",
              text: "Apakah kamu yakin ingin menyimpan data ini?",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Ya, simpan",
              cancelButtonText: "Tidak"
          }).then((result) => {
              if (result.isConfirmed) {
                  // Submit form secara manual
                  form.submit();
              }
          });
      });
  });
</script>


{{-- sweetalert hapus --}}
<script type="text/javascript">
  $(function(){
    // Tombol Hapus
    $(document).on('click', '#hapus', function(e){
      e.preventDefault();
      var form = $(this).closest("form");

      Swal.fire({
        title: "Peringatan",
        text: "Apakah kamu yakin akan menghapus data ini? Mungkin akan berpengaruh pada grafik dan nilai!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4CAF50",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Tidak"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
          Swal.fire({
            title: "Terhapus!",
            text: "Data berhasil dihapus.",
            icon: "success"
          });
          
        }
      });
    });

  });
</script>



{{-- datatable start --}}
<script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});

    $("#multi-filter-select").DataTable({
      pageLength: 5,
      initComplete: function () {
        this.api()
          .columns()
          .every(function () {
            var column = this;
            var select = $(
              '<select class="form-select"><option value=""></option></select>'
            )
              .appendTo($(column.footer()).empty())
              .on("change", function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                column
                  .search(val ? "^" + val + "$" : "", true, false)
                  .draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append(
                  '<option value="' + d + '">' + d + "</option>"
                );
              });
          });
      },
    });

    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
      '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function () {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action,
        ]);
      $("#addRowModal").modal("hide");
    });
  });
</script>
{{-- datatable end --}}

</body>
</html>