<template>
  <div class="loading">
    <img class="loading-gif" src="@/assets/loading.gif" alt="Loading..." />
  </div>
</template>

<script>
export default {
  name: 'LoadingScreen',
};
</script>

<style scoped>
.loading {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999; /* Add this line */
  pointer-events: auto; /* Add this line */
}

.loading-gif {
  width: 200px; /* Adjust as needed */
  height: auto;
}

/* Make the GIF smaller on devices with width less than 600px */
@media (max-width: 600px) {
  .loading-gif {
    width: 160px; /* Adjust as needed */
  }
}
</style>