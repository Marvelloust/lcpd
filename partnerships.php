<?php
// Include database connection
include 'db_connection.php';

// Initialize message variable
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $partnerName = filter_var(trim($_POST['partner-name']), FILTER_SANITIZE_STRING);
    $companyName = filter_var(trim($_POST['company-name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $messageContent = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert data into the database
        $query = "INSERT INTO partnership_messages (name, company_name, email, message) 
                  VALUES ('$partnerName', '$companyName', '$email', '$messageContent')";

        if (mysqli_query($conn, $query)) {
            $message = 'Thank you for your application!';
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
    <title>Partnerships</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/partnerships.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/licon.png" type="image/x-icon">
</head>

<body id="partnerships">

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
            <h1>Partnerships</h1>
            <h2>Collaborate with Lincoln Continuing Professional Development</h2>
            <a href="courses.php" class="header-button">Get Started</a>
        </div>
    </header>

    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <main>
        <!-- <section id="training-methodology" class="training-methodology">
        <div class="container methodology-container">
            <h2 class="section-title">Training Methodology</h2>
            <div class="tabs">
                <button class="tab-link active" data-tab="retail-methodology">Retail Training Methodology</button>
                <button class="tab-link" data-tab="corporate-methodology">Corporate Training Methodology</button>
            </div>
            <div id="retail-methodology" class="tab-content active">
                <h3>Retail Training Methodology</h3>
                <p>The new Training Methodology takes the “Blended Learning” way – this methodology uses XPs, TGs, and
                    Online Varsity (OV).
                    Lincoln students will get books through OnlineVarsity login id and password. They can refer to books,
                    Anytime, Anywhere, on Any Device, and on any Operating system (Windows, iOS, Android, Open Source). OV
                    comprises of Students’ Course details, E-books, CBTs, Performance record, attendance, etc. For more
                    information on OnlineVarsity, please visit: <a href="https://lincoln.edu.my"
                        target="_blank">https://lincoln.edu.my</a>.</p>
                <p>The New Training Methodology provides consistent and secure content across the globe. Textual content is
                    presented crisply so as not to overload the learner with information. Content-specific graphics and
                    illustrations are provided to aid the learner for better retention.</p>
            </div>
            <div id="corporate-methodology" class="tab-content">
                <h3>Corporate Training Methodology</h3>
                <h4>Pre Training</h4>
                <ul>
                    <li>Identification of training needs: Getting training requirements from the clients, analyzing them,
                        and understanding them.</li>
                    <li>Existing skills and profiles of the participants: Finding out existing skills and profiles of the
                        participants, projects on which they are working, and the current understanding level of the topic.
                    </li>
                    <li>Course content: Finding out course content (if any) desired by the client for the particular
                        training program. If the client does not have one, then recommending our own contents.</li>
                    <li>Expected skills: Once the course contents are finalized, communicating the desired skills of the
                        participants for the training program. Finding out the domain and the functional area to which the
                        project is included.</li>
                    <li>Identification of the right kind of the trainer: Finding out the right kind of candidate for the
                        given training requirement from the available data or from other resources.</li>
                    <li>Trainer's interaction with the client: Arranging trainer’s interaction with the project team to
                        check whether the trainer meets their requirements or not. This interaction is also helpful for the
                        finalization of the content and the training duration.</li>
                    <li>Fine Tuning of the content: Finalization of the course content to be covered for the training
                        program.</li>
                    <li>Check list of deliverables: Making a checklist of the deliverables before the training program.</li>
                    <li>Duration and content: Finalization of the duration and the course content after having an
                        interaction between the client and the trainer.</li>
                    <li>Availability: Finding out the availability of the trainer and expected training date from the
                        client. Accordingly fixing up the final dates for the training program.</li>
                    <li>Requirements: Getting required software, hardware, and all other teaching media requirements from
                        the trainer and communicating the same to the client.</li>
                </ul>
                <h4>On Training</h4>
                <ul>
                    <li>Schedule and agenda: Giving the schedule and the agenda to the participants for the given training
                        program.</li>
                    <li>Batch interaction: Our trainers make sure that all the participants in the training program interact
                        and actively participate in the training program. Thus we prefer the batch size of around 16 – 20
                        participants.</li>
                    <li>Study material: Giving the comprehensive study material to each participant, which is helpful for
                        them as a reference material even after the training program.</li>
                    <li>Problem solving: Our trainers always welcome questions from the participants. There is always a
                        question-answer session on each day of the training program. Few questions of the participants
                        related to their project are also answered even after the training program through mails.</li>
                    <li>Puzzles and case studies: Different applications and the examples are also supported by giving
                        puzzles and case studies to solve. This is very much helpful to explain the topic in detail.</li>
                    <li>Trouble Shooting: The topic is also explained with the help of a trouble shooter.</li>
                </ul>
                <h4>Post Training</h4>
                <ul>
                    <li>Feedback from the participants: After the training, feedback is taken on different parameters like
                        Communication Skills, Preparedness of the subject, Presentation Skill, Knowledge about the Subject,
                        Problem Solving Skills, Punctuality, Behavior, etc. This feedback is given on the scale of 0-5 for
                        each day of training. We offer two different feedback forms given at the end of each training
                        program. Your feedback helps us improve.</li>
                    <li>Feedback from the Trainer: This includes a common feedback for the whole batch and another for
                        individual participants. This feedback is taken on the different parameters.</li>
                    <li>Tests and the evaluation of the participants: After the training is over, a comprehensive evaluation
                        is conducted and the results are communicated to the project team.</li>
                    <li>Follow up sessions: Sometimes if a few questions of the participants are unanswered during the
                        training sessions then we also arrange for the follow-up sessions.</li>
                </ul>
            </div>
        </div>
    </section> -->
        <section class="alliances-section">
            <div class="alliance-container">
                <div class="section-header">
                    <h2 class="section-title">Our Partners</h2>
                    <div class="filter-buttons">
                        <button class="toggle-button active" onclick="showContent('professional')">Professional
                            Partners</button>
                        <button class="toggle-button" onclick="showContent('corporate')">Corporate Partners</button>
                        <button class="toggle-button" onclick="toggleContent()">Become Our Partner</button>
                    </div>
                </div>

                <!-- Professional Partners Section -->
                <div id="professional-partners" class="alliances-content">
                    <div class="partners-container">
                        <div class="alliance-card">
                            <img src="img/lincoln-logo.png" alt="Lincoln University Logo" class="alliance-logo">
                            <h3>Lincoln University Malaysia</h3>
                            <a href="https://lincoln.edu.ng" target="_blank" class="alliance-link">Learn More</a>
                        </div>
                        <div class="alliance-card">
                            <img src="img/Middlesex-Logo.png" alt="Middlesex University Logo" class="alliance-logo">
                            <h3>Middlesex University</h3>
                            <a href="https://www.mdx.ac.uk" target="_blank" class="alliance-link">Learn More</a>
                        </div>
                    </div>
                    <!-- Add more Professional Alliance Cards here -->
                </div>

                <!-- Corporate Partners Section -->
                <div id="corporate-partners" class="alliances-content" style="display: none;">
                    <div class="partners-container">
                        <div class="alliance-card">
                            <img src="img/Alfa-Logo.jpg" alt="Alfa University College Logo" class="alliance-logo">
                            <h3>Alfa University College Malaysia</h3>
                            <a href="https://alfa.edu.my" target="_blank" class="alliance-link">Learn More</a>
                        </div>
                    </div>
                    <!-- Add more Corporate Alliance Cards here -->
                </div>


                <div id="partner-form" class="partner-form" style="display: block;">
                    <h3>Become Our Partner</h3>

                    <!-- Display success/error message -->
                    <?php if ($message): ?>
                        <div class="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <div class="partner-content">
                        <div class="partner-image">
                            <img src="img/background-3.avif" alt="Partner Image">
                        </div>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="partner-name">Your Name:</label>
                                <input type="text" id="partner-name" name="partner-name" required />
                            </div>
                            <div class="form-group">
                                <label for="company-name">Company Name:</label>
                                <input type="text" id="company-name" name="company-name" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit">Submit</button>
                            <button type="button" onclick="toggleContent()">Back to Partners</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="scholarships-section">
        <div class="scholarship-container">
            <h2 class="section-title">Scholarships</h2>
            <div class="scholarships-content">
                <p>In order to fulfill its obligations towards society,
                    Lincoln Nigeria supports students who are academically brilliant and have an interest in making a career
                    in IT but do not have the means to do so. Some of these students have physical disabilities and need an
                    IT qualification that would give them a fresh start in life. Some bright students are unable to pay
                    their course fees and are deprived of quality education, which can make a difference in their lives. We
                    work with NGOs to identify such students and provide them with requisite scholarships.</p>

                <p>
                    Lincoln Nigeria allows fee waivers to a few of such deserving students every year. Some students with
                    disabilities enjoy free education at our centers.</p>

                <div class="call-to-action">
                    <h3>Apply for a Scholarship</h3>
                    <p>If you are a student who is academically brilliant and/or has a disability and wants to make a career
                        in IT, kindly send a 300-word write-up on “What will I do once I become an IT Professional” along
                        with copies of the following documents to <a href="mailto:info@lcpd.net">info@lcpd.net</a>.</p>
                    <ul>
                        <li>Your academic marksheets</li>
                        <li>Family income details</li>
                        <li>Letter of support for boarding/lodging, if not living with family</li>
                    </ul>
                </div>

                <div class="call-to-action">
                    <h3>Become a Sponsor</h3>
                    <p>We also appeal to individuals, foundations, philanthropic, and corporate organizations who have the
                        means to sponsor such well-deserving students to come forward and sponsor some of these students.
                        This will help us increase the number of scholarships every year and create a difference in many
                        lives. If you are interested in sponsoring such students, please e-mail us at <a
                            href="mailto:info@lcpd.net">info@lcpd.net</a> for further details.</p>
                </div>
            </div>
        </div>
    </section> -->

        <section class="study-malaysia-section">
            <div class="study-container">
                <h2 class="section-title">Study in Lincoln Universities Globally</h2>
                <p class="section-description">Explore the list of Lincoln Universities around the world. These institutions
                    offer world-class education and opportunities for students to study in diverse and enriching environments.
                </p>
                <div class="universities-list">
                    <ul>
                        <li>Lincoln Institute of Graduate Studies Sri Lanka</li>
                        <li>Lincoln University Malaysia</li>
                        <li>Lincoln University College, NSUK Campus, Nigeria</li>
                        <li>Lincoln University College, Kumo, Nigeria</li>
                        <li>Lincoln University College, Nigeria</li>
                    </ul>
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
        // Function to toggle partner form
        function toggleContent() {
            const contentSection = document.getElementById("professional-partners");
            const corporateSection = document.getElementById("corporate-partners");
            const formSection = document.getElementById("partner-form");

            if (formSection.style.display === "none" || formSection.style.display === "") {
                contentSection.style.display = "none";
                corporateSection.style.display = "none";
                formSection.style.display = "block";
            } else {
                const activeButton = document.querySelector('.toggle-button.active');
                if (activeButton && activeButton.textContent.includes('Professional')) {
                    contentSection.style.display = "block";
                } else {
                    corporateSection.style.display = "block";
                }
                formSection.style.display = "none";
            }
        }

        // Function to show specific content
        function showContent(type) {
            const professionalContent = document.getElementById('professional-partners');
            const corporateContent = document.getElementById('corporate-partners');
            const formSection = document.getElementById('partner-form');
            const filterButtons = document.querySelectorAll('.toggle-button');

            professionalContent.style.display = 'none';
            corporateContent.style.display = 'none';
            formSection.style.display = 'none';

            filterButtons.forEach(button => button.classList.remove('active'));

            if (type === 'professional') {
                professionalContent.style.display = 'block';
                filterButtons[0].classList.add('active');
            } else if (type === 'corporate') {
                corporateContent.style.display = 'block';
                filterButtons[1].classList.add('active');
            }
        }

        // Additional JavaScript functionalities
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Toggle Functionality (if present)
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