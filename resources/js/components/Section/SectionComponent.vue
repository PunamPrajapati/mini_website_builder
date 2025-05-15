<template>
  <div class="website-list">
    <div class="table-header">
      <button class="btn-create" @click="createSection"><router-link to="/sections/create">
              Create Section
            </router-link></button>
    </div>

    <table class="website-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(section, index) in sections" :key="section.id">
          <td>{{ index + 1 }}</td>
          <td>{{ section.title }}</td>
          <td>
            <button class="btn-preview" @click="previewSection(section.id)">Preview</button>
            <button class="btn-edit" @click="editSection(section.id)">Edit</button>
            <button class="btn-delete" @click="deleteSection(section.id)">Delete</button>
          </td>
        </tr>
        <tr v-if="sections.length === 0">
          <td colspan="4" class="no-data">No sections available</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "SectionList",
  data() {
    return {
      sections: [],
    };
  },
  methods: {
    async fetchSections() {
      try {
        const response = await axios.get("sections"); 
        this.sections = response.data.data;
      } catch (error) {
        console.error("Error fetching section data:", error);
        alert("Failed to fetch section data. Please try again later.");
      }
    },
    createSection() {
      this.$router.push("/sections/create");
    },
    editSection(id) {
      // Redirect to edit page with the section ID as a route parameter
      this.$router.push(`/sections/edit/${id}`);
    },
    async deleteSection(id) {
      try {
        const confirmed = confirm("Are you sure you want to delete this section?");
        if (!confirmed) return;

        await axios.delete(`/sections/${id}`);
        alert("Section deleted successfully!");

        // Remove the deleted section from the list
        this.sections = this.sections.filter((section) => section.id !== id);
      } catch (error) {
        console.error("Error deleting section:", error);
        alert("Failed to delete section. Please try again.");
      }
    },
  },
  mounted() {
    this.fetchSections();
  },
};
</script>

<style scoped>
@import './resources/css/form.css';
</style>