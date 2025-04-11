const sections = document.querySelectorAll("section");

const observer = new IntersectionObserver(
    entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("reveal");
            } else {
                // Remove the reveal class to reset animation when out of view
                entry.target.classList.remove("reveal");
            }
        });
    },
    { threshold: 0.2 }
);

sections.forEach(section => observer.observe(section));