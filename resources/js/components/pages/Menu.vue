<template>
  <div class="menu">
    <div class="container">
      <div class="columns">

        <div class="column">
          <h1 class="title">Type</h1>
          <div class="control">
            <label class="radio">
              <input type="radio" name="kind" value="whole" v-model="pizza.kind" :disabled="pizza.items.length > 0">
              Whole
            </label>
            <label class="radio">
              <input type="radio" name="kind" value="half" v-model="pizza.kind" :disabled="pizza.items.length > 0">
              Half
            </label>
            <label class="radio">
              <input type="radio" name="kind" value="4quarters" v-model="pizza.kind" :disabled="pizza.items.length > 0">
              4 Quarters
            </label>
          </div>

          <h1 class="title">Size</h1>
          <div class="control">
            <label class="radio">
              <input type="radio" name="size" value="10" v-model="pizza.size">
              10
            </label>
            <label class="radio">
              <input type="radio" name="size" value="14" v-model="pizza.size">
              14
            </label>
            <label class="radio">
              <input type="radio" name="size" value="18" v-model="pizza.size">
              18
            </label>
          </div>

          <div
            class="type-container"
            v-for="(entry, i) in groupedProducts"
            :key="i"
          >
            <h1 class="title">Type: {{ entry.type }}</h1>
            <div class="columns is-multiline">
              <div
                class="column is-one-fifth"
                v-for="(product, x) in entry.products"
                :key="x"
              >
                <div class="card">
                  <div class="card-content">
                    <p class="title">
                      {{ product.name }}
                    </p>
                    <p class="subtitle">
                      ₱{{ product.price }}
                    </p>

                    <button
                      @click="addToCart(product)"
                      :disabled="isDisabled(product.type)"
                      class="button is-success is-fullwidth">
                      Add to cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="column is-one-fifth">
          <div class="card">
            <div class="card-content">
              <p class="title">
                Cart
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
                {{ totalPrice }}
              </p>

              <button @click="checkout()" class="button checkout is-danger is-fullwidth">Checkout</button>
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
    pizza: {
      type: null,
      size: null,
      items: [],
    },

    products: [],
    orderId: null
  }),

  computed: {
    groupedProducts () {
      let output = [];

      for (let i = 0; i < this.products.length; i++) {
        const product = this.products[i]
        const index = output.findIndex(o => o.type == product.type);

        if (index == -1) {
          output.push({
            type: product.type,
            products: [product]
          });

          continue;
        }

        output[index].products.push(product);
      }

      return output;
    },

    canChooseOtherType () {
      return ['half'].indexOf(this.pizza.kind) != -1;
    },

    typesAllowed () {
      if (this.canChooseOtherType || this.pizza.items.length == 0) {
        return this.products.map(p => p.type);
      }

      let allowed = ['Toppings'];

      if (this.pizza.kind != 'whole' &&
          this.pizza.items.length > 0 &&
          !this.canChooseOtherType) {
        allowed.push(this.pizza.items[0].type)
      }

      return allowed;
    },

    canAddToCart () {
      if (this.pizza.kind == 'half' && this.pizza.items.length >= 2) {
        return false;
      }

      if (this.pizza.kind == '4quarters' && this.pizza.items.length >= 4) {
        return false;
      }

      return true;
    },

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

  watch: {
    pizza: {
      handler () {
        if (this.pizza.kind && this.pizza.size) {
          this.getProducts(this.pizza.size);

          return
        }
      },

      deep: true
    }
  },

  mounted () {
    this.$http.get('/orders/active')
      .then(response => this.orderId = response.data.id)
  },

  methods: {
    getProducts (size) {
      const params = { size };

      this.$http.get('/products', { params })
        .then(response => this.products = response.data);
    },

    addToCart (product) {
      const index = this.pizza.items.findIndex(p => p.id == product.id);

      if (index == -1) {
        this.pizza.items.push(product);
      }
    },

    isDisabled (type) {
      return this.typesAllowed.indexOf(type) == -1 ||
        (!this.canAddToCart && type != 'Toppings');
    },

    checkout () {
      let data = {
        kind: this.pizza.kind,
        size: this.pizza.size,
        items: this.pizza.items.map(p => p.id)
      };

      this.$http.post(`/orders/${this.orderId}`, data)
        .then(response => {
          alert('checked out');
        });
    }
  }
}
</script>

<style lang="sass">
  .menu
    padding: 2rem 0

  .type-container
    padding: 2rem 0

  .cart-item-name
    font-weight: 600
    font-size: 1.2rem

  .checkout
    margin-top: 1rem
</style>
