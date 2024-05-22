<template>
    <form @submit.prevent="submitForm" class="contact-form">
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
      submitForm() {
        console.log('Submitting:', this.contact);
        // Add logic to process or send form data
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
  