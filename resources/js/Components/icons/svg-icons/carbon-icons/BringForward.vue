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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M12,15H10V12a2.0023,2.0023,0,0,1,2-2h3v2H12Z"></path><path d="M15,30H12a2.0023,2.0023,0,0,1-2-2V25h2v3h3Z"></path><rect x="18" y="28" width="4" height="2"></rect><path d="M28,30H25V28h3V25h2v3A2.0023,2.0023,0,0,1,28,30Z"></path><rect x="10" y="18" width="2" height="4"></rect><rect x="28" y="18" width="2" height="4"></rect><path d="M30,15H28V12H25V10h3a2.0023,2.0023,0,0,1,2,2Z"></path><rect x="18" y="10" width="4" height="2"></rect><path d="M8,22H4a2.0023,2.0023,0,0,1-2-2V4A2.0023,2.0023,0,0,1,4,2H20a2.0023,2.0023,0,0,1,2,2V8H20V4H4V20H8Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
