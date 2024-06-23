<script setup>
import { computed } from 'vue';
import { useSlots, useAttrs } from 'vue';

const slots = useSlots();
const attrs = useAttrs();

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

const disabled = computed(() => {
    return attrs?.disabled ?? props?.disabled;
})

const type = computed(() => {
    if (props.tag !== 'button') {
        return null;
    }

    return props.type;
})

const classes = computed(() => {
    let initialClasses = ([
        'inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-0 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800',
        {
            'opacity-[.5] cursor-not-allowed': disabled.value,
        },
    ]);

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

    // text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled

    return [
        ...initialClasses,
        (size.value in classesBySize ? classesBySize[size.value] : classesBySize['md']),
    ];
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
        :class="classes"
    >
        <slot name="left"/>
        <slot />
        <slot name="right"/>
    </component>
</template>
