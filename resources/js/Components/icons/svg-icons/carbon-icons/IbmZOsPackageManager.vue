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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M15,9v10.172l-2.586-2.586L11,18l5,5l5-5l-1.414-1.414L17,19.172V9H15z"></path><path d="M19.758,26.65L16,28.842L5,22.426V18H3v5c0,0.355,0.189,0.685,0.496,0.864l12,7C15.652,30.955,15.826,31,16,31 s0.348-0.045,0.504-0.136l4.282-2.498L19.758,26.65z"></path><path d="M28.504,8.136l-4.269-2.49l-1.029,1.715L27,9.574v12.852l-3.787,2.209l1.029,1.715l4.262-2.486 C28.811,23.685,29,23.355,29,23V9C29,8.645,28.811,8.315,28.504,8.136z"></path><path d="M5,9.574l11-6.417l3.751,2.188L20.78,3.63l-4.276-2.494C16.348,1.045,16.174,1,16,1s-0.348,0.045-0.504,0.136l-12,7 C3.189,8.315,3,8.645,3,9v5h2V9.574z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
