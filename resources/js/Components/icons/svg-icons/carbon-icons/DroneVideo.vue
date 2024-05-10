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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="21" r="1"></circle><path d="M28,19V15H26v2H6V15H4v4h7v4.4116L7,25.6367V30H9V26.8125L12.26,25h7.481L23,26.8125V30h2V25.6367l-4-2.2251V19Zm-9,4H13V19h6Z" transform="translate(0 0)"></path><rect y="11" width="10" height="2"></rect><rect x="22" y="11" width="10" height="2"></rect><path d="M16,6a5.9817,5.9817,0,0,0-4.2407,1.7593l1.4136,1.4136a3.9936,3.9936,0,0,1,5.6542,0l1.4136-1.4136A5.9814,5.9814,0,0,0,16,6Z" transform="translate(0 0)"></path><path d="M8.9324,4.9321l1.4133,1.4136a7.9877,7.9877,0,0,1,11.3086,0l1.4136-1.4136a9.9844,9.9844,0,0,0-14.1355,0Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
