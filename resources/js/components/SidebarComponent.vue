<template>
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="/" class="spur-logo"><i class="fas fa-bolt"></i> <span><slot></slot></span></a>
        </header>
        <nav class="dash-nav-list">
            <a v-for="page in pages" v-bind:href="page.href" class="dash-nav-item"> <i v-bind:class="page.icon"></i> {{ page.title }} </a>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                pages: [
                    {title: "Anasayfa", href: "/home", icon: "fas fa-home"},
                    {title: "Projelerim", href: "/projects", icon: "fas fa-file"}
                ]
            }
        },
    }

</script>

