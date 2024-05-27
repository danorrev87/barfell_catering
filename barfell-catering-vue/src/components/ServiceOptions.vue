<template>
  <section id="servicios" class="service-options">
    <h2>Nuestros servicios incluyen</h2>
    <div class="services">
      <div class="service" v-for="service in services" :key="service.id">
        <div class="service-icon-container">
          <img :src="service.icon" alt="Service Icon" :class="{'service-icon': true, 'truck-icon': service.id === 2}">
        </div>
        <p>{{ service.description }}</p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ServiceOptions',
  data() {
    return {
      services: [
        { id: 1, icon: require('@/assets/cocktail.png'), description: 'Cristalería' },
        { id: 2, icon: require('@/assets/truck.png'), description: 'Equipamiento y Traslado' },
        { id: 3, icon: require('@/assets/clock.png'), description: '6 hs de Servicio' },
        { id: 4, icon: require('@/assets/avatar.png'), description: 'Cantidad de barmans apropiada' },
      ]
    }
  }
}
</script>

<style scoped>
.service-options {
  padding-top: 50px; /* adjust this value as needed */
  width: 100vw;
  height: 100vh;
  overflow: auto;
}

.services {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 80px;
}

.service {
  flex: 0 0 45%; /* reduce the base size to 45% of the container */
  box-sizing: border-box; /* include padding and border in the element's total width and height */
  margin: 1px;
  margin-top: 30px; /* reduce the top margin */
  color: white;
  text-align: center;
  align-items: center;
  display: flex;
  flex-direction: column;
}

.service-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.service-options h2 {
  margin-top: 100px; /* increase this value */
  margin-bottom: 60px; /* adjust this value as needed */
  padding-left: 20px;
  position: relative;
  font-size: 40px;
  z-index: 2;
  color: white;
  text-align: center; /* add this line */
}

.navbar {
  position: relative;
  z-index: 1;
}

.service-icon-container {
  width: 100px;
  /* adjust this value as needed */
  margin-bottom: 10px;
  margin-top: 80;
  height: 100px;
  overflow: hidden;
  /* this makes the content of the div stay within the circular shape */
}

.service-icon {
  width: 100%;
  height: auto;
}

.truck-icon {
  position: relative;
  left: -5px; /* adjust this value as needed */
  top: 10px; /* adjust this value as needed */
}

.service p {
  margin-top: 10px;
  /* adjust this value as needed */
}

.service h3 {
  color: #333;
}

.service-options {
  background-image: require('@/assets/images/background2.jpeg');
}
</style>