<template>
  <div id="app">
    <transition name="fade">
      <LoadingScreen v-if="isLoading"></LoadingScreen>
    </transition>
    <LoadingScreen v-if="isLoading"></LoadingScreen>
    <NavigationBar v-else />
    <ImageHeader />
    <AboutUS />
    <div class="divider"></div>
    <ServiceOptions />
    <DrinkMenu />
    <Gallery />
    <FaqSection />
    <ContactForm />
  </div>
</template>

<script>
import LoadingScreen from './components/LoadingScreen.vue';
import NavigationBar from './components/NavigationBar.vue';
import ImageHeader from './components/ImageHeader.vue';
import AboutUS from './components/AboutUs.vue';
import ServiceOptions from './components/ServiceOptions.vue';
import DrinkMenu from './components/DrinkMenu.vue';
import Gallery from './components/ImageGallery.vue';
import FaqSection from './components/FaqSection.vue';
import ContactForm from './components/ContactForm.vue';

export default {
  name: 'App',
  components: {
    LoadingScreen,
    NavigationBar,
    ImageHeader,
    AboutUS,
    ServiceOptions,
    DrinkMenu,
    Gallery,
    FaqSection,
    ContactForm,
  },
  data() {
    return {
      isLoading: true,
    };
  },
  mounted() {
    setTimeout(() => {
      this.isLoading = false;
    }, 3000); // Adjust the delay as needed
  },
}
</script>

<style>
@import './assets/styles/main.css';

.divider {
  height: 200px; /* Adjust to desired height */
  background: linear-gradient(to left bottom, #ffffff 50%, transparent 0);
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
