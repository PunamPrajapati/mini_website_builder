<template>
  <header class="header">
    <h1>Welcome, {{ user }}!</h1>
    <div class="actions">
      <button class="profile-btn"> Profile </button>
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
  grid-row: 1; /* Places the header at the top */
  position: sticky; /* This makes the header fixed at the top */
  top: 0; /* Aligns the header to the top of the viewport */
  left: 0; /* Aligns the header to the left of the viewport */
  width: 100%; /* Ensures the header spans the full width */
  z-index: 1000; /* Ensures the header stays above other elements */
  background-color: #4c83af; /* Background color for the header */
  color: white; /* Text color */
  padding: 1rem; /* Padding for some spacing */
  display: flex; /* Makes the header content appear in a row */
  justify-content: space-between; /* Space between title and actions */
  align-items: center; /* Aligns items vertically */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow */
}

.profile-btn {
  margin-left: 1rem; /* Adds spacing between buttons */
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  background-color: white;
  color: #4c83af;
  cursor: pointer;
  font-weight: bold;
}

.profile-btn:hover {
  background-color:rgb(36, 90, 152);
  color: white;
}

.logout-btn {
  margin-left: 1rem; /* Adds spacing between buttons */
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  background-color: white;
  color:rgb(212, 22, 22);
  cursor: pointer;
  font-weight: bold;
}

.logout-btn:hover {
  background-color:rgb(169, 6, 6);
  color: white;
}

</style>