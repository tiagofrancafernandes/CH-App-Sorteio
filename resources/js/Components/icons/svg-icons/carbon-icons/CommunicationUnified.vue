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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,17H18a2.0025,2.0025,0,0,0-2,2v6a2.0025,2.0025,0,0,0,2,2h4V25H18V19H28v6H25.4648l-2.5937,3.8906L24.5352,30l2-3H28a2.0025,2.0025,0,0,0,2-2V19A2.0025,2.0025,0,0,0,28,17Z"></path><path d="M8.6667,24.1086l.8614-.8615a.8334.8334,0,0,1,.8988-.1844l1.0493.42A.8334.8334,0,0,1,12,24.2561v1.9082a.8334.8334,0,0,1-.8786.8341c-7.3546-.4578-8.84-6.6863-9.1158-9.0723A.8316.8316,0,0,1,2.8343,17H4.7085a.8335.8335,0,0,1,.7737.5238l.42,1.0493a.8332.8332,0,0,1-.1845.8988l-.8614.8614A4.5267,4.5267,0,0,0,8.6667,24.1086Z"></path><rect x="21" y="9" width="7" height="2"></rect><rect x="21" y="5" width="9" height="2"></rect><path d="M17,6,14,8.2V6a2.0024,2.0024,0,0,0-2-2H4A2.0024,2.0024,0,0,0,2,6v6a2.0024,2.0024,0,0,0,2,2h8a2.0024,2.0024,0,0,0,2-2V9.8L17,12ZM4,12V6h8v6Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
