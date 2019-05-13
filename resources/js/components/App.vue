<template>
  <div>
    <!-- Navbar Starts Here -->
    <nav class="navbar has-text-white is-danger" role="navigation" aria-label="main navigation" v-if="isNavbarVisible">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="https://bulma.io">
            <img src="/assets/img/logo.png" width="28" height="28">
          </a>

          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <router-link class="navbar-item" to="/menu">Menu</router-link>
          </div>

          <div class="navbar-end">
            <div class="navbar-item">
              <h1 class="user-name" v-if="$root.user"><i class="fas fa-user-circle"></i> {{ $root.user.f_name }} {{ $root.user.s_name }}</h1>

              <div class="buttons">
                <router-link class="button is-danger is-inverted is-outlined" to="/signup" v-if="!$root.user">Signup</router-link>
                <router-link class="button is-danger is-inverted is-outlined" to="/login" v-if="!$root.user">Login</router-link>
                <a class="button is-white is-outlined" v-if="$root.user" @click="logout()">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar Ends Here -->

    <!-- Views Render Here -->
    <router-view/>

  </div>
</template>

<script>
export default {
  mounted() {
    console.log('Component mounted.')
  },

  computed: {
    isNavbarVisible () {
      return ['Login', 'Signup'].indexOf(this.$route.name) == -1
    }
  },

  methods: {
    logout () {
      this.$http.post('/logout')
        .then(response => {
          this.$root.user = null;
          this.$router.push('/menu')
        });
    }
  }
}
</script>

<style lang="sass">
  @import "./resources/sass/app.sass"

  .user-name
    margin-right: 1rem

</style>
