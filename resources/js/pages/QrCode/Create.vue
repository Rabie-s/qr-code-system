<template>
    <div class="flex justify-center items-center h-screen">
        <form method="post" enctype="multipart/form-data" @submit.prevent="submit">
            <fwb-card href="#" class="w-sm p-2">

                <fwb-heading class="my-2" tag="h4">New QrCode</fwb-heading>

                <div class="m-2">
                    <fwb-input type="text" v-model="form.name" placeholder="enter qr code title" label="Title" />
                    <span v-if="errors.name" class="text-red-600 text-sm">{{ errors.name }}</span>
                </div>

                <div class="m-2">
                    <fwb-input type="color" v-model="form.foreground" placeholder="enter foreground"
                        label="Foreground" />
                    <span v-if="errors.foreground" class="text-red-600 text-sm">{{ errors.foreground }}</span>
                </div>

                <div class="m-2">
                    <fwb-input type="color" v-model="form.background" placeholder="enter background"
                        label="Background" />
                    <span v-if="errors.background" class="text-red-600 text-sm">{{ errors.background }}</span>

                </div>

                <div class="m-2">
                    <fwb-file-input label="Qr code image" name="image_path" @change="onFileChange" size="lg" />
                    <span v-if="errors.image_path" class="text-red-600 text-sm">{{ errors.image_path }}</span>

                </div>



                <div class="m-4">
                    <fwb-button type="submit" color="default">Save</fwb-button>
                </div>
            </fwb-card>
        </form>

    </div>
</template>
<script setup>
defineProps({ errors: Object })
import { useForm } from '@inertiajs/vue3'
import { FwbCard, FwbInput, FwbButton, FwbHeading, FwbFileInput } from 'flowbite-vue'

const error = true
const form = useForm({
    name: '',
    foreground: '#000000',
    background: '#ffffff',
    image_path: null,
})

const onFileChange = (e) => {
    form.image_path = e.target.files[0]
}

function submit() {
    form.post(route('qr-code.store'), {
        forceFormData: true,
    })
}
</script>