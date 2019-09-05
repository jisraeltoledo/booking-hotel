import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Details from "@/components/Details.vue";
import RoomsService from "./services/RoomsService";
import List from "@/components/List.vue";
import HotelDetailsService from "./services/HotelDetailsService";
import RoomTypeService from "./services/RoomTypeService";
import PriceListService from "./services/PriceList";
import BookingService from "./services/BookingService";
import Calendar from "@/components/Calendar.vue";

Vue.use(Router);
let roomService = new RoomsService();
let roomTypeService = new RoomTypeService();
let priceListService = new PriceListService();
let bookingsService = new BookingService();

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
    },
    {
      path: "/room-types",
      component: List,
      props: { service: roomTypeService }
    },
    {
      path: "/room-types/:id",
      component: Details,
      props: { service: roomTypeService }
    },
    {
      path: "/price-list",
      component: List,
      props: { service: priceListService }
    },
    {
      path: "/price-list/:id",
      component: Details,
      props: { service: priceListService }
    },
    {
      path: "/bookings",
      component: List,
      props: { service: bookingsService }
    },
    {
      path: "/bookings/:id",
      component: Details,
      props: { service: bookingsService }
    },
    {
      path: "/calendar",
      component: Calendar
    }
  ]
});
