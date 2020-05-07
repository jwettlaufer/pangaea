<template>
    <span>
        <a href="#" v-if="isLiked" @click.prevent="unLike(post)">
            <i  class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="like(post)">
            <i  class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['post', 'liked'],

        data: function() {
            return {
                isLiked: '',
            }
        },

        mounted() {
            this.isLiked = this.isLike ? true : false;
        },

        computed: {
            isLike() {
                return this.liked;
            },
        },

        methods: {
            like(post) {
                axios.post('/like/'+post)
                    .then(response => this.isLiked = true)
                    .catch(response => console.log(response.data));
            },

            unLike(post) {
                axios.post('/unlike/'+post)
                    .then(response => this.isLiked = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>