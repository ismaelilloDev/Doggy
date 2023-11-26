import { AxiosResponse } from "axios";
import { ApiService } from "./ApiService";
import { DogResponse } from "@/types/Dog";

class DogService extends ApiService {

    public getAll(page: number = 1, orderDirection: string = '', search: string = '', field: string = ''): Promise<AxiosResponse<DogResponse>> {
        return this.get('dogs?page=' + page + '&orderDirection=' + orderDirection + '&search=' + search + '&field=' + field)
    }
}

export default new DogService()