<script setup>

import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    community: Object
});

const form = useForm({
    title: '',
    url: '',
    description: ''
});

const submit = () => {
    form.post(route('community.post.store', props.community.slug), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};



</script>

<template>
    <Head title="Create Community" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post For {{ community.name }}
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="max-w-md mx-auto m-2 p-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div>
                                    <BreezeLabel for="title" value="Title" />
                                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus autocomplete="title" />
                                    <BreezeInputError class="mt-2" :message="form.errors.title" />
                                </div>

                                <div class="mt-4">
                                    <BreezeLabel for="url" value="Url" />
                                    <BreezeInput id="url" type="url" class="mt-1 block w-full" v-model="form.url" autofocus autocomplete="url" />
                                    <BreezeInputError class="mt-2" :message="form.errors.url" />
                                </div>

                                <div class="mt-4">
                                    <BreezeLabel for="description" value="Description" />
                                    <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" autocomplete="username" />
                                    <BreezeInputError class="mt-2" :message="form.errors.description" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Store
                                    </BreezeButton>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>




