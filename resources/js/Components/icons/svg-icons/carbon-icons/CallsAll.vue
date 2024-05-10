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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m26,12c-2.2091,0-4,1.7908-4,4s1.7909,4,4,4,4-1.7909,4-4-1.7908-4-4-4Zm0,6c-1.1028,0-2-.8972-2-2s.8972-2,2-2,2,.8972,2,2-.8972,2-2,2Z"></path><path d="m15,21v2h2.5859l-2.3008,2.3008c-.3911-.1875-.8235-.3008-1.2852-.3008-1.6543,0-3,1.3457-3,3s1.3457,3,3,3,3-1.3457,3-3c0-.4619-.1135-.894-.3005-1.2852l2.3005-2.3008v2.5859h2v-6h-6Zm-1,8c-.5515,0-1-.4487-1-1s.4485-1,1-1,1,.4487,1,1-.4485,1-1,1Z"></path><path d="m11.4143,11.4141l-1.4143,1.4146,2.1716,2.1714h-4.356c-.4141-1.1611-1.5137-2-2.8157-2-1.6543,0-3,1.3457-3,3s1.3457,3,3,3c1.302,0,2.4016-.8389,2.8157-2h4.356l-2.1716,2.1714,1.4143,1.4146,4.5857-4.5859-4.5857-4.5859Zm-6.4143,5.5859c-.5515,0-1-.4487-1-1s.4485-1,1-1,1,.4487,1,1-.4485,1-1,1Z"></path><path d="m19,5v2.5859l-2.3005-2.3008c.187-.3911.3005-.8232.3005-1.2852,0-1.6543-1.3457-3-3-3s-3,1.3457-3,3,1.3457,3,3,3c.4617,0,.894-.1133,1.2852-.3008l2.3008,2.3008h-2.5859v2h6v-6h-2Zm-6-1c0-.5513.4485-1,1-1s1,.4487,1,1-.4485,1-1,1-1-.4487-1-1Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
