<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png" />
    {{details.address}}
  </div>
</template>

<script>
// @ is an alias to /src
import HotelService from "@/services/HotelDetailsService.js";
import axios from 'axios';
export default {
  name: "hotel-details",
  components: {
    
  },
  data (){
      return {
          details: {},
          service: new HotelService (axios)
      }
  },
  created (){
      console.log ("created");
    //   this.service.getAll ().then (data => {
    //       this.details = data.data[0];
    //       console.log (this.details);
    //   });
      this.service.get (1).then (data => {
          this.details = data.data;
          console.log (this.details);
      })
  }
};
</script>
