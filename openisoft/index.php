<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "resources/burt/burt_header.html"; ?>
    <!-- icon -->
    <link rel="icon" href="resources/images/garbage-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Garbage collection system</title>
</head>

<body>
    <!-- header -->
    <header>
        <nav>
            <div class="left">
                <a href="index.php">
                    <h1 class="logo">Garbage collection system</h1>
                </a>
            </div>
            <div class="right">
                <ul>
                    <li><a href="admin/index.php">Admin</a></li>
                    <li><a href="#contact" class="contact-link">Contact us</a></li>
                    <li><a href="#about" rel="modal:open">About us</a></li>
                    <li><a href="#">Driver</a></li>
                    <li><a href="#request" rel="modal:open">Request</a></li>
                    <li><a href="#rate" rel="modal:open">Rate us</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- hero -->
    <section class="hero">
        <div class="hero-text">
            <h1>Garbage collection system</h1>
            <p>Garbage collection system is a web application that allows users to request for garbage collection services. The system also allows drivers to accept the requests and collect the garbage.</p>
            <a href="#" class="btn btn-primary">Get started</a>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section-about" id="contact">
                <h1 class="logo-text"><span>Garbage</span> collection system</h1>
                <p>
                    Garbage collection system is a web application that allows users to request for garbage collection services. The system also allows drivers to accept the requests and collect the garbage.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; 123-456-789</span>
                    <span><i class="fas fa-envelope"></i> &nbsp; </span>
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section-links">
                <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="#">
                        <li>Events</li>
                    </a>
                    <a href="#">
                        <li>Team</li>
                    </a>
                    <a href="#">
                        <li>Mentors</li>
                    </a>
                    <a href="#">
                        <li>Gallery</li>
                    </a>
                    <a href="#">
                        <li>Terms and Conditions</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section-contact-form" id="contact-fm1">
                <h2 class="contact-fm1-h2">Contact us</h2>
                <br>
                <form action="index.html" method="post" class="contact-rqst">
                    <!-- name -->
                    <input type="text" name="name" id="contact-name" class="text-input contact-input" placeholder="Your name...">
                    <input type="email" name="email" id="contact-email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea rows="4" name="message" id="contact-message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Send
                    </button>
                </form>
            </div>
        </div>
    </footer>
    <!-- request modal -->
    <div class="modal" id="request">
        <div class="modal-header">
            <h3>Request garbage collection</h3>
        </div>
        <div class="modal-body">
            <form action="/reg_exe.php" method="POST">
                <!-- name -->
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div>
                <!-- email -->
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                </div>
                <!-- phone -->
                <div class="form-control">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone">
                </div>
                <!-- address -->
                <div class="form-control">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter your address">
                </div>
                <!-- message -->
                <div class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <!-- date of garbage request -->
                <div class="form-control">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" placeholder="Enter date">
                </div>
                <!-- submit -->
                <div class="form-control snd-rqst">
                    <button type="submit" name="submit" class="btn btn-primary" id="send-request">Send request</button>
                </div>
            </form>
        </div>
    </div>
    <!-- rate modal -->
    <div class="modal" id="rate">
        <div class="modal-header">
            <h3>Rate our services</h3>
        </div>
        <div class="modal-body">
            <form action="/reg_exe.php" method="POST">
                <!-- name -->
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="rate-name" placeholder="Enter your name">
                </div>
                <!-- email -->
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="rate-email" placeholder="Enter your email">
                </div>
                <!-- message -->
                <div class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="rate-message" cols="30" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <!-- rating inform of stars -->
                <div class="form-control">
                    <label for="rating">Rating</label>
                    <div id="stars">
                        <span class="star" data-value="1"></span>
                        <span class="star" data-value="2"></span>
                        <span class="star" data-value="3"></span>
                        <span class="star" data-value="4"></span>
                        <span class="star" data-value="5"></span>
                    </div>
                    <input type="hidden" id="rate-rating" name="rating" value="">
                </div>
                <!-- submit -->
                <div class="form-control snd-rt">
                    <button type="submit" name="submit" class="btn btn-primary" id="rate-us">Rate our services</button>
                </div>
            </form>
        </div>
    </div>
    <!-- about us modal -->
    <div class="modal" id="about">
        <div class="modal-header">
            <h3>About us</h3>
        </div>
        <div class="content">
            <p>Welcome to Waste Management Solutions! We are here to provide you with the best waste collection and disposal services in the industry. Our company is committed to providing you with the most reliable and efficient waste management solutions.</p>

            <p>We provide waste collection and disposal services for both residential and commercial customers. Our services include collection, transportation and disposal of all types of waste, including hazardous, organic and general waste. We offer flexible pickup schedules and competitive pricing.</p>

            <p>Our team of experienced professionals is here to ensure that the waste is collected and disposed of safely and efficiently. We use the latest technology and equipment to ensure that the waste is collected and disposed of in an environmentally friendly manner. We also offer advice and guidance on waste management and disposal methods.</p>

            <p>At Waste Management Solutions, we understand the importance of keeping our environment clean and safe. We strive to provide the best waste management solutions that are both efficient and cost-effective. We are committed to providing our customers with the best possible service and are dedicated to helping them achieve the highest standards in waste management.</p>

            <p>If you have any questions or would like more information about our services, please feel free to <a href="mailto:contact@wastemanagement.com">contact us</a>. We look forward to hearing from you!</p>
        </div>
    </div>
    <!-- nw -->
    <script src="js/index.js"></script>
    <script>
        // Get all star elements
        const stars = document.querySelectorAll('.star');

        // Add click event listener to each star
        stars.forEach((star) => {
            star.addEventListener('click', () => {
                // Remove active class from all stars
                stars.forEach((s) => {
                    s.classList.remove('active-star');
                });

                // Add active class to clicked star and all previous stars
                star.classList.add('active-star');
                let previous = star.previousElementSibling;
                while (previous) {
                    previous.classList.add('active-star');
                    previous = previous.previousElementSibling;
                }

                // Set the rating value to the selected star's data-value
                const ratingInput = document.getElementById('rate-rating');
                ratingInput.value = star.getAttribute('data-value');
            });
        });
        // contact-link click event go to contact section and highlight header
        $('#contact-link').click(function() {
            $('html, body').animate({
                scrollTop: $('#contact-fm1').offset().top
            }, 1000);
            // add active-scroll class to .footer-section-contact-form h2
            $('.contact-fm1-h2').addClass('active-scroll');
        });
    </script>
</body>

</html>