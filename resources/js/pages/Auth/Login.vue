<template>
    <div class="flex justify-center items-center h-screen">
        <fwb-card href="#" class="w-sm p-2">

            <fwb-heading class="my-2" tag="h4">Login</fwb-heading>
            
            <div class="m-2">
                <fwb-input type="email" placeholder="enter your email" label="Email" />

            </div>

            <div class="m-2">
                <fwb-input type="password" placeholder="enter your password" label="Password" />

            </div>

            <div class="m-4">
                <fwb-button color="default">Login</fwb-button>
            </div>


        </fwb-card>
    </div>
</template>
<script setup>
import { FwbCard, FwbInput, FwbButton, FwbHeading } from 'flowbite-vue'
</script>