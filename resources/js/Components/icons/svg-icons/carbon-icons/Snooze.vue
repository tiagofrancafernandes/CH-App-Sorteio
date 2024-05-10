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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>snooze</title><polygon points="20 14 20 12 12 12 12 14 17.5 14 12 20 12 22 20 22 20 20 14.507 20 20 14"></polygon><rect x="24.4999" y="3.9648" width="1.9993" height="5.0718" transform="translate(2.859 19.913) rotate(-44.9446)"></rect><path d="M16,28A11,11,0,1,1,27,17,11.0125,11.0125,0,0,1,16,28ZM16,8a9,9,0,1,0,9,9A9.01,9.01,0,0,0,16,8Z"></path><rect x="3.9646" y="5.501" width="5.0718" height="1.9993" transform="translate(-2.6927 6.5094) rotate(-45.0554)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
