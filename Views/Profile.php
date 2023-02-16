<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user']->name ?>'s Profile</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<?php
$user = $_SESSION['user'];
?>

<body class="bg-gray-100">
    <?php require_once './Views/Header.php' ?>
    <div class="flex justify-center items-center h-screen">
        <form class="bg-white w-1/3 p-5 rounded-lg" action="./Controllers/EditProfileController.php" method="POST">
            <h1 class="text-2xl font-bold mb-5">Your Profile</h1>
            <div class="mb-5">
                <label for="name" class="block mb-2">Name</label>
                <div class="relative">
                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full rounded-lg" value="<?php echo $user->name ?>" disabled>
                    <div class="text-red-500 text-sm hidden" id="nameError">
                        Please enter a valid name.
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full rounded-lg" value="<?php echo $user->email ?>" disabled>
                <div class="text-red-500 text-sm hidden" id="emailError">
                    Please enter a valid email.
                </div>
            </div>
            <button id="edit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Edit</button>
            <button id="save" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium hidden">Save</button>
            <button id="cancel" class="bg-blue-500 text-white px-4 py-2 rounded font-medium hidden">Cancel</button>


        </form>
    </div>
    <script>
        const edit = document.getElementById('edit');
        const save = document.getElementById('save');
        const cancel = document.getElementById('cancel');
        const name = document.getElementById('name');
        const nameError = document.getElementById('nameError');
        const email = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        edit.addEventListener('click', (e) => {
            e.preventDefault();
            name.removeAttribute('disabled');
            email.removeAttribute('disabled');
            edit.classList.add('hidden');
            save.classList.remove('hidden');
            cancel.classList.remove('hidden');

            const inputs = [name, email];

            // Function to show error
            const showError = (input, error) => {
                error.classList.remove('hidden');
            }

            // Function to hide error 
            const hideError = (input, error) => {
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
                    save.disabled = false;
                    save.classList.remove('bg-gray-500');
                    save.classList.add('bg-green-500');
                }

                // If the form is not valid, disable the submit button
                else {
                    save.disabled = true;
                    save.classList.remove('bg-green-500');
                    save.classList.add('bg-gray-500');
                }
            };

            // Add event listeners to all the inputs to validate them
            inputs.forEach((input) => input.addEventListener('input', updateFormValidity));
        });

        cancel.addEventListener('click', (e) => {
            e.preventDefault();
            name.setAttribute('disabled', true);
            name.value = '<?php echo $user->name ?>';
            email.setAttribute('disabled', true);
            email.value = '<?php echo $user->email ?>';
            edit.classList.remove('hidden');
            save.classList.add('hidden');
            cancel.classList.add('hidden');
            // Hide all the errors
            const errors = [nameError, emailError];
            errors.forEach((error) => error.classList.add('hidden'));
        });
    </script>
</body>

</html>