<template>
  <header class="header">
    <h1>Welcome, {{ user }}!</h1>
    <div class="actions">
      <button> Profile </button>
      <button class="logout-btn" @click="handleLogout">Logout</button>
    </div>
  </header>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
            user: '', // Initialize an empty object for the user
            };
        },
        mounted() {
            // Retrieve user data from localStorage
            const userName = localStorage.getItem('userName');
            if (userName) {
            this.user = userName;
            } else {
            console.error('User not found in localStorage');
            }
        },
        methods: {
            async handleLogout() {
            const confirmed = window.confirm("Are you sure you want to log out?");
            if (!confirmed) {
                return; // If the user cancels, do nothing
            }
            try {
                // Make a call to the logout API
                const response = await axios.post('/logout');

                // Handle successful logout
                if (response.data.status) {
                    localStorage.removeItem("auth_token");
                    this.$router.push("/");
                }
            } catch (error) {
                console.error('Error during logout:', error);
                alert('Failed to log out. Please try again.');
            }
            },
        },
    };
</script>
<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background-color: #ffffff;
  border-bottom: 1px solid #dee2e6;
}

.actions button {
  margin-left: 10px;
  padding: 10px 15px;
  border: none;
  background-color: #007bff;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

.actions button:hover {
  background-color: #0056b3;
}

.logout-btn {
background-color:rgb(255, 0, 0) !important;
}

</style>