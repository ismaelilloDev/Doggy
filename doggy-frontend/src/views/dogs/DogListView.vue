<template>
    <div class="w-full">
        <table-list 
            v-if="items" 
            :content="items"
            :headers="headers"
            :entity="'Dogs'"
            :description="'A list of all the dogs.'"
            :route-name="'dogs'"
        />
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import TableList from "@/components/general/table/TableList.vue";
import {TableMixin} from "@/components/general/table/TableMixin";
import DogService from "@/services/DogService";


export default defineComponent({

    components: { TableList },

    mixins: [TableMixin],
    
    data() {
        return {
            headers: [
                {
                    type: 'image',
                    value: 'image',
                    label: 'image',
                    enableSort: false
                },
                {
                    type: 'text',
                    value: 'name',
                    label: 'name',
                    enableSort: true
                },
                {
                    type: 'text',
                    value: 'breed_list',
                    label: 'breeds',
                    enableSort: false
                }
            ],
            service: (page: number, orderDirection: string, search: string, field: string) => DogService.getAll(page, orderDirection, search, field),
            key: 'dogs'
        }
    },

});
</script>