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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="28" y="22" width="2" height="8"></rect><rect x="24" y="18" width="2" height="12"></rect><rect x="20" y="26" width="2" height="4"></rect><path d="M9,16a7,7,0,1,0,7,7A7.0078,7.0078,0,0,0,9,16Zm4.8989,6H10V18.1011A5.0145,5.0145,0,0,1,13.8989,22ZM9,28a5,5,0,0,1-1-9.8989V22a2,2,0,0,0,2,2h3.8989A5.0081,5.0081,0,0,1,9,28Z"></path><path d="M22.5352,12l4-6H30V4H25.4648l-4,6H18V2H16V14a2,2,0,0,0,2,2H30V14H18V12Z"></path><circle cx="11" cy="7" r="1"></circle><circle cx="9" cy="11" r="1"></circle><circle cx="7" cy="5" r="1"></circle><circle cx="5" cy="9" r="1"></circle><circle cx="3" cy="13" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
