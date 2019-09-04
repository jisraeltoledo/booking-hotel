import ApiService from "./ApiService";

class RoomsService extends ApiService {
  constructor() {
    super("room");
  }
  fields() {
    return ["room_name", "hotel_id", "room_type", "room_image"];
  }
}

export default RoomsService;
