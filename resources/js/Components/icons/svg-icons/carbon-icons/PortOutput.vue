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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="30 16 23 9 21.5859 10.4141 26.1719 15 9 15 9 17 26.1719 17 21.5859 21.5859 23 23 30 16"></polygon><path d="M14,28c-6.6167,0-12-5.3832-12-12S7.3833,4,14,4c2.335,0,4.5986,.6714,6.5461,1.9414l-1.0923,1.6753c-1.6221-1.0576-3.5078-1.6167-5.4539-1.6167-5.5139,0-10,4.486-10,10s4.4861,10,10,10c1.946,0,3.8318-.5591,5.4539-1.6167l1.0923,1.6753c-1.9475,1.27-4.2112,1.9414-6.5461,1.9414Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
