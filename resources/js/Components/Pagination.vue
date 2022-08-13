<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    defineProps({
        links: []
    })
</script>

<template>
    <div class="flex bg-white">
        <template v-for=" (link, key) in links ">
            <div v-if="link.url === null" v-html="link.label"
                class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm border rounded"
            ></div>
            <Link v-else :href="link.url" v-html="link.label"
                class="mb-1 mr-1 px-4 py-3 text-gray-900 text-sm border rounded hover:border-indigo-600 hover:text-indigo-600  focus:text-indigo-600 focus:border-indigo-600"
                :class="{ 'bg-indigo-600 text-white' : link.active}"
            ></Link>
        </template>
    </div>
</template>
