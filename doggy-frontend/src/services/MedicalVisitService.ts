import { AxiosResponse } from "axios";
import { ApiService } from "./ApiService";
import { MedicalVisitsResponse } from "@/types/MedicalVisits";

class MedicalVisitService extends ApiService {
    public getAll(page: number = 1, orderDirection: string = '', search: string = '', field: string = ''): Promise<AxiosResponse<MedicalVisitsResponse>> {
        return this.get('medical-visits?page=' + page + '&orderDirection=' + orderDirection + '&search=' + search + '&field=' + field)
    }
}

export default new MedicalVisitService()