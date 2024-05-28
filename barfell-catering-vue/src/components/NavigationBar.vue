<template>
  <div>
    <nav :class="{ 'transparent': isTransparent, 'solid': !isTransparent }" class="navigation-bar">
      <img class="logo" :src="isTransparent ? logoTransparent : logoSolid" alt="Logo">
      <button class="hamburger" @click="isNavOpen = !isNavOpen"
        :class="{ 'white-lines': isTransparent, 'black-lines': !isTransparent }">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-links navigation-bar-links">
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#nosotros">Nosotros</a></li>
        <li><a href="#servicios">Servicios</a></li>
        <li><a href="#tragos">Carta de tragos</a></li>
        <li><a href="#galeria">Galería</a></li>
        <li><a href="#presupuesto">Pedí tu presupuesto</a></li>
      </ul>
    </nav>
    <transition name="dropdown">
      <div v-show="isNavOpen" class="dropdown">
        <ul class="dropdown-links">
          <li><a href="#inicio" @click="isNavOpen = false">Inicio</a></li>
          <li><a href="#nosotros" @click="isNavOpen = false">Nosotros</a></li>
          <li><a href="#servicios" @click="isNavOpen = false">Servicios</a></li>
          <li><a href="#tragos" @click="isNavOpen = false">Carta de tragos</a></li>
          <li><a href="#galeria" @click="isNavOpen = false">Galería</a></li>
          <li><a href="#presupuesto" @click="isNavOpen = false">Pedí tu presupuesto</a></li>
        </ul>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'NavigationBar',
  data() {
    return {
      isTransparent: true,
      isNavOpen: false,
      logoTransparent: require('@/assets/transparent_logo.png'),
      logoSolid: require('@/assets/solid_logo.png'),
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    window.addEventListener('resize', this.handleResize);
    this.handleScroll();
    this.handleResize();
  },
  methods: {
    handleScroll() {
      if (window.innerWidth >= 769) {
        this.isTransparent = window.scrollY < 50;
      } else {
        this.isTransparent = false;
      }
    },
    handleResize() {
      if (window.innerWidth >= 769) {
        this.isNavOpen = false;
      }
    },
    toggleNav() {
      this.isNavOpen = !this.isNavOpen;
    }
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
    window.removeEventListener('resize', this.handleResize);
  }
}
</script>

<style scoped>
.hamburger {
  display: block;
  cursor: pointer;
  background: transparent;
  border: none;
}

@media (min-width: 769px) {
  .hamburger {
    display: none;
  }
}

@media (max-width: 768px) {
  .hamburger {
    display: block;
  }

  ul {
    display: none;
  }

  .nav-links {
    display: none;
  }
}

.hamburger span {
  display: block;
  width: 33px;
  height: 4px;
  margin: 5px auto;
  background-color: #333;
}

.white-lines span {
  background-color: white;
}

.black-lines span {
  background-color: black;
}

.navigation-bar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 60px;
  z-index: 1000;
  transition: background-color 0.5s ease;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.navigation-bar ul {
  display: flex;
  justify-content: flex-end;
  width: auto;
  /* Updated */
  align-items: center;
}

.navigation-bar li {
  margin-right: 15px;
}

.navigation-bar a {
  text-decoration: none;
  padding: 10px;
  /* Adding padding around the links */
  transition: color 0.3s ease;
  /* Smooth color transition */
  font-size: 14px;
}

@media (max-width: 768px) {
  .navigation-bar {
    background: #fff;
    /* change to the color you want */
  }

  .navigation-bar>.navigation-bar-links {
    display: none;
  }
}

.navigation-bar a:hover {
  color: #FF00FF;
  /* Hover effect for links */
}

.transparent {
  background-color: transparent;
  box-shadow: none;
  height: 60px;
  /* Larger height when transparent */
  color: white;
  /* Links are white when transparent */
}

.solid {
  background-color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  height: 60px;
  /* Smaller height when solid */
  color: #333;
  /* Links are dark grey when solid */
}

.transparent a {
  color: white;
  /* Links are white when navbar is transparent */
}

.solid a {
  color: #333;
  /* Links are dark grey when navbar is solid */
}

.logo {
  height: 60px;
  /* Reduced size */
  margin-right: auto;
  /* Push the logo to the left */
  margin-left: 20px;
  /* Adjust as needed */
}

/* Styles for screens with a maximum width of 768px */
@media screen and (max-width: 768px) {
  .logo {
    height: 40px;
    /* Reduced size for smaller screens */
    margin-left: 10px;
    /* Adjust as needed */
  }
}

nav {
  display: flex;
  flex-wrap: nowrap;
}

router-link {
  text-decoration: none;
  color: black;
}

.nav-container {
  position: fixed;
  width: 100%;
  background: white;
  display: flex;
  /* Add this line */
  justify-content: space-between;
  /* Add this line */
}

.dropdown {
  position: fixed;
  top: 60px;
  right: 0;
  left: 0;
  background: white;
  z-index: 999;
}

.dropdown-links {
  list-style-type: none;
  padding-left: 0; /* Remove padding on the left */
  text-align: left; /* Align text to the left */
}

.dropdown-links li {
  border-bottom: 1px solid #ddd; /* Add a border to the bottom of each item */
  height: 60px; /* Set the height to match the navbar height */
  line-height: 60px; /* Vertically center the text */
}

.dropdown-links li:last-child {
  border-bottom: none; /* Remove the border from the last item */
}

.dropdown-menu {
  position: absolute;
  /* Other styles */
}

.dropdown ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
}

.dropdown li {
  padding: 10px;
}

.dropdown a {
  text-decoration: none;
  color: black;
  display: block;
}

@media (min-width: 769px) {
  .dropdown ul {
    display: flex;
  }
}

@media (min-width: 769px) {
  .dropdown-links {
    display: none;
  }
}

@media (max-width: 768px) {
  .nav-links {
    display: none;
  }
}

.dropdown-enter-active {
  animation: slide-down .5s ease forwards;
}

.dropdown-leave-active {
  animation: slide-up .5s ease forwards;
}

@keyframes slide-down {
  0% {
    transform: translateY(-100%);
  }

  100% {
    transform: translateY(0);
  }
}

@keyframes slide-up {
  0% {
    transform: translateY(0);
  }

  100% {
    transform: translateY(-100%);
  }
}
</style>
