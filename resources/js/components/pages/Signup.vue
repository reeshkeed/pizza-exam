<template>
  <div class="signup">
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container">

          <div class="columns is-desktop is-centered">
            <div class="column is-one-third">
              <p class="bd-notification is-primary">
                <h1 class="title has-text-centered">
                  Signup
                </h1>

                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="First Name">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Last Name">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Email">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Password</label>
                  <p class="control">
                    <input class="input" type="password" placeholder="Password">
                  </p>
                </div>

                <div class="field">
                  <label class="label">Phone Number</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Phone Number">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Address</label>

                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <textarea class="textarea" placeholder="Complete Address"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="field">
                  <p class="control">
                    <button class="button is-danger is-fullwidth">
                      Login
                    </button>
                  </p>
                </div>
                <div>
                  <p class="is-pulled-left">
                    Already have an account?
                    <router-link to="/login">Login</router-link>
                  </p>
                  <router-link class="is-pulled-right" to="/menu">Menu</router-link>
                </div>
              </p>
            </div>
          </div>

          <div class="form-group">

          </div>

        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="sass">
</style>
