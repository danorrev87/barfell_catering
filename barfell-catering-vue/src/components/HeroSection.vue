<template>
    <section class="hero-section">
      <h1>Welcome to BarFell Catering!</h1>
      <p>Experience the best mobile bar services for your events.</p>
      <button @click="learnMore">Learn More</button>
    </section>
  </template>
  
  <script>
  export default {
    name: 'HeroSection',
    methods: {
      learnMore() {
        // Logic to navigate to the 'About Us' section
        this.$router.push('/about');
      }
    }
  }
  </script>
  
  <style scoped>
  .hero-section {
    background-image: url('@/assets/hero-background.jpg');
    height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
  }
  
  .hero-section h1 {
    font-size: 48px;
  }
  
  .hero-section p {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .hero-section button {
    padding: 10px 20px;
    font-size: 20px;
    background-color: #004d99;
    color: white;
    border: none;
    cursor: pointer;
  }
  .hero-section button:hover {
    background-color: #003366;
  }
  </style>
  