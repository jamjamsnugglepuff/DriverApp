<script setup>
    import MainTemplate from '@/Layouts/MainTemplate.vue';
    import { Head } from '@inertiajs/vue3';
    import RegisterDrivingInstructorForm from '@/Components/Forms/RegisterDrivingInstructorForm.vue';

</script>

<template>
    <Head title="Register Driving Instructor" />
    <MainTemplate>
        <section class="max-w-[1200px] m-auto py-3">
            <RegisterDrivingInstructorForm>
                <h1 class="text-2xl font-extrabold">Register as driving instructor</h1>
            </RegisterDrivingInstructorForm>
        </section>
    </MainTemplate>
</template>
<style>
    .border{
        border-style:solid;
        border-color: black;
        border-width: 1px;
        overflow: auto;
        max-height: 200px
    }
</style>