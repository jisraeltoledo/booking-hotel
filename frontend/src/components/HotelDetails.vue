<template>
  <div>
    <ul>
      <li v-for="(key, id) in keys" :key="id">
        <strong>{{key}}:</strong>
        <input v-model="details[key]" :placeholder="key" @change="update">
      </li>
    </ul>
  </div>
</template>

<script>
// @ is an alias to /src
import HotelService from "@/services/HotelDetailsService.js";

export default {
  name: "hotel-details",
  components: {
      
  },
  data() {
    return {
      details: {},
      service: new HotelService()
    };
  },
  computed: {
    keys() {
      return Object.keys(this.details);
    }
  },
  created() {
    console.log("created");
    this.service.get(1).then(data => {
      this.details = data.data;
      console.log(this.details);
    });
  },
  methods:{
      update (){
          console.log (this.details);
          this.service.update (this.details);
      }
  }
};
</script>
