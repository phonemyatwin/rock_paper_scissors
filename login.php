<!-- Model -->
<?php
error_reporting(1);
$stored_password = '1a52e17fa899cf40fb04cfc42e6352f1';
$username = $_POST["username"];
$password = $_POST["password"];
$salt = 'XyZzy12*_';
$salted_password = $salt . $password;
$hashed_password = hash("md5", $salted_password);
$remember = $_POST["remember"];
$login = $_POST["login"];
$required = "";
$incorrect = "";

if (isset($login)) {
    if (!empty($username) && !empty($password)) {
        if ($hashed_password == $stored_password) {
            if (isset($remember)) {
                setcookie("cookie_username", $username, time() + 60 * 999999999);
                setcookie("cookie_password", $password, time() + 60 * 999999999);
            }
            header("location:game.php?username=" . urlencode($_POST["username"]));
        } else {
            $incorrect = "Incorrect password";
        }
    } else {
        $required = "Username and password are required.";
    }
}
?>

<!-- View -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class=" text-base text-slate-900 font-sans font-medium box-border ">

    <!-- Header component -->
    <?php include "./components/header.php"; ?>


    <main class="py-12">
        <div class="container max-w-xl mx-auto shadow-md rounded-md">
            <div class="bg-slate-100 border border-slate-200 rounded-t-md p-4">
                <h3 class="text-xl font-semibold">Login</h3>
            </div>

            <form action="" method="post" class="border-l border-r border-b border-slate-200 rounded-b-md p-4 flex flex-col gap-6">
                <div class="flex flex-col gap-2">
                    <label for="username" class="text-slate-700">Username</label>
                    <input type="text" id="username" name="username" value="<?= $_COOKIE["cookie_username"]; ?>" placeholder="Enter your username" class="text-slate-700 border border-slate-200 px-2.5 py-1.5 rounded-md focus:outline-2 focus:outline-blue-200">
                </div>

                <!-- The password is php123 -->
                <div class="flex flex-col gap-2">
                    <label for="password" class="text-slate-700">Password</label>
                    <input type="password" id="password" name="password" value="<?= $_COOKIE["cookie_password"]; ?>" placeholder="For a password hint, view the source" class="text-slate-700 border border-slate-200 px-2.5 py-1.5 rounded-md focus:outline-2 focus:outline-blue-200">
                    <p class="text-sm text-red-600 "><?= $required, $incorrect; ?></p>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="accent-blue-200">
                    <label for="remember" class="text-slate-700">Remember me</label>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" name="login" class="bg-slate-700 rounded-md px-2.5 py-1.5  text-white hover:bg-slate-600 transition-all shadow-md">Login</button>
                    <button type="button" onclick="window.location.href='index.php'" ; class="bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-md text-slate-500 hover:bg-slate-50 hover:border-slate-100 transition-all shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </main>


    <!-- Footer component -->
    <?php include "./components/footer.php"; ?>

</body>

</html>