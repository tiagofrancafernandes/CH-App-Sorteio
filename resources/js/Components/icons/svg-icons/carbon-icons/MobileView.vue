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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="23" cy="24" r="2"></circle><path d="m30.7769,23.4785c-1.4229-3.3287-4.4761-5.4785-7.7769-5.4785s-6.3538,2.1499-7.7769,5.4785l-.2231.5215.2231.5215c1.4231,3.3287,4.4761,5.4785,7.7769,5.4785s6.354-2.1499,7.7769-5.4785l.2231-.5215-.2231-.5215Zm-7.7769,4.5215c-2.2056,0-4-1.7944-4-4s1.7944-4,4-4,4,1.7944,4,4-1.7944,4-4,4Z"></path><path d="m14,28h-5V8h14v7h2V4c0-1.103-.8975-2-2-2h-14c-1.103,0-2,.897-2,2v24c0,1.1025.897,2,2,2h5v-2ZM9,4h14v2h-14v-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
