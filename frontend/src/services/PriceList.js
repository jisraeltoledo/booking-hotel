import ApiService from "./ApiService";

class PriceListService extends ApiService {
  constructor() {
    super("priceList");
  }
  fields() {
    return ["name", "price", "room_type"];
  }
}

export default PriceListService;
