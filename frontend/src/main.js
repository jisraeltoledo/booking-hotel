import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

Vue.config.productionTip = false;

Vue.mixin({
  methods: {
    editable(name) {
      console.log(name);
      return name !== "created_at" && name !== "updated_at" && name != "id";
    },
    titleCase(str) {
      str = str
        .replace(/_/g, " ")
        .toLowerCase()
        .split(" ");
      let final = [];

      for (let word of str) {
        final.push(word.charAt(0).toUpperCase() + word.slice(1));
      }
      return final.join(" ");
    },
    keys(object) {
      return Object.keys(object);
    }
  }
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
