<?php include("header.php") ?>
<?php include("connection.php") ?>
<?php
$media = 'uploads/';
if (!is_dir($media)) mkdir($media);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $media . $image);
    }
    $add = $conn->prepare("INSERT INTO menu(title, price, description, category, image) VALUES(?, ?, ?, ?, ?)");
    $add->bind_param("sisss", $title, $price, $description, $category, $image);
    $add->execute();
    header("Location: menu_list.php");
    exit;
}
?>


<?php
$menu = $conn->prepare('SELECT * FROM menu');
$menu->execute();
$result = $menu->get_result();
?>
<div class="min-vh-100 bg-dark pb-5">
    <div>
        <img src="images/logo.png" alt="" class="w-100" style="background: cover; height: 100px;">
    </div>
    <div class="m-3">
        <button class="btn btn-warning text-start" data-bs-toggle="modal" data-bs-target="#create_menu"><i class="fa-solid fa-plus"></i>Add a new menu</button>
        <a href="menu.php" class="btn btn-outline-warning text-end">View Public Menu</a>
    </div>
    <table class="table table-dark table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = $result->fetch_assoc()): ?>
                <tr>
                    <td><img src="uploads/<?php echo $item['image'] ?>" style="width: 100px; height: 100px;"></td>
                    <th scope="row"><?php echo $item['title'] ?></th>
                    <td><span class="badge bg-light text-secondary rounded-pill px-3"><?php echo $item['category'] ?></span></td>
                    <td><?php echo $item['price'] ?>MMK</td>
                    <td><a href="menu_update.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-warning"><i class="fa-solid fa-pen"></i>Edit</a>
                        <a href="menu_delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="create_menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a new menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="title" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <input type="text" class="form-control" name="category" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <input type="text" class="form-control" name="description" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Price</label>
                        <input type="number" class="form-control" name="price" require>
                    </div>
                    <div>
                        <label class="form-label small fw-bold">Image</label>
                        <input type="file" name="image" class="form-control rounded-3" require>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>