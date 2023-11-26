<template>
    <button :disabled="!enableSort" @click="changeSort" class="flex items-center">
        <div scope="col" class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900 capitalize">
            {{ label }}
        </div>
        <svg v-if="direction" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" :class="direction === 'asc'? 'w-4 h-4': 'w-4 h-4 rotate-180'">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>  
    </button>
</template>
<script lang="ts">
import { EventType } from "@/types/Event";
import { SortChangeInfo } from "@/types/Table";
import { defineComponent } from "vue";
import emitter from '@/main';


export default defineComponent({
    data() {
        return {
            direction: ''
        }
    },

    props: {
        header: String,
        label: String,
        enableSort: Boolean
    },

    methods: {
        changeSort() {
            if(!this.enableSort) {
                return ;
            }
            switch (this.direction) {
                case '':
                    this.direction = 'asc';
                    break;
                case 'asc':
                    this.direction = 'desc';
                    break;
                default:
                    this.direction = '';
            }
            emitter.emit(EventType.TABLE_SORT_CHANGE, {header: this.header, direction: this.direction} as SortChangeInfo)
        }
    }
})
</script>