<?php include('header.php') ?>
<?php include('connection.php') ?>
<?php
$featured_category = "feature";
$stmt = $conn->prepare("SELECT * FROM menu WHERE category=?");
$stmt->bind_param("s", $featured_category);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myanandar Restaurant</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body>

    <section class="position-relative text-white">
        <div>
            <img src="images/restaurant.png" alt="" class="w-100" style="height: 80vh; background-size:cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        </div>
        <div class="container position-absolute top-50 start-50 translate-middle text-center w-100">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h1 class="display-4 fw-bold">Welcome To Myanandar Restaurant</h1>
                <p>Experience the finest culinary delights in town</p>
                <a href="menu.php" class="btn btn-warning btn-lg mt-3">
                    <i class="fa-solid fa-book-open"></i>View Menu
                </a>
            </div>
        </div>
    </section>
    <section class="bg-secondary text-white py-3">
        <div class="container-fluid" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-center mb-3">Our Featured Menu</h1>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php while ($item = $result->fetch_assoc()): ?>
                    <div class="swiper-slide">
                        <img src="uploads/<?php echo $item['image']  ?>" />
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            autoplay: {
                delay: 3000
            },
            speed: 1500,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
</body>

</html>