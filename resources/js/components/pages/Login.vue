<template>
  <div class="login">
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container">

          <div class="columns is-desktop is-centered">
            <div class="column is-one-third">
              <p class="bd-notification is-primary">
                <h1 class="title has-text-centered">
                  Login
                </h1>

                <form @submit.prevent="submit()">
                  <div class="field">
                    <p class="control has-icons-left has-icons-right">
                      <input class="input" type="email" placeholder="Email" v-model="user.email">
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="password" placeholder="Password" v-model="user.password">
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <button class="button is-danger is-fullwidth" type="submit">
                        Login
                      </button>
                    </p>
                  </div>
                </form>

                <div>
                  <p class="is-pulled-left">
                    Already have an account?
                    <router-link to="/signup">Signup</router-link>
                  </p>
                  <router-link class="is-pulled-right" to="/menu">Menu</router-link>
                </div>
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data: () => ({
    user: {
      email: null,
      password: null,
    }
  }),

  methods: {
    submit () {
      this.$http.post('/login', this.user)
      .then(response => {
        this.$root.user = response.data;

        if (response.data.role == 'admin') {
          this.$router.push('/admin')

          return;
        }

        this.$router.push('/menu')
      })
      .catch(error => {
        // Error
      });
    }
  }
}
</script>

<style lang="sass">
</style>
