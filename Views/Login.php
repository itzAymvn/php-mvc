<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-200 relative h-screen">
    <?php require_once './Views/Header.php' ?>

    <div class="flex justify-center items-center h-full bg-gray-200">
        <div class="bg-white w-1/3 p-5 rounded-lg">
            <h1 class="text-2xl font-bold mb-5">Login</h1>
            <form action="./Controllers/LoginController.php" method="POST">
                <div class="mb-5">
                    <label for="email" class="block mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full rounded-lg">
                    <div class="text-red-500 text-sm" id="emailError">
                        Please enter a valid email address.
                    </div>
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full rounded-lg">
                    <div class="text-red-500 text-sm" id="passwordError">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="mb-5">
                    <button type="submit" id="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Login</button>
                </div>

                <div class="mb-5">
                    <a href="./register" class="text-blue-500">Don't have an account?</a>
                </div>
            </form>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'not_registered') { ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">The user is not registered.</span>
                    </div>

                <?php } elseif ($_GET['error'] == 'empty_fields') { ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">Please fill all the fields.</span>
                    </div>
                <?php }
            } else if (isset($_GET['register'])) {
                if ($_GET['register'] == 'success') { ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">You have been registered.</span>
                    </div>
            <?php }
            }

            ?>
        </div>
    </div>

    <script>
        const emailInput = document.querySelector('#email');
        const emailError = document.querySelector('#emailError');
        const passwordInput = document.querySelector('#password');
        const passwordError = document.querySelector('#passwordError');
        const submitButton = document.querySelector('#submit');

        // Make an array of all the inputs
        const inputs = [emailInput, passwordInput];

        // Function to show error
        const showError = (input, error) => {
            input.classList.add('border-red-500');
            error.classList.remove('hidden');
        }
        // Function to hide error 
        const hideError = (input, error) => {
            input.classList.remove('border-red-500');
            error.classList.add('hidden');
        }

        // Function to validate input
        const validateInput = (input, error) => {
            // Check if input is empty
            if (input.value.length === 0) {
                showError(input, error);
                return false;
            }
            // if it is not, empty hide the error
            hideError(input, error);
            return true;
        }

        // Function to validate the form
        const updateFormValidity = () => {
            // Check if all the inputs are valid
            const isFormValid = inputs.every((input) => validateInput(input, input.nextElementSibling));

            // If the form is valid, enable the submit button
            if (isFormValid) {
                submitButton.disabled = false;
                submitButton.classList.remove('bg-gray-500');
                submitButton.classList.add('bg-green-500');
            }

            // If the form is not valid, disable the submit button
            else {
                submitButton.disabled = true;
                submitButton.classList.remove('bg-green-500');
                submitButton.classList.add('bg-gray-500');
            }
        };

        // Add event listeners to all the inputs to validate them
        inputs.forEach((input) => input.addEventListener('input', updateFormValidity));
    </script>
</body>

</html>