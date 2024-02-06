<template>
    <div ref="artRef"></div>
</template>
  
<script>
import '../../../../node_modules/artplayer/dist/artplayer';
export default {
    data() {
        return {
            instance: null,
        };
    },
    props: {
        option: {
            type: Object,
            required: true,
        },
    },
    mounted() {
        this.instance = new Artplayer({
            ...this.option,
            container: this.$refs.artRef,
            fullscreen: true,
            theme: '#b6758b',
            setting: true,
            pip: true,
        });

        this.$nextTick(() => {
            this.$emit("get-instance", this.instance);
        });
    },
    beforeDestroy() {
        if (this.instance && this.instance.destroy) {
            this.instance.destroy(false);
        }
    },
};
</script>