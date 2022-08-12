<script setup>
defineProps(['message']);
</script>

<template>
    <Transition name="slide-fade">
        <div v-show="message">
            <p class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                {{ message }}
            </p>
        </div>
    </Transition>
</template>

<style scoped>
    .slide-fade-enter-active {
        transition: all 0.3s ease-out;
    }

    .slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
    transform: translateY(10px);
    opacity: 0;
    }
</style>
