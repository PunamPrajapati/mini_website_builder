<template>
  <div class="create-form">
    <h2>Edit Website</h2>
    <p v-for="(er, index) in error" class="error-message">{{ er }}</p>
    <form id="create-form" @submit.prevent="updateWebsite">
      <div class="form-group">
        <label for="name">Website Name:</label>
        <input type="text" id="name" v-model="website.website_name" required />
      </div>
      <div class="form-group">
        <label for="url">Website URL:</label>
        <input type="url" id="url" v-model="website.url" required />
      </div>
      <button type="submit" class="btn-submit">Update Website</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "WebsiteEditComponent",
  data() {
    return {
      id: null, // To store the website ID
      website: {
        website_name: "",
        url: "",
      }, 
      error: [],
    };
  },
  methods: {
    async fetchWebsiteDetails() {
      try {
        const response = await axios.get(`/websites/${this.id}`);
        this.website = response.data.data; // Populate form fields with the fetched data
      } catch (error) {
        console.error("Failed to fetch website details:", error);
        alert("Unable to fetch website details.");
      }
    },
    async updateWebsite() {
      try {
        const response = await axios.put(`/websites/${this.id}`, this.website);
        if(response.data.status){
          console.log("Website updated successfully:", response.data);

          this.website = response.data.data;

          alert("Website updated successfully!");
          this.$router.push("/websites");

        }else{
          this.error = response.data.data;
        }
      } catch (error) {
        console.error("Failed to update website:", error);
        alert("Unable to update website.");
      }
    },
  },
  mounted() {
    // Retrieve the 'id' param from the route and fetch website details
    this.id = this.$route.params.id;
    this.fetchWebsiteDetails();
  },
};
</script>
<style scoped>
@import './resources/css/form.css';
</style>