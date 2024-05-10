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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="20" y="20" width="10" height="2"></rect><rect x="20" y="24" width="6" height="2"></rect><path d="M30,17V16A13.9871,13.9871,0,1,0,19.23,29.625l-.46-1.9463A12.0419,12.0419,0,0,1,16,28c-.19,0-.375-.0186-.563-.0273A20.3044,20.3044,0,0,1,12.0259,17Zm-2.0415-2H21.9751A24.2838,24.2838,0,0,0,19.2014,4.4414,12.0228,12.0228,0,0,1,27.9585,15ZM16.563,4.0273A20.3044,20.3044,0,0,1,19.9741,15H12.0259A20.3044,20.3044,0,0,1,15.437,4.0273C15.625,4.0186,15.81,4,16,4S16.375,4.0186,16.563,4.0273Zm-3.7644.4141A24.2838,24.2838,0,0,0,10.0249,15H4.0415A12.0228,12.0228,0,0,1,12.7986,4.4414Zm0,23.1172A12.0228,12.0228,0,0,1,4.0415,17h5.9834A24.2838,24.2838,0,0,0,12.7986,27.5586Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
