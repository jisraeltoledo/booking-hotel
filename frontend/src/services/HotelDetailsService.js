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
}

export default HotelDetailsService;
