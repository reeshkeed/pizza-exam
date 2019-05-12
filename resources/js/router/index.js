import Vue from "vue";
import Router from "vue-router";
import Login from "@/components/pages/Login"
import Menu from "@/components/pages/Menu"
import Cart from "@/components/pages/Cart"
import Signup from "@/components/pages/Signup"
import Checkout from "@/components/pages/Checkout"

Vue.use(Router);

export default new Router({
  mode: "history",

  routes: [
    {
      path: "/login",
      name: "Login",
      component: Login
    },
    {
      path: "/menu",
      name: "Menu",
      component: Menu
    },
    {
      path: "/cart",
      name: "Cart",
      component: Cart
    },
    {
      path: "/signup",
      name: "Signup",
      component: Signup
    },
    {
      path: "/checkout",
      name: "Checkout",
      component: Checkout
    }
  ]
});
