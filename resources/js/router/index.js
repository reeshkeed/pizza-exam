import Vue from "vue";
import Router from "vue-router";
import Home from "@/components/pages/Home";
import Login from "@/components/pages/Login"
import Menu from "@/components/pages/Menu"

Vue.use(Router);

export default new Router({
  mode: "history",

  routes: [
    {
      path: "/",
      name: "Home",
      component: Home
    },
    {
      path: "/login",
      name: "Login",
      component: Login
    },
    {
      path: "/menu",
      name: "Menu",
      component: Menu
    }
  ]
});
