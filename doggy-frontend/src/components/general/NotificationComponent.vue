<template lang="">
  <div v-if="display" class="flex w-full flex-col items-center space-y-4 sm:items-end z-50 fixed top-[2%] right-[2%]">
    <div class="pointer-events-auto w-full md:max-w-sm max-w-[280px] overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <svg v-if="type === 'success'" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <svg v-if="type === 'error'" class="h-6 w-6 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">{{message}}</p>
          </div>
          <div class="ml-4 flex flex-shrink-0">
            <button @click="resetNotificationStatus" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Close</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>
<script lang="ts">
import { EventType } from "@/types/Event";
import { defineComponent } from "vue";
import emitter from "@/main";

export default defineComponent({

  data() {
    return {
      display: false,
      message: '',
      type: ''
    }
  },

  created() {
    this.handleNotificationStatus()
  },

  beforeDestroy() {
    emitter.off(EventType.DISPLAY_NOTIFICATION)
  },

  methods: {
    handleNotificationStatus() {
      emitter.on(EventType.DISPLAY_NOTIFICATION, (notification: any) => {
        this.display = true,
        this.message = notification.message,
        this.type = notification.type
      })
    },

    resetNotificationStatus() {
      this.display = false,
      this.message = '',
      this.type = ''
    }
  }
    
});
</script>