export interface MedicalVisitsResponse {
    medical_visits : MedicalVisit[]
}

export interface MedicalVisit {
    id: string
    date: string
    dog_name: string
}