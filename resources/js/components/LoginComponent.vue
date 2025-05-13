<template>
  <div class="login-container">
    <h2>Login</h2>
    <form @submit.prevent="handleLogin">
      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          v-model="email"
          required
          placeholder="Enter your email"
        />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          v-model="password"
          required
          placeholder="Enter your password"
        />
      </div>

      <button type="submit" class="btn-login">Login</button>
    </form>
    <p v-if="error" class="error-message">{{ error }}</p>
    <p>
      Don’t have an account? 
      <span class="link-span"><router-link to="/register">Register here</router-link></span> <!-- Register Link -->
    </p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: "",
      error: null,
      loading: false,
    };
  },
  methods: {
    async handleLogin() {
      this.error = null;
      this.loading = true;

      try {
        // Make the API call to Laravel's login route
        const response = await axios.post("/login", {
          email: this.email,
          password: this.password,
        });
        if(response.data.status){
          localStorage.setItem("auth_token", response.data.token);
          let userData = response.data.data;
          localStorage.setItem("userName", userData.first_name+' '+userData.last_name);
          this.$router.push("/dashboard");
        }else{
        this.error =
          response?.data?.message || "An error occurred. Please try again.";
        }

      } catch (err) {
        // Handle error (e.g., invalid credentials)
        console.error("Login failed:", err.response);
        this.error =
          err.response?.data?.message || "An error occurred. Please try again.";
      } finally {
        this.loading = false; // Clear loading state
      }
    },
  },
};
</script>
<style src="./resources/css/login.css"></style>
