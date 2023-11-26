<template>
    <div>
        <header class="w-full flex items-center px-2 py-1 md:px-10 justify-between bg-[#0c3866] z-10 sticky top-0">
            <img 
            src="https://www.europelanguagejobs.com/statics/images/logo-elj-white.svg"
            alt="Europe Language Jobs"
            class="w-14 h-14">
            <div class="gap-x-6 flex items-center">
                <p class="text-sm text-white font-semibold">Jobs</p>
                <p class="text-sm text-white font-semibold hidden md:block">Candidates</p>
                <p class="text-sm text-white font-semibold hidden md:block">For Employers</p>
                <p class="text-sm text-white font-semibold hidden md:block">Career Advice</p>
                <p class="text-sm text-white font-semibold hidden md:block">Log in/ Sign up</p>

                <svg class="w-5 h-6 text-white md:hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </div>
        </header>
        



        <div class="bg-companies">
            <div class="px-6 pt-12 flex flex-col md:flex-row md:items-center md:gap-x-14">
                <div class="md:w-1/2">
                    <p class="text-white text-2xl font-semibold">
                    Find the perfect employee in our database of more than 25,000 new
                    multilingual candidates each month.
                    </p>
                    <button class="text-xl uppercase bg-white rounded-3xl font-bold py-2 shadow mt-8 text-[#0c3866] px-12">Post a job</button>
                </div>
                <div class="my-6 gap-y-4 md:w-1/2 space-y-6">
                    <div class="flex items-center gap-x-6">
                        <div class="w-16 h-16 flex justify-center">
                            <svg class="svg-inline--fa fa-users fa-w-20 fa-7x text-white" aria-hidden="true" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                        </div>
                        <div class="text-white">
                            <p class="text-lg font-bold">+ 2500</p>
                            <p class="">companies posting in more than 48 countries</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-6">
                        <div class="w-16 h-16 flex justify-center">
                            <svg class="svg-inline--fa fa-users fa-w-20 fa-7x text-white" aria-hidden="true" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                        </div>
                        <div class="text-white">
                            <p class="text-lg font-bold">+ 2500</p>
                            <p class="">companies posting in more than 48 countries</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-6">
                        <div class="w-16 h-16 flex justify-center">
                            <svg class="svg-inline--fa fa-users fa-w-20 fa-7x text-white" aria-hidden="true" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                        </div>
                        <div class="text-white">
                            <p class="text-lg font-bold">+ 2500</p>
                            <p class="">companies posting in more than 48 countries</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-6 flex items-center w-full">
                <div class="flex items-center justify-between w-full mb-6">
                    <svg class="w-8 h-8 text-white rounded-full arrow-bg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                    </svg>
                    <img class="w-24 h-24 md:w-72 md:h-36" src="https://static.europelanguagejobs.com/contents/banners/logo-ttec-611-874.svg"/>
                    <img class="w-24 h-24 md:w-72 md:h-36" src="https://static.europelanguagejobs.com/contents/banners/logo-ttec-611-874.svg"/>
                    <svg class="w-8 h-8 text-white rounded-full arrow-bg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                    </svg>
                </div>
            </div>
        </div>

        

        <div class="my-8">
            <p class="text-center text-lg">ELJ's <span class="font-bold">hiring solutions</span></p>
            <div class="text-[#0c3866] w-full flex items-center mx-auto flex-col md:flex-row">
                <div class="w-full mt-12 text-[#0c3866]">
                    <div class="flex items-center px-6 justify-between md:justify-end md:gap-x-16 md:pr-0">
                        <div class="text-center">
                            <img src="https://www.europelanguagejobs.com/statics/images/job-posting.svg"/>
                            <p class="font-bold uppercase mt-3">Job posting</p>
                        </div>
                        <div class="text-center">
                            <img src="https://www.europelanguagejobs.com/statics/images/cv-search.svg"/>
                            <p class="font-bold uppercase mt-3">CV Search</p>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-12 text-[#0c3866]">
                    <div class="flex items-center px-6 md:pl-16 justify-between md:justify-start md:gap-x-16">
                        <div class="text-center">
                            <img src="https://www.europelanguagejobs.com/statics/images/exposure-features.svg"/>
                            <p class="font-bold uppercase mt-3">CV Search</p>
                        </div>
                        <div class="text-center">
                            <img src="https://www.europelanguagejobs.com/statics/images/outreach-features.svg"/>
                            <p class="font-bold uppercase mt-3">CV Search</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="bg-[#007cc0] w-full py-8 px-6">
            <div class="flex items-center justify-center text-white font-semibold flex-col md:flex-row md:space-x-2">
                <p class="text-white text-center text-lg">Find more about our basic and personalized hiring solutions</p>
                <button class="text-lg mt-4 md:mt-0 uppercase bg-white rounded-3xl font-bold py-2 shadow mt-8 text-[#0c3866] px-8">Learn More</button>
            </div>
        </div>



        <div class="my-8">
            <p class="my-4 text-[#0c3866] font-bold text-center text-xl">ATS Partners & API Solutions</p>
            <div class="w-full px-6 flex items-center w-full my-8">
                <div class="flex items-center justify-between w-full mb-6">
                    <svg class="w-8 h-8 text-white rounded-full arrow-bg-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                    </svg>
                    <img class="w-24 h-24 md:w-72 md:h-36" src="https://www.europelanguagejobs.com/statics/images/broadbean.svg"/>
                    <img class="w-24 h-24 md:w-72 md:h-36" src="https://www.europelanguagejobs.com/statics/images/broadbean.svg"/>
                    <svg class="w-8 h-8 text-white rounded-full arrow-bg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                    </svg>
                </div>
            </div>
        </div>


        <div class="py-8 bg-[#007cc0]">
            <p class="text-lg md: text-xl text-white font-semibold text-center">Together, your hires, our goal!</p>
        </div>


        <footer class="py-8 px-6 bg-[#ebeff3] space-y-6 md:space-y-0 flex md:flex-row w-full md:justify-between flex-wrap md:gap-x-3">
            <div class="flex flex-col gap-y-3 md:w-2/6">
                <img class="w-24 h-24" src="https://www.europelanguagejobs.com/statics/images/logo-elj-no-bg.png"/>
                <p class="text-[#007cc0] font-semibold text-sm">Europe Language Jobs - the job board for expat jobs abroad</p>
                <p class="text-sm">We help expats find jobs in Europe using theirnative language and gain international experienceby working in a foreign country.</p>
            </div>
            <div class="flex md:flex-row w-full md:justify-between flex-wrap gap-x-6 gap-y-3 md:w-3/6">
                <div class="flex flex-col space-y-3 md:space-y-0 text-[#858586]">
                    <p class="font-bold uppercase text-[#0c3866] my-2">For Job Seekers</p>
                    <p class="text-sm">Find a Job</p>
                    <p class="text-sm">Create an account</p>
                    <p class="text-sm">Career Advice</p>
                </div>
                <div class="flex flex-col space-y-3 md:space-y-0 text-[#858586]">
                    <p class="font-bold uppercase text-[#0c3866] my-2">For Employers</p>
                    <p class="text-sm">Find a Job</p>
                    <p class="text-sm">Create an account</p>
                    <p class="text-sm">Career Advice</p>
                </div>
                <div class="flex flex-col space-y-3 md:space-y-0 text-[#858586]">
                    <p class="font-bold uppercase text-[#0c3866] my-2">Europe Language Jobs</p>
                    <p class="text-sm">Find a Job</p>
                    <p class="text-sm">Create an account</p>
                    <p class="text-sm">Career Advice</p>
                </div>
                <div class="flex flex-col space-y-3 md:space-y-0 text-[#858586]">
                    <p class="font-bold uppercase text-[#0c3866] my-2">Stay connected</p>
                    <div class="flex flex-wrap items-cente">
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                        <img class="w-6 h-6 m-1" src="https://www.europelanguagejobs.com/statics/icons/discord_icono.png"/>
                    </div>
                </div>  

                <div class="flex flex-col space-y-3 md:space-y-0 text-[#858586]">
                    <p class="font-bold uppercase text-[#0c3866] my-2">Get our App!</p>
                    <div class="flex items-center flex-wrap gap-x-3 gap-y-3">
                        <img src="https://static.europelanguagejobs.com/contents/images/go-places-application/google-mobile-button.svg">
                        <img src="https://static.europelanguagejobs.com/contents/images/go-places-application/app-mobile-button.svg">
                    </div>
                    
                </div>
            </div>          
        </footer>
    </div>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
    
})
</script>
<style scoped>
    .bg-companies {
        background-image: url('https://www.europelanguagejobs.com/statics/images/header/companies.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .arrow-bg {
        background-color: rgba(12, 56, 102, 0.6);
    }

    .arrow-bg-2 {
        background-color: rgba(12, 56, 102, 0.6);
    
    }

</style>