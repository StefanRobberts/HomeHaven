<?php
session_start();
require_once '../config/config.php';
require_once '../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HomeHaven</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>

<body>

  <div class="main-layout">

    <!-- Sidebar -->
    <aside class="sidebar">
      <form method="GET" action="" class="filter-panel">
        <h3>Filter by:</h3>

        <label for="category">Category:</label>
        <select name="category" id="category">
          <option value="">All</option>
          <option value="living">Living Room</option>
          <option value="bedroom">Bedroom</option>
          <option value="kitchen">Kitchen</option>
          <option value="office">Office</option>
          <option value="outdoor">Outdoor</option>
        </select>

        <label for="max_price">Max Price (R):</label>
        <input type="number" name="max_price" id="max_price" min="0" />

        <label for="min_price">Min Price (R):</label>
        <input type="number" name="min_price" id="min_price" min="0" />

        <label for="material">Material:</label>
        <input type="text" name="material" id="material" placeholder="e.g. wood, metal" />

        <label for="condition">Condition:</label>
        <select name="condition" id="condition">
          <option value="">Any</option>
          <option value="new">Brand New</option>
          <option value="like_new">Like New</option>
          <option value="gently_used">Gently Used</option>
          <option value="refurbished">Refurbished</option>
          <option value="repurposed">Repurposed</option>
          <option value="used">Used</option>
          <option value="heavily_used">Heavily Used</option>
          <option value="needs_restoration">Needs Restoration</option>
          <option value="poor_condition">Poor Condition</option>
        </select>

        <button type="submit" class="apply-filters">Apply Filters</button>
      </form>
    </aside>

    <!-- Content Area -->
    <section class="content-area">
      <!-- Search Bar -->
      <div class="search-bar">
        <form method="GET" action="">
          <input type="text" name="search" placeholder="Search furniture..." autocomplete="off" />
          <button type="submit" class="search-icon">Search</button>
        </form>
      </div>

      <!-- Listings Grid -->
      <div class="listings-grid">
        <?php
        $sampleListings = [
          ['id' => 1, 'title' => 'Modern Sofa', 'price' => '1200', 'image' => 'sample1.jpg'],
          ['id' => 2, 'title' => 'Vintage Chair', 'price' => '800', 'image' => 'sample2.jpg'],
          ['id' => 3, 'title' => 'Wooden Desk', 'price' => '1500', 'image' => 'sample3.jpg'],
          ['id' => 4, 'title' => 'Glass Coffee Table', 'price' => '950', 'image' => 'sample4.jpg'],
        ];

        foreach ($sampleListings as $item):
        ?>
          <div class="listing-card">
            <img src="../assets/images/<?= $item['image'] ?>" alt="<?= $item['title'] ?>" />
            <div class="listing-info">
              <h4><?= $item['title'] ?></h4>
              <p>Price: R<?= $item['price'] ?></p>
              <a href="Listing-details.php?id=<?= $item['id'] ?>" class="view-btn">View Listing</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>

  <!-- Navbar scroll logic -->
  <script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
      const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      if (currentScroll > lastScrollTop) {
        navbar.classList.add("navbar-hide");
      } else {
        navbar.classList.remove("navbar-hide");
      }
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
  </script>

</body>
</html>
