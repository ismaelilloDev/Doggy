<template>
    <div>
        <table-list
            v-if="items" 
            :content="items"
            :headers="headers"
            :entity="'Medical Visits'"
            :description="'All dogs medical visits.'"
        />
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import TableList from "@/components/general/table/TableList.vue";
import {TableMixin} from "@/components/general/table/TableMixin";
import MedicalVisitService from "@/services/MedicalVisitService";


export default defineComponent({
    components: { TableList },

    mixins: [TableMixin],
    
    data() {
        return {
            headers: [
                {
                    type: 'text',
                    value: 'date',
                    label: 'Date',
                    enableSort: true
                },
                {
                    type: 'text',
                    value: 'dog_name',
                    label: 'Dog',
                    enableSort: true
                },
            ],
            service: (page: number, orderDirection: string, search: string, field: string) => MedicalVisitService.getAll(page, orderDirection, search, field),
            key: 'medical_visits'
        }
    },
})
</script>