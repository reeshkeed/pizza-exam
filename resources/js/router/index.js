import Vue from "vue";
import Router from "vue-router";
import Login from "@/components/pages/Login"
import Menu from "@/components/pages/Menu"
import Signup from "@/components/pages/Signup"
import Checkout from "@/components/pages/Checkout"
import Admin from "@/components/pages/Admin"

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
      path: "/signup",
      name: "Signup",
      component: Signup
    },
    {
      path: "/checkout",
      name: "Checkout",
      component: Checkout
    },
    {
      path: "/admin",
      name: "Admin",
      component: Admin
    }
  ]
});
