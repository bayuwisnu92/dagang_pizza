<?php
$data = file_get_contents("data/pizza.json");
$menu = json_decode($data, true);
$menu = $menu["menu"];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu</title>
  <!-- Memuat CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <a class="nav-link" href="#"><img src="img/logo.png" alt="" width="170px" height="30px"></a>
          <div class="navbar-nav">
            <!-- Navigasi untuk semua menu -->
            <a class="nav-link active" aria-current="page" href="#" onclick="filterMenu('all', this)">All Menu</a>
            <!-- Navigasi untuk kategori nasi -->
            <a class="nav-link" href="#" onclick="filterMenu('nasi', this)">Nasi</a>
            <!-- Navigasi untuk kategori minuman -->
            <a class="nav-link" href="#" onclick="filterMenu('minuman', this)">Minuman</a>
            <a class="nav-link" href="#" onclick="filterMenu('pasta', this)">Pasta</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <!-- Kontainer untuk daftar menu -->
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 id="menu-title">All Menu</h1>
      </div>
    </div>
    <div class="row" id="menu-container">
      <!-- Looping melalui setiap item menu dan menampilkannya -->
      <?php foreach ($menu as $row) : ?>
      <div class="col-md-4 menu-item" data-category="<?= $row['kategori']; ?>">
        <div class="card mb-3">
          <img src="img/menu/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama']; ?></h5>
            <p class="card-text"><?= $row['deskripsi']; ?></p>
            <h5 class="card-title"><?= $row['harga']; ?></h5>
            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Memuat JavaScript Bootstrap dan dependensinya -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  
  <!-- Script untuk menyaring menu berdasarkan kategori -->
  <script>
    function filterMenu(category, element) {
      // Mendapatkan semua elemen dengan class 'menu-item'
      const items = document.querySelectorAll('.menu-item');
      items.forEach(item => {
        // Jika kategori 'all' dipilih, tampilkan semua item
        if (category === 'all') {
          item.style.display = 'block';
        } else {
          // Tampilkan item yang sesuai dengan kategori yang dipilih
          if (item.getAttribute('data-category') === category) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        }
      });
      
      // Mengubah teks judul h1 sesuai dengan kategori yang dipilih
      const menuTitle = document.getElementById('menu-title');
      if (category === 'all') {
        menuTitle.textContent = 'All Menu';
      } else {
        menuTitle.textContent = element.textContent;
      }
    }

    // Menampilkan semua item ketika halaman pertama kali dimuat
    filterMenu('all', document.querySelector('.nav-link.active'));
  </script>
</body>
</html>
