<?php
include("header.php");
include("connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    $media = 'uploads/';
    if (!is_dir($media)) mkdir($media);
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['old_img'];

        if ($_FILES['image'] && $_FILES['image']['name'] != "") {
            $image = time() . "_" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $media . $image);
        }
        $edit = $conn->prepare("UPDATE menu SET title=?, price=?, description=?, category=?, image=? WHERE id=?");
        $edit->bind_param("sisssi", $title, $price, $description, $category, $image, $id);
        $edit->execute();
        header("location: menu_list.php");
        exit();
    }
}
?>

<div class="min-vh-100 bg-dark pb-5 text-white">
    <div class="w-100">
        <img src="images/logo.png" alt="" class="w-100" style="background: cover; height: 100px;">
    </div>
    <div class="my-3">
        <h3 class="fw-bold text-center text-warning mb-3">Edit Menu</h3>
    </div>
    <div class="container border border-warning-subtle" style="width: 500px;">
        <form class="m-3" method="post" enctype="multipart/form-data">
            <input type="hidden" name="old_img" value="<?php $item['image'] ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="title" value="<?php echo $item['title'] ?>" require>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <input type="text" class="form-control" name="category" value="<?php echo $item['category'] ?>" require>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $item['description'] ?>" require>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $item['price'] ?>" require>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Product Image</label>
                <input type="file" name="image" class="form-control rounded-3" value="<?php echo $item['image'] ?>" require>
                <img src="uploads/<?php echo $item['image'] ?>" alt="" width="200px">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-warning w-100" name="submit">Save</button>
            </div>
        </form>
    </div>
</div>