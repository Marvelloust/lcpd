<?php
// Include database connection
include 'db_connection.php';

// Initialize message variable
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $messageContent = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert data into the database
        $query = "INSERT INTO contact_messages (name, email, subject, message) 
                  VALUES ('$name', '$email', '$subject', '$messageContent')";

        if (mysqli_query($conn, $query)) {
            $message = 'Thank you for your inquiry! We will get back to you soon.';
        } else {
            $message = 'Error: ' . mysqli_error($conn);
        }
    } else {
        $message = 'Please enter a valid email address.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="css/contact.css">
    <!-- <link rel="stylesheet" href="css/generalstyle.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/licon.png" type="image/x-icon">
</head>

<body id="contact">

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <!-- Logo -->
            <div class="navbar-logo">
                <a href="index.php">
                    <img src="https://lcpd.net/assets/img/lcpd.png" alt="Logo">
                </a>
            </div>

            <!-- Navbar Links -->
            <div class="navbar-links">
                <ul class="navbar-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="placements.php">Placements</a></li>
                    <li><a href="partnerships.php">Our Partners</a></li>
                    <li><a href="contact.php">Contact Us</a></li>

                    <!-- Social Media Links -->
                    <div class="social-icons">
                        <li><a href="https://facebook.com" target="_blank" rel="noopener noreferrer"><i
                                    class='bx bxl-facebook-circle social-icon'></i></a></li>
                        <li><a href="https://twitter.com" target="_blank" rel="noopener noreferrer"><i
                                    class='bx bxl-twitter social-icon'></i></a></li>
                        <li><a href="https://instagram.com" target="_blank" rel="noopener noreferrer"><i
                                    class='bx bxl-instagram-alt social-icon'></i></a></li>
                        <li><a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"><i
                                    class='bx bxl-linkedin-square social-icon'></i></a></li>
                    </div>
                </ul>
            </div>

            <!-- Hamburger Menu Icon -->
            <div class="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="dynamic-header">
        <div class="header-image-container">
            <div class="header-image" style="background-image: url('path_to_your_header_image.jpg');"></div>
        </div>
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1>Contact Us</h1>
            <h2>Get in Touch with Lincoln Continuing Professional Development</h2>
            <a href="courses.php" class="header-button">Get Started</a>
        </div>
    </header>

    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <main>
        <section class="contact-sections">
            <div class="">
                <h2>Contact Us</h2>
                <!-- Country Selection Section -->
                <div class="country-selection">
                    <h3>Select a Country:</h3>
                    <select id="country-select">
                        <option value="malaysia">Malaysia</option>
                        <option value="nigeria">Nigeria</option>
                        <option value="pakistan">Pakistan</option>
                    </select>
                    <input type="text" id="search-input" placeholder="Search..." />
                </div>

                <div id="country-locations" class="contact-content-maps">
                    <!-- Malaysia Locations -->
                    <div class="country-location" data-country="malaysia">
                        <h3>Contact Information - Malaysia</h3>
                        <div class="country-info">
                            <div class="country-details">
                                <p><strong>Email:</strong> info@lcpd.net </p>
                                <p><strong>Phone:</strong> +60 13-320 8530</p>
                                <p><strong>Malaysian Headquarters:</strong> Wisma Lincoln, No. 12-18, Jalan SS 6/12, 47301
                                    Petaling
                                    Jaya, Selangor Darul Ehsan, Malaysia.</p>
                            </div>
                            <!-- Embedded Map -->
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2036198.1596322695!2d100.59323453376281!3d4.603060938095105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4c198eafa133%3A0x6fd7916de21e7871!2sLincoln%20University%20College!5e0!3m2!1sen!2sng!4v1724438692123!5m2!1sen!2sng"
                                    width="650" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Nigeria Locations -->
                    <div class="country-location" data-country="nigeria" style="display: none;">
                        <h3>Contact Information - Nigeria</h3>
                        <div class="country-info">
                            <div class="country-details">
                                <p><strong>Email:</strong> info@lcpd.net </p>
                                <p><strong>Phone:</strong> +60 13-320 8530</p>
                                <p><strong>Nigerian Headquarters:</strong> Along Jikwoyi-Karshi road Nyaya, FCT Abuja Nigeria.
                                </p>
                            </div>
                            <!-- Embedded Map -->
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.493936904083!2d7.553669379528494!3d8.926548168261968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0f9db875403b%3A0x20bb27310124b188!2sLincoln%20college%20of%20science%20management%20and%20technology!5e0!3m2!1sen!2sng!4v1724438780012!5m2!1sen!2sng"
                                    width="600" height="50" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Pakistan Locations -->
                    <div class="country-location" data-country="pakistan" style="display: none;">
                        <h3>Contact Information - Pakistan</h3>
                        <div class="country-info">
                            <div class="country-details">
                                <p><strong>Email:</strong> info@lcpd.net </p>
                                <p><strong>Phone:</strong> +60 13-320 8530</p>
                                <p><strong>Pakistan Headquarters:</strong> Plot C 99, Block 9 Gulshan-e- Iqbal, Karachi, Pakistan.
                                </p>
                            </div>
                            <!-- Embedded Map -->
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d3618.633179021087!2d67.0871705!3d24.910491!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sng!4v1727112170355!5m2!1sen!2sng"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section -->
        <section class="contact-section">
            <div class="">
                <div class="contact-content">
                    <div class="contact-form">
                        <h3>Inquiries Form</h3>

                        <!-- Display success/error message -->
                        <?php if ($message): ?>
                            <div class="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>

                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>

                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                    <div class="contact-info">
                        <h3>Contact Information</h3>
                        <p><strong>Email:</strong> info@lcpd.net </p>
                        <p><strong>Phone:</strong> +60 13-320 8530</p>
                        <p><strong> Malaysian Headquaters:</strong> Wisma Lincoln, No. 12-18, Jalan SS 6/12, 47301 Petaling
                            Jaya, Selangor Darul Ehsan, Malaysia.</p>
                        <p><strong> Nigerian Headquaters:</strong> Along Jikwoyi-Karshi road Nyaya, FCT Abuja Nigeria</p>

                        <!-- Embedded Map -->
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093687!2d144.95373531568068!3d-37.81627944201409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577cf4f071c0ba0!2sFlinders+Street+Station!5e0!3m2!1sen!2sau!4v1510918940129"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- About Section -->
            <div class="footer-about">
                <h3>About Us</h3>
                <p>LCPD is focused on Quality, impact, flexibility, and affordability - find out why people all over the world choose LCPD.</p>
                <div class="footer-social">
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"><i
                            class='bx bxl-facebook-circle social-icon'></i></a>
                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"><i
                            class='bx bxl-twitter social-icon'></i></a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"><i
                            class='bx bxl-instagram-alt social-icon'></i></a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"><i
                            class='bx bxl-linkedin-square social-icon'></i></a>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>Email: info@lcpd.net</p>
                <p>Phone: +60 13-320 8530</p>
                <p>LCPD Address. : Wisma Lincoln, 12-18, Jalan SS 6/12, 47301 Petaling Jaya, Selangor, Malaysia.</p>
            </div>

            <!-- Links Section -->
            <div class="footer-links">
                <div class="footer-links-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="courses.php">Courses</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="placements.php">Placements</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Files -->
    <script src="js/scripts.js"></script>

    <!-- Inline JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Country Selection and Search Functionality
            const countrySelect = document.getElementById('country-select');
            const searchInput = document.getElementById('search-input');
            const countryLocations = document.querySelectorAll('.country-location');

            // Function to filter locations based on country select or search input
            function filterLocations() {
                const selectedCountry = countrySelect.value.toLowerCase();
                const searchTerm = searchInput.value.toLowerCase();

                countryLocations.forEach(function(location) {
                    const locationCountry = location.getAttribute('data-country');
                    const locationText = location.textContent.toLowerCase();

                    if (
                        (locationCountry === selectedCountry || selectedCountry === 'all') &&
                        locationText.includes(searchTerm)
                    ) {
                        location.style.display = 'block';
                    } else {
                        location.style.display = 'none';
                    }
                });
            }

            // Event listeners for country select and search input
            countrySelect.addEventListener('change', filterLocations);
            searchInput.addEventListener('input', filterLocations);

            // Trigger the filter function to show the default selection
            filterLocations();

            // FAQ Toggle Functionality
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const answer = this.nextElementSibling;

                    if (this.classList.contains('active')) {
                        answer.style.display = "none";
                        this.classList.remove('active');
                    } else {
                        document.querySelectorAll('.faq-question').forEach(q => {
                            q.classList.remove('active');
                            q.nextElementSibling.style.display = "none";
                        });

                        answer.style.display = "block";
                        this.classList.add('active');
                    }
                });
            });

            // Hamburger Menu Toggle
            const navbarToggle = document.querySelector('.navbar-toggle');
            const navbarMenu = document.querySelector('.navbar-menu');

            navbarToggle.addEventListener('click', () => {
                navbarMenu.classList.toggle('active');
                navbarToggle.classList.toggle('active');
            });

            // Close Navbar Menu when a link is clicked (for mobile)
            const navbarLinks = document.querySelectorAll('.navbar-menu li a');
            navbarLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarMenu.classList.contains('active')) {
                        navbarMenu.classList.remove('active');
                        navbarToggle.classList.remove('active');
                    }
                });
            });
        });
    </script>

</body>

</html>