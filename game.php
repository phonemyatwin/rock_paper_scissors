<!-- Model -->
<?php
$username = $_GET["username"];
$human = $_POST["human"];
$login = $_POST["login"];
$logout = $_POST["logout"];
if (!isset($username)) {
    die("<p class =\"text-4xl font-bold text-red-500 tracking-tighter\">Username parameter missing: Please login first.</p>");
}
if (isset($logout)) {
    header("location:index.php");
}

$choices = ["Rock", "Paper", "Scissors"];
$human = isset($human) ? (int)$human : -1;
$computer = rand(0, 2);

// Function to output the result
function check(int $computer, int $human)
{
    if ($human === $computer) {
        return "<span class='font-semibold text-blue-500 text-lg tracking-tighter'>Tie</span>";
    } else if (($human === 0 && $computer === 2) || ($human === 1 && $computer === 0) || ($human === 2 && $computer === 1)) {
        return "<span class='font-semibold text-green-500 text-lg tracking-tighter'>You Win</span>";
    } else {
        return "<span class='font-semibold text-red-500 text-lg tracking-tighter'>You Lose</span>";
    }
}
$result = check($computer, $human);


// The result output
$output = "";
if ($human == -1) {
    $output = "Please select a strategy and press Play.";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            $output .= "Your choice: <span class= 'font-semibold text-lg text-slate-700 tracking-tighter'>$choices[$h]</span> | Computer's choice: <span class= 'font-semibold text-lg text-slate-700 tracking-tighter'>$choices[$c]</span> | Result: $r<br>";
        }
    }
} else {
    $output = "Your choice: <span class= 'font-semibold text-lg text-slate-700 tracking-tighter'>$choices[$human]</span> | Computer's choice: <span class= 'font-semibold text-lg text-slate-700 tracking-tighter'>$choices[$computer]</span> | Result: $result";
}
?>

<!-- View -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock, Paper, Scissor</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class=" text-base text-slate-900 font-sans font-medium box-border ">

    <!-- Header component -->
    <?php include "./components/header.php"; ?>


    <main class="py-12">
        <div class="container max-w-3xl mx-auto shadow-md rounded-md">
            <div class="bg-slate-100 border border-slate-200 rounded-t-md p-4">
                <h3 class="text-xl font-semibold">Rock Paper Scissors</h3>
            </div>

            <form action="" method="post" class="border-l border-r border-b border-slate-200 rounded-b-md p-4 flex flex-col gap-6">
                <h4 class="text-lg">Welcome: <strong class="text-slate-700"><?= htmlentities($username); ?></strong></h4>

                <div class="flex items-center gap-2 text-sm">
                    <label for="choices" class="font-mono bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-md text-slate-500 hover:bg-slate-50 hover:border-slate-100 transition-all shadow-md cursor-pointer"><?= $output; ?></label>
                    <select name="human" id="choices" class="bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-md text-slate-500 hover:bg-slate-50 hover:border-slate-100 transition-all shadow-md">
                        <option value="-1">Select</option>
                        <option value="0">Rock</option>
                        <option value="1">Paper</option>
                        <option value="2">Scissors</option>
                        <option value="3">Test</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" name="login" class="bg-slate-700 rounded-md px-2.5 py-1.5  text-white hover:bg-slate-600 transition-all shadow-md">Play</button>
                    <button type="submit" name="logout" class="bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-md text-slate-500 hover:bg-slate-50 hover:border-slate-100 transition-all shadow-md">Logout</button>
                </div>
            </form>
        </div>
    </main>


    <!-- Footer component -->
    <?php include "./components/footer.php"; ?>

</body>

</html>