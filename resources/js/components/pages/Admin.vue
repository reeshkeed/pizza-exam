<template>
  <div class="admin">
    <div class="container">
      <h1 class="title">Orders</h1>

      <div
        v-for="(order, i) in orders"
        :key="i"
      >
        <div class="card">
          <div class="card-content">
            <h1 class="cart-item-name">Order ID {{ order.id }}</h1>

            <h2>User: {{ order.user.f_name }} {{ order.user.s_name }}</h2>

            <h3>Item</h3>

            <div
              v-for="(item, x) in order.items"
              :key="x"
            >
              <p>Kind: {{ item.kind }}</p>
              <p>Size: {{ item.size }}</p>
              <p>Price: {{ item.price }}</p>

              <div
                v-for="(product, y) in item.products"
                :key="y"
              >
                <p>Type: {{ product.product.type }}</p>
                <p>Name: {{ product.product.name }}</p>
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
    orders: []
  }),

  mounted () {
    this.getOrders();
  },

  methods: {
    getOrders() {
      this.$http.get('/orders/all')
        .then(response => {
          this.orders = response.data;
        });
    }
  }
}
</script>

<style lang="sass">
</style>
