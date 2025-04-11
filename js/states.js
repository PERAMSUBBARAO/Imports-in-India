//document.addEventListener("DOMContentLoaded", function () {
  //  const cards = document.querySelectorAll(".card");

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
          // Get the state name from the card
          const stateName = this.querySelector('.semi-circle').textContent;
          // Add console log for debugging
          console.log(`Clicked on state: ${stateName}, index: ${index}`);
          // Navigate to state details page with the state ID (index + 1)
          window.location.href = `state_detail.php?id=${index + 1}`;
      });
  });
});