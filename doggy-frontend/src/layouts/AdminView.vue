<template>
<div>
  <div v-if="showNavBar" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-900/80"></div>

    <div class="fixed inset-0 flex">

      <div class="relative mr-16 flex w-full max-w-xs flex-1">

        <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
          <button @click="setShowNavBarState(false)" type="button" class="-m-2.5 p-2.5">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
          <div class="flex h-16 shrink-0 items-center">
            <img class="h-8 w-auto" src="https://ismaelillo.dev/images/ismaelillo-favicon.svg" alt="Your Company">
          </div>
          <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
              <li>
                <ul role="list" class="-mx-2 space-y-1">
                  <li>
                    <router-link :to="{name: 'dogs'}" :class="currentRouteName === 'dogs' ? ' bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold' :'text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'">
                      <svg :class="currentRouteName === 'dogs' ? 'h-6 w-6 shrink-0 text-gray-400 text-indigo-600' : 'h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                      </svg>
                        Dogs
                    </router-link>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
      <div class="flex h-16 shrink-0 items-center">
        <img class="h-8 w-auto" src="https://ismaelillo.dev/images/ismaelillo-favicon.svg" alt="Your Company">
      </div>
      <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
          <li>
            <ul role="list" class="-mx-2 space-y-1">
              <li>
                <router-link :to="{name: 'dogs'}" :class="currentRouteName === 'dogs' ? ' bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold' :'text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'"
                >
                  <svg :class="currentRouteName === 'dogs' ? 'h-6 w-6 shrink-0 text-gray-400 text-indigo-600' : 'h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>
                  Dogs
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="lg:pl-72">
    <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
      <button @click="setShowNavBarState(true)" type="button" class="-m-2.5 p-2.5 lg:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
      </button>
      <p class="w-full text-center text-indigo-600 font-semibold text-lg uppercase">Doggy!</p>
    </div>

    <main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
        <router-view />
      </div>
    </main>
  </div>

</div>

</template>
<script lang="ts">
import { defineComponent } from "vue"

export default defineComponent({

    data() {
      return {
        showNavBar: false
      }
    },

    computed: {
        currentRouteName() {
            return this.$route.name;
        },
    },

    methods: {
      setShowNavBarState(newState: boolean) {
        this.showNavBar = newState
      }
    }
})
</script>