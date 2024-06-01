<template>
    <div id="faq" class="faq-section">
      <h2>FAQ</h2>
      <div v-for="(item, index) in faqItems" :key="index" class="faq-item">
        <h3>{{ item.question }}</h3>
        <p>{{ item.answer }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        faqItems: [
          {
            question: 'Question 1',
            answer: 'Answer 1',
          },
          {
            question: 'Question 2',
            answer: 'Answer 2',
          },
          // Add more items as needed
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .faq-section {
    /* Add styles for the FAQ section */
  }
  
  .faq-item {
    /* Add styles for each FAQ item */
  }
  </style>