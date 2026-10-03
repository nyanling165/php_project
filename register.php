<?php include("header.php") ?>
<?php include("connection.php") ?>
<?php
if (isset($_POST["submit"])) {
    $secretkey = "6Lc1nsUtAAAAAA_oQl9MHOINIk9MhgXSYEneH7pn";
    $responsekey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userIP";

    $response = file_get_contents($url);
    $responseData = json_decode($response);

    if ($responseData->success) {
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT * FROM users WHERE name=?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "Username already exist";
        } else {
            $add = $conn->prepare("INSERT INTO users(name,password) VALUES(?,?)");
            $add->bind_param("ss", $name, $password);
            if ($add->execute()) {
                $_SESSION['msg'] = "Register successfully";
            }
            header("location: login.php");
        }
    }
}
?>

<div class="bg-dark text-white min-vh-100 pt-5">
    <div class="container" style="max-width: 500px;">
        <div class="border border-warning-subtle mt-5 px-3">
            <h1 class="text-center fw-bold my-5">Create account</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="name" require>
                </div>
                <div class="mb-5">
                    <label for="" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" minlength="6" placeholder="At least must have 6 digit" name="password" require>
                </div>
                <div class="g-recaptcha" data-sitekey="6Lc1nsUtAAAAAPVKwlZigxqjnaBIMUEDAwggTTIe"></div>
                <div>
                    <button class="btn btn-warning w-100 fw-bold" name="submit">Create</button>
                    <p class="text-end mt-3">Already have an account?<a href="login.php" class="text-decoration-none fw-bold">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>