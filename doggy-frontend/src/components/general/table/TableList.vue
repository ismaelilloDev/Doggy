<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">{{ entity }}</h1>
                <p class="mt-2 text-sm text-gray-700">{{ description }}</p>
            </div>
        </div>
        <table-search/>
        <div v-if="content?.length > 0" class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th 
                                    v-for="(header, index) in headers" :key="index" 
                                 >
                                    <table-header :header="header.value" :label="header.label" :enable-sort="header.enableSort"/>
                                </th>
                            </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="(item, itemIndex) in content" :key="itemIndex">
                            <td 
                                v-for="(key, keyIndex) in headers" :key="keyIndex" 
                                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 capitalize"
                            >
                                <p v-if="key.type === 'text'">{{ item[key.value] }}</p>
                                <img v-if="key.type === 'image'" class="h-8 w-8 rounded-full object-cover" :src="item[key.value]"/>
                            </td>
                            <td>
                                <button @click="navigate(item['id'])" class="px-2 py-1 bg-indigo-600 text-white rounded font-semibold text-sm">See</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <table-paginator />
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import TableHeader from "./TableHeader.vue";
import TableSearch from "./TableSearch.vue";
import TablePaginator from "./TablePaginator.vue";


export default defineComponent({
  components: { TableHeader, TableSearch, TablePaginator },
    props: {
        headers: Array,
        content: Array,
        description: String,
        entity: String,
        routeName: String,
    },

    methods: {
        navigate(id: string) {
            this.$router.push({name: this.routeName, params: {id: id}})
        }
    }
})
</script>