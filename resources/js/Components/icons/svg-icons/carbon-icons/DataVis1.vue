<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>data-vis--1</title><path d="M26,22a3.9553,3.9553,0,0,0-2.0193.5667L20.167,18.7529a4.9654,4.9654,0,0,0,0-5.5058L22.714,10.7A3.0284,3.0284,0,1,0,21.3,9.286l-2.547,2.547a4.9654,4.9654,0,0,0-5.5058,0L9.4332,8.0191A3.9553,3.9553,0,0,0,10,6a4,4,0,1,0-4,4,3.9553,3.9553,0,0,0,2.0191-.5668l3.8139,3.8139a4.9654,4.9654,0,0,0,0,5.5058L8.0192,22.5668A3.9556,3.9556,0,0,0,6,22a4,4,0,1,0,4,4,3.9553,3.9553,0,0,0-.5667-2.0192l3.8138-3.8138A4.9686,4.9686,0,0,0,15,20.8989v3.2848a3,3,0,1,0,2,0V20.8989a4.9686,4.9686,0,0,0,1.7529-.7319l3.8138,3.8137A3.9553,3.9553,0,0,0,22,26a4,4,0,1,0,4-4ZM16,13a3,3,0,1,1-3,3A3.0033,3.0033,0,0,1,16,13ZM4,6A2,2,0,1,1,6,8,2.002,2.002,0,0,1,4,6ZM6,28a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,6,28Zm20,0a2,2,0,1,1,2-2A2.0027,2.0027,0,0,1,26,28Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
