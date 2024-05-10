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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="circle_1" data-name="circle 1" d="M5,25a2,2,0,1,0,2,2A2.0059,2.0059,0,0,0,5,25Z"></path><path id="circle_2" data-name="circle 2" d="M16,25a2,2,0,1,0,2,2A2.0059,2.0059,0,0,0,16,25Z"></path><path id="circle_3" data-name="circle 3" d="M27,25a2,2,0,1,0,2,2A2.0059,2.0059,0,0,0,27,25Z"></path><path id="_Line" data-name=" Line" d="M28,23H26V11a2.0059,2.0059,0,0,0-2-2H22V7h2a4.0118,4.0118,0,0,1,4,4Z"></path><rect id="_Line-2" data-name=" Line" x="15" y="12" width="2" height="11"></rect><path id="_Line-3" data-name=" Line" d="M6,23H4V11A4.0118,4.0118,0,0,1,8,7h2V9H8a2.0059,2.0059,0,0,0-2,2Z"></path><path d="M16,2,14.7,4.6343l-2.9057.42,2.1029,2.0514L13.4,10,16,8.6343,18.6,10l-.4972-2.8943,2.1029-2.0486L17.3,4.6343Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
