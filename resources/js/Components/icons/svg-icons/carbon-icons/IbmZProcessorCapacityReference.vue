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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="25" y="25" width="2" height="4"></rect><rect x="21" y="23" width="2" height="6"></rect><rect x="29" y="20" width="2" height="9"></rect><path d="m30,17V5c0-1.1046-.8954-2-2-2h-9c-1.1046,0-2,.8954-2,2v24h2V5h9v12h2Z"></path><path d="m13,3H4c-1.1046,0-2,.8954-2,2v22c0,1.1046.8954,2,2,2h9c1.1046,0,2-.8954,2-2V5c0-1.1046-.8954-2-2-2Zm-9,2.9635l8.2998,6.0365-8.2998,6.0365V5.9635Zm0,21.0365v-5.0366l6.9253,5.0366h-6.9253Zm9-.9635l-8.2998-6.0365,8.2998-6.0365v12.073Zm0-15.9999l-6.9253-5.0366h6.9253v5.0366Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
