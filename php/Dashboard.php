<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Dashboard</title>
<link rel="stylesheet" href="t.css" />
<style>
    /* Add styles for the design container */
    .design-container {
        flex-grow: 2;
        display: flex;  /* Add this line */
        justify-content: center; /* Add this line */
        align-items: center; /* Add this line */
    }

    /* Add styles for the design images */
    .design img {
        width: 200px;
        height: auto;
        margin-top: 10px;
        margin-left: 10px;
        margin-right: 10px; /* Adjusted margin */
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    .design img:hover {
        transform: scale(1.1);
    }

    /* Style for subscription cards */
    .subscription-container {
        display: none; /* Initially hidden */
        justify-content: center;
        align-items: center;
    }
    .subscription-card {
        width: 200px;
        height: 200px;
        background-color: #ccc;
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>
<body>
<div class="container">
    <div class="navbar-container">
        <button class="toggle-navbar-btn ham" onclick="toggleNavbar()"><i class="ham"></i></button>
        <div class="navbar">
            <!-- Navigation buttons go here -->
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#" onclick="showSubscriptions()">Subscribe</a></li>
                <li><a href="#" onclick="logout()">Log out</a></li>
            </ul>
        </div>
    </div>
    <!-- Corrected design container -->
    <div class="design-container" id="design-container">
        <div class="design">
            <!-- Pictures with bigger sizes -->
            <img src="../assets/1.png" alt="Picture 1" class="zoomable">
            <img src="../assets/2.png" alt="Picture 2" class="zoomable">
            <img src="../assets/3.png" alt="Picture 3" class="zoomable" >
            <img src="../assets/4.png" alt="Picture 4" class="zoomable" >
            <img src="../assets/5.png" alt="Picture 5" class="zoomable" >
            <img src="../assets/6.png" alt="Picture 6" class="zoomable" >
            <!-- Add more images as needed -->
        </div>
    </div>
    <div class="details-container">
        <div class="details">
            <!-- Available personalities -->
            <h2>Available Tutors</h2>
            <ul>
                <li><strong></strong> - Details about this personality</li>
                <a style><li><strong>Prof.Sheena Mae Basiga</strong> </a>- Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>
            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>Doc, Rosales</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>

            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>IT Prof, Aparece</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>

            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>IT Prof, Penera</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>
            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>IT Prof, Nadera</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>
            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>IT Prof, Madaya</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>

            <ul>
                <li><strong></strong> - Details about this personality</li>
                <li><strong>IT Prof, Gozano</strong> - Details about this personality</li>
                <!-- Add more personalities and details as needed -->
            </ul>
        </div>
    </div>
</div>
<div class="subscription-container" id="subscription-container">
    <div class="subscription-card">
        <h3>Subscription Premium 1</h3>
        <p class="price">$2,000</p>
        <ul class="benefits">
            
        </ul>
        <a href="#" class="btn">Subscribe</a>
    </div>
    <div class="subscription-card">
        <h3>Subscription Plan 2</h3>
        <p class="price">$200</p>
      
        <a href="#" class="btn">Subscribe</a>
    </div>
    <div class="subscription-card">
        <h3>Subscription Daily 3</h3>
        <p class="price">$500</p>
       
        <a href="#" class="btn">Subscribe</a>
    </div>
    <!-- Add more subscription cards as needed -->
</div>

<script>
    // JavaScript function to toggle navbar visibility
    function toggleNavbar() {
        const navbar = document.querySelector('.navbar');
        navbar.style.display = navbar.style.display === 'none' ? 'block' : 'none';
    }

    // JavaScript function to show or hide subscription cards
    function showSubscriptions() {
        const designContainer = document.getElementById('design-container');
        designContainer.style.display = 'none'; // Hide the design container
        const subscriptionContainer = document.getElementById('subscription-container');
        subscriptionContainer.style.display = 'flex'; // Show the subscription container
    }

    // JavaScript function for logout
    function logout() {
        // Redirect to the login page
        window.location.href = "login.php"; // Replace "login.php" with the actual URL of your login page
    }

    // JavaScript for image zoom
    const images = document.querySelectorAll('.zoomable');
    images.forEach(img => {
        img.addEventListener('click', () => {
            img.classList.toggle('zoomed');
        });
    });
</script>
</body>
</html>
