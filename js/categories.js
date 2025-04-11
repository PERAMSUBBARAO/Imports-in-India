//document.addEventListener("DOMContentLoaded", function () {
   // const cards = document.querySelectorAll(".card");

    //cards.forEach((card) => {
      //  card.addEventListener("click", function () {
        //    alert("You clicked on " + this.querySelector(".semi-circle").innerText);
        //});
    //});
//});
document.addEventListener('DOMContentLoaded', function() {
    // Get all cards
    const cards = document.querySelectorAll('.card');
    
    // Add click event listeners to each card
    cards.forEach((card, index) => {
        card.addEventListener('click', function() {
            // Get the category name from the card
            const categoryName = this.querySelector('.semi-circle').textContent;
            
            // Add console log for debugging
            console.log(`Clicked on category: ${categoryName}, index: ${index}`);
            
            // Navigate to category details page with the category ID (index + 1)
            window.location.href = `categories_detail.php?id=${index + 1}`;
        });
    });
});