<template>
  <section id="nosotros" class="hero-section">
    <video autoplay loop muted playsinline class="hero-video" alt="Video of our mobile bar at various events">
      <source src="@/assets/barfell_video.mp4" type="video/mp4">
    </video>
    <div class="overlay"></div>
    <div class="content">
      <h1>¡Transforma tu evento con nuestra barra móvil única!</h1>
      <p v-if="isSmallScreen">BARFELLCATERING: barras móviles para eventos. Calidad, innovación y precios accesibles.</p>
      <p v-else>BARFELLCATERING ofrece barras móviles para eventos sociales y empresariales,
        incluyendo cumpleaños, fiestas de 15, recepciones, despedidas, casamientos, lanzamientos de productos y eventos
        corporativos.
        Nos destacamos por nuestro servicio de alta calidad, diseño innovador y precios accesibles, asegurando una
        experiencia única y sin preocupaciones.</p>
    </div>
  </section>
</template>

<script>
export default {
  name: 'HeroSection',
  data() {
    return {
      isSmallScreen: false,
    };
  },
  mounted() {
    this.isSmallScreen = window.matchMedia('(max-width: 768px)').matches;
  },
  metaInfo: {
    title: 'BARFELLCATERING - Barra móvil para eventos',
    meta: [
      { name: 'description', content: 'BARFELLCATERING ofrece barras móviles para eventos sociales y empresariales. Nos destacamos por nuestro servicio de alta calidad, diseño innovador y precios accesibles.' },
      { property: 'og:title', content: 'BARFELLCATERING - Barra móvil para eventos' },
      { property: 'og:description', content: 'BARFELLCATERING ofrece barras móviles para eventos sociales y empresariales. Nos destacamos por nuestro servicio de alta calidad, diseño innovador y precios accesibles.' },
      { property: 'og:type', content: 'website' }
    ]
  },
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
  width: 100%; /* use 100% of the screen width */
  height: 100vh;
  padding-top: 50px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  font-size: 2vw; /* adjust this value as needed */
}

@media screen and (max-width: 768px) {
  .hero-section {
    font-size: 4vw; /* adjust this value as needed */
  }
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.05));
  z-index: 1;
}

.content {
  position: relative;
  z-index: 2;
  color: black;
}

.hero-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}

.hero-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), white);
  z-index: 0;
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

p {
  font-size: 16px;
  /* adjust this value as needed */
  margin: 0 20px 20px;
  /* add bottom margin */
}

/* Styles for screens with a maximum width of 768px */
@media screen and (max-width: 768px) {
  p {
    font-size: 8px;
    /* reduce the font size */
    margin: 0 10px 30px;
    /* increase bottom margin */
  }
}

/* Styles for screens with a maximum width of 480px */
@media screen and (max-width: 480px) {
  p {
    font-size: 6px;
    /* further reduce the font size */
    margin: 0 5px 40px;
    /* further increase bottom margin */
  }
}
</style>