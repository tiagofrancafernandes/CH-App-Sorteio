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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>user--favorite</title><path d="M27.303,12a2.6616,2.6616,0,0,0-1.9079.8058l-.3932.4054-.397-.4054a2.6615,2.6615,0,0,0-3.8157,0,2.7992,2.7992,0,0,0,0,3.8964L25.0019,21l4.2089-4.2978a2.7992,2.7992,0,0,0,0-3.8964A2.6616,2.6616,0,0,0,27.303,12Z" transform="translate(0 0)"></path><path d="M2,30H4V25a5.0059,5.0059,0,0,1,5-5h6a5.0059,5.0059,0,0,1,5,5v5h2V25a7.0082,7.0082,0,0,0-7-7H9a7.0082,7.0082,0,0,0-7,7Z" transform="translate(0 0)"></path><path d="M12,4A5,5,0,1,1,7,9a5,5,0,0,1,5-5m0-2a7,7,0,1,0,7,7A7,7,0,0,0,12,2Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
