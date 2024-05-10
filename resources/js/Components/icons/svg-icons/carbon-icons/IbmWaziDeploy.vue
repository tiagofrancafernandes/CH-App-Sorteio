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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m13.9998,29.991l-10.5037-6.1272c-.3071-.1792-.4961-.5081-.4961-.8638v-14h2v13.4257l10.0076,5.8378-1.0078,1.7275Z"></path><rect x="7" y="6" width="2" height="10"></rect><path d="m29,13h-2v-3.4257l-11-6.4166-3,1.7499v8.0924h-2V4.3333c0-.3557.189-.6846.4961-.8638l4-2.3333c.1558-.0908.3298-.1362.5039-.1362s.3481.0454.5039.1362l12,7c.3071.1792.4961.5081.4961.8638v4Z"></path><path d="m27,23l-1.4199,1.4102,1.5898,1.5898h-7.1699v-3.1421c1.7202-.4473,3-1.9995,3-3.8579,0-2.2056-1.7944-4-4-4s-4,1.7944-4,4c0,1.8584,1.2798,3.4106,3,3.8579v3.1421c0,1.1025.8972,2,2,2h7.1699l-1.5798,1.5801,1.4099,1.4199,4-4-4-4Zm-10-4c0-1.1025.8972-2,2-2s2,.8975,2,2-.8972,2-2,2-2-.8975-2-2Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
