class HotelDetailsService {
  constructor(axios) {
    this.axios = axios;
    this.baseUrl = "http://127.0.0.1:8000/api";
  }

  getAll() {
    let self = this;
    return self.axios.get(`${self.baseUrl}/hotelDetails`);
  }

  get(id) {
    let self = this;
    return self.axios.get(`${self.baseUrl}/hotelDetails/${id}`);
  }

  update(details) {
    let self = this;
    return this.axios.put(
      `${self.baseUrl}/hotelDetails/${details.id}`,
      details
    );
  }
}

export default HotelDetailsService;
