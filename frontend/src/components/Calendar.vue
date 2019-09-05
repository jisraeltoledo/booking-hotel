<template>
  <div>
    <FullCalendar
      defaultView="dayGridMonth"
      :plugins="calendarPlugins"
      :weekends="true"
      :events="events"
      @eventClick="onClick"
    />
    {{events}}
  </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import BookingService from "@/services/BookingService";
export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin],
      events: []
    };
  },
  created() {
    let service = new BookingService();
    service.getAll().then(rows => {
      this.createEvents(rows.data);
    });
  },
  computed: {},
  methods: {
    onClick (info){
      console.log (info);
      this.$router.replace('bookings/'+info.event.id);
    },
    createEvents(bookings) {
      bookings.forEach(element => {
        let event = {
          start: element.date_start,
          end: element.date_end,
          title: element.customer_fullname,
          id: element.id
        };
        this.events.push(event);
      });
    }
  }
};
</script>



<style lang='scss'>
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
</style>