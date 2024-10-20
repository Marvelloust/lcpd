<?php
// Include database connection
include 'db_connection.php';

// Initialize message variable
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['newsletter-email']), FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert email into the database
        $query = "INSERT INTO newsletter_subscriptions (email) VALUES ('$email')";
        if (mysqli_query($conn, $query)) {
            $message = 'Thank you for subscribing!';
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
    <title>Home</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/courses.css">
    <!-- <link rel="stylesheet" href="css/generalstyle.css"> -->
    <link rel="stylesheet" href="css/placements.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" href="img/licon.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body id="homepage">

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

    <!-- Header Section (if applicable) -->
    <header class="dynamic-header">
        <div class="header-image-container">
            <div class="header-image" style="background-image: url('path_to_your_header_image.jpg');"></div>
        </div>
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1>Start Your Journey to Success</h1>
            <h2>Empowering Your Future with Our Comprehensive Training Programs</h2>
            <a href="courses.php" class="header-button">Get Started</a>
        </div>
    </header>

    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <main>
        <!-- Back to Top Button -->
        <div id="back-to-top" class="back-to-top" style="display: none;">
            &#8679; <!-- Arrow icon (you can replace with an actual icon) -->
        </div>

        <section class="stats-section">
            <div class="container">
                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-number" data-count="1232">0</div>
                        <p>Students</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="64">0</div>
                        <p>Courses</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="42">0</div>
                        <p>Events</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="15">0</div>
                        <p>Trainers</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section">
            <h2>Why Choose LCPD</h2>
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h3>Welcome to Our Learning Platform</h3>
                        <p>Work with us because our focus and core values will lead to success of our students.</p>
                        <p><strong>International Certification:</strong> After successfully completing the courses, every
                            applicant will receive an international certificate. </p>
                        <p><strong>Afordable Courses:</strong> The payment schedule is flexible, and the course fees are very
                            affordable. </p>
                        <p><strong>Skill Enhancement:</strong> Skills Enhancement Training Courses are specially designed to
                            enhance the Professional Skill of candidates / Learners on their workplace to get the new direction
                            of development</p>
                    </div>
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1455849318743-b2233052fcff?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YWJvdXR8ZW58MHx8MHx8fDA%3D"
                            alt="Our Platform">
                    </div>
                </div>
            </div>

            <section class="lincoln-universities">
                <div class="">
                    <h2>Our Focus:</h2>
                    <ul class="universities-list">
                        <li class="university-item">
                            <div class="university-info">
                                <p>Guaranteed skills on all our courses.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Hand on practical classes.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Industrial experience from semester two till finished.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Our curriculum designed to meet academic and industrial standard.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Impactful study materials.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Skillful and competent Lecturers.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Practical teaching and practical examinations.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Industry collaborations both local and international partners.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Recognizes certificate by the Ministry of Education of each country.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Guaranteed NYSC for Nigerians Student after completion with our Partner University.</p>
                            </div>
                        </li>
                        <li class="university-item">
                            <div class="university-info">
                                <p>Affordable and scholarship availability to complete the top-up degree after completion of
                                    LCPD.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </section>
        <section id="courses" class="courses-section" style="width: 85%; margin:auto;">
            <div class="courses-container">
                <h2>Our Popular Skills Courses</h2>
                <div class="courses-grid">
                    <!-- Course Card 1 -->
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1583508915901-b5f84c1dcde1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHdlYiUyMGRldmVsb3BtZW50fGVufDB8fDB8fHww"
                            alt="Course 1">
                        <div class="course-info">
                            <h3>Introduction to Web Development</h3>
                            <p>Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                            <hr>
                            <span class="course-type">Web Development</span>
                            <span class="course-level">Beginner Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Introduction to Web Development</h3>
                            <p>This course covers everything from understanding web structures to creating your first website.
                            </p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course Card 2 -->
                    <div class="course-card">
                        <img src="https://plus.unsplash.com/premium_photo-1661878265739-da90bc1af051?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fGRhdGElMjBhbmFseXRpY3N8ZW58MHx8MHx8fDA%3D"
                            alt="Course 2">
                        <div class="course-info">
                            <h3>Data Analysis with Python</h3>
                            <p>Intermediate coverage of data analysis using Python libraries.</p>
                            <hr>
                            <span class="course-type">Data Science</span>
                            <span class="course-level">Intermediate Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Data Analysis with Python</h3>
                            <p>Build upon your knowledge with in-depth coverage of pandas, NumPy, and data visualization
                                techniques.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course Card 3 -->
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGRpZ2l0YWwlMjBtYXJrZXRpbmd8ZW58MHx8MHx8fDA%3D"
                            alt="Course 3">
                        <div class="course-info">
                            <h3>Advanced Digital Marketing Strategies</h3>
                            <p>Advanced techniques for mastering online marketing.</p>
                            <hr>
                            <span class="course-type">Digital Marketing</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Advanced Digital Marketing Strategies</h3>
                            <p>Master concepts like SEO, SEM, and content marketing to excel in digital marketing.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course Card 4 -->
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y3liZXJzZWN1cml0eXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Course 4">
                        <div class="course-info">
                            <h3>Cybersecurity Essentials</h3>
                            <p>Learn how to protect networks and data from cyber threats.</p>
                            <hr>
                            <span class="course-type">Cybersecurity</span>
                            <span class="course-level">Beginner Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Cybersecurity Essentials</h3>
                            <p>Get hands-on experience with threat detection, prevention, and network security best practices.
                            </p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Success Stories Section -->
        <section class="success-stories-section">
            <h2>Success Stories</h2>
            <div class="success-stories-content">
                <div class="success-story">
                    <img src="img/person-1.jpg" alt="Person 1">
                    <h3>Jane Doe</h3>
                    <p>"This course changed my life! I landed my dream job within a month of graduating."</p>
                </div>
                <div class="success-story">
                    <img src="img/person-3.jpg" alt="Person 2">
                    <h3>John Smith</h3>
                    <p>"The skills I gained were invaluable. The support from the mentors was exceptional."</p>
                </div>
                <div class="success-story">
                    <img src="img/person-6.jpg" alt="Person 3">
                    <h3>Emma Brown</h3>
                    <p>"I couldn't have asked for a better learning experience. Highly recommend to anyone looking to advance
                        their career."</p>
                </div>
                <!-- Add more success stories as needed -->
            </div>
        </section>
        <!-- Newsletter Signup Section -->
        <section class="newsletter-section">
            <?php if ($message): ?>
                <div class="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <h2>Stay Updated!</h2>
            <p>Subscribe to our newsletter to receive the latest updates, news, and special offers.</p>
            <form method="POST" action="">
                <div class="newsletter-form">
                    <input type="email" id="newsletter-email" name="newsletter-email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe Now</button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- About Section -->
            <div class="footer-about">
                <h3>About Us</h3>
                <p>LCPD is focus on Quality, impact, flexibility and affordability - find out why people all over the world choose LCPD.</p>
                <div class="footer-social">
                    <a href="https://facebook.com" target="_blank"><i class='bx bxl-facebook-circle social-icon'></i></a>
                    <a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter social-icon'></i></a>
                    <a href="https://instagram.com" target="_blank"><i class='bx bxl-instagram-alt social-icon'></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class='bx bxl-linkedin-square social-icon'></i></a>
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
                        <li><a href="about.php">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Files -->
    <script src="js/scripts.js"></script>

    <!-- Inline JavaScript -->
    <script>
        // Back to Top Button Functionality
        document.addEventListener('DOMContentLoaded', () => {
            const backToTopButton = document.getElementById('back-to-top');
            const heroSection = document.querySelector('.hero-section');

            window.addEventListener('scroll', () => {
                const heroSectionHeight = heroSection ? heroSection.offsetHeight : 0;
                const scrollPosition = window.scrollY;

                if (scrollPosition > heroSectionHeight) {
                    backToTopButton.style.display = 'block';
                } else {
                    backToTopButton.style.display = 'none';
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        // Counting Animation for Stats
        document.addEventListener('DOMContentLoaded', () => {
            function countUp(element) {
                const target = parseInt(element.getAttribute('data-count'), 10);
                const duration = 2000;
                const stepTime = Math.abs(Math.floor(duration / target));
                let count = 0;

                const interval = setInterval(() => {
                    count += 1;
                    element.textContent = count;

                    if (count >= target) {
                        clearInterval(interval);
                        element.textContent = target;
                    }
                }, stepTime);
            }

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        countUp(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 1.0
            });

            document.querySelectorAll('.stat-number').forEach(number => {
                observer.observe(number);
            });
        });
    </script>

</body>

</html>