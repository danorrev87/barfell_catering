<template>
  <!-- ... -->
  <div id="galeria" class="image-gallery">
    <h2 class="section-title">Galería</h2>
    <div class="widget-wrapper">
      <iframe ref="widget" src="//lightwidget.com/widgets/19c6153b572e5fbcaeceaa3b0e9399f0.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div>
    <!-- ... -->
  </div>
  <!-- ... -->
</template>

<script>
export default {
  // ...
  mounted() {
    this.loadWidgetScript();
  },
  methods: {
    loadWidgetScript() {
      const script = document.createElement('script');
      script.src = 'https://cdn.lightwidget.com/widgets/lightwidget.js';
      script.onload = () => {
        window.LightWidget && window.LightWidget.init();
      };
      this.$refs.widget.parentNode.insertBefore(script, this.$refs.widget);
    },
  },
  // ...
};
</script>

<style scoped>
.widget-wrapper {
  width: 50%; /* Adjust the value as needed */
  margin: 0 auto; /* Centers the widget */
}

@media (max-width: 768px) {
  .widget-wrapper {
    width: 90%; /* Adjust the value as needed */
  }
}

.lightwidget-widget {
  width: 100%;
  border: 0;
  overflow: hidden;
}
</style>