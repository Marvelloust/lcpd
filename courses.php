<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="css/courses.css">
    <!-- <link rel="stylesheet" href="css/generalstyle.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/licon.png" type="image/x-icon">
    <style>

    </style>
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
            <h1>Our Courses</h1>
            <h2>Explore a Wide Range of Learning Opportunities</h2>
            <a href="#" class="header-button">Get Started</a>
        </div>
    </header>

    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <main>
        <section id="courses" class="courses-section">
            <div class="courses-container">
                <div class="courses-filter-search">
                    <h2>Our Courses</h2>
                    <div class="filter-dropdown">
                        <label for="filter">Filter by:</label>
                        <select id="filter" class="filter-select">
                            <option value="all">All Levels</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="search-bar">
                        <input type="text" id="search-input" placeholder="Search courses...">
                        <button id="search-btn">Search</button>
                    </div>
                </div>
                <!-- Toggle Menu -->
                <div class="courses-toggle-menu">
                    <button class="toggle-button active" data-category="all">All Courses</button>
                    <button class="toggle-button" data-category="professional">LCPD Professional</button>
                    <button class="toggle-button" data-category="tech">LCPD Tech</button>
                    <button class="toggle-button" data-category="masters">LCPD PGD</button>
                </div>
                <div class="courses-grid">
                    <!-- LCPD TECH COURSES -->
                    <div class="course-card" data-category="tech"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>

                        <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?w=500&auto=format&fit=crop&q=60" alt="Software Engineering">
                        <div class="course-info">
                            <h3>Diploma/Advanced Diploma in Software Engineering Specialization</h3>
                            <p>Specializations: Software Development, Artificial Intelligence (AI), Internet of Things (IoT), Networking and Cyber Security</p>
                            <hr>
                            <span class="course-type">Tech Course</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Software Engineering Specialization</h3>
                            <p>Master the skills in software development and emerging technologies.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="tech"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=500&auto=format&fit=crop&q=60"
                            alt="Networking and Cyber Security">
                        <div class="course-info">
                            <h3>Advanced Diploma in Networking and Cyber Security</h3>
                            <p>Prepare for a career in securing networks and systems.</p>
                            <hr>
                            <span class="course-type">Tech Course</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Networking and Cyber Security</h3>
                            <p>Learn how to protect networks and manage security risks.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="tech"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1608204683146-0f7e909dca59?w=500&auto=format&fit=crop&q=60"
                            alt="Multimedia Design Technology">
                        <div class="course-info">
                            <h3>Advanced Diploma in Multimedia Design Technology</h3>
                            <p>Develop skills in multimedia production and design.</p>
                            <hr>
                            <span class="course-type">Tech Course</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Multimedia Design Technology</h3>
                            <p>Master the art of multimedia design through hands-on projects.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- LCPD PROFESSIONAL COURSES -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://www.abeuk.com/sites/default/files/2022-07/thisisengineering-raeng-anAAZ0nrqBY-unsplash.jpeg"
                            alt="Business Management">
                        <div class="course-info">
                            <h3>Diploma/Advanced Diploma in Business Management</h3>
                            <p>Specializations: Business Administration, Banking Operation, Accounting</p>
                            <hr>
                            <span class="course-type">Professional Course</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Business Management</h3>
                            <p>Unlock Your Career Potential with LCPD Business Management Qualifications.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>

                    <!-- LCPD PROFESSIONAL COURSES -->
                    <div class="course-card" data-category="professional"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1588912914078-2fe5224fd8b8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y291cnNlc3xlbnwwfHwwfHx8MA%3D%3D"
                            alt="Professional Short Courses">
                        <div class="course-info">
                            <h3>Advanced Diploma/Professional Short Courses</h3>
                            <p>Specializations: Project Management, Leadership and Planning, Strategic Management, Forensic
                                Accounting</p>
                            <hr>
                            <span class="course-type">Professional Course</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Professional Development</h3>
                            <p>Enhance your leadership and management skills for professional success.</p>
                            <!-- Link to the new page listing short courses -->
                            <a href="short-courses.php" class="course-link" style="margin-bottom: 10px;">View Course</a>
                            <a href="short-courses.php" class="course-card-link course-link">View short courses</a>
                        </div>
                    </div>

                    <!-- Master's Programs -->
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1682125773446-259ce64f9dd7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZWR1Y2F0aW9ufGVufDB8fDB8fHww"
                            alt="Master of Education">
                        <div class="course-info">
                            <h3>Advance diploma in Education Leading to Master of Education</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Education Master's Program</h3>
                            <p>Deepen your understanding of educational theory and practice.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1670517733920-0bb8aa85d759?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW50ZXJuYXRpb25hbCUyMHJlbGF0aW9uc3xlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of International Relations">
                        <div class="course-info">
                            <h3>Advance diploma in International Relation Leading to Master of International Relations</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>International Relations Master's Program</h3>
                            <p>Study global issues and international politics in depth.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1672165389900-e5c6d69e1f6e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y29tdW5pY2F0aW9ufGVufDB8fDB8fHww"
                            alt="Master of Mass Communication">
                        <div class="course-info">
                            <h3>Advance diploma in Mass Communication Leading to Master of Mass Communication</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Mass Communication Master's Program</h3>
                            <p>Explore media practices and develop critical communication skills.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1683936778314-29d834411075?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHBzeWNvbG9neXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of Science in Psychology">
                        <div class="course-info">
                            <h3>Advance diploma in Psychology Leading to Master of Science in Psychology</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Psychology Master's Program</h3>
                            <p>Gain insights into human behavior and psychological principles.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1664475943097-3b0be239a892?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aXNsYW1pYyUyMGJhbmtpbmd8ZW58MHx8MHx8fDA%3D"
                            alt="Master of Islamic Banking">
                        <div class="course-info">
                            <h3>Advance diploma in Islamic Banking Leading to Master of Islamic Banking</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Islamic Banking Master's Program</h3>
                            <p>Understand principles of Islamic finance and banking systems.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1694281930737-40ba002ae6af?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cHVibGljJTIwYWRtaW5pc3RyYXRpb258ZW58MHx8MHx8fDA%3D"
                            alt="Master of Public Administration">
                        <div class="course-info">
                            <h3>Advance diploma in Public Administration Leading to Master of Public Administration</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Public Administration Master's Program</h3>
                            <p>Prepare for leadership roles in government and public service.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1661490222612-f6702049e9d1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8bWFuYWdlbWVudHxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of Management">
                        <div class="course-info">
                            <h3>Advance diploma in Management Leading to Master of Management</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Management Master's Program</h3>
                            <p>Enhance your management skills and business acumen.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1661270434240-51fe304cb3e9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZGVudGlzdHJ5fGVufDB8fDB8fHww"
                            alt="Master of Science in Dentistry">
                        <div class="course-info">
                            <h3>Advance diploma in Dentistry Leading to Master of Science in Dentistry</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Dentistry Master's Program</h3>
                            <p>Advance your dental skills and knowledge in clinical practice.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bWVkaWNhbCUyMHNjaWVuY2VzfGVufDB8fDB8fHww"
                            alt="Master of Medical Sciences">
                        <div class="course-info">
                            <h3>Advance diploma in Medical Sciences Leading to Master of Medical Sciences</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Medical Sciences Master's Program</h3>
                            <p>Focus on medical research and clinical applications in healthcare.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1673953509975-576678fa6710?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bnVyc2V8ZW58MHx8MHx8fDA%3D"
                            alt="Master in Nursing">
                        <div class="course-info">
                            <h3>Advance diploma in Nursing Leading to Master in Nursing</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Nursing Master's Program</h3>
                            <p>Develop advanced nursing practice skills and leadership abilities.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1523299174285-a59d80640155?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cGhhcm1hY2V1dGljYWx8ZW58MHx8MHx8fDA%3D"
                            alt="Master of Pharmacy">
                        <div class="course-info">
                            <h3>Advance diploma in Pharmacy Leading to Master of Pharmacy</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Pharmacy Master's Program</h3>
                            <p>Explore pharmaceutical sciences and drug development.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1582719366794-4d27cd0a34a0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGJpb3RlY2hub2xvZ3l8ZW58MHx8MHx8fDA%3D"
                            alt="Master of Science in Biotechnology">
                        <div class="course-info">
                            <h3>Advance diploma in Biotechnology Leading to Master of Science in Biotechnology</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Biotechnology Master's Program</h3>
                            <p>Study biotechnological applications in various fields.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1581090124355-6c1376cf3047?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cGh5c2lvdGhlcmFweXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of Physiotherapy">
                        <div class="course-info">
                            <h3>Advance diploma in Physiotherapy Leading to Master of Physiotherapy</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Physiotherapy Master's Program</h3>
                            <p>Gain advanced skills in rehabilitation and physical therapy.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1609223500982-c76323413944?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dHJhZGl0aW9uYWwlMjBtZWRpY2luZXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of Traditional Chinese Medicine">
                        <div class="course-info">
                            <h3>Advance diploma in Chinese Medicine Leading to Master of Traditional Chinese Medicine</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Traditional Chinese Medicine Master's Program</h3>
                            <p>Learn holistic healing practices and theories in traditional Chinese medicine.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Master of Agriculture">
                        <div class="course-info">
                            <h3>Advance diploma in Agriculture Leading to Master of Agriculture</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Agriculture Master's Program</h3>
                            <p>Explore modern agricultural practices and technologies.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://media.springernature.com/lw685/springer-static/image/art%3A10.1007%2Fs00394-020-02241-0/MediaObjects/394_2020_2241_Fig2_HTML.png"
                            alt="Master of Science in Nutrition">
                        <div class="course-info">
                            <h3>Advance diploma in Nutrition Leading to Master of Science in Nutrition</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Nutrition Master's Program</h3>
                            <p>Study nutrition science and its impact on health.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://images.unsplash.com/photo-1639373285393-47516537cdd5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d2F0ZXIlMjByZXNvdXJjZXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Master of Water Resource Management">
                        <div class="course-info">
                            <h3>Advance diploma in Water Resource Management Leading to Master of Water Resource Management</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Water Resource Management Master's Program</h3>
                            <p>Focus on sustainable water management practices.</p>
                            <a href="#" class="course-link">View Course</a>
                        </div>
                    </div>
                    <div class="course-card" data-category="masters"
                        data-duration="2 Years"
                        data-eligibility="High School Diploma or Equivalent"
                        data-curriculum='["Introduction to Software Engineering", "Advanced Programming", "Artificial Intelligence", "Cyber Security", "Project Management"]'>
                        <img src="https://plus.unsplash.com/premium_photo-1661335257817-4552acab9656?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZW5naW5lZXJpbmd8ZW58MHx8MHx8fDA%3D"
                            alt="Master of Engineering">
                        <div class="course-info">
                            <h3>Advance diploma in Engineering Leading to Master of Engineering</h3>
                            <p class="course-specializations">Specializations: Curriculum Development, Educational Leadership, Special Education</p>
                            <hr>
                            <span class="course-type">Master's Program</span>
                            <span class="course-level">Advanced Level</span>
                        </div>
                        <div class="course-hover-details">
                            <h3>Engineering Master's Program</h3>
                            <p>Study advanced engineering principles and applications.</p>
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
                            <div class="mini-cards" id="miniCards" style="display: none;">
                                <div class="card-header">Business Management Programs</div>
                                <div class="card-content">
                                    Our business management programs are designed to equip you with the skills to succeed in various career paths. Whether you're just starting or looking to advance, our qualifications provide the knowledge you need to reach your professional goals.<br><br>

                                    The LCPD Business Management portfolio is tailored to develop the competencies required for a successful management career, both now and in the future. Starting from entry levels (3 or 4), you can progress to Level 6, where you’ll refine the strategic thinking necessary for senior-level roles.<br><br>

                                    Entrepreneurship is a core focus of our programs, offering a key advantage as employers increasingly seek individuals with entrepreneurial capabilities. In today’s evolving job market, having the skills to start your own business is invaluable.<br><br>

                                    All our full Diplomas carry 120 credits, aligning with the stages of a Bachelor's degree and providing excellent pathways for university progression.
                                </div>
                                <div class="mini-card">
                                    <h3>LCPD Level 3 Certificate in Business Essentials</h3>
                                    <p>Units: 1<br>Equivalent to A-level learning, this course covers essential business knowledge for success.</p>
                                    <a href="#" class="find-out-more">Find out more</a>
                                </div>

                                <div class="mini-card">
                                    <h3>LCPD Level 4 Foundation Diploma in Business Management</h3>
                                    <p>Units: 4<br>Comparable to the first year of a Bachelor's degree, this shorter diploma offers a solid foundation in core business management areas.</p>
                                    <a href="#" class="find-out-more">Find out more</a>
                                </div>

                                <div class="mini-card">
                                    <h3>LCPD Level 4 Diploma in Business Management</h3>
                                    <p>Units: 8<br>Also equivalent to the first year of a Bachelor's degree, this comprehensive qualification offers a strong grounding in business management and a platform for higher academic progression.</p>
                                    <a href="#" class="find-out-more">Find out more</a>
                                </div>

                                <div class="mini-card">
                                    <h3>LCPD Level 5 Diploma in Business Management</h3>
                                    <p>Units: 6<br>Equivalent to the second year of a Bachelor's degree, this diploma enhances your strategic understanding of business management principles and their practical application.</p>
                                    <a href="#" class="find-out-more">Find out more</a>
                                </div>

                                <div class="mini-card">
                                    <h3>LCPD Level 6 Diploma in Business Management</h3>
                                    <p>Units: 6<br>Equivalent to the final year of a Bachelor's degree, this qualification enhances your theoretical knowledge and equips you with the strategic skills needed to thrive in a leadership role within business management.</p>
                                    <a href="#" class="find-out-more">Find out more</a>
                                </div>
                            </div>

                            <!-- Enroll Now Button -->
                            <a href="signup.php" class="course-link">Enroll Now</a>
                            <button id="toggleQualificationsBtn" style="display:none;">Show/Hide Qualifications</button>
                        </div>
                    </div>
                </div>

                <!-- Overlay -->
                <div id="sidebar-overlay" class="sidebar-overlay"></div>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelect = document.getElementById('filter');
            const searchInput = document.getElementById('search-input');
            const searchBtn = document.getElementById('search-btn');
            const courseCards = document.querySelectorAll('.course-card');
            const toggleButtons = document.querySelectorAll('.toggle-button');

            // Toggle Menu Functionality
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    toggleButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    filterCourses();
                });
            });

            filterSelect.addEventListener('change', filterCourses);
            searchBtn.addEventListener('click', filterCourses);

            function filterCourses() {
                const selectedCategory = document.querySelector('.toggle-button.active')?.getAttribute(
                    'data-category') || 'all';
                const filterValue = filterSelect.value.toLowerCase();
                const searchValue = searchInput.value.toLowerCase();

                courseCards.forEach(card => {
                    const courseCategory = card.getAttribute('data-category').toLowerCase();
                    const courseLevel = card.querySelector('.course-level').textContent.toLowerCase();
                    const courseTitle = card.querySelector('h3').textContent.toLowerCase();

                    const isCategoryMatch = selectedCategory === 'all' || courseCategory ===
                        selectedCategory;
                    const isLevelMatch = filterValue === 'all' || courseLevel.includes(filterValue);
                    const isSearchMatch = courseTitle.includes(searchValue);

                    if (isCategoryMatch && isLevelMatch && isSearchMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
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
            const toggleButton = document.getElementById('toggleQualificationsBtn');
            const miniCards = document.getElementById('miniCards');

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

            // Check if the course title matches the specific title
            checkCourseTitle(course.title);

            // Show the sidebar and overlay
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        // Function to check course title and toggle qualifications button visibility
        function checkCourseTitle(courseTitle) {
            const toggleButton = document.getElementById('toggleQualificationsBtn');
            if (courseTitle === "Diploma/Advanced Diploma in Business Management") {
                toggleButton.style.display = 'block'; // Show the button
            } else {
                toggleButton.style.display = 'none'; // Hide the button
            }
        }

        // Add event listener for the toggle button
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('toggleQualificationsBtn');
            const miniCards = document.getElementById('miniCards');

            // Ensure the miniCards container is hidden initially
            miniCards.style.display = 'none';

            // Toggle visibility of the miniCards when the button is clicked
            toggleButton.addEventListener('click', function() {
                if (miniCards.style.display === 'none') {
                    miniCards.style.display = 'block';
                    toggleButton.innerText = 'Hide Qualifications'; // Update button text
                } else {
                    miniCards.style.display = 'none';
                    toggleButton.innerText = 'Show Qualifications'; // Reset button text
                }
            });

            // Add event listeners to course cards
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
                        eligibility: card.getAttribute('data-eligibility'),
                        curriculum: JSON.parse(card.getAttribute('data-curriculum')),
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

            }

            const courseDetails = document.getElementById('course-details');
            const backButton = document.querySelector('.back-button');
            const registrationForm = document.getElementById('registration-form');
            const registeredCourseTitle = document.getElementById('registered-course-title');

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

                // Log the data
                console.log('Registration Data:', data);

                // TODO: Implement actual form submission logic (e.g., AJAX request)

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