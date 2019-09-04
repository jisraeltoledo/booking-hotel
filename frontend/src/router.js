import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Details from "@/components/Details.vue";
import RoomsService from "./services/RoomsService";
import List from "@/components/List.vue";
import HotelDetailsService from "./services/HotelDetailsService";

Vue.use(Router);
let roomService = new RoomsService();

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    },
    {
      path: "/hotel/:id",
      component: Details,
      props: { service: new HotelDetailsService() }
    },
    {
      path: "/rooms",
      component: List,
      props: { service: roomService }
    },
    {
      path: "/rooms/:id",
      component: Details,
      props: { service: roomService }
    }
  ]
});
