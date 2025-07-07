<?php
session_start();
session_unset();   // Remove all session variables
session_destroy(); // Destroy the session

echo "<script>
  alert('You have been logged out!');
  window.location.href = 'login.php'; // Redirect to user login page
</script>";
?>
