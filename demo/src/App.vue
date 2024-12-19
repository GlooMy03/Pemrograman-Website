<template>
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
      <router-link :to="{ name: 'home' }" class="navbar-brand">HOME</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link :to="{ name: 'booking.index' }" class="nav-link">BOOKINGS</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'rooms.index' }" class="nav-link">ROOMS</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <router-view></router-view>
</template>