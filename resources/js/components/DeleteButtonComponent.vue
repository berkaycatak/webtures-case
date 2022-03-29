<template>
    <button type="submit" onclick="deleteConfirm()" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i><slot></slot></button>
</template>

<script>
    export default {
        name: "DeleteButtonComponent"
    }
</script>

<style scoped>

</style>
