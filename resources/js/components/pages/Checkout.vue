<template>
  <div class="checkout">
    <div class="container">
      <div class="columns">
        <div class="column is-one-quarter">
          <div class="card">
            <div class="card-content">
              <p class="title">
                Your Cart
              </p>

              <div
                v-for="(item, y) in pizza.items"
                :key="y"
              >
                <p class="cart-item-name">
                  {{ item.name }}
                </p>
                <p class="">
                  ₱{{ item.price }}
                </p>
              </div>

              <br>
              <p class="cart-item-name">
                Total
              </p>
              <p>
                ₱{{ totalPrice }}
              </p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <div class="card-content">
              <form @submit.prevent="completePayment()">
                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="First Name" v-model="user.f_name">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Last Name" v-model="user.s_name">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Phone Number</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="Phone Number" v-model="user.phone">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Address</label>

                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <textarea class="textarea" placeholder="Complete Address" v-model="user.address"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="field">
                  <p class="control">
                    <button class="button is-danger is-fullwidth" type="submit">
                      Complete Payment
                    </button>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    user: {
      f_name: null,
      s_name: null,
      phone: null,
      address: null
    },

    pizza: {
      kind: null,
      size: null,
      items: []
    },

    orderId: null
  }),

  mounted () {
    this.user.f_name = this.$root.user.f_name;
    this.user.s_name = this.$root.user.s_name;
    this.user.phone = this.$root.user.phone;
    this.user.address = this.$root.user.address;

    this.getOrderItem();
  },

  computed: {
    totalPrice () {
      let result = 0;
      let division = 1;

      if (this.pizza.kind == 'half') division = 2;

      if (this.pizza.kind == '4quarters') division = 4;

      for (let i = 0; i < this.pizza.items.length; i++) {
        result += this.pizza.items[i].price / division;
      }

      return result;
    }
  },

  methods: {
    getOrderItem () {
      this.$http.get('/orders/active')
        .then(response => {
          const orderItem = response.data.items[0];

          this.pizza.kind = orderItem.kind;
          this.pizza.size = orderItem.size;
          this.pizza.items = orderItem.products.map(p => p.product);
          this.orderId = response.data.id;
        });
    },

    completePayment () {
      this.$http.post(`/orders/${this.orderId}/checkout`)
        .then(response => {
          this.$router.push('/menu');
        });
    }
  }
}
</script>

<style lang="sass">
</style>
