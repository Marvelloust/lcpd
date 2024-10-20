<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Diploma/Professional Short Courses</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="css/courses.css">
    <!-- <link rel="stylesheet" href="css/generalstyle.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/licon.png" type="image/x-icon">

    <!-- Inline Styles for Header -->
    <style>
        header {
            text-align: center;
            padding: 100px 20px;
            background-color: #e74c3c;
            color: white;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 15px;
        }

        header p {
            font-size: 1.3em;
            font-weight: 400;
        }
    </style>
</head>

<body id="placement">

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <!-- Logo -->
            <div class="navbar-logo">
                <a href="index.php">
                    <img src="https://lcpd.net/assets/img/lcpd.png" alt="LCPD Logo">
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
    <header>
        <h1>Advanced Diploma/Professional Short Courses</h1>
        <p>Specializations: Project Management, Leadership & Planning, Strategic Management, Forensic Accounting</p>
    </header>

    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <main>
        <!-- Courses Section -->
        <section id="courses" class="courses-section">
            <div class="courses-container">
                <div class="courses-filter-search">
                    <h2>Short Courses</h2>
                </div>

                <!-- Course Cards -->
                <div class="courses-grid">
                    <!-- Course 1: Project Management -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>

                        <img src="https://plus.unsplash.com/premium_photo-1661782562303-b6839db30206?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cHJvamVjdCUyMG1hbmFnZW1lbnR8ZW58MHx8MHx8fDA%3D" alt="Project Management">
                        <div class="course-info">
                            <h3>Project Management</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Advanced Diploma</span>
                            <span class="course-level">Professional Short Course</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Project Management</h3>
                            <p>Master project management principles to lead successful projects.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course 2: Leadership and Planning -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>

                        <img src="https://images.unsplash.com/photo-1506784365847-bbad939e9335?w=500&auto=format&fit=crop&q=60" alt="Leadership and Planning">
                        <div class="course-info">
                            <h3>Leadership and Planning</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Advanced Diploma</span>
                            <span class="course-level">Professional Short Course</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Leadership and Planning</h3>
                            <p>Develop strategic leadership and planning skills for effective decision making.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course 3: Strategic Management -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>

                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500&auto=format&fit=crop&q=60" alt="Strategic Management">
                        <div class="course-info">
                            <h3>Strategic Management</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Advanced Diploma</span>
                            <span class="course-level">Professional Short Course</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Strategic Management</h3>
                            <p>Learn strategic management techniques to drive business success.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- Course 4: Forensic Accounting -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>

                        <img src="https://plus.unsplash.com/premium_photo-1663013462043-1caddf51bae1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Zm9yZW5zaWN8ZW58MHx8MHx8fDA%3D" alt="Forensic Accounting">
                        <div class="course-info">
                            <h3>Forensic Accounting</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Advanced Diploma</span>
                            <span class="course-level">Professional Short Course</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Forensic Accounting</h3>
                            <p>Investigate financial fraud and learn forensic accounting techniques.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                </div>
                <!-- Course Detail Sidebar -->
                <div id="course-sidebar" class="course-sidebar">
                    <div class="sidebar-content">
                        <span class="close-btn">&times;</span>

                        <!-- Course Details Section -->
                        <div id="course-details">
                            <h2 id="sidebar-course-title">Course Title</h2>
                            <img id="sidebar-course-image" src="" alt="Course Image" class="sidebar-course-image">
                            <p id="sidebar-course-description">Course Description</p>

                            <!-- Additional Details -->
                            <div class="course-details">
                                <p><strong>Specializations:</strong> <span id="sidebar-course-specializations"></span></p>
                                <p><strong>Level:</strong> <span id="sidebar-course-level"></span></p>
                                <p><strong>Type:</strong> <span id="sidebar-course-type"></span></p>
                                <p><strong>Duration:</strong> <span id="sidebar-course-duration"></span></p>
                                <p><strong>Eligibility:</strong> <span id="sidebar-course-eligibility"></span></p>
                                <div class="course-curriculum">
                                    <strong>Curriculum:</strong>
                                    <ul id="sidebar-course-curriculum">
                                        <!-- Dynamic Curriculum Modules -->
                                    </ul>
                                </div>
                            </div>

                            <!-- Enroll Now Button -->
                            <a href="#" class="course-link" id="sidebar-enroll-now">Enroll Now</a>
                        </div>

                        <!-- Registration Form Section (Initially Hidden) -->
                        <div id="enroll-form" style="display: none;">
                            <h2>Course Registration</h2>
                            <form id="registration-form">
                                <!-- Hidden Field to Capture Course Title -->
                                <input type="hidden" id="registered-course-title" name="course_title" value="">

                                <!-- Full Name (First Name and Last Name in one row) -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="first-name">First Name:</label>
                                        <input type="text" id="first-name" name="first_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Last Name:</label>
                                        <input type="text" id="last-name" name="last_name" required>
                                    </div>
                                </div>

                                <!-- Email and Gender in one row -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender:</label>
                                        <select id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" id="phone" name="phone" required>
                                </div>

                                <!-- Nationality and State in one row -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <input type="text" id="nationality" name="nationality" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State of Origin:</label>
                                        <input type="text" id="state" name="state" required>
                                    </div>
                                </div>

                                <!-- Course Select -->
                                <div class="form-group">
                                    <label for="course">Select Course:</label>
                                    <select id="course" name="course" required>
                                        <option value="">Select a Course</option>
                                        <option value="Course 1">Course 1</option>
                                        <option value="Course 2">Course 2</option>
                                        <option value="Course 3">Course 3</option>
                                    </select>
                                </div>

                                <!-- Highest Qualification -->
                                <div class="form-group">
                                    <label for="qualification">Highest Qualification:</label>
                                    <input type="text" id="qualification" name="qualification" required>
                                </div>

                                <!-- Address (Two Address Fields in one row) -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="address-line1">Address Line 1:</label>
                                        <input type="text" id="address-line1" name="address_line1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address-line2">Address Line 2:</label>
                                        <input type="text" id="address-line2" name="address_line2">
                                    </div>
                                </div>

                                <!-- How do you know about us -->
                                <div class="form-group">
                                    <label for="reference">How did you know about us?</label>
                                    <textarea id="reference" name="reference" required></textarea>
                                </div>

                                <!-- Upload Qualification -->
                                <div class="form-group">
                                    <label for="qualification-upload">Upload Your Qualification:</label>
                                    <input type="file" id="qualification-upload" name="qualification_upload" accept="image/jpeg, image/png" required>
                                    <small>Allowed file types: JPG, JPEG, PNG. Max file size: 2MB.</small>
                                </div>

                                <!-- Submit and Back Buttons -->
                                <button type="submit" class="submit-button">Apply Now</button>
                                <button type="button" class="back-button">Back</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Overlay -->
                <div id="sidebar-overlay" class="sidebar-overlay"></div>
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
    <script>
        // Function to open the sidebar with course details
        function openSidebar(course) {
            const sidebar = document.getElementById('course-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const title = document.getElementById('sidebar-course-title');
            const image = document.getElementById('sidebar-course-image');
            const description = document.getElementById('sidebar-course-description');
            const specializations = document.getElementById('sidebar-course-specializations');
            const level = document.getElementById('sidebar-course-level');
            const type = document.getElementById('sidebar-course-type');
            const duration = document.getElementById('sidebar-course-duration');
            const eligibility = document.getElementById('sidebar-course-eligibility');
            const curriculum = document.getElementById('sidebar-course-curriculum');
            const enrollLink = document.getElementById('sidebar-enroll-now');

            // Populate sidebar with course details
            title.innerText = course.title;
            image.src = course.image;
            image.alt = course.alt;
            description.innerText = course.description;
            specializations.innerText = course.specializations;
            level.innerText = course.level;
            type.innerText = course.type;
            duration.innerText = course.duration;
            eligibility.innerText = course.eligibility;

            // Populate Curriculum Modules
            curriculum.innerHTML = ""; // Clear previous curriculum
            course.curriculum.forEach(module => {
                const li = document.createElement('li');
                li.innerText = module;
                curriculum.appendChild(li);
            });


            // Update Enroll Link (optional: customize per course if needed)
            enrollLink.href = course.enrollLink || "#";

            // Show the sidebar and overlay
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        // Add event listeners to course cards
        document.addEventListener('DOMContentLoaded', () => {
            const courseCards = document.querySelectorAll('.course-card');
            courseCards.forEach(card => {
                const hoverButton = card.querySelector('.course-link'); // Adjust selector as needed
                hoverButton.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default action of the link

                    // Extract course information from data attributes
                    const courseInfo = {
                        title: card.querySelector('h3').innerText,
                        image: card.querySelector('img').src,
                        alt: card.querySelector('img').alt,
                        description: card.querySelector('.course-hover-details p').innerText,
                        specializations: card.querySelector('.course-info p').innerText.replace('Specializations: ', ''),
                        level: card.querySelector('.course-level').innerText.replace('Advanced Level', 'Advanced Level'),
                        type: card.querySelector('.course-type').innerText,
                        duration: card.getAttribute('data-duration'),
                        fees: card.getAttribute('data-fees'),
                        eligibility: card.getAttribute('data-eligibility'),
                        curriculum: JSON.parse(card.getAttribute('data-curriculum')),
                        instructorName: card.getAttribute('data-instructor-name'),
                        instructorBio: card.getAttribute('data-instructor-bio'),
                        enrollLink: card.querySelector('.course-link').href
                    };
                    openSidebar(courseInfo);
                });
            });

            // Close the sidebar when the close button is clicked
            const closeButton = document.querySelector('.close-btn');
            closeButton.addEventListener('click', () => {
                closeSidebar();
            });

            // Close the sidebar when clicking on the overlay
            const overlay = document.getElementById('sidebar-overlay');
            overlay.addEventListener('click', () => {
                closeSidebar();
            });

            // Function to close the sidebar
            function closeSidebar() {
                const sidebar = document.getElementById('course-sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.remove('active');
                overlay.classList.remove('active');

                // Reset to course details view if form was open
                const courseDetails = document.getElementById('course-details');
                const enrollForm = document.getElementById('enroll-form');
                if (enrollForm.style.display === 'block') {
                    courseDetails.style.display = 'block';
                    enrollForm.style.display = 'none';
                }
            }

            // Add event listener to Enroll Now button in sidebar to show the form
            const sidebarEnrollNow = document.getElementById('sidebar-enroll-now');
            const enrollForm = document.getElementById('enroll-form');
            const courseDetails = document.getElementById('course-details');
            const backButton = document.querySelector('.back-button');
            const registrationForm = document.getElementById('registration-form');
            const registeredCourseTitle = document.getElementById('registered-course-title');

            sidebarEnrollNow.addEventListener('click', (e) => {
                e.preventDefault();
                // Hide course details
                courseDetails.style.display = 'none';
                // Show enroll form
                enrollForm.style.display = 'block';
                // Populate hidden course title field
                registeredCourseTitle.value = document.getElementById('sidebar-course-title').innerText;
            });

            // Add event listener to Back button in the form to return to course details
            backButton.addEventListener('click', () => {
                // Show course details
                courseDetails.style.display = 'block';
                // Hide enroll form
                enrollForm.style.display = 'none';
            });

            // Handle form submission
            registrationForm.addEventListener('submit', (e) => {
                e.preventDefault();
                // Handle form data submission here
                // For example, send data via AJAX or allow default form submission
                // Here, we'll just alert the user and close the sidebar

                // Collect form data
                const formData = new FormData(registrationForm);
                const data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });

                // For demonstration, log the data
                console.log('Registration Data:', data);

                // TODO: Implement actual form submission logic (e.g., AJAX request)
                // Example using fetch:
                /*
                fetch('your-server-endpoint', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success
                    alert('Registration successful!');
                    closeSidebar();
                })
                .catch(error => {
                    // Handle error
                    console.error('Error:', error);
                    alert('There was an error submitting your registration.');
                });
                */

                // Alert the user
                alert('Thank you for registering!');

                // Reset form
                registrationForm.reset();

                // Close the sidebar
                closeSidebar();
            });
        });
    </script>

</body>

</html>