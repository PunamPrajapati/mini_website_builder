<template>
  <aside class="sidebar">
    <nav>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Websites</a></li>
        <li><a href="#">Templates</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Support</a></li>
      </ul>
    </nav>
  </aside>
</template>

<style scoped>
.sidebar {
  width: 250px;
  background-color: #343a40;
  color: #ffffff;
  padding: 20px;
}

.sidebar nav ul {
  list-style: none;
  padding: 0;
}

.sidebar nav ul li {
  margin: 15px 0;
}

.sidebar nav ul li a {
  color: #ffffff;
  text-decoration: none;
  font-weight: bold;
}

.sidebar nav ul li a:hover {
  text-decoration: underline;
}
</style>