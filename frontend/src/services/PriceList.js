import ApiService from "./ApiService";

class PriceListService extends ApiService {
  constructor() {
    super("priceList");
  }
  fields() {
    return ["name", "price"];
  }
}

export default PriceListService;
