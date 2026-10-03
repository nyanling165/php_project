<?php include("connection.php"); ?>
<?php
if (isset($_POST['order_menu'])) {
    $id = $_POST['menu_id'];

    $stmt = $conn->prepare("SELECT * FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $cart_title = $item['title'];
    $cart_price = $item['price'];
    $cart_img = $item['image'];

    $add = $conn->prepare("INSERT INTO cart(title,price,image) VALUES(?,?,?)");
    $add->bind_param("sis", $cart_title, $cart_price, $cart_img);
    $add->execute();
}
?>
<?php include("header.php") ?>

<div class="w-100 min-vh-100 bg-secondary pb-5">
    <div>
        <img src="images/logo.png" alt="" class="w-100" style="background: cover; height: 100px;">
    </div>
    <div class="container">
        <div class="text-center py-3">
            <div class="btn-group rounded-4" role="group" aria-label="Basic example">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <a href="#hot" class="btn btn-outline-warning mx-3 rounded-5">Hot</a>

                    <a href="#fried" class="btn btn-outline-warning mx-3 rounded-5">Fried foods</a>

                    <a href="#salad" class="btn btn-outline-warning mx-3 rounded-5">Salad</a>

                    <a href="#juice" class="btn btn-outline-warning mx-3 rounded-5">Juice</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $category_hot = "hot";
    $hot = $conn->prepare("SELECT * FROM menu WHERE category=?");
    $hot->bind_param("s", $category_hot);
    $hot->execute();
    $hot_result = $hot->get_result();
    ?>
    <div class="container-fluid">
        <section id="hot">
            <h3 class="text-warning mb-3"><i class="fa-solid fa-fire"></i>Hot</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while ($hot_item = $hot_result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card bg-dark text-white h-100">
                            <a href="uploads/<?php echo $hot_item['image']; ?>"><img src="uploads/<?php echo $hot_item['image']; ?>" class="card-img-top" style="height: 200px;"></a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $hot_item['title'] ?></h5>
                                <p class="card-text mb-auto"><?php echo $hot_item['description'] ?></p>
                                <h5 class="text-warning"><?php echo $hot_item['price'] ?>MMK</h5>
                                <form method="post">
                                    <input type="hidden" name="menu_id" value="<?php echo $hot_item['id'] ?>">
                                    <button name="order_menu" class="btn btn-warning w-100">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
        <?php
        $category = 'Fried';
        $fried = $conn->prepare("SELECT * FROM menu WHERE category=?");
        $fried->bind_param("s", $category);
        $fried->execute();
        $result = $fried->get_result();
        ?>
        <section id="fried">
            <h3 class="text-warning mb-3"><i class="fa-solid fa-fire-flame-curved"></i>Fried foods</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while ($item = $result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card bg-dark text-white h-100">
                            <a href="uploads/<?php echo $item['image'] ?>"><img src="uploads/<?php echo $item['image'] ?>" class="card-img-top" style="height: 200px; background: cover;" alt="..."></a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3"><?php echo $item['title'] ?></h5>
                                <p class="card-text mb-auto"><?php echo $item['description'] ?></p>
                                <h5 class="text-warning"><?php echo $item['price'] ?> MMK</h5>
                                <form method="post">
                                    <input type="hidden" name="menu_id" value="<?php echo $item['id'] ?>">
                                    <button name="order_menu" class="btn btn-warning w-100">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </section>
        <?php
        $category_salad = 'Salad';
        $salad = $conn->prepare("SELECT * FROM menu WHERE category=?");
        $salad->bind_param("s", $category_salad);
        $salad->execute();
        $salad_result = $salad->get_result();
        ?>
        <section id="salad">
            <h3 class="text-warning mb-3"><i class="fa-solid fa-cookie-bite"></i>Salad</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while ($item_salad = $salad_result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card bg-dark text-white h-100">
                            <a href="uploads/<?php echo $item_salad['image'] ?>"><img src="uploads/<?php echo $item_salad['image'] ?>" class="card-img-top" style="height: 200px;background: cover;" alt="..."></a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $item_salad['title'] ?></h5>
                                <p class="card-text mb-auto"><?php echo $item_salad['description'] ?></p>
                                <h5 class="text-warning"><?php echo $item_salad['price'] ?>MMk</h5>
                                <form method="post">
                                    <input type="hidden" name="menu_id" value="<?php echo $item_salad['id'] ?>">
                                    <button name="order_menu" class="btn btn-warning w-100">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

        <?php
        $category_juice = 'Juice';
        $juice = $conn->prepare("SELECT * FROM menu WHERE category=?");
        $juice->bind_param("s", $category_juice);
        $juice->execute();
        $juice_result = $juice->get_result();
        ?>
        <section id="juice">
            <h3 class="text-warning mb-3"><i class="fa-brands fa-gulp"></i>Juice</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php while ($item_juice = $juice_result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card bg-dark text-white h-100">
                            <a href="uploads/<?php echo $item_juice['image'] ?>">
                                <img src="uploads/<?php echo $item_juice['image'] ?>" class="card-img-top" style="height: 200px; background: cover;" alt="...">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $item_juice['title'] ?></h5>
                                <p class="card-text mb-auto"><?php echo $item_juice['description'] ?></p>
                                <h5 class="text-warning"><?php echo $item_juice['price'] ?>MMK</h5>
                                <form method="post">
                                    <input type="hidden" name="menu_id" value="<?php echo $item_juice['id'] ?>">
                                    <button name="order_menu" class="btn btn-warning w-100">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
</div>

<?php include("footer.php") ?>