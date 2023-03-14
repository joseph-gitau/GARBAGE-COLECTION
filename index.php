<!-- php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Garbage||Collection</title>
</head>

<body>
    <header>
        <div class="image">
            <h3>Image</h3>
        </div>
        <div class="lists">
            <ul>
                <li><a href="#about-us" id="about-link">About Us</a></li>
                <li><a href="#driver" id="driver-link">Driver</a></li>
                <li><a href="#user" id="request-link">Request</a></li>
            </ul>
        </div>
    </header>

    <section>
        <div id="about-us" class="column">
            <h2>About Us</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                blandit dolor sit amet dolor lacinia, id commodo magna tristique.
                Aliquam auctor libero euismod metus blandit, at aliquet diam placerat.
                Sed id est auctor, molestie sapien vel, aliquet velit. Sed vel velit
                vel velit eleifend venenatis id id diam. Sed tristique sit amet sapien
                non congue. Sed euismod ex velit, et malesuada urna varius id.
            </p>
        </div>
        <div id="driver" class="column">
            <h2>Driver</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                blandit dolor sit amet dolor lacinia, id commodo magna tristique.
                Aliquam auctor libero euismod metus blandit, at aliquet diam placerat.
                Sed id est auctor, molestie sapien vel, aliquet velit. Sed vel velit
                vel velit eleifend venenatis id id diam. Sed tristique sit amet sapien
                non congue. Sed euismod ex velit, et malesuada urna varius id.
            </p>
        </div>
        <div id="user" class="column">
            <h2>Request for garbage collection.</h2>
            <p>
                Welcome to our Garbage Collection website! We are committed to
                providing you with the best possible waste management services to keep
                our community clean and healthy. If you have any waste that needs to
                be collected, simply click on the "Request" button on our website. Our
                team of professionals will be there to take care of your waste in an
                efficient and eco-friendly manner. We believe that every effort
                counts, and by working together we can make our community a cleaner
                and greener place. Thank you for choosing us, and we look forward to
                serving you soon.
            </p>
        </div>
    </section>

    <footer>
        <p>Powered by Hassan &copy; 2023, All right reserverd</p>
        <button id="rating">Rate Us</button>
    </footer>

    <!-- about modal aboutModal-->
    <div id="about-modal" class="modal">
        <div class="modal-content">
            <span class="about-close-button">&times;</span>
            <h2 class="login-head">About Us</h2>
            <div>
                <p>Welcome to our Garbage Collection website! We are committed to
                    providing you with the best possible waste management services to keep
                    our community clean and healthy. If you have any waste that needs to
                    be collected, simply click on the "Request" button on our website. Our
                    team of professionals will be there to take care of your waste in an
                    efficient and eco-friendly manner. We believe that every effort
                    counts, and by working together we can make our community a cleaner
                    and greener place. Thank you for choosing us, and we look forward to
                    serving you soon.
                </p>
                <h2 class="login-head">Do you have any Question? Contact Us</h2>

                <form class="modal-form">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <input type="text" placeholder="Write your question" required />
                    <input type="submit" name="submit" value="Submit Question" />
            </div>
            </form>
        </div>
    </div>

    <!-- login modal for driver -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="driver-close-button">&times;</span>
            <h2 class="login-head">Login</h2>
            <div>
                <form class="modal-form">
                    <input type="text" placeholder="Enter your username" />
                    <input type="password" placeholder="Enter your password" />
                    <input type="submit" name="login" value="Login" />
            </div>
            </form>
        </div>
    </div>

    <!-- request modal -->
    <div id="request-modal" class="modal">
        <div class="modal-content">
            <span class="request-close-button">&times;</span>
            <h2 class="login-head">Fill in the following details</h2>
            <div>
                <form class="modal-form" action="index.php" method="POST">
                    <input type="text" name="fullname" placeholder="Enter your full name" required />
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <input type="text" name="adress" placeholder="Enter your address" required />
                    <input type="text" name="phonenumber" placeholder="Enter your telephone +254 " required />
                    <input type="date" name="collectiondate" value="Choose date for collection" required />
                    <input type="submit" name="requestgarbage" value="Send Request" />
            </div>
            </form>
        </div>
    </div>
    <!-- rating modal -->
    <div id="rating-modal" class="modal">
        <div class="modal-content">
            <span class="rating-close-button">&times;</span>
            <h2 class="login-head">we really want to improve on our service delivery</h2>
            <div>
                <h3>how do you rate us?</h3>
                <form class="modal-form">
                    <input type="text" placeholder="what should we improve on?" required />
                    <input type="submit" name="submit" value="Submit Rating" />
            </div>
            </form>
        </div>
    </div>
    <script src="./JS/main.js"></script>
    <script src="./JS/jquery.js"></script>
</body>

</html>