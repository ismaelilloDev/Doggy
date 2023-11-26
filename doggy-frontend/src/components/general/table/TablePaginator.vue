<template>
    <div v-if="pages.length > 0" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <button :disabled="currentPage === 1" @click="goToPreviousPage()" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</button>
            <button :disabled="currentPage >= lastPage" @click="goToNextPage()" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</button>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ from }}</span>
                    to
                    <span class="font-medium">{{to }}</span>
                    of
                    <span class="font-medium">{{ total }}</span>
                    results
                </p>
            </div>
            <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <button :disabled="currentPage === 1" @click="goToPreviousPage()" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
                </button>
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                <button
                    @click="changeCurrentPage(page)"
                    v-for="(page, index) of pages" 
                    :key="index" 
                    :class="page === currentPage? 'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600': 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0'"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold"
                    >{{ page }}
                </button>
                <button :disabled="currentPage >= lastPage" @click="goToNextPage()" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                </button>
            </nav>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { EventType } from "@/types/Event";
import { defineComponent } from "vue";
import emitter from '@/main';


export default defineComponent({
    data() {
        return {
            pages: [] as number[],
            currentPage: 0,
            from: 0,
            to: 0,
            total: 0,
            lastPage: 0
        }
    },

    created() {
        this.handlePaginationChange()
    },

    beforeDestroy() {
        emitter.off(EventType.TABLE_PAGINATION_UPDATE)
    },

    methods: {
        handlePaginationChange() {
            emitter.on(EventType.TABLE_PAGINATION_UPDATE, (paginatedData: any) => {
                this.from = paginatedData.from
                this.currentPage = paginatedData.current_page,
                this.to = paginatedData.to
                this.total = paginatedData.total
                this.lastPage = paginatedData.last_page

                if(this.lastPage === 1) {
                    this.pages = []
                    return;
                }

                if(this.lastPage <= 5) {
                    this.pages = this.generatePageRange(1, this.lastPage)
                    return;
                }

                if(this.currentPage < 3) {
                    this.pages = this.generatePageRange(1, 5)
                    return;
                }

                if(this.currentPage >= 3 && this.currentPage < this.lastPage - 1) {
                    this.pages = this.generatePageRange(this.currentPage - 2, this.currentPage + 2)
                }

            })
        },

        changeCurrentPage(page: number) {
            emitter.emit(EventType.CHANGE_PAGE_FROM_PAGINATOR, page)
        },

        generatePageRange(start: number, end: number) {
            return Array.from({length: end - start + 1}, (_, index) => start + index)
        },

        goToPreviousPage() {
            if(this.currentPage > 1) {
                this.changeCurrentPage(this.currentPage - 1)
            }
        },

        goToNextPage() {
            if(this.currentPage < this.lastPage) {
                this.changeCurrentPage(this.currentPage + 1)
            }
        }

    }
})
</script>