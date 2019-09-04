import ApiService from "./ApiService";

class RoomTypeService extends ApiService {
  constructor() {
    super("roomType");
  }
  fields() {
    return ["room_type_name"];
  }
}

export default RoomTypeService;
