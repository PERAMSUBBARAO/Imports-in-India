document.addEventListener("DOMContentLoaded", function () {
    // Get the video element
    const video = document.getElementById("video-background");
  
    // Set the video to restart from 3 seconds after it ends
    video.addEventListener("ended", function () {
      video.currentTime = 3; // Start from 3 seconds
      video.play(); // Play again from 3 seconds
    });
  
    // Select all cards
    const cards = document.querySelectorAll(".card");
  
    // Create Intersection Observer for animations
    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("active");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );
  
    // Observe each card
    cards.forEach((card) => observer.observe(card));
  });
  