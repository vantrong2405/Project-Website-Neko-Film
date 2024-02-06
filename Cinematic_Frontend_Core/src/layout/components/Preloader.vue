<template>
    <div>
        <div class="preloader" id="preloader">
            <div class="preloader__spinner"></div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        setTimeout(() => {
            document.getElementById("preloader").style.display = "none";
        }, 1000);
    }
}
</script>
<style>
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    z-index: 9999;
}

.preloader__spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 50px;
    height: 50px;
    margin: -25px 0 0 -25px;
    border-radius: 50%;
    border: 2px solid #ccc;
    border-top-color: #333;
    animation: preloader-spin 1s infinite linear;
}

@keyframes preloader-spin {
    to {
        transform: rotate(360deg);
    }
}
</style>