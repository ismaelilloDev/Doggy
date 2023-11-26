<template>
    
    <div class="w-full">
        <div class="w-full flex justify-end">
            <router-link :to="{name: 'dogCreate'}" class="text-white bg-indigo-600 px-2 py-1 rounded font-semibold">Create</router-link>
        </div>
        <table-list
            v-if="items" 
            :content="items"
            :headers="headers"
            :entity="'Dogs'"
            :description="'A list of all the dogs.'"
            :route-name="'dogDetail'"
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
                },
                {
                    type: 'text',
                    value: 'color',
                    label: 'Color',
                    enableSort: false
                }
            ],
            service: (page: number, orderDirection: string, search: string, field: string) => DogService.getAll(page, orderDirection, search, field),
            key: 'dogs'
        }
    },

});
</script>