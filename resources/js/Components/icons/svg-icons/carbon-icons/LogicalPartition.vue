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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="9" cy="7" r="1"></circle><path d="M27,22v-4c0-1.1046-.8954-2-2-2h-8v-4h9c1.1046,0,2-.8954,2-2V4c0-1.1046-.8954-2-2-2H6c-1.1046,0-2,.8954-2,2v6c0,1.1046,.8954,2,2,2H15v4H7c-1.1046,0-2,.8954-2,2v4h-1c-1.1046,0-2,.8954-2,2v4c0,1.1046,.8954,2,2,2h4c1.1046,0,2-.8954,2-2v-4c0-1.1046-.8954-2-2-2h-1v-4H15v4h-1c-1.1046,0-2,.8954-2,2v4c0,1.1046,.8954,2,2,2h4c1.1046,0,2-.8954,2-2v-4c0-1.1046-.8954-2-2-2h-1v-4h8v4h-1c-1.1046,0-2,.8954-2,2v4c0,1.1046,.8954,2,2,2h4c1.1046,0,2-.8954,2-2v-4c0-1.1046-.8954-2-2-2h-1Zm-19,6H4v-4h4v4Zm10-4v4h-4v-4h4ZM6,10V4H26v6H6ZM28,28h-4v-4h4v4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
