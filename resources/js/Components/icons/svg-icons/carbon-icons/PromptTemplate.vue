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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m31.5,23c-.8271,0-1.5-.6729-1.5-1.5v-1.5c0-1.1025-.8972-2-2-2h-2v2h2v1.5c0,.98.4072,1.8643,1.0581,2.5-.6509.6357-1.0581,1.52-1.0581,2.5v1.5h-2v2h2c1.1028,0,2-.8975,2-2v-1.5c0-.8271.6729-1.5,1.5-1.5h.5v-2h-.5Z"></path><path d="m16,20v1.5c0,.8271-.6729,1.5-1.5,1.5h-.5v2h.5c.8271,0,1.5.6729,1.5,1.5v1.5c0,1.1025.8972,2,2,2h2v-2h-2v-1.5c0-.98-.4072-1.8643-1.0581-2.5.6509-.6357,1.0581-1.52,1.0581-2.5v-1.5h2v-2h-2c-1.1028,0-2,.8975-2,2Z"></path><path d="m28,15h2V5c0-1.103-.8975-2-2-2h-3v2h3v10Z"></path><circle cx="23" cy="13" r="2"></circle><circle cx="16" cy="13" r="2"></circle><circle cx="9" cy="13" r="2"></circle><path d="m7,23h-3c-1.103,0-2-.8975-2-2V5c0-1.103.897-2,2-2h3v2h-3v16h3v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
