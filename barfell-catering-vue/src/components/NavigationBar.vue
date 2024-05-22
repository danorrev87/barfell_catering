<template>
    <nav :class="{ 'transparent': isTransparent, 'solid': !isTransparent }" class="navigation-bar">
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#barras">Nuestras Barras</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'NavigationBar',
    data() {
        return {
            isTransparent: true,
        };
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll() {
            this.isTransparent = window.scrollY < 50;
        }
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>

<style scoped>
.navigation-bar {
  position: fixed;
  top: 0;
  left: 0; /* Ensure it starts from the very left */
  right: 0; /* Ensure it extends to the very right */
  width: 100%; /* Set width to 100% */
  height: 60px; /* Default height */
  transition: background-color 0.5s ease, box-shadow 0.5s ease, height 0.5s ease; /* Smooth transitions */
  z-index: 1000;
  font-family: 'Roboto', sans-serif; /* Ensuring Roboto font is applied */
}

.transparent {
  background-color: transparent;
  box-shadow: none;
  height: 80px; /* Larger height when transparent */
  color: white; /* Links are white when transparent */
}

.solid {
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  height: 60px; /* Smaller height when solid */
  color: #333; /* Links are dark grey when solid */
}

.navigation-bar ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: flex-end; /* Align items to the right */
  align-items: center; /* Center items vertically */
  height: 100%;
}

.navigation-bar li {
  margin-right: 10px; /* Adding right margin to each link */
}

.navigation-bar a {
  text-decoration: none;
  padding: 10px; /* Adding padding around the links */
  transition: color 0.3s ease; /* Smooth color transition */
  font-size: 13px;
}

.transparent a {
  color: white; /* Links are white when navbar is transparent */
}

.solid a {
  color: #333; /* Links are dark grey when navbar is solid */
}

.navigation-bar a:hover {
  color: #000; /* Hover effect for links */
}

</style>
