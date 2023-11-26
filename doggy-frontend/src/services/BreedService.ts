import { AxiosResponse } from "axios";
import { ApiService } from "./ApiService";
import { BreedsResponse } from "@/types/Breeds";

class BreedService extends ApiService {

    public getAll(): Promise<AxiosResponse<BreedsResponse>> {
        return this.get('breeds')
    }

}

export default new BreedService()