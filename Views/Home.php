<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <nav class="flex justify-between items-center h-16 bg-white text-black relative shadow-sm font-mono" role="navigation">
        <a href="./" class="pl-8">Home</a>
        <div class="px-4 cursor-pointer md:hidden" onclick="openMenu()">
            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
        <div class="pr-8 md:block hidden">
            <?php
            if (isset($_SESSION['user'])) {
                echo '<a href="./logout" class="p-4">Logout</a>';
            } else {
                echo '<a href="./login" class="p-4">Login</a>';
                echo '<a href="./register" class="p-4">Register</a>';
            }
            ?>
        </div>
    </nav>
    <!-- If the session is set -->
    <?php if (isset($_SESSION['user'])) { ?>
        <!-- User ID, name and email as a table -->
        <div class="flex justify-center items-center h-screen flex-col">
            <h1 class="text-6xl font-bold">Welcome, <?php echo $_SESSION['user']->name ?></h1>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $_SESSION['user']->id ?></td>
                        <td class="border px-4 py-2"><?php echo $_SESSION['user']->name ?></td>
                        <td class="border px-4 py-2"><?php echo $_SESSION['user']->email ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <!-- If the session is not set -->
            <div class="flex justify-center items-center h-screen flex-col">
                <h1 class="text-6xl font-bold">Welcome, Guest</h1>
                <h3 class="text-2xl font-bold">Please login or register</h3>
                <div class="flex justify-center items-center gap-4">
                    <a href="./login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</a>
                    <a href="./register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</a>
                </div>
            </div>
        <?php } ?>
</body>

</html>