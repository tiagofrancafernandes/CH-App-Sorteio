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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,14H27V2H25V14H24a2.0019,2.0019,0,0,0-2,2v2a2.0023,2.0023,0,0,0,2,2h1V30h2V20h1a2.0027,2.0027,0,0,0,2-2V16A2.0023,2.0023,0,0,0,28,14Zm0,4H24V16h4Z" transform="translate(0 0.0049)"></path><path d="M18,6H17V2H15V6H14a2.0019,2.0019,0,0,0-2,2v2a2.0019,2.0019,0,0,0,2,2h1V30h2V12h1a2.002,2.002,0,0,0,2-2V8A2.002,2.002,0,0,0,18,6Zm0,4H14V8h4Z" transform="translate(0 0.0049)"></path><path d="M8,20H7V2H5V20H4a2.0023,2.0023,0,0,0-2,2v2a2.0023,2.0023,0,0,0,2,2H5v4H7V26H8a2.0023,2.0023,0,0,0,2-2V22A2.0023,2.0023,0,0,0,8,20Zm0,4H4V22H8Z" transform="translate(0 0.0049)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
