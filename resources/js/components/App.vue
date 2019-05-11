<template>
  <div>
    <nav class="navbar has-text-white" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="https://bulma.io">
            <img src="/img/logo.png" width="112" height="28">
          </a>

          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <router-link class="navbar-item" to="/">Home</router-link>
            <router-link class="navbar-item" to="/menu">Menu</router-link>
          </div>

          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <router-link class="button is-white" to="/cart"><i class="fas fa-shopping-cart"></i></router-link>
                <router-link class="button is-danger" to="/signup">Signup</router-link>
                <router-link class="button is-danger is-outlined" to="/login">Login</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <router-view/>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log('Component mounted.')
  }
}
</script>

<style lang="sass">
  @import "./resources/sass/app.sass"

  .navbar
    border-bottom: 2px solid $red

</style>
