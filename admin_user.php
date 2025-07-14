<?php
include('dbconnect.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the password
    $roles = mysqli_real_escape_string($con, $_POST['roles']);

    // Basic validation
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($roles)) {
        $query = "INSERT INTO user (fname, lname, mname, email, password, roles)
                  VALUES ('$fname', '$lname', '$mname', '$email', '$password', '$roles')";

        if (mysqli_query($con, $query)) {
            $message = "User added successfully!";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="admin_dashboard.css?= <?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    </head>
    <body>
        <div class="AdminMainContainer">
            <div class="leftContainer">
                <div class="logoHeader">
                    <img src="#" alt="Logo">
                    <h2>Inventory/Booking</h2>
                </div>
                <div class="leftContainerBox">
                    <div class="admin_header">
                        <button type="button" onclick="toggleSettings()">John Mark P Hondrada</button>
                    </div>
                    <div class="admin_settings" id="adminSettings"></div>
                    <div class="admin_monitoring">
                    <span class="header_monitoring">Dashboard</span> 
                    <div class="admin_monitoringBox">
                            <ul>
                                <div class="adminLink"><li><i class="fas fa-home"></i><a href="admin_dashboard.php">Home</a></li></div>
                                <div class="adminLink"><li><i class="fas fa-boxes"></i><a href="#">Inventory</a></li></div>
                                <div class="adminLink"><li><i class="fas fa-book"></i><a href="#">Booking</a></li></div>
                                <div class="adminLink"><li><i class="fas fa-clipboard-list"></i> <a href="#">Reports</a></li></div>
                                <div class="adminLink"><li><i class="fas fa-user"></i> <a href="admin_user.php">User</a></li></div>
                            </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="rightContainer">    
                <!-- Right Header -->
                <div class="rightHeader">
                    <i class="fas fa-bell" id="notifIcon"></i>

                    <!-- Notification Modal -->
                    <div class="notifModal" id="notifModal">
                        <p><strong>Notifications</strong></p>
                        <ul>
                            <li>No new notifications</li>
                        </ul>
                    </div>
                </div>
                <div class="userContainerBox">
                    <div class="userHeaderContainer">
                        <h2>Admin Dashboard</h2>
                        <span>User</span>
                        <div class="userBtn">
                            <button type="button" id="showModalBtn">Add User</button>
                        </div>
                    </div>

                    <!-- Hidden Modal -->
                    <div class="addUserModal" id="addUserModal">
                        <div class="add-user-form">
                            <h2>Add New User </h2>
                            <div class="form-container">
                                <form method="POST" action="">
                                    <label for="fname">First Name:</label>
                                    <br>
                                    <input type="text" name="fname" placeholder="First Name">
                                    <br>
                                    <label for="lname">Last Name:</label>
                                    <br>
                                    <input type="text" name="lname" placeholder="Last Name">
                                    <br>
                                    <label for="mname">Middle Name:</label>
                                    <br>
                                    <input type="text" name="mname" placeholder="Middle Name">
                                    <br>
                                    <label for="email">Email:</label>
                                    <br>
                                    <input type="text" name="email" placeholder="Email">
                                    <br>
                                    <label for="password">Password:</label>
                                    <br>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <br>
                                    <label for="roles">Roles:</label>
                                    <select name="roles">
                                        <option value="">--Select Roles--</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Custodian">Custodian</option>
                                        <option value="Faculty">Faculty</option>
                                    </select>
                                    <div class="add-userBtn">
                                        <button type="submit">Save</button>
                                        <a href="#"><button type="cancel">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
        function toggleSettings() {
            const settings = document.getElementById('adminSettings');
            settings.style.display = (settings.style.display === 'none' || settings.style.display === '') ? 'block' : 'none';
        }
        </script>
        <script>// === TOGGLE MODAL ===
document.addEventListener('DOMContentLoaded', function () {
    const notifIcon = document.getElementById('notifIcon');
    const notifModal = document.getElementById('notifModal');

    notifIcon.addEventListener('click', function () {
        notifModal.style.display = notifModal.style.display === 'block' ? 'none' : 'block';
    });

    // Optional: hide modal when clicking outside
    document.addEventListener('click', function (e) {
        if (!notifIcon.contains(e.target) && !notifModal.contains(e.target)) {
            notifModal.style.display = 'none';
        }
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("addUserModal");
        const showBtn = document.getElementById("showModalBtn");

        showBtn.addEventListener("click", function () {
            modal.style.display = "flex"; // Show modal
        });

        // Optional: hide modal when clicking outside the modal box
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    });
</script>

    </body>
    </html>