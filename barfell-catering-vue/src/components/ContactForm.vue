<template>
  <form @submit.prevent="submitForm" class="contact-form" id="presupuesto">
    <div class="form-header">
      <button type="button">Consultas y comentarios</button>
      <button type="button">Pedí tu presupuesto</button>
    </div>
    <h2>Contacta con Nosotros</h2>
    <label for="name">Nombre:</label>
    <input type="text" id="name" v-model="contact.name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" v-model="contact.email" required>

    <label for="message">Mensaje:</label>
    <textarea id="message" v-model="contact.message" required></textarea>

    <button type="submit">Enviar</button>
  </form>
</template>

<script>
export default {
  name: 'ContactForm',
  data() {
    return {
      contact: {
        name: '',
        email: '',
        message: ''
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

<style scoped>
.contact-form {
  display: flex;
  flex-direction: column;
  max-width: 500px;
  margin: auto;
}

.contact-form label {
  margin-bottom: 5px;
}

.contact-form input,
.contact-form textarea {
  margin-bottom: 10px;
  padding: 8px;
}

.contact-form button {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

.contact-form button:hover {
  background-color: #45a049;
}
</style>