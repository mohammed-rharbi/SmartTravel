<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="path/to/your/logo.png" alt="Your Logo" width="50" height="50">
        </a>

        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user'])) {
            $role = $_SESSION['user']->getRole();
            ?>

        <!-- Display user role and welcome message -->
        <span class="navbar-text">
            Welcome,
            <?php echo $role; ?>!
        </span>

        <!-- Navbar links based on user role -->
        <ul class="navbar-nav ml-auto">
            <?php
                switch ($role) {
                    case 'Admin':
                        echo "<li class='nav-item'><a class='nav-link' href='index.php?action=admin'>Admin Dashboard</a></li>";
                        break;
                    case 'Operator':
                        echo "<li class='nav-item'><a class='nav-link' href='index.php?action=operator'>Operator Dashboard</a></li>";
                        break;
                    case 'Client':
                        echo "<li class='nav-item'><a class='nav-link' href='index.php?action=client'>Client Dashboard</a></li>";
                        break;
                    default:
                        // Handle other roles if needed
                        break;
                }
                ?>
            <!-- Common links for all roles -->
            <li class='nav-item'><a class='nav-link' href='index.php?action=logout'>Logout</a></li>
        </ul>

        <?php } else { ?>

        <!-- Display login and register links if the user is not logged in -->
        <ul class="navbar-nav ml-auto">
            <li class='nav-item'><a class='nav-link' href='index.php?action=login'>Login</a></li>
            <li class='nav-item'><a class='nav-link' href='index.php?action=register'>Register</a></li>
        </ul>

        <?php } ?>
    </div>
</nav>