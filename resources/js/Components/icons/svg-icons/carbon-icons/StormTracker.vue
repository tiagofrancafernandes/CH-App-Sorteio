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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,2a1,1,0,0,0-.9736.771l-1.7229,7.3223a10.0653,10.0653,0,1,0,8.6032,8.603l7.3223-1.7227A1,1,0,0,0,30,16,14.0158,14.0158,0,0,0,16,2ZM11.293,20.707A1,1,0,0,0,12,21a1.013,1.013,0,0,0,.229-.0264l3.7622-.8852a3.996,3.996,0,1,1-4.08-4.08l-.8852,3.7622A1,1,0,0,0,11.293,20.707Zm2.05-2.0508,2.271-9.65a7.5018,7.5018,0,0,1,7.38,7.38ZM20,20a8,8,0,1,1-8-8,8.1017,8.1017,0,0,1,.8438.0469L12.38,14.019C12.2532,14.0107,12.127,14,12,14a6,6,0,1,0,6,6c0-.127-.011-.2534-.019-.38l1.9721-.4643A8.1048,8.1048,0,0,1,20,20Zm4.9707-4.0791a9.4981,9.4981,0,0,0-8.8914-8.8916l.7068-3.0039A12.0193,12.0193,0,0,1,27.9746,15.2139Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
