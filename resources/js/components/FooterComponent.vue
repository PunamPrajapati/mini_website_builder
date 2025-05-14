<template>
  <footer class="footer">
    <div class="footer-content">
      <p>&copy; {{ currentYear }} Mini Website Builder. All rights reserved.</p>
      <nav class="footer-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Contact Us</a>
      </nav>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      currentYear: new Date().getFullYear(),
    };
  },
};
</script>

<style scoped>
.footer {
  background-color: #343a40;
  color: #ffffff;
  padding: 1rem;
  text-align: center;
  border-top: 1px solid #dee2e6;
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
}

.footer-links {
  margin-top: 10px;
}

.footer-links a {
  color: #ffffff;
  margin: 0 10px;
  text-decoration: none;
}

.footer-links a:hover {
  text-decoration: underline;
}
</style>