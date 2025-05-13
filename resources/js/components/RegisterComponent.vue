<template>
  <div class="form-container">
    <div class="form-card">
        <h1>Register</h1>
        <form @submit.prevent="handleRegister">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" v-model="first_name" placeholder="First Name" required />
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" v-model="last_name" placeholder="First Name" required />
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" v-model="username" placeholder="Username" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="email" placeholder="Email" required />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="password" placeholder="Password" required />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" v-model="passwordConfirmation" placeholder="Confirm Password" required />
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" v-model="phone_number" placeholder="Phone Number" required />
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" v-model="address" placeholder="Address" />
        </div>
        <button type="submit" class="btn-submit">Register</button>
        </form>
        <p>
        Already have an account?
        <span class="link-span"><router-link to="/">Login here</router-link></span> <!-- Login Link -->
        </p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      first_name: '',
      last_name: '',
      username: '',
      email: '',
      password: '',
      passwordConfirmation: '',
      phone_number: '',
      address: ''
    };
  },
  methods: {
    async handleRegister() {
      try {
        // Make API call to register the user
        const response = await axios.post('/register', {
          first_name: this.first_name,
          last_name: this.last_name,
          username: this.username,
          email: this.email,
          password: this.password,
          password_confirmation: this.passwordConfirmation, // For Laravel's password confirmation
          phone_number: this.phone_number,
          address: this.address,

        });

        if (response.data.status) {
          this.$router.push('/'); // Redirect to login page
        }
      } catch (error) {
        console.error('Registration failed:', response.data);
        alert('Failed to register. Please check your inputs and try again.');
      }
    },
  },
};
</script>

<style scoped>
@import './resources/css/login.css';
</style>