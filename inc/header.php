<header>
    <div class="container">
        <a href="index.php" class="logo">
            <img src="inc/picture.png" alt="Logo">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="view.php">Image Gallery</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <li><a href="admin_panel.php">Admin Panel</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
