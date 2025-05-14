<template>
  <div class="create-form">
    <h2>Add Website</h2>
    <p v-for="(er, index) in error" class="error-message">{{ er }}</p>
    <form id="create-form" @submit.prevent="submitForm">
      <!-- Website Name Field -->
      <div class="form-group">
        <label for="website_name">Website Name</label>
        <input type="text" id="website_name" v-model="website_name" placeholder="Enter website name" required />
      </div>

      <!-- URL Field -->
      <div class="form-group">
        <label for="url">Website URL</label>
        <input type="url" id="url" v-model="url" placeholder="Enter website URL (e.g., https://example.com)" required />
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn-submit">Add Website</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "WebsiteForm",
  data() {
    return {
      website_name: "",
      url: "",
      error: [],
    };
  },
  methods: {
    async submitForm() {
      const data = {
        website_name: this.website_name,
        url: this.url,
      };

      try {
        const response = await axios.post("/websites", data);
        if(response.data.status){
          console.log("Website created successfully:", response.data);

          // Optionally clear the form after a successful submission
          this.website_name = "";
          this.url = "";

          // Optionally redirect or show a success message
          alert("Website created successfully!");
        }else{
        this.error = response.data.data;
        }
        
      } catch (error) {
        console.error("Error creating website:", error);
        alert("Failed to create website. Please try again.");
      }
    },
  },
};
</script>


<style scoped>
@import './resources/css/form.css';
</style>
if(response.data.status){
          console.log("Website updated successfully:", response.data);

          this.website = response.data.data;

          alert("Website updated successfully!");
        }else{
          this.error = response.data.data;
        }