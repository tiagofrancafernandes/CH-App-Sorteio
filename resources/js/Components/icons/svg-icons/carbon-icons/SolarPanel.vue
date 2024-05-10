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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,26V14H13V26h5v2H2v2H30V28H25V26Zm-5-2V21h3v3Zm-2-3v3H20V21Zm-3-2V16h3v3Zm8,0H25V16h3ZM18,16v3H15V16Zm-3,8V21h3v3Zm8,4H20V26h3Z" transform="translate(0 0)"></path><path d="M9.3328,14.981A4,4,0,1,1,16,12H14a2,2,0,1,0-3.3333,1.4907Z" transform="translate(0 0)"></path><rect x="11" y="2" width="2" height="4"></rect><rect x="2" y="11" width="4" height="2"></rect><rect x="5.3431" y="4.3431" width="2" height="4" transform="translate(-2.6274 6.3431) rotate(-45)"></rect><rect x="16.6569" y="4.3431" width="2" height="4" transform="translate(25.6569 23.3137) rotate(-135)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
