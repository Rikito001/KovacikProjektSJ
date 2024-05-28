<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: domov.php");
    exit();
}

include_once "parts/header.php";
include_once "functions.php";
include_once "classes/AdminPanel.php";

$adminPanel = new otazkyodpovede\UserAuthentication();

// Handle user deletion
if (isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];
    $adminPanel->deleteUser($userId);
    header("Location: admin.php");
    exit();
}

// Handle admin level toggling
if (isset($_POST['toggle_admin'])) {
    $userId = $_POST['user_id'];
    $adminPanel->toggleAdminLevel($userId);
    header("Location: admin.php");
    exit();
}

$users = $adminPanel->getAllUsers();
?>

<body>
    <header>
        <?php include_once "parts/navbar.php"; ?>
    </header>

    <!-- DARK MODE PHP -->
    <?php include_once "parts/DarkMode.php"; ?>

    <main style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
        <section style="padding-top:300px; padding-bottom:300px">
            <div class="container">
                <h3 class="text-center">User Management</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['meno'] . "</td>";
                            echo "<td>" . $user['priezvisko'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . ($user['admin'] == 1 ? 'Yes' : 'No') . "</td>";
                            echo "<td>
                                      <form method='post' style='display: inline;'>
                                          <input type='hidden' name='user_id' value='" . $user['zakaznik_id'] . "'>
                                          <button type='submit' name='toggle_admin' class='btn btn-primary btn-sm'>Toggle Admin</button>
                                      </form>
                                      <form method='post' onsubmit=\"return confirm('Are you sure you want to delete this user?');\" style='display: inline;'>
                                          <input type='hidden' name='user_id' value='" . $user['zakaznik_id'] . "'>
                                          <button type='submit' name='delete_user' class='btn btn-danger btn-sm'>Delete</button>
                                      </form>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- DARK MODE SCRIPT -->
    <?php include_once "js/DarkMode.php"; ?>
</body>
</html>

<?php include_once "parts/footer.php"; ?>