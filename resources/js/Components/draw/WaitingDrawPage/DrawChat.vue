<script setup lang="js">
import {
    ref,
    // useSlots, useAttrs,
 } from 'vue';

// const props = defineProps(['label']);
// const slots = useSlots();
// const attrs = useAttrs();

let fakeImages = [
    '//penguinui.s3.amazonaws.com/component-assets/avatar-8.webp',
    '//images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80',
    '//images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80',
    '//images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80',
    '//images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80',
];

let fakeMembers = [
    {avatar: fakeImages[0], online: true, name: 'Daniela Stella Valência Filho',},
    {avatar: fakeImages[1], online: false, name: 'Eva Rodrigues Filho',},
    {avatar: fakeImages[2], online: true, name: 'Samara Sandoval Galindo',},
    {avatar: fakeImages[3], online: false, name: 'Verônica Alcantara Esteves Sobrinho',},
    {avatar: fakeImages[4], online: true, name: 'Regiane Simone Rocha',},
    {avatar: fakeImages[0], online: true, name: 'Aline Milena Deverso',},
    {avatar: fakeImages[1], online: true, name: 'Madalena Casanova Duarte Neto',},
    {avatar: fakeImages[2], online: true, name: 'Milena Valentin Burgos',},
    {avatar: fakeImages[3], online: false, name: 'Liz Correia Sobrinho',},
    {avatar: fakeImages[4], online: true, name: 'Laís Cortês Padrão',},
];

let members = ref([
    ...fakeMembers,
    ...fakeMembers,
]);

const initials = (value, joiner = '.') => {
    if (!value || typeof value !== 'string') {
        return '';
    }

    joiner = typeof joiner === 'string' ? joiner : '';

    return `${value}`
        .trim()
        .split(' ')
        .map(item => item.trim())
        .filter(item => item && !item.endsWith('.') && item.length > 2)
        .map(item => item.slice(0, 1))
        .join(joiner).concat(joiner);
}

</script>

<template>
<section class="h-screen flex overflow-hidden">
    <div class="w-9/12">
        <h3 class="text-1xl mb-8 text-center font-bold">Chat da apliação: Fiscalização bb6 XPTO Aplicação 12 asdasd ad </h3>
        <div class="flex w-full flex-col gap-4">
            <!-- Recieved -->
            <div class="flex items-end gap-2">
                <img class="size-8 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="avatar" />
                <div class="mr-auto flex max-w-[70%] flex-col gap-2 rounded-r-xl rounded-tl-xl bg-slate-100 p-4 text-slate-700 md:max-w-[60%] dark:bg-slate-800 dark:text-slate-300">
                    <span class="font-semibold text-black dark:text-white">Penguin UI</span>
                    <div class="text-sm">
                        Hi there! How can I assist you today?
                    </div>
                    <span class="ml-auto text-xs">11:32 AM</span>
                </div>
            </div>

            <!-- Sent -->
            <div class="flex items-end gap-2">
                <div class="ml-auto flex max-w-[70%] flex-col gap-2 rounded-l-xl rounded-tr-xl bg-blue-700 p-4 text-sm text-slate-100 md:max-w-[60%] dark:bg-blue-600 dark:text-slate-100">
                    I accidentally deleted some important files. Can they be recovered?
                    <span class="ml-auto text-xs">11:34 AM</span>
                </div>
                <span class="flex size-8 items-center justify-center overflow-hidden rounded-full border border-slate-300 bg-slate-100 text-sm font-bold tracking-wider text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">JS</span>
            </div>

            <!-- Recieved -->
            <div class="flex items-end gap-2">
                <img class="size-8 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="avatar" />
                <div class="flex gap-1">
                    <span class="size-1.5 rounded-full bg-slate-700 motion-safe:animate-[bounce_1s_ease-in-out_infinite] dark:bg-slate-300"></span>
                    <span class="size-1.5 rounded-full bg-slate-700 motion-safe:animate-[bounce_0.5s_ease-in-out_infinite] dark:bg-slate-300"></span>
                    <span class="size-1.5 rounded-full bg-slate-700 motion-safe:animate-[bounce_1s_ease-in-out_infinite] dark:bg-slate-300"></span>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 bg-white p-0 shadow-xl ring-gray-900/5">
            <div class="fixed bottom-0 w-screen" style="width: -moz-available">
                <div class="grid grid-cols-12 gap-x-4">
                    <div class="col-span-12">
                        <form>
                            <label for="chat" class="sr-only">Your message</label>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
                                    </svg>
                                    <span class="sr-only">Add emoji</span>
                                </button>
                                <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                                    <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-3/12 overflow-y-scroll md:ml-3 border border-blue-300 dark:border-blue-900 rounded-md">
        <ol
            class="space-y-4 p-1 overflow-y-scroll overflow-auto h-full "
        >
            <li v-for="(member, memberIndex) in members" :key="memberIndex">
                <div
                    class="cursor-pointer w-full p-4 rounded-lg"
                    :class="[
                        {
                            'border': memberIndex !== 3,
                            'dark:border-gray-700 hover:border-blue-300 hover:dark:border-blue-800': memberIndex !== 3,
                            'text-gray-900 dark:text-gray-400': memberIndex !== 3,
                            'bg-gray-100 dark:bg-gray-800': memberIndex !== 3,

                            'border': memberIndex === 3,
                            'bg-blue-200 dark:bg-blue-800/50': memberIndex === 3,
                            'text-blue-700 dark:text-blue-400': memberIndex === 3,
                            'border-blue-300 dark:border-blue-800': memberIndex === 3,
                        }
                    ]"
                    role="alert"
                >
                    <div class="flex items-center justify-between">
                        <span class="sr-only">M. S.</span>
                        <div class="w-full grid grid-cols-8 gap-x-2 items-center">
                            <img class="size-8 rounded-full object-cover col-span-2" :src="member.avatar" alt="avatar" />
                            <h3 class="font-medium items-center col-span-5 overflow-hidden">{{ initials(member.name) }}</h3>
                            <span
                                :class="[
                                    'size-3 rounded-full col-span-1',
                                    {
                                        'bg-gray-500': !member.online,
                                        'bg-green-600': member.online,
                                    }
                                ]"
                            ></span>
                        </div>
                    </div>
                </div>
            </li>
        </ol>

        <!-- <div
            class="overflow-auto h-full relative mx-auto bg-white dark:bg-slate-800 dark:highlight-white/5 shadow-lg ring-1 ring-black/5 rounded-xl flex flex-col divide-y dark:divide-slate-200/5 md:mr-3"
        >
            <div class="flex items-center gap-4 p-4">
                <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80">
                <div class="flex flex-col">
                <strong class="text-slate-900 text-sm font-medium dark:text-slate-200">Andrew Alfred</strong>
                <span class="text-slate-500 text-sm font-medium dark:text-slate-400">Technical advisor</span>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4">
                <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80">
                <div class="flex flex-col">
                <strong class="text-slate-900 text-sm font-medium dark:text-slate-200">Debra Houston</strong>
                <span class="text-slate-500 text-sm font-medium dark:text-slate-400">Analyst</span>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4">
                <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80">
                <div class="flex flex-col">
                <strong class="text-slate-900 text-sm font-medium dark:text-slate-200">Jane White</strong>
                <span class="text-slate-500 text-sm font-medium dark:text-slate-400">Director, Marketing</span>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4">
                <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80">
                <div class="flex flex-col">
                <strong class="text-slate-900 text-sm font-medium dark:text-slate-200">Ray Flint</strong>
                <span class="text-slate-500 text-sm font-medium dark:text-slate-400">Technical Advisor</span>
                </div>
            </div>
        </div> -->
    </div>
</section>
</template>
