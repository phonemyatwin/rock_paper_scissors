<!-- Model -->
<?php

?>

<!-- View -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class=" text-base text-slate-900 font-sans font-medium box-border ">

    <!-- Header component -->
    <?php include "./components/header.php"; ?>


    <main class="py-12">
        <div class="container max-w-xl mx-auto shadow-md rounded-md">
            <div class="bg-slate-100 border border-slate-200 rounded-t-md p-4">
                <h3 class="text-xl font-semibold">Welcome to Rock Paper Scissors</h3>
            </div>

            <div class="border-l border-r border-b border-slate-200 rounded-b-md p-4 flex flex-col gap-6">
                <p class="text-slate-700">Please Login first.</p>
                <p class="text-slate-700">Attempting to play game without logging-in will fail with an error message.</p>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="window.location.href='login.php'" class="bg-slate-700 rounded-md px-2.5 py-1.5  text-white hover:bg-slate-600 transition-all shadow-md">Login</button>
                    <button type="button" onclick="window.location.href='game.php'" class="bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-md text-slate-500 hover:bg-slate-50 hover:border-slate-100 transition-all shadow-md">Game</button>
                </div>
            </div>
        </div>
    </main>


    <!-- Footer component -->
    <?php include "./components/footer.php"; ?>

</body>

</html>