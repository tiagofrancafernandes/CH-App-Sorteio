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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="17" y="15" width="2" height="7"></rect><circle cx="18" cy="25" r="1.25"></circle><path d="m29,30H7c-.3499,0-.6743-.1829-.8555-.4823s-.1926-.6718-.0303-.9817L17.1143,7.536c.1726-.3296.5292-.536.8857-.536s.7131.2064.8857.536l11,21c.1624.3099.1509.6823-.0303.9817s-.5056.4823-.8555.4823Zm-20.3474-2h18.6948l-9.3474-17.8448-9.3474,17.8448Z"></path><path d="m7,23H3c-.3467,0-.6685-.1794-.8506-.4742-.1824-.2948-.1987-.663-.0439-.973l2.5-5,1.7891.8945-1.7766,3.5527h2.3821v2Z"></path><rect x="4.9549" y="11.4999" width="5.5902" height="2.0002" transform="translate(-6.8962 13.8416) rotate(-63.4349)"></rect><path d="m10.8945,8.4473l-1.7891-.8945,2.5-5c.1694-.3387.532-.5527.8945-.5527s.7251.214.8945.5527l2,4-1.7891.8945-1.1055-2.2112-1.6055,3.2112Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
