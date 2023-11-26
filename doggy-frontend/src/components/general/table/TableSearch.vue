<template>
    <div class="my-8 flex items-center">
        <label for="search-field" class="sr-only">{{'search'}}</label>
        <svg class="pointer-events-none w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
        </svg>
        <input @input="updateSearch" v-model="search" id="search-field" class="block h-full w-full border-0 py-0 pl-8 pr-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="search..." type="search" name="search">
    </div>
</template>
<script lang="ts">

import { EventType } from "@/types/Event";
import { defineComponent } from "vue";
import emitter from '@/main';
import { debounce } from "@/helpers";

export default defineComponent({
    data() {
        return {
            search: '',
        }
    },

    methods: {
      updateSearch: debounce(function (this: { search: string }, search: string) {
        emitter.emit(EventType.TABLE_SEARCH, this.search);
      }, 500),
    }
})
</script>