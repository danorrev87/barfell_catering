<template>
  <nav :class="{ 'transparent': isTransparent, 'solid': !isTransparent }" class="navigation-bar">
    <img src="@/assets/transparent_logo.png" alt="Logo" class="logo" />
    <button class="hamburger" @click="isNavOpen = !isNavOpen"
      :class="{ 'white-lines': isTransparent, 'black-lines': !isTransparent }">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <transition name="dropdown">
      <div v-if="isNavOpen" class="dropdown">
        <ul>
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#nosotros">Nosotros</a></li>
          <li><a href="#servicios">Servicios</a></li>
          <li><a href="#barras">Nuestras Barras</a></li>
          <li><a href="#galeria">Galería</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </div>
    </transition>
  </nav>
</template>

<script>
export default {
  name: 'NavigationBar',
  data() {
    return {
      isTransparent: true,
      isNavOpen: false,
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
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
      this.isNavOpen = window.innerWidth >= 769;
    }
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
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
  /* Ensure it starts from the very left */
  right: 0;
  /* Ensure it extends to the very right */
  width: 100%;
  /* Set width to 100% */
  height: 60px;
  /* Default height */
  transition: background-color 0.5s ease, box-shadow 0.5s ease, height 0.5s ease;
  /* Smooth transitions */
  z-index: 1000;
  display: flex;
  align-items: center;
}

.navigation-bar ul {
  display: flex;
  justify-content: flex-end;
  width: 100%;
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
}

.navigation-bar a:hover {
  color: #FF00FF;
  /* Hover effect for links */
}

.transparent {
  background-color: transparent;
  box-shadow: none;
  height: 80px;
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
  height: 90px;
  margin-right: 60px;
  margin-left: 40px;
}

/* Styles for screens with a maximum width of 768px */
@media screen and (max-width: 768px) {
  .logo {
    height: 60px;
    /* adjust this value as needed */
    margin-left: 10px;
    /* adjust this value as needed */
  }
}

nav {
  display: flex;
  justify-content: space-around;
}

router-link {
  text-decoration: none;
  color: black;
}

.nav-container {
  position: absolute;
  width: 100%;
  background: white;
  /* or any color you prefer */
}

.dropdown {
  position: absolute;
  width: 100%;
  left: 0;
  top: 100%;
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
