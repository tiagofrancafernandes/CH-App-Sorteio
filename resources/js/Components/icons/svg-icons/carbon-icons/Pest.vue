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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="7.5" cy="9.5" r="1.5"></circle><circle cx="13" cy="13" r="1"></circle><circle cx="22" cy="21" r="1"></circle><path d="M25,14a8.9844,8.9844,0,0,0-7,3.3555V13a10.9054,10.9054,0,0,0-1.0093-4.5845l-.3569-.7768L15.811,7.87A2.9549,2.9549,0,0,1,15,8a3.0033,3.0033,0,0,1-3-3,2.9574,2.9574,0,0,1,.1294-.8105l.2324-.8233-.7773-.3569A10.9115,10.9115,0,0,0,7,2H2V9a10.8954,10.8954,0,0,0,2.2339,6.627l.3887.4277.54-.0381a5.5286,5.5286,0,0,1,5.3628,3.2559l.2207.497.5376.0845A11.0219,11.0219,0,0,0,13,20h3V30h2V26h3a9.01,9.01,0,0,0,9-9V14ZM12.1016,17.9468A7.51,7.51,0,0,0,5.5283,14,8.8945,8.8945,0,0,1,4,9V4H7a8.8624,8.8624,0,0,1,3.0259.53A4.2457,4.2457,0,0,0,10,5a4.9658,4.9658,0,0,0,5.47,4.9736A8.8793,8.8793,0,0,1,16,13v5H13A8.1153,8.1153,0,0,1,12.1016,17.9468ZM28,17a7.0078,7.0078,0,0,1-7,7H18V23a7.01,7.01,0,0,1,5.0212-6.7109A1.4971,1.4971,0,1,0,26,16.5a1.485,1.485,0,0,0-.0918-.5H28Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
