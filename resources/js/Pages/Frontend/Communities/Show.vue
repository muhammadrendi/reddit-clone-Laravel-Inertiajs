<template>
    <guest-layout>
        <div class="flex justify-end m-2 p-2">
            <Link v-if="$page.props.auth.auth_check"
            :href="route('community.post.create', community.slug)"
            class="px-3 py-2 bg-indigo-600 rounded-lg hover:bg-indigo-500 shadow-lg text-white"
            >Create Post</Link>
        </div>
        <h1>Community {{ community.name }} show page</h1>
    </guest-layout>
</template>

<script setup>
    import GuestLayout from "@/Layouts/Guest.vue";
    import {Link} from "@inertiajs/inertia-vue3";

    defineProps({
        community: Object()
    });
</script>
