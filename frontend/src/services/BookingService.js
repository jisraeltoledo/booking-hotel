import ApiService from "./ApiService";

class BookingService extends ApiService {
  constructor() {
    super("booking");
  }
  fields() {
    return [
      "room_id",
      "date_start",
      "date_end",
      "customer_fullname",
      "customer_email",
      "customer_phone",
      "total_nights",
      "total_price",
      "user_id"
    ];
  }
}

export default BookingService;
