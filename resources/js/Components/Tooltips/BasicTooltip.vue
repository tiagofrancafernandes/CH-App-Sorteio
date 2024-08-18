<script setup lang="js">
import {
    useSlots,
    useAttrs,
    ref,
} from 'vue';

const props = defineProps({
    label: {
        type: String,
    },
    position: { // WIP
        type: String,
        default: 'top',
    },
});

// const slots = useSlots();
// const attrs = useAttrs();

let showPopOver = ref(!false);

</script>

<template>
<button
    data-tooltip-target="tooltip-default"
    v-on:mouseenter="showPopOver = true"
    v-on:mouseover="showPopOver = true"
    v-on:mouseleave="showPopOver = false"
    type="button"
    :class="[
        'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
    ]"
>Default tooltip</button>

<div
    id="tooltip-default"
    role="tooltip"
    :style="{
        position: 'absolute',
        _inset: 'auto auto 0px 0px',
        _margin: '0px',
        _transform: 'translate(310px, -58px)',
    }"
    :class="[
        'absolute',
        'left-0',
        'z-10',
        'inline-block',
        'px-3',
        'py-2',
        'text-sm',
        'font-medium',
        'text-white',
        'transition-opacity',
        'duration-300',
        'bg-gray-900',
        'rounded-lg',
        'shadow-sm',
        'tooltip',
        'dark:bg-gray-700',
        {
            'opacity-0': !showPopOver,
            'invisible': !showPopOver,
            'opacity-100': showPopOver,
            'visible': showPopOver,
        }
    ]"
>
    Tooltip content
</div>
</template>
