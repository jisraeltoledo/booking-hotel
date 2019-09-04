<template>
  <div>
    <p v-if="message">{{message}}</p>
    <table class="table table-striped">
      <thead>
        <tr v-if="list[0]">
          <th scope="col" v-for="(name, idn) in keys(list[0])" :key="idn+name">{{titleCase (name)}}</th>
        </tr>
      </thead>
      <tr v-for="(row, idr) in list" :key="idr" class='clickable-row' @click="edit(row)" style="cursor:pointer;">
        <td v-for="(name, idn) in keys(row)" :key="idn+''+idr">
          <img v-if="validURL(row[name])" :src="row[name]" width="200" />
          <template v-else>{{row[name]}}</template>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import router from "@/router";
export default {
  props: {
    service: Object
  },
  data() {
    return {
      list: [],
      message: null
    };
  },
  created() {
    console.log("created", this.service);
    this.service.getAll().then(data => {
      this.list = data.data;
      console.log(this.list);
      if (this.list.length === 0) {
        this.message = "There is nothing to show here";
      } else {
        this.message = null;
      }
    });
  },
  methods: {
      edit (record){
          window.location.href = window.location.href + '/' + record.id;
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
    },
    validURL(str) {
      var pattern = new RegExp(
        "^(https?:\\/\\/)?" + // protocol
        "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
        "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
        "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
        "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
          "(\\#[-a-z\\d_]*)?$",
        "i"
      ); // fragment locator
      return !!pattern.test(str);
    }
  }
};
</script>
