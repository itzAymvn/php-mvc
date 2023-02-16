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
            echo '<a href="./profile" class="p-4">Profile</a>';
        } else {
            echo '<a href="./login" class="p-4">Login</a>';
            echo '<a href="./register" class="p-4">Register</a>';
        }
        ?>
    </div>
</nav>