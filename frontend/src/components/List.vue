<template>
  <div class="container">
    <button
      class="btn btn-primary"
      @click="createNew=true"
      style="margin-bottom:10px"
      v-if="!createNew"
    >
      <i class="fas fa-plus-square"></i> New
    </button>
    <create-form v-if="createNew" :detailFields="detailFields" :service="service" @created="create"></create-form>

    <p v-if="message">{{message}}</p>
    <table class="table table-striped" v-if="!createNew">
      <thead>
        <tr v-if="list[0]">
          <template v-for="(name, idn) in keys(list[0])">
            <th scope="col" :key="idn+name" v-if="editable(name)">{{titleCase (name)}}</th>
          </template>
        </tr>
      </thead>
      <tr
        v-for="(row, idr) in list"
        :key="idr"
        class="clickable-row"
        @click="edit(row)"
        style="cursor:pointer;"
      >
        <template v-for="(name, idn) in keys(row)">
          <td :key="idn+''+idr" v-if="editable (name)">
            <img v-if="validURL(row[name])" :src="row[name]" width="200" />
            <template v-else>{{row[name]}}</template>
          </td>
        </template>
      </tr>
    </table>
  </div>
</template>

<script>
import router from "@/router";
import DetailsVue from "./Details.vue";
export default {
  components: {
    "create-form": DetailsVue
  },
  props: {
    service: Object
  },
  data() {
    return {
      list: [],
      message: null,
      createNew: false,
      detailFields: []
    };
  },
  created() {
    console.log("created", this.service);
    this.detailFields = this.service.fields();
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
    create(newObject) {
      console.log("create", newObject);
      newObject.then ( data => {
        this.list.push(data.data);
        this.createNew = false;
      });      
    },
    edit(record) {
      window.location.href = window.location.href + "/" + record.id;
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
