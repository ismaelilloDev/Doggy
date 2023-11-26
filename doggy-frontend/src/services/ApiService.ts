import axios, { Axios, AxiosResponse } from "axios"

export class ApiService {

    private http: Axios

    constructor() {

        this.http = axios.create({
            baseURL: 'http://localhost:8000/api'
        })
    }

    private getHeaders() {
        const headers: { Accept: string; Authorization?: string } = {
            Accept: 'application/json',
        };
      
        return headers;
    }

    get(url: string, params = null): Promise<AxiosResponse> {
        return this.http.get(url, {params: params, headers: this.getHeaders()})
    }

    post(url: string, body: any = {}, params = null): Promise<AxiosResponse> {
        return this.http.post<any>(url, body, {params: params, headers: this.getHeaders()})
    }

    put(url: string, body: any = {}, params = null): Promise<AxiosResponse> {
        return this.http.put(url, body, {params: params})
    }
}