<script setup>
import { computed } from 'vue'

const props = defineProps({
    size: {
        type: String,
        default: 'md',
    },
    tag: {
        type: String,
        default: 'button',
    },
    as: {
        type: String,
        default: 'button',
    },
    type: {
        type: String,
    },
    classes: {
        type: [String|Array|Object],
    },
})

const size = computed(() => {
    let sizes = ['sm', 'md', 'lg'];

    return sizes.includes(props.size) ? props.size : 'md';
})

const type = computed(() => {
    if (props.tag !== 'button') {
        return null;
    }

    return props.type;
})

const classes = computed(() => {
    if (props.classes) {
        return props.classes;
    }

    let classesBySize = {
        sm: [
            'px-2 py-1',
        ],
        md: [
            'px-4 py-2',
        ],
        lg: [
            'px-5 py-3',
        ],
    }

    return size.value in classesBySize ? classesBySize[size.value] : classesBySize['md'];
})

const tagName = computed(() => {
    let tag = props?.tag ?? props?.as;

    return [
        'a',
        'button',
        'Link',
    ].includes(tag) ? tag : 'button'
});
</script>

<template>
    <component
        :is='tagName'
        :type='type'
        class="px-4 py-2 me-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-0 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
        :class="classes"
    >
        <slot name="left"/>
        <slot />
        <slot name="right"/>
    </component>
</template>
