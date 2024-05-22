<template>
  <div id="app">
    <NavigationBar />
    <PhotoCarousel /> <!-- Added Carousel Component -->
    <HeroSection />
    <ServiceOptions />
    <Gallery />
    <ContactForm />
    <SiteFooter />
  </div>
</template>

<script>
import NavigationBar from './components/NavigationBar.vue';
import PhotoCarousel from './components/PhotoCarousel.vue'; // Make sure to import the Carousel Component
import HeroSection from './components/HeroSection.vue';
import ServiceOptions from './components/ServiceOptions.vue';
import Gallery from './components/ImageGallery.vue';
import ContactForm from './components/ContactForm.vue';
import SiteFooter from './components/SiteFooter.vue';

export default {
  name: 'App',
  components: {
    NavigationBar,
    PhotoCarousel, // Register the Carousel Component
    HeroSection,
    ServiceOptions,
    Gallery,
    ContactForm,
    SiteFooter
  }
}
</script>

<style>
@import './assets/styles/main.css';
</style>
