<template>
    <div>
        <dog-form mode="create"/>
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import DogForm from "../../components/dog/DogForm.vue";

export default defineComponent({
    components: {
        DogForm
    },
})
</script>