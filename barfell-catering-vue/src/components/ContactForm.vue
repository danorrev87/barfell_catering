<template>
  <form @submit.prevent="submitForm" class="contact-form" id="presupuesto">
    <div class="form-header">
      <button type="button" @click="selectedForm = 'consultas'">Consultas y comentarios</button>
      <button type="button" @click="selectedForm = 'presupuesto'">Pedí tu presupuesto</button>
    </div>
    <h2>Contacta con Nosotros</h2>

    <!-- Fields for both "Consultas y comentarios" and "Pedí tu presupuesto" -->
    <label for="name">Nombre y Apellido:</label>
    <input type="text" id="name" v-model="contact.name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" v-model="contact.email" required>

    <label for="message">Mensaje:</label>
    <textarea id="message" v-model="contact.message" required></textarea>

    <div v-if="selectedForm === 'presupuesto'">
      <!-- Additional fields for "Pedí tu presupuesto" -->
      <label for="phone">Teléfono:</label>
      <input type="tel" id="phone" v-model="contact.phone" required>

      <label for="date">Fecha:</label>
      <input type="date" id="date" v-model="contact.date" required>

      <label for="eventType">Tipo de Evento:</label>
      <select id="eventType" v-model="contact.eventType" required>
        <!-- Add your event types here -->
        <option value="">Seleccione un tipo de evento</option>
        <option value="Boda">Boda</option>
        <option value="Cumpleaños">Cumpleaños</option>
        <option value="Fiesta de 15">Fiesta de 15</option>
        <option value="Empresarial">Empresarial</option>
        <option value="Otros">Otros</option>
      </select>

      <label for="guests">Número de Invitados:</label>
      <select id="guests" v-model="contact.guests" required>
        <option value="">Seleccione el número de invitados</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50+">50+</option>
        <option value="100+">100+</option>
      </select>
    </div>

    <button type="submit">Enviar</button>
  </form>
</template>

<script>
export default {
  name: 'ContactForm',
  data() {
    return {
      selectedForm: 'consultas', // Default selected form
      contact: {
        name: '',
        email: '',
        message: '',
        phone: '',
        date: '',
        eventType: '',
        guests: ''
      }
    }
  },
  methods: {
    async submitForm() {
      try {
        const response = await fetch('/send-email.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams(this.contact).toString(),
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        } else {
          // You can do something with the response here
          console.log(await response.text());
        }
      } catch (error) {
        console.error('There was a problem with the fetch operation: ', error);
      }
    }
  }
}
</script>