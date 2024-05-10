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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="12" cy="21" r="1"></circle><path d="m23,25h-14c-1.1028,0-2-.8972-2-2v-4c0-1.1028.8972-2,2-2h14c1.1028,0,2,.8972,2,2v4c0,1.1028-.8972,2-2,2Zm-14-6v4h14v-4h-14Z"></path><circle cx="12" cy="11" r="1"></circle><path d="m23,15h-14c-1.1028,0-2-.8972-2-2v-4c0-1.1028.8972-2,2-2h14c1.1028,0,2,.8972,2,2v4c0,1.1028-.8972,2-2,2Zm-14-6v4h14v-4h-14Z"></path><path d="m28,30H4c-1.103,0-2-.897-2-2v-12h2v12h24V4h-12v-2h12c1.103,0,2,.897,2,2v24c0,1.103-.897,2-2,2Z"></path><rect x="8.5" y="1.5" width="5" height="2" transform="translate(13.5 -8.5) rotate(90)"></rect><rect x="1.9749" y="3.4749" width="5" height="2" transform="translate(4.4749 -1.8536) rotate(45)"></rect><rect y="10" width="5" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
