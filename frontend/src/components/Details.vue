<template>
  <div>
    <table class="table">
      <tr v-for="(key, id) in keys" :key="id">
        <td>
          <strong>{{key}}:</strong>
        </td>
        <td>
          <input v-model="details[key]" :placeholder="key" @change="update" class="form-control" :disabled="!editable(key)"/>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    service: Object
  },
  data() {
    return {
      details: {},
      id: 0
    };
  },
  computed: {
    keys() {
      return Object.keys(this.details);
    }
  },
  created() {
    this.id = this.$route.params.id;
    console.log("created");
    this.service.get(this.id).then(data => {
      this.details = data.data;
      console.log(this.details);
    });
  },
  methods: {
    editable(name) {
      console.log(name);
      return name !== "created_at" && name !== "updated_at" && name != "id";
    },
    update() {
      console.log(this.details);
      this.service.update(this.details);
    }
  }
};
</script>
