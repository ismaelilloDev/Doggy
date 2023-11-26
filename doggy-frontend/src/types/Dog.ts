import { Breed } from "./Breeds"

export interface DogResponse {
    dogs: PaginatedDogs
}

export interface PaginatedDogs {
    current_page: number
    data: Dog[]
    from: number
    to: number
    total: number
    per_page: number
    last_page: number
}

export interface Dog {
    id: string,
    name: string
    size: string
    image: string
    breed_list: string
    breeds: []
    color: string
}

export interface DogDetailResponse {
    dog: Dog
    breeds: Breed[]
}