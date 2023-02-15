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
    <div class="flex justify-center items-center h-screen bg-gray-200">
        <div class="bg-white w-1/3 p-5 rounded-lg">
            <h1 class="text-2xl font-bold mb-5">Register</h1>
            <form action="./Controllers/RegisterController.php" method="POST">
                <div class="mb-5">
                    <label for="email" class="block mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2">Username</label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2">Confirm Password</label>
                    <input type="password" name="passwordc" id="passwordc" class="border border-gray-400 p-2 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Register</button>
                </div>

                <div class="mb-5">
                    <a href="./login" class="text-blue-500">Already have an account?</a>
                </div>

            </form>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'already_registered') { ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">This email is already registered.</span>
                    </div>
                <?php } else if ($_GET['error'] == 'passwords_not_match') { ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">Passwords do not match.</span>
                    </div>
                <?php } else if ($_GET['error'] == 'empty_fields') { ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">Please fill all the fields.</span>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</body>

</html>