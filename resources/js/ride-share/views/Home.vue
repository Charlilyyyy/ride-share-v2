<!-- App.vue -->
<template>
    <div>
      <header>
        <h1>Ride Share App</h1>
        <nav>
          <!-- Use router-link for navigation -->
          <router-link to="/login">Login</router-link>
        </nav>
      </header>
  
      <main>
        <section>
          <h2>Welcome to Ride Share</h2>
          <p>Find a ride or offer one!</p>
        </section>
      </main>
  
      <footer>
        <p>&copy; 2023 Ride Share App</p>
      </footer>
    </div>
  </template>
  
  <script setup>
  
  </script>
  
  <style>
  /* Your CSS styles go here */
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
  }
  
  header {
    background-color: #4CAF50;
    color: white;
    padding: 1rem;
    text-align: center;
  }
  
  nav {
    display: flex;
    justify-content: flex-end;
    margin-top: 1rem;
  }
  
  nav a {
    color: white;
    text-decoration: none;
    margin-left: 1rem;
  }
  
  main {
    padding: 2rem;
  }
  
  footer {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1rem;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  </style>
  