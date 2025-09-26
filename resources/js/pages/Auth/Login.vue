<template>
    <div class="flex justify-center items-center h-screen">
        <Form method="post" :action="route('user.auth.loginUser')">
            <fwb-card href="#" class="w-sm p-2">

                <fwb-heading class="my-2" tag="h4">Login</fwb-heading>

                <div class="m-2">
                    <fwb-input type="email" name="email" placeholder="enter your email" label="Email" />

                </div>

                <div class="m-2">
                    <fwb-input type="password" name="password" placeholder="enter your password" label="Password" />

                </div>

                <div class="m-4">
                    <fwb-button type="submit" color="default">Login</fwb-button>
                </div>
            </fwb-card>
        </Form>

    </div>
</template>
<script setup>
import { Form } from '@inertiajs/vue3'
import { FwbCard, FwbInput, FwbButton, FwbHeading } from 'flowbite-vue'
</script>