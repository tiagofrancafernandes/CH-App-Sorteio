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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28,26c-.7384,0-1.3762.4047-1.7226,1h-5.2774l7.7998-10.4004c.2275-.3027.2642-.708.0947-1.0469s-.5156-.5527-.8945-.5527h-10.1843c-.4141-1.1615-1.5138-2-2.8157-2-1.6543,0-3,1.3457-3,3s1.3457,3,3,3c1.3019,0,2.4016-.8385,2.8157-2h8.1843l-7.7998,10.4004c-.2275.3027-.2642.708-.0947,1.0469s.5156.5527.8945.5527h7.2774c.3464.5953.9842,1,1.7226,1,1.1046,0,2-.8954,2-2s-.8954-2-2-2Zm-13-9c-.5513,0-1-.4482-1-1s.4487-1,1-1,1,.4482,1,1-.4487,1-1,1Z"></path><path d="m16,21h-2v4.5859L4.4139,16,14,6.4142v4.5858h2v-6h10v8h2V5c0-1.1046-.8954-2-2-2H4c-1.1046,0-2,.8954-2,2v22c0,1.1046.8954,2,2,2h12v-8ZM4,5h8.5858L4,13.5858V5Zm0,22v-8.5858l8.5858,8.5858H4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
