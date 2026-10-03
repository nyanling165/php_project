<?php include("header.php") ?>
<?php include("connection.php") ?>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE name=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['msg'] = "Login successfullly";
        $_SESSION['username'] = $user['name'];
        header("Location: menu_list.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>
<div class="bg-dark text-white min-vh-100 pt-5">
    <div class="container" style="max-width: 500px;">
        <div class="border border-warning-subtle mt-3 px-3">
            <h1 class="text-center fw-bold my-5"><i class="fa-solid fa-lock"></i>Login</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                </div>
                <div class="mb-5">
                    <label for="" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="password" minlength="6">
                </div>
                <div>
                    <button class="btn btn-warning w-100 fw-bold" name="submit">Login</button>
                    <p class="text-end mt-3">Don't have an account?<a href="register.php" class="text-decoration-none fw-bold">create account</a></p>
                </div>
        </div>
    </div>
</div>
</form>
</div>