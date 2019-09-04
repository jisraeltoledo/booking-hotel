import axios from "axios";

class ApiService {
  constructor(endpoint) {
    this.baseUrl = `http://127.0.0.1:8000/api/${endpoint}`;
  }

  getAll() {
    let self = this;
    return axios.get(`${self.baseUrl}`);
  }

  create(record) {
    let self = this;
    return axios.post(`${self.baseUrl}`, record);
  }

  get(id) {
    let self = this;
    return axios.get(`${self.baseUrl}/${id}`);
  }

  update(record) {
    let self = this;
    return axios.put(`${self.baseUrl}/${record.id}`, record);
  }

  delete(record) {
    let self = this;
    return axios.delete(`${self.baseUrl}/${record.id}`, record);
  }
}

export default ApiService;
