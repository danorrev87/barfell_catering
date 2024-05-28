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
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  .drink-item {
    width: calc(33.33% - 20px);
    margin-bottom: 20px;
  }
  
  .drink-image {
    width: 100%;
    height: auto;
  }
  </style>