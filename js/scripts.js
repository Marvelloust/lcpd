document.addEventListener("DOMContentLoaded", function () {
    const headerTitle = document.getElementById('header-title');
    const headerSubtitle = document.getElementById('header-subtitle');
    const headerImage = document.querySelector('.header-image');

    const backgrounds = [
        "url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd-2zFAVn0uZeY9Ra4_SX65fUYrkk_diXOLg&s')",
        "url('https://lcpd.net/assets/img/about.jpg')",
        "url('https://plus.unsplash.com/premium_photo-1682787494977-d013bb5a8773?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y291cnNlfGVufDB8fDB8fHww')",
        "url('https://images.unsplash.com/photo-1478104718532-efe04cc3ff7f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fGNvdXJzZXxlbnwwfHwwfHx8MA%3D%3D')",
        "url('https://images.unsplash.com/photo-1543269865-cbf427effbad?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Z3JvdXAlMjBkaXNjdXNzaW9ufGVufDB8fDB8fHww')"
    ];

    const headerTexts = {
        homepage: {
            title: "Start Your Journey to Success",
            subtitle: "Empowering Your Future with Our Comprehensive Training Programs"
        },
        about: {
            title: "About Us",
            subtitle: "Innovating Education for Every Aspiring Professional"
        },
        courses: {
            title: "Our Courses",
            subtitle: "Explore a Wide Range of Learning Opportunities"
        },
        placement: {
            title: "Career Achievements",
            subtitle: "Celebrate the Success Stories of Our Graduates"
        },
        partnerships: {
            title: "Our Partnerships",
            subtitle: "Working with Leading Organizations for Your Career Growth"
        },
        contact: {
            title: "Contact Us",
            subtitle: "We're Here to Support Your Educational Journey"
        }
    };

    let currentPage = document.body.dataset.page || "homepage";
    let currentBackgroundIndex = 0;
    let intervalId;

    // Set initial background image and header text
    function initializeHeader() {
        headerImage.style.backgroundImage = backgrounds[currentBackgroundIndex];

        if (headerTexts[currentPage]) {
            typeWriter(headerTexts[currentPage].title, headerTitle);
            headerSubtitle.textContent = headerTexts[currentPage].subtitle;
        } else {
            headerTitle.textContent = "Welcome";
            headerSubtitle.textContent = "Explore our site";
        }
    }

    // Typing effect for title
    function typeWriter(text, element, delay = 0) {
        element.textContent = "";
        let index = 0;
        const interval = setInterval(() => {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
            } else {
                clearInterval(interval);
            }
        }, 100);
    }

    // Function to update background image and text
    function updateHeader() {
        currentBackgroundIndex = (currentBackgroundIndex + 1) % backgrounds.length;
        headerImage.style.backgroundImage = backgrounds[currentBackgroundIndex];

        if (headerTexts[currentPage]) {
            typeWriter(headerTexts[currentPage].title, headerTitle);
            headerSubtitle.textContent = headerTexts[currentPage].subtitle;
        } else {
            headerTitle.textContent = "Welcome";
            headerSubtitle.textContent = "Explore our site";
        }
    }

    // Start the header setup
    initializeHeader();

    // Update header every 10 seconds
    intervalId = setInterval(updateHeader, 10000);

    // Ensure the interval and text resets if the page is hidden or left
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            clearInterval(intervalId);
        } else {
            initializeHeader();
            intervalId = setInterval(updateHeader, 10000);
        }
    });

    // Ensure the interval is cleared if the page is left
    window.addEventListener('beforeunload', function () {
        clearInterval(intervalId);
    });
});
