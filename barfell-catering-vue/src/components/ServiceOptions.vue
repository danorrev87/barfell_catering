<template>
    <section class="service-options">
      <h2>Nuestros Servicios</h2>
      <div class="services">
        <div class="service" v-for="service in services" :key="service.id">
          <h3>{{ service.title }}</h3>
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
          { id: 1, title: 'Boda', description: 'Servicio exclusivo para celebraciones de matrimonio.' },
          { id: 2, title: 'Cumpleaños', description: 'Celebra tu día especial con los mejores cócteles.' },
          { id: 3, title: 'Eventos Corporativos', description: 'Profesionalismo y elegancia en tus eventos corporativos.' }
        ]
      }
    }
  }
  </script>
  
  <style scoped>
  .service-options {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }
  
  .services {
    display: flex;
    justify-content: space-around;
    width: 100%;
  }
  
  .service {
    background: #f8f8f8;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  
  .service h3 {
    color: #333;
  }
  
  .service p {
    color: #666;
  }
  </style>
  