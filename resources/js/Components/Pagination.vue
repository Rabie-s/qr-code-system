<template>
  <div v-if="links.length > 3" class="flex justify-center mt-8">
    <fwb-pagination
      :total-pages="totalPages"
      v-model="currentPage"
      :show-icons="true"
      @update:model-value="goToPage"
    />
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue'
import { FwbPagination } from 'flowbite-vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  links: { type: Array, required: true }
})

// Extract the current active page and total pages
const currentPage = ref(getCurrentPage(props.links))
const totalPages = computed(() => props.links.length - 2) // remove prev/next

watch(
  () => props.links,
  (newLinks) => {
    currentPage.value = getCurrentPage(newLinks)
  }
)

function getCurrentPage(links) {
  const activeLink = links.find(l => l.active)
  return activeLink ? parseInt(activeLink.label) : 1
}

// When pagination changes
function goToPage(page) {
  const link = props.links.find(l => l.label == page.toString())
  if (link && link.url) {
    router.visit(link.url)
  }
}
</script>
