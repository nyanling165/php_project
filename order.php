<?php include('connection.php') ?>

<?php
$stmt = $conn->prepare("SELECT * FROM cart");
$stmt->execute();
$result = $stmt->get_result();
?>
<?php
if (isset($_POST['submit'])) {
    $del = $conn->prepare("DELETE FROM cart");
    $del->execute();
    header('location: menu.php');
}
?>
<?php include('header.php') ?>

<div class="container-fluid mt-3">
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = $result->fetch_assoc()): ?>
                <tr>
                    <td> <img src="uploads/<?php echo $item['image'] ?>" style="width: 100px; height: 100px;"></td>
                    <td><?php echo $item['title'] ?></td>
                    <td><?php echo $item['price'] ?> MMk</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <form method="post">
        <div class="text-end">
            <button name="submit" class="w-30 mb-3 btn btn-warning">Clear ordered history</button>
        </div>
    </form>
</div>