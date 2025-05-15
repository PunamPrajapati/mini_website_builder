<template>
  <div class="website-list">
    <!-- Create Website Button -->
    <div class="table-header">
      <button class="btn-create" @click="createWebsite"><router-link to="/websites/create">
              Create Website
            </router-link></button>
    </div>

    <!-- Website List Table -->
    <table class="website-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Website Name</th>
          <th>URL</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(website, index) in websites" :key="website.id">
          <td>{{ index + 1 }}</td>
          <td>{{ website.website_name }}</td>
          <td>
            <a :href="website.url" target="_blank" class="website-link">{{ website.url }}</a>
          </td>
          <td>
            <button class="btn-edit" @click="editWebsite(website.id)">Edit</button>
            <button class="btn-delete" @click="deleteWebsite(website.id)">Delete</button>
          </td>
        </tr>
        <tr v-if="websites.length === 0">
          <td colspan="4" class="no-data">No websites available</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "WebsiteList",
  data() {
    return {
      websites: [],
    };
  },
  methods: {
    async fetchWebsites() {
      try {
        const response = await axios.get("websites"); 
        this.websites = response.data.data;
      } catch (error) {
        console.error("Error fetching website data:", error);
        alert("Failed to fetch website data. Please try again later.");
      }
    },
    createWebsite() {
      this.$router.push("/websites/create");
    },
    editWebsite(id) {
      // Redirect to edit page with the website ID as a route parameter
      this.$router.push(`/websites/edit/${id}`);
    },
    async deleteWebsite(id) {
      try {
        const confirmed = confirm("Are you sure you want to delete this website?");
        if (!confirmed) return;

        await axios.delete(`/websites/${id}`);
        alert("Website deleted successfully!");

        // Remove the deleted website from the list
        this.websites = this.websites.filter((website) => website.id !== id);
      } catch (error) {
        console.error("Error deleting website:", error);
        alert("Failed to delete website. Please try again.");
      }
    },
  },
  mounted() {
    this.fetchWebsites();
  },
};
</script>
<style scoped>
@import './resources/css/form.css';
</style>
