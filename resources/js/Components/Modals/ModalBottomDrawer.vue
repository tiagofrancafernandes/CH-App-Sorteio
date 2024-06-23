<script setup>
import { get, set } from "radash";
import { useSlots, useAttrs, computed, ref } from 'vue'
const props = defineProps([
    'show',
    'showCloseButton',
    'id',
]);

const emit = defineEmits(['opening', 'opened', 'closing', 'closed'])

const slots = useSlots();
const attrs = useAttrs();

const showDrawer = computed(() => {
    let propsShow = props?.show ?? false;

    if (['false', '', 0, '0', '!true', 'no', false].includes(propsShow)) {
        return false;
    }

    return propsShow;
});

const showCloseButton = computed(() => {
    if (['false', '', 0, '0', '!true', 'no', false].includes(props?.showCloseButton ?? true)) {
        return false;
    }

    return true;
});

const drawerId = computed(() => {
    let propsId = getOrSetStaticValues(
        'drawer_id',
        props?.id || attrs?.id || ('drawer_' + Math.random().toString().slice(2, 9)),
    );

    return propsId;
});

const emitClosing = (event) => {
    emit('closing', {
        event,
        id: drawerId.value,
    })
}

let staticValues = ref({});

const getOrSetStaticValues = (key, valueOnNull) => {
    if (typeof key !== 'string' || !key.trim()) {
        return null;
    }

    key = key.trim();

    let value = get(staticValues.value, key);

    if (value === null) {
        set(staticValues.value, key, valueOnNull);
        return get(staticValues.value, key, valueOnNull);
    }

    return value;
}
</script>

<template>
<div
    v-show="showDrawer"
    class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none" tabindex="-1"
    :aria-labelledby="`${drawerId}-label`"
    aria-modal="true" role="dialog"
>
    <template
        v-if="slots.title"
    >
        <div class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
            <slot name="title"/>
        </div>
    </template>
    <template v-else>
        <h5
            :id="`${drawerId}-label`"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"
        >
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
        </svg>Bottom drawer</h5>
    </template>

    <template v-if="showCloseButton">
        <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white"
            @click.capture="emitClosing"
        >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </template>

    <slot name="header"></slot>
    <slot/>
    <slot name="footer"></slot>
</div>
</template>
