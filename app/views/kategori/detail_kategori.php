<?php
// Assuming this is the file for displaying a specific category's details
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kategori</title>
  <!-- Include necessary styles and scripts -->
</head>

<body>
  <div class="container">
    <h1>Detail Kategori</h1>
    <!-- Display category details -->
    <div class="kategori-details">
      <p>ID Kategori: <?= $kategori['id'] ?></p>
      <p>Nama Kategori: <?= $kategori['nama'] ?></p>
      <!-- Add more details as needed -->
    </div>

    <!-- Delete Button -->
    <button class="btn btn-danger btn-delete" data-id="<?= $kategori['id'] ?>">Hapus Kategori</button>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin menghapus kategori ini? Semua barang dalam kategori ini juga akan dihapus.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" id="btn-delete">Hapus</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Handle delete button
    $('.btn-delete').on('click', function() {
      const id = $(this).data('id');
      $('#deleteModal').modal('show');
      $('#btn-delete').attr('href', '<?= base_url() ?>kategori/delete/' + id);
    });
  </script>
</body>

</html>