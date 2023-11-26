<template>
    <form @submit.prevent="send">
        <div class="space-y-3">
            <div class="border-b border-gray-900/10">
            <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-1 flex items-center gap-x-3">
                        <img v-if="previewImage || dog?.image" class="w-12 h-12 rounded-full object-cover shadow-lg" :src="previewImage? previewImage:dog.image"/>
                        <input
                            @change="handleFileChange"
                            type="file"
                            class="hidden"
                            id="fileInput"
                            accept="image/*"
                            />

                        <label
                        for="fileInput"
                        class="cursor-pointer rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                        >
                            <span>Upload image</span>
                        </label>

                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="dogName" class="block text-sm font-medium leading-6 text-gray-900">Dog's name</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input v-model="form.name" type="text" name="dogName" id="dogName" autocomplete="dogName" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Rookie">
                        </div>
                    </div>
                    <p v-if="v$.form.name.$error" class="text-red-500 text-xs my-1">Name field is required!</p>
                </div>

                <div class="sm:col-span-4">
                    <label for="size" class="block text-sm font-medium leading-6 text-gray-900">Size</label>
                    <select v-model="form.size" id="size" name="size" class="mt-2 block rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <p v-if="v$.form.size.$error" class="text-red-500 text-xs my-1">Size field is required!</p>
                <div class="sm:col-span-4">
                    <label for="dogColors" class="block text-sm font-medium leading-6 text-gray-900">Dog's color</label>
                    <div class="mt-2 mb-4">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input v-model="form.color" type="text" name="dogColors" id="dogColors" autocomplete="dogColors" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Black with some spots">
                        </div>
                        <p v-if="v$.form.color.$error" class="text-red-500 text-xs my-1">Color field is required!</p>
                    </div>
                </div>
                
            </div>
        </div>
            <div class="border-b border-gray-900/10 pb-4">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Breed</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Choose one or more breed!</p>

            <div class="mt-2 space-y-10">
                <fieldset>
                    <div class="mt-2 space-y-6">
                        <div v-for="(breed, index) of breeds" :key="index" class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input :checked="form.selectedBreeds.includes(breed.id)" @change="updateSelectedBreeds(breed.id)" :id="breed.id" :name="breed.name" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="candidates" class="font-medium text-gray-900">{{ breed.name }}</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

</template>
<script lang="ts">
import DogService from "@/services/DogService";
import BreedService from "@/services/BreedService";

import { Dog } from "@/types/Dog";
import { defineComponent } from "vue";
import { useVuelidate } from '@vuelidate/core'
import { required } from '@vuelidate/validators'
import { FormMode } from "@/types/Form";
import { Breed } from "@/types/Breeds";
import { NotificationType } from "@/types/Notifications";
import { EventType } from "@/types/Event";
import emitter from "@/main";

export default defineComponent({

    props:  {
        mode: String
    },

    setup () {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            name: null,
            form: {
                name: '',
                color: '',
                selectedBreeds: [] as string[],
                size: 'small',
                selectedFile: null
            },
            dog: {} as Dog,
            breeds: [] as Breed[],
            previewImage: null as string | ArrayBuffer | null,
        }
    },

    validations () {
        return {
            form: {
                name: {required},
                color: {required},
                size: {required},
            }
        }
    },

    mounted() {
        if(this.mode === FormMode.EDIT) {
            DogService.getById(this.$route.params.id as string)
            .then((response) =>  {
                this.dog = response.data.dog
                this.breeds = response.data.breeds
                this.initForm()
            })
            .catch(() => emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                            message: 'Something went wrong',
                            type: NotificationType.ERROR
                        }
                    ))
            return;
        }

        if(this.mode === FormMode.CREATE) {
            BreedService.getAll()
                .then((response) => {
                    this.breeds = response.data.breeds
                })
                .catch(() => {
                    emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                            message: 'Something went wrong',
                            type: NotificationType.ERROR
                        })
                })
        }
        
    },

    methods: {
        async send() {
            const isFormCorrect = await this.v$.$validate()
            if (!isFormCorrect) {
                return
            }
            const formData = this.formatFormData()

            if(this.mode === FormMode.EDIT) {
                DogService.update(this.dog.id, formData)
                    .then((response) => {
                        emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                            message: 'Saved successfully',
                            type: NotificationType.SUCCESS
                        })
                    })
                    .catch(() => {
                        emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                            message: 'Something went wrong',
                            type: NotificationType.ERROR
                        })
                    })
                return;
            }

            if(this.mode === FormMode.CREATE) {
                DogService.create(formData)
                    .then((response) => {
                        this.$router.push({
                            name: 'dogDetail',
                            params: {
                                id: response.data.dog.id
                            }
                        })
                    })
                    .catch(() => {
                        emitter.emit(EventType.DISPLAY_NOTIFICATION, {
                            message: 'Something went wrong',
                            type: NotificationType.ERROR
                        })
                    })
                return;
            }
            
        },

        handleFileChange(event: any) {
            this.form.selectedFile = event.target.files[0];
            if (this.form.selectedFile) {
                const reader = new FileReader();
                reader.onload = () => {
                    this.previewImage = reader.result;
                };
                reader.readAsDataURL(this.form.selectedFile);
            } else {
                this.previewImage = null;
            }
        },

        updateSelectedBreeds(id: string) {
            
            if(this.form.selectedBreeds.includes(id as never)) {
                this.form.selectedBreeds.splice(this.form.selectedBreeds.indexOf(id as never), 1)
                return
            }

            this.form.selectedBreeds.push(id as never)
        },

        initForm() {
            this.form.name = this.dog.name
            this.form.color = this.dog.color
            this.form.selectedBreeds = this.dog.breeds.map((breed: any) => breed.id)
            this.form.size = this.dog.size
        },

        formatFormData() {
            const formData = new FormData();

            formData.append('name', this.form.name)
            formData.append('color', this.form.color)
            formData.append('size', this.form.size)
            formData.append('selectedBreeds', JSON.stringify(this.form.selectedBreeds))

            if (this.form.selectedFile) {
                formData.append('image', this.form.selectedFile)
            }

            return formData
        }
    
    }
})
</script>