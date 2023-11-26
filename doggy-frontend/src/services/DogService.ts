import { AxiosResponse } from "axios";
import { ApiService } from "./ApiService";
import { DogDetailResponse, DogResponse } from "@/types/Dog";

class DogService extends ApiService {

    public getAll(page: number = 1, orderDirection: string = '', search: string = '', field: string = ''): Promise<AxiosResponse<DogResponse>> {
        return this.get('dogs?page=' + page + '&orderDirection=' + orderDirection + '&search=' + search + '&field=' + field)
    }

    public getById(id: string): Promise<AxiosResponse<DogDetailResponse>> {
        return this.get('/dog/' + id)
    }

    public update(id: string, formData: FormData): Promise<AxiosResponse<DogDetailResponse>> {
        return this.post('dog/update/' + id, formData)
    }

    public create(formData: FormData): Promise<AxiosResponse<DogDetailResponse>> {
        return this.post('dog/create', formData)
    }
}

export default new DogService()