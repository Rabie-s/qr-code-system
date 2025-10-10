<template>
    <fwb-table hoverable>
        <fwb-table-head>
            <fwb-table-head-cell>Id</fwb-table-head-cell>
            <fwb-table-head-cell>Name</fwb-table-head-cell>
            <fwb-table-head-cell>Created By</fwb-table-head-cell>
            <fwb-table-head-cell>Created At</fwb-table-head-cell>
            <fwb-table-head-cell>
                <span class="sr-only">Edit</span>
            </fwb-table-head-cell>
        </fwb-table-head>
        <fwb-table-body>

            <fwb-table-row v-for="qrCode in qrCodes?.data">
                <fwb-table-cell>{{ qrCode.id }}</fwb-table-cell>
                <fwb-table-cell>{{ qrCode.name }}</fwb-table-cell>
                <fwb-table-cell>{{ qrCode.user?.name }}</fwb-table-cell>
                <fwb-table-cell>{{ qrCode.created_at }}</fwb-table-cell>
                <fwb-table-cell>
                    <div class=" space-x-2">
                        <fwb-a href="#">
                            Edit
                        </fwb-a>
                        <fwb-a href="#">
                            Show
                        </fwb-a>
                    </div>
                </fwb-table-cell>

            </fwb-table-row>
        </fwb-table-body>
    </fwb-table>

    <div v-if="qrCodes?.links && qrCodes?.links.length > 1" class="flex justify-center mt-6">
        <Pagination :links="qrCodes?.links" />
    </div>
</template>

<script setup lang="ts">
defineProps({ qrCodes: Object })
import Pagination from '@/Components/Pagination.vue';
import {
    FwbA,
    FwbTable,
    FwbTableBody,
    FwbTableCell,
    FwbTableHead,
    FwbTableHeadCell,
    FwbTableRow,
} from 'flowbite-vue'
</script>