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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>accessibility--color--filled</title><path d="M16,10a8.5975,8.5975,0,0,0-7.9648,6A8.5975,8.5975,0,0,0,16,22a8.5975,8.5975,0,0,0,7.9648-6A8.5975,8.5975,0,0,0,16,10Zm0,10a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,16,20Z"></path><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,22a10.6543,10.6543,0,0,1-9.97-7.7578L5.9692,16l.0606-.2422A10.6543,10.6543,0,0,1,16,8a10.6543,10.6543,0,0,1,9.97,7.7578L26.0308,16l-.0606.2422A10.6543,10.6543,0,0,1,16,24Z"></path><circle cx="16" cy="16" r="2"></circle><path id="inner-path_2" data-name="inner-path 2" class="cls-1" d="M16,20a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,16,20Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,16,14Z" style="fill:none"></path><path id="inner-path_1" data-name="inner-path 1" class="cls-1" d="M16,24a10.6547,10.6547,0,0,1-9.97-7.7576L5.9692,16l.0606-.2424A10.6547,10.6547,0,0,1,16,8a10.6547,10.6547,0,0,1,9.97,7.7576L26.0308,16l-.0606.2424A10.6547,10.6547,0,0,1,16,24ZM8.0352,16A8.5975,8.5975,0,0,0,16,22a8.5975,8.5975,0,0,0,7.9648-6A8.5975,8.5975,0,0,0,16,10,8.5975,8.5975,0,0,0,8.0352,16Z" style="fill:none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
