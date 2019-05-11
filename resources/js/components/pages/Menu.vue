<template>
  <div class="menu">
    <div class="container">

      <h1 class="title">Type</h1>
      <div class="control">
        <label class="radio">
          <input type="radio" name="type" value="whole" v-model="pizza.type">
          Whole
        </label>
        <label class="radio">
          <input type="radio" name="type" value="half" v-model="pizza.type">
          Half
        </label>
        <label class="radio">
          <input type="radio" name="type" value="4quarters" v-model="pizza.type">
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
                  {{ product.price }}
                </p>
                <a class="button is-success is-fullwidth">Add to cart</a>
              </div>
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
      size: null
    },

    products: []
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
    }
  },

  watch: {
    pizza: {
      handler () {
        if (this.pizza.type && this.pizza.size) {
          this.getProducts(this.pizza.size);

          return
        }
      },

      deep: true
    }
  },

  methods: {
    getProducts (size) {
      const params = { size };

      this.$http.get('/products', { params })
        .then(response => this.products = response.data);
    }
  }
}
</script>

<style lang="sass">
</style>
