<script setup lang="js">
import { useSlots, useAttrs } from 'vue'

const props = defineProps({
    type: {
        type: String,
        default: 'button',
    },
    label: {
        type: String,
    }
})
const slots = useSlots()
const attrs = useAttrs()

</script>

<template>

<button
    :type="props.type"
    :class="[
        'text-gray-400',
        //'bg-transparent',
        'hover:bg-gray-200',
        'hover:text-gray-900',
        'rounded-lg',
        'text-sm',
        'w-8',
        'h-8',
        'inline-flex',
        'items-center',
        'justify-center',
        'border',
        'dark:border-gray-600',
        'dark:bg-gray-900/50',
        'dark:hover:bg-gray-600',
        'dark:hover:text-white',
    ]"
    :title="props.label"
>
    <slot/>
    <span class="sr-only">{{ props.label }}</span>
</button>
</template>
