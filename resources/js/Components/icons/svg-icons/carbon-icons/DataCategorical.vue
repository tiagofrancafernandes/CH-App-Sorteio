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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m29,30h-10c-.5522,0-1-.4478-1-1v-10c0-.5522.4478-1,1-1h10c.5522,0,1,.4478,1,1v10c0,.5522-.4478,1-1,1Zm-9-2h8v-8h-8v8Z"></path><path d="m8,30c-3.3083,0-6-2.6917-6-6s2.6917-6,6-6,6,2.6917,6,6-2.6917,6-6,6Zm0-10c-2.2056,0-4,1.7944-4,4s1.7944,4,4,4,4-1.7944,4-4-1.7944-4-4-4Z"></path><path d="m22,14h-12c-.3604,0-.6926-.1938-.8701-.5073s-.1729-.6982.0127-1.0072L15.1446,2.4822c.1937-.3229.5246-.4822.8554-.4822s.6617.1593.8554.4822l6.002,10.0033c.1855.309.1902.6937.0127,1.0072s-.5098.5073-.8701.5073Zm-10.2339-2h8.4678l-4.2339-7.0564-4.2339,7.0564Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
