<template>
  <div class="container">
    <table class="table">
      <tr v-for="(key, id) in keys(details)" :key="id">
        <td>
          <strong>{{titleCase (key)}}:</strong>
        </td>
        <td>
          <input
            v-model="details[key]"
            :placeholder="key"
            @change="update"
            class="form-control"
            :disabled="!editable(key)"
          />
        </td>
      </tr>
    </table>
    <button class="btn btn-primary pull-right" @click="create" v-if="isNew">
      <i class="fas fa-save"></i> Save
    </button>
    <button class="btn btn-danger pull-right" @click="destroy" v-if="!isNew">
      <i class="fas fa-trash"></i> Delete
    </button>
  </div>
</template>

<script>
export default {
  props: {
    service: Object,
    detailFields: Array
  },
  data() {
    return {
      details: {},
      id: 0
    };
  },
  watch: {
    $route(to, from) {
      this.init();
    }
  },
  computed: {
    isNew() {
      return this.detailFields != null && this.detailFields != undefined;
    }
  },
  created() {
    console.log(this.detailFields);
    this.init ();
  },
  methods: {
    init() {
      this.id = this.$route.params.id;
      if (this.detailFields) {
        this.detailFields.forEach(element => {
          this.details[element] = "";
        });
      } else {
        this.loadData();
      }
    },
    destroy() {
      if (confirm("Are you sure that want to delete this record?")) {
        window.location.href = window.location.href.substring(
          0,
          window.location.href.lastIndexOf("/")
        );
        console.log(this.service.delete(this.details));
      }
    },
    update() {
      console.log(this.details);
      if (!this.isNew) {
        this.service.update(this.details);
      }
    },
    create() {
      let newObject = this.service.create(this.details);
      this.$emit("created", newObject);
    },
    loadData() {
      this.service.get(this.id).then(data => {
        this.details = data.data;
        console.log(this.details);
      });
    }
  }
};
</script>
