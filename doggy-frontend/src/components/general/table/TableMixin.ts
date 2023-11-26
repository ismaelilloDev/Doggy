import { EventType } from "@/types/Event"
import { TablePaginationData } from "@/types/Pagination"
import { NotificationType } from '@/types/Notifications';
import emitter from '@/main';


export const TableMixin = {

    data() {
        return {
            items: [],
            originalItems: [],
            page: 1, 
            orderDirection: '', 
            search: '', 
            field: ''
        }
    },
    
    mounted() {
        (this as any).getItems((this as any).$data.service, (this as any).$data.key)
    },

    created() {
        (this as any).handleSortChange();
        (this as any).handleSearch();
        (this as any).handlePageChange();
    },

    beforeDestroy() {
        emitter.off(EventType.TABLE_SORT_CHANGE)
        emitter.off(EventType.TABLE_SEARCH)
        emitter.off(EventType.CHANGE_PAGE_FROM_PAGINATOR)
    },

    methods: {

        getFormatedPaginationData(response: any): TablePaginationData {
            return {
                current_page: response.current_page,
                from: response.from,
                to: response.to,
                total: response.total,
                per_page: response.per_page,
                last_page: response.last_page
            }
        },

        handleSortChange() {
            emitter.on(EventType.TABLE_SORT_CHANGE, (data: any) => {
                (this as any).$data.page = 1;
                (this as any).$data.orderDirection = data.direction;
                (this as any).$data.field = data.header
                this.getItems((this as any).$data.service, (this as any).$data.key)
            })
        },

        handleSearch() {
            emitter.on(EventType.TABLE_SEARCH, (search: any) => {
                (this as any).$data.page = 1;
                (this as any).$data.search = search;
                this.getItems((this as any).$data.service, (this as any).$data.key)
            })
        },

        handlePageChange() {
            emitter.on(EventType.CHANGE_PAGE_FROM_PAGINATOR, (page: any) => {
                (this as any).$data.page = page
                this.getItems((this as any).$data.service, (this as any).$data.key)
            })
        },

        getItems(service: any, key: string) {
            service((this as any).$data.page, (this as any).$data.orderDirection, (this as any).$data.search, (this as any).$data.field)
                .then((response: any) => {
                    (this as any).$data.items = response.data[key].data;
                    (this as any).$data.originalItems = (this as any).$data.items.slice();
                    emitter.emit(EventType.TABLE_PAGINATION_UPDATE, this.getFormatedPaginationData(response.data[key]))
                })
                .catch(() => {
                    emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                        message: 'Something went wrong',
                        type: NotificationType.ERROR
                    })
                })
        },
    },
}