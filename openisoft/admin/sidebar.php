<div class="sidebar">
    <ul>
        <li><a href="index.php" class="">Dashboard</a></li>
        <li><a href="requests.php">Requests</a></li>
        <li><a href="driver/index.php">Drivers</a></li>
        <li><a href="contact.php">Approved requests</a></li>
        <li><a href="ratings.php">View ratings</a></li>
        <!-- profile -->
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<script>
    // get the current url
    let url = window.location.href;
    // get the sidebar links
    let links = document.querySelectorAll(".sidebar ul li a");
    // loop through the links
    links.forEach(link => {
        // if the current url is equal to the link href
        if (url == link.href) {
            // add the active class to the link
            link.classList.add("active");
        }
    });
</script>