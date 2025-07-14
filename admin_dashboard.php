    <?php
    include('dbconnect.php');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $message = "";

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
                <div class="rightContainerBox">
                    <h2>Welcome to LSSTI Admin Dashboard</h2>
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
    </body>
    </html>