<?php
// Assuming this is the start of the file
require_once 'header.php';
?>

<div class="container">
  <h1>Detail Kategori</h1>
  <!-- Detail content goes here -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Barang - <?= $kategori['nama_kategori'] ?></h6>
    </div>
    <div class="card-body">
      <div style="width: 100%; overflow-x: scroll; -webkit-overflow-scrolling: touch;">
        <table class="table table-bordered" style="min-width: 500px;" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- ...existing table rows... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center pb-0">
        <div class="circle-icon mb-4">
          <i class="fas fa-times text-white"></i>
        </div>
        <h5 class="modal-title mb-3" id="exampleModalLabel">Konfirmasi</h5>
        <p>Anda yakin ingin menghapus data barang <span id="item-name"></span>?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center mb-3">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" id="btn-delete" class="btn btn-danger">OK</a>
      </div>
    </div>
  </div>
</div>

<!-- CSS for the modal styling -->
<style>
  .circle-icon {
    background-color: #f25056;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
  }
  .circle-icon i {
    font-size: 30px;
  }
</style>

<script>
  // Handle delete button for items in category detail
  $(document).on('click', '.btn-hapus', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    const name = $(this).data('name') || '';
    
    $('#item-name').text(name);
    $('#deleteModal').modal('show');
    $('#btn-delete').attr('href', '<?= base_url() ?>barang/delete/' + id);
  });
</script>

<?php require_once 'footer.php'; ?>