<template>
    <div id="tragos" class="drink-menu">
      <div v-for="drink in drinks" :key="drink.id" class="drink-item">
        <img :src="drink.image" :alt="drink.name" class="drink-image" />
        <h2 class="drink-name">{{ drink.name }}</h2>
        <p class="drink-description">{{ drink.description }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        drinks: [
          {
            id: 1,
            name: 'Drink 1',
            description: 'This is drink 1',
            image: 'https://example.com/drink1.jpg',
          },
          // More drinks here
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .drink-menu {
  box-shadow: inset 0 20px 40px -10px #000000; /* Add an inset shadow at the top */
  width: 100vw; /* Full viewport width */
  height: 100vh; /* Full viewport height */
  display: flex; /* Use flexbox for layout */
  flex-wrap: wrap; /* Allow the items to wrap as needed */
  justify-content: center; /* Center items along the line */
  align-items: center; /* Center items along the column */
  position: relative; /* Set position to relative to contain the pseudo-element */
  overflow: hidden; /* Hide the parts of the pseudo-element that are outside the container */
}

.drink-menu::before {
  content: ""; /* Create a pseudo-element */
  position: absolute; /* Position it absolutely within the .drink-menu container */
  top: 0; /* Align it to the top of the container */
  left: 0; /* Align it to the left of the container */
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  background: 
    linear-gradient(to bottom, #000000 0%, transparent 20%, transparent 80%, #000000 100%), 
    radial-gradient(circle at center, transparent, #000000 70%), 
    url('~@/assets/images/background.jpeg');
  background-size: cover, cover, cover; /* Resize the gradients and the background image to cover the entire container */
  background-repeat: no-repeat; /* Do not repeat the background image */
  background-position: center; /* Center the background image */
  background-attachment: fixed; /* Make the background image position fixed with respect to the viewport */
  z-index: -1; /* Place it behind the items */
}
  
  .drink-menu::after {
    content: ""; /* Create another pseudo-element */
    position: absolute; /* Position it absolutely within the .drink-menu container */
    top: 0; /* Align it to the top of the container */
    left: 0; /* Align it to the left of the container */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
    z-index: -1; /* Place it behind the items, but in front of the ::before pseudo-element */
  }
  </style>